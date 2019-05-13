<?php
namespace App\Http\Controllers\Admin\Service;
use Lang;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Dao\BaseDao;
use Log;
use DB;
use App\Http\Controllers\Admin\AdminSiteSettingController;
use League\Flysystem\Exception;

abstract class BaseApiService extends BaseDao{ 
        
        public function add($array,$success_msg,$fail_msg){
            try{
                $array['status'] = 'active';
                $array['create_date'] = date("Y-m-d H:i:s");
                $array['edit_date'] = date("Y-m-d H:i:s");
                Log::info('[add] ' . json_encode($array));	
                $insert_id = $this->db_prepareInsert($this->getTable(),$array);
                //
                $result = array();	
                $result['label'] = $array['label'];
                if(!empty($insert_id) && $insert_id > 0){
                    $result['status'] = 'success';
                    $result['message'] =  Lang::get($success_msg);
                    $result['response_id'] = $insert_id;
                }else {
                    $result['status'] = 'fail';
                    $result['message'] =  Lang::get($fail_msg);
                }
                $result['operation'] = 'add';
                return $result;
            }catch (Exception $e){
                $result = $this->throwException('fail',$e->getMessage(),false);
            }
            
        }

        public function update($key,$array,$success_msg,$fail_msg){
            $array['edit_date'] = date("Y-m-d H:i:s");
            $update_id = $this->db_prepareUpdate($this->getTable(),$array,$key,$array[$key]);
            $result = array();	
            $result['label'] = $array['label'];
			if(!empty($update_id) && $update_id > 0){
                $result['status'] = 'success';
                $result['message'] =  Lang::get($success_msg);
                $result['response_id'] = $update_id;
			}else {
                $result['status'] = 'fail';
				$result['message'] =  Lang::get($fail_msg);
            }
            $result['operation'] = 'edit';
		    // $result['request'] = $array['request'];
            return $result;
        }
        public function updateByMultipleKey($array,$key_array,$id_array,$success_msg,$fail_msg){
            $array['edit_date'] = date("Y-m-d H:i:s");
            $update_id = $this->db_prepareUpdateByMultipleKey($this->getTable(),$array,$key_array,$id_array);
            $result = array();	
            $result['label'] = $array['label'];
			if(!empty($update_id) && $update_id > 0){
                $result['status'] = 'success';
                $result['message'] =  Lang::get($success_msg);
                $result['response_id'] = $update_id;
			}else {
                $result['status'] = 'fail';
				$result['message'] =  Lang::get($fail_msg);
            }
            $result['operation'] = 'edit';
		    // $result['request'] = $array['request'];
            return $result;
        }
        public function deleteByKey_Value($key,$id,$success_msg,$fail_msg){
            $delete_id = $this->db_prepareDeleteKey_Value($key,$id);
            Log::info('[delete_id] : ' . $delete_id);
            $result = array();
            if($delete_id === null){
                $result['status'] = 'fail';
				$result['message'] =  Lang::get($fail_msg);
            }else {
                $result['status'] = 'success';
				$result['message'] =  Lang::get($success_msg);
            }
            $result['operation'] = 'delete';
            return $result;
        }
        public function delete($id,$success_msg,$fail_msg){
            $delete_id = $this->db_prepareDelete($id);
            Log::info('[delete_id] : ' . $delete_id);
            $result = array();
            if(!empty($delete_id) && $delete_id > 0){
                $result['status'] = 'success';
				$result['message'] =  Lang::get($success_msg);
			}else {
                $result['status'] = 'fail';
				$result['message'] =  Lang::get($fail_msg);
            }
            $result['operation'] = 'delete';
            return $result;
        }
        // public function add_multiple();
        // public function update_multiple();

        public function throwException($result,$error_msg,$is_rollback){
            Log::error($error_msg);
            $result['status'] = 'fail';
            $result['message'] =  $error_msg;
            if($is_rollback)DB::rollBack();
            return $result;
        }
        public function response($result,$message,$operation){
            $result['status'] = "success";
            $result['message'] =  $message;
            $result['operation'] = $operation;
            return $result;
        }
        public abstract function redirect_view($result,$title);
    }
?>