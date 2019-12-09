<?php
namespace App\Http\Controllers\Admin\Service;
use Log;
use DB;
use Lang;
use Exception;

use App\Http\Controllers\Admin\Service\UploadService;
use App\Http\Controllers\Admin\Service\LanguageService;
use App\Http\Controllers\Admin\Service\PermissionService;
use App\Http\Controllers\Admin\Service\UserToCompanyService;

class UserService extends BaseApiService{
    private $UploadService;
    private $LanguageService;
    private $PermissionService;
    private $UserToCompanyService;

    function __construct(){
        $this->setTable('user');
        $this->LanguageService = new LanguageService();
        $this->UploadService = new UploadService();
        $this->PermissionService = new PermissionService();
        $this->UserToCompanyService = new UserToCompanyService();

    }

    function checkDuplicateOwnEmail($email,$id){
        $result = DB::table($this->getTable())
        ->where('email','=',$email)
        ->where('user_id','=',$id)
        ->count();
        Log::info('[UserService] -- checkDuplicateOwnEmail : ] '. $result);
        return $result;
    }

    function getUserBelongOwn(){
        $user_ids = $this->UserToCompanyService->getUserIdsByCompany();
        Log::info('user_ids : ' . json_encode($user_ids));
        return $this->findByColumn_Values("user_id",$user_ids);
    }

    private function getListing(){
        return $this->getUserBelongOwn();
    }

    function redirect_view($result,$title){
        $result['label'] = "User";
        $result['permissions'] = $this->PermissionService->findByColumn_Value("is_public",1);

        switch($result['operation']){
            case 'listing':
                Log::info('[listing] --  : ' . \json_encode($result));
                $result['users'] = $this->getListing();
                return view("admin.user.listingUser", $title)->with('result', $result);
            break;
            case 'view_add':
                Log::info('[view_add] --  : ' . \json_encode($result));
                return view("admin.user.viewUser", $title)->with('result', $result);
            break;
            case 'view_edit':
                $user = $this->findByColumn_Value("user_id",$result['user_id']);
                $result['user'] = !empty($user) && \sizeof($user)>0? $user[0] : array();
                Log::info('[view_edit] --  : ' . \json_encode($result));
                return view("admin.user.viewUser", $title)->with('result', $result);
            break;
            case 'add':
                try{
                    DB::beginTransaction();
                    $email = $result['email'];
                    $own_email_count = $this->getCountForEmailExisting($email);
                    // Log::info('own_email_count : ' . $own_email_count);
                    if($own_email_count > 0 ){
                        $result['status'] = 'fail';
                        $result['message'] =  'Update Error, The Email Is Duplicate In DB';
                        return view("admin.user.viewUser", $title)->with('result', $result);
                    }        
                    $result['image'] = $this->UploadService->upload_image($result['request'],'newImage','resources/assets/images/user_profile/');
                    $add_user_result = $this->add($result);
                    $user = $this->findByColumn_Value("user_id",$add_user_result['response_id']);
                    $result['user'] = !empty($user) && \sizeof($user)>0? $user[0] : array();
                    $result = $this->response($result,"Success To Add User","view_edit");
                    DB::commit();
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                }
                return view("admin.user.viewUser", $title)->with('result', $result);               
            break;
            case 'edit':
                try{
                    DB::beginTransaction();
                    $email = $result['email'];
                    $user_id = $result['user_id'];
                    $own_email_count = $this->getCountForEmailExisting($email);
                    $duplicate_email_count = $this->checkDuplicateOwnEmail($email,$user_id);
                    if($own_email_count > 1 ){
                        unset($result['email']);
                    }else if($own_email_count == 0 && $duplicate_email_count > 0){
                        $result['operation'] = 'edit';
                        $result['status'] = 'fail';
                        $result['message'] =  'Update Error, The Email Is Duplicate In DB';
                        $user = $this->findByColumn_Value("user_id",$user_id);
                        $result['user'] = !empty($user) && \sizeof($user)>0? $user[0] : array();
                        return view("admin.user.viewUser", $title)->with('result', $result);
                    }
    
                    $result['image'] = $this->UploadService->upload_image($result['request'],'newImage','resources/assets/images/user_profile/');
                    $add_user_result = $this->update("user_id",$result);
                    $result = $this->response($result,"Success To Edit User","view_edit");
                    DB::commit();
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                }
                $user = $this->findByColumn_Value("user_id",$user_id);
                $result['user'] = !empty($user) && \sizeof($user)>0? $user[0] : array();
                Log::info('result : ' . json_encode($result));
                return view("admin.user.viewUser", $title)->with('result', $result);        
            break;
            case 'delete': 
                try{
                    $delete_user_result = $this->deleteByKey_Value("user_id",$result['user_id']);
                    if(empty($delete_user_result['status']) || $delete_user_result['status'] == 'fail')throw new Exception("Error To Delete User");
                    $result['users'] = $this->getListing();
                    $result = $this->response($result,"Success To Delete User","view_edit");
                }catch(Exception $e){
                    $result = $this->throwException($result,$e->getMessage(),true);
                }
                return view("admin.user.listingUser", $title)->with('result', $result);
            break;
        }
    }
}

?>