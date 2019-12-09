<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;

use App\Http\Controllers\Admin\Service\UploadService;
use App\Http\Controllers\Admin\Service\LanguageService;
use App\Http\Controllers\Admin\Service\UserService;
use App\Http\Controllers\Admin\Service\CompanyService;
use App\Http\Controllers\Admin\Service\CompanyDescriptionService;
use App\Http\Controllers\Admin\Service\UserToCompanyService;
use App\Http\Controllers\Admin\Service\View_ManufacturerService;
use App\Http\Controllers\Admin\Service\PermissionService;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminController;
use Hash;


class RegisterService extends BaseApiService{
    private $UploadService;
    private $LanguageService;
    private $UserService;
    private $CompanyService;
    private $CompanyDescriptionService;
    private $UserToCompanyService;
    private $View_ManufacturerService;
    private $PermissionService;
    private $AdminController;

    function __construct(){
        $this->setTable('');
        $this->UploadService = new UploadService();
        $this->LanguageService = new LanguageService();
        $this->CompanyService = new CompanyService();
        $this->UserService = new UserService();
        $this->CompanyDescriptionService = new CompanyDescriptionService();
        $this->UserToCompanyService = new UserToCompanyService();
        $this->View_ManufacturerService = new View_ManufacturerService();
        $this->PermissionService = new PermissionService();
        $this->AdminController = new AdminController();

    }

    function redirect_view($result,$title){
        $result['label'] = "RegisterUser";
        $result['languages'] = $this->LanguageService->findByColumn_Value("is_default",1);

        switch($result['operation']){
            case 'view_registerCompany':
                Log::info('[view_registerCompany] --  : ' . \json_encode($result));
                return view("admin.register.view_registerCompany", $title)->with('result', $result);
            break;
            case 'view_registerUser':
                $result['permissions'] = $this->PermissionService->findByColumn_Value("is_public",1);
                return view("admin.register.view_registerUser", $title)->with('result', $result);
            break;
            case 'add_registerCompany':
                try{
                    DB::beginTransaction();
                    if($image = $this->UploadService->upload_image($result['request'],'image','resources/assets/images/company/'))$result['image'] = $image;
                    if($icon = $this->UploadService->upload_image($result['request'],'icon','resources/assets/images/company/'))$result['icon'] = $icon;
                    Log::info('[add_registerCompany] --  : ' . json_encode($result));
                    $add_company_result = $this->CompanyService->register_add($result);
                    if(empty($add_company_result['status']) || $add_company_result['status'] == 'fail')throw new Exception("Error To Add Company");
                    $result['company_id'] = $add_company_result['response_id'];
                    foreach ($result['language_array'] as $language_id => $name) {
                        $param = array();
                        $param['language_id'] = $language_id;
                        $param['name'] = $name;
                        $param['company_id'] = $result['company_id'];
                        $add_company_description_result = $this->CompanyDescriptionService->register_add($param);
                        if(empty($add_company_description_result['status']) || $add_company_description_result['status'] == 'fail')throw new Exception("Error To Add Company Description");
                    }
                    $user_to_company_param = array();
                    $user_to_company_param['user_id'] = auth()->guard('admin')->user()->user_id;
                    $user_to_company_param['company_id'] = $add_company_result['response_id'];
                    $user_to_company_param['admin_type'] = 'boss';
                    $add_user_to_company = $this->UserToCompanyService->register_add($user_to_company_param);
                    if(empty($add_user_to_company['status']) || $add_user_to_company['status'] == 'fail')throw new Exception("Error To Add User To Company");
                    $result = $this->response($result,"Successful","view_edit");
                    DB::commit();
                    return redirect('/admin/dashboard/this_month');
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                }
                return view("admin.register.view_registerCompany", $title)->with('result', $result);      
            break;
            case 'add_registerUser':
                $res = $this->separate($result);
                $user_param = $res['user_param'];
                $company_param = $res['company_param'];
                try{
                    DB::beginTransaction();

                    // Handle Company
                    $company_param['image'] = $this->UploadService->upload_image($result['request'],'company_newImage','resources/assets/images/company_images/');
                    $add_company_result = $this->CompanyService->register_add($company_param);
                    if(empty($add_company_result['status']) || $add_company_result['status'] == 'fail')throw new Exception("Error To Add Company");
                    $result['company_id'] = $add_company_result['response_id'];
                    
                    // Handle User
                    $user_param['permission'] = 'boss';
                    $user_param['default_company_id'] = $result['company_id'];
                    $user_param['default_language'] = 1;
                    $user_param['password'] = Hash::make($user_param['password_str']);
                    $email = $user_param['email'];
                    $own_email_count = $this->UserService->getCountForEmailExisting($email);
                    if($own_email_count > 0 ){
                        $result['status'] = 'fail';
                        $result['message'] =  'Update Error, The Email Is Duplicate In DB';
                        return view("admin.register.view_registerUser", $title)->with('result', $result);
                    }        
                    $user_param['image'] = $this->UploadService->upload_image($result['request'],'newImage','resources/assets/images/user_profile/');
                    $add_user_result = $this->UserService->register_add($user_param);
                    $result['user_id'] = $add_user_result['response_id'];
                    if(empty($add_user_result['status']) || $add_user_result['status'] == 'fail')throw new Exception("Error To Add User");

            
                    // Handle Company Description
                    foreach ($company_param['language_array'] as $language_id => $name) {
                        $param = array();
                        $param['language_id'] = $language_id;
                        $param['name'] = $name;
                        $param['company_id'] = $result['company_id'];
                        $add_company_description_result = $this->CompanyDescriptionService->add($param);
                        if(empty($add_company_description_result['status']) || $add_company_description_result['status'] == 'fail')throw new Exception("Error To Add Company Description");
                    }

                    // Handle User To Company
                    $user_to_company_param = array();
                    $user_to_company_param['user_id'] = $result['user_id'];
                    $user_to_company_param['company_id'] = $result['company_id'];
                    $user_to_company_param['admin_type'] = 'boss';
                    $add_user_to_company = $this->UserToCompanyService->register_add($user_to_company_param);
                    if(empty($add_user_to_company['status']) || $add_user_to_company['status'] == 'fail')throw new Exception("Error To Add User To Company");

                    $user = $this->UserService->findByColumn_Value("user_id",$add_user_result['response_id']);
                    $result['user'] = !empty($user) && \sizeof($user)>0? $user[0] : array();
                    $result = $this->response($result,"Success To Add User","view_edit");
                    DB::commit();
                    return $this->AdminController->forward_login($user_param['email'],$user_param['password_str']);
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                }
                return view("admin.register.view_registerUser", $title)->with('result', $result);      
            break;
        }
    }

    function separate($result){
        $user_param = array();
        $company_param = array();
        $user_param['first_name'] = $result['first_name'];
        $user_param['last_name'] = $result['last_name'];
        $user_param['gender'] = $result['gender'];
        $user_param['dob'] = $result['dob'];
        $user_param['phone'] = $result['phone'];
        $user_param['email'] = $result['email'];
        $user_param['password_str'] = $result['password_str'];
        $user_param['status'] = $result['status'];

        $company_param['language_array'] = $result['language_array'];
        $company_param['email'] = $result['company_email'];
        $company_param['phone'] = $result['company_phone'];

        $res = array("user_param"=>$user_param,"company_param"=>$company_param);
        Log::info('[res] --  : ' . \json_encode($res));

        return $res;
    }
}

?>