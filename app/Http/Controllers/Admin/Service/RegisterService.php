<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;

use App\Http\Controllers\Admin\Service\UploadService;
use App\Http\Controllers\Admin\Service\LanguageService;
use App\Http\Controllers\Admin\Service\CompanyService;
use App\Http\Controllers\Admin\Service\CompanyDescriptionService;
use App\Http\Controllers\Admin\Service\UserToCompanyService;

class RegisterService extends BaseApiService{
    private $UploadService;
    private $LanguageService;
    private $CompanyService;
    private $CompanyDescriptionService;
    private $UserToCompanyService;

    function __construct(){
        $this->setTable('product_option');
        $this->UploadService = new UploadService();
        $this->LanguageService = new LanguageService();
        $this->CompanyService = new CompanyService();
        $this->CompanyDescriptionService = new CompanyDescriptionService();
        $this->UserToCompanyService = new UserToCompanyService();

    }

    function redirect_view($result,$title){
        $result['languages'] = $this->LanguageService->findAll();

        switch($result['operation']){
            case 'view_registerCompany':
                Log::info('[view_registerCompany] --  : ' . \json_encode($result));
                return view("admin.register.view_registerCompany", $title)->with('result', $result);
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
        }
    }
}

?>