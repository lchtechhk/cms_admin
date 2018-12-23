<?php
namespace App\Http\Controllers\Admin\Service;
use Lang;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Dao\BaseDao;
use Log;

     abstract class BaseApiService extends BaseDao{ 
        
        public function add($request,$success_msg,$fail_msg){
            $request['status'] = 'active';
            $request['create_date'] = date("Y-m-d H:i:s");
            $request['edit_date'] = date("Y-m-d H:i:s");
            Log::info('[edit_date] ' . json_encode($request->all()));	
			$insert_id = $this->db_prepareInsert($this->getTable(),$request->all());
			//
            $result = array();	
			if(!empty($insert_id) && $insert_id > 0){
                $result['status'] = 'success';
				$result['message'] =  Lang::get($success_msg);
			}else {
                $result['status'] = 'fail';
				$result['message'] =  Lang::get($fail_msg);
            }
            return $result;

        }
        public function update($request,$success_msg,$fail_msg){
            $request['edit_date'] = date("Y-m-d H:i:s");
            $update_id = $this->db_prepareUpdate($this->getTable(),$request->all(),$request->id);
            $result = array();	
			if(!empty($update_id) && $update_id > 0){
                $result['status'] = 'success';
				$result['message'] =  Lang::get($success_msg);
			}else {
                $result['status'] = 'fail';
				$result['message'] =  Lang::get($fail_msg);
            }
            return $result;
        }
        public function delete($request,$success_msg,$fail_msg){
            $delete_id = $this->db_prepareDelete($request->id);
            Log::info('[delete_id] : ' . $delete_id);

            if(!empty($delete_id) && $delete_id > 0){
                $result['status'] = 'success';
				$result['message'] =  Lang::get($success_msg);
			}else {
                $result['status'] = 'fail';
				$result['message'] =  Lang::get($fail_msg);
            }
            return $result;
        }
        // public function add_multiple();
        // public function update_multiple();
        // public function delete_multiple(); 

        public abstract function redirect_view($result,$title);
    }
?>