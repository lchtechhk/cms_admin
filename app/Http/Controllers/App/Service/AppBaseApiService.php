<?php
namespace App\Http\Controllers\App\Service;
use Lang;
use Illuminate\Http\Request;
use App\Http\Controllers\App\Dao\AppDao;
use Log;
use DB;
use League\Flysystem\Exception;

abstract class AppBaseApiService extends AppDao{ 
 
        public function add($array){
            try{
                $array['status'] = 'active';
                $array['create_date'] = date("Y-m-d H:i:s");
                $array['edit_date'] = date("Y-m-d H:i:s");
                Log::info('[add] -- :' . json_encode($array));	
                $insert_id = $this->db_prepareInsert($this->getTable(),$array);
                //
                $result = array();	
                if(!empty($insert_id) && $insert_id > 0){
                    $result['status'] = 'success';
                    $result['response_id'] = $insert_id;
                }else {
                    $result['status'] = 'fail';
                }
                $result['operation'] = 'add';
                return $result;
            }catch (Exception $e){
                $result = $this->throwException('fail',$e->getMessage(),false);
            }
        }
        public function update($key,$array){
            $array['edit_date'] = date("Y-m-d H:i:s");
            $update_id = $this->db_prepareUpdate($this->getTable(),$array,$key,$array[$key]);
            $result = array();	
			if(!empty($update_id) && $update_id > 0){
                $result['status'] = 'success';
                $result['response_id'] = $update_id;
			}else {
                $result['status'] = 'fail';
            }
            $result['operation'] = 'edit';
            return $result;
        }
        public function updateByMultipleKey_Value($array,$key_array,$id_array){
            $array['edit_date'] = date("Y-m-d H:i:s");
            $update_id = $this->db_prepareUpdateByMultipleKey($this->getTable(),$array,$key_array,$id_array);
            $result = array();	
			if(!empty($update_id) && $update_id > 0){
                $result['status'] = 'success';
                $result['response_id'] = $update_id;
			}else {
                $result['status'] = 'fail';
            }
            $result['operation'] = 'edit';
            return $result;
        }
        public function deleteByKey_Value($key,$id){
            $delete_id = $this->db_prepareDeleteKey_Value($key,$id);
            Log::info('[delete_id] : ' . $delete_id);
            $result = array();
            if($delete_id === null){
                $result['status'] = 'fail';
            }else {
                $result['status'] = 'success';
            }
            $result['operation'] = 'delete';
            return $result;
        }
        public function delete($id){
            $delete_id = $this->db_prepareDelete($id);
            Log::info('[delete_id] : ' . $delete_id);
            $result = array();
            if(!empty($delete_id) && $delete_id > 0){
                $result['status'] = 'success';
			}else {
                $result['status'] = 'fail';
            }
            $result['operation'] = 'delete';
            return $result;
        }
        
        function getCountForEmailExisting($email){
            $result = DB::table($this->getTable())
            ->where('email','=',$email)
            ->count();
            Log::info('[AdminDao] -- getCountForEmailExisting : ] '. $result);
            return $result;
        }

        public function throwException($result,$error_msg,$is_rollback){
            Log::error("throwException : " . $error_msg);
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
        // public abstract function redirect_view($result,$title);
    }
?>