<?php
    namespace App\Http\Controllers\Admin\Dao;
    use Validator;
    use App;
    use Lang;
    use DB;
    use Log;
    use Session;
    
    abstract class BaseDao{
        protected $table;

        public function findAllByLanguage($language_id){
            $result = DB::table($this->getTable())->where('language_id',$language_id)->get();
            Log::info('[BaseDao] -- ' .'['.$this->getTable().'] -- findAllByLanguage : ' . json_encode($result));
            return $result;
        }
        public function findAll(){
            $result = DB::table($this->getTable())->get();
            Log::info('[BaseDao] -- ' .'['.$this->getTable().'] -- findAll : ' . json_encode($result));
            return $result;
        }
        public function findByColumnAndId($field,$id){
            $result = DB::table($this->getTable())->where($field, $id)->get();
            Log::info('[BaseDao] -- ' .'['.$this->getTable().'] -- findByColumnAndId : ' . json_encode($result));
            return $result;
        }
        public function findById($id){
            $result = DB::table($this->getTable())->where('id', $id)->get();
            Log::info('[BaseDao] -- ' .'['.$this->getTable().'] -- findById : ' . json_encode($result));
            return $result;
        }

        public function findByColumnWithLanguage($field,$id){
            $result = DB::table($this->getTable())->where('language_id',session('language_id'))->where($field, $id)->get();
            Log::info('[BaseDao] -- ' .'['.$this->getTable().'] -- findByColumnWithLanguage : ' . json_encode($result));
            return $result;
        }

        public function findByColumn_Values($column,$values){
            $result = DB::table($this->getTable())->whereIn($column, $values)->get();
            Log::info('[BaseDao] -- ' .'['.$this->getTable().'] -- findByColumn_Values : ' . json_encode($result));
            return $result;
        }

        public function findByColumn_ValuesWithLanguage($column,$values){
            $result = DB::table($this->getTable())->where('language_id',session('language_id'))->whereIn($column, $values)->get();
            Log::info('[BaseDao] -- ' .'['.$this->getTable().'] -- findByColumn_ValuesWithLanguage : ' . json_encode($result));
            return $result;
        }

        public function findByColumn_IdArray($column,$target_column,$id){
            $result = DB::table($this->getTable())->where($column, $id)->get();
            $id_array = array();
            foreach($result as $row){
                $id = $row->$target_column;
                $id_array[] = $id;
            }
            Log::info('[BaseDao] -- ' .'['.$this->getTable().'] -- findByColumn_IdArray : ' . json_encode($id_array));
            return $id_array;
        }

        // Company
        public function company_findAllByLanguage(){
            $result = DB::table($this->getTable())->where('language_id',session('language_id'))->where('company_id',Session::get('default_company_id'))->get();
            Log::info('[BaseDao] -- ' .'['.$this->getTable().'] -- findAllByLanguage : ' . json_encode($result));
            return $result;
        }
        
        function getCountForEmailExisting($email){
            $result = DB::table($this->getTable())
            ->where('email','=',$email)
            ->count();
            Log::info('[BaseDao] -- getCountForEmailExisting : ] '. $result);
            return $result;
        }

        public function db_prepareDelete($id){
            try{
                $result = DB::table($this->getTable())->where('id', $id)->delete();
                Log::info('[BaseDao] -- ' .'['.$this->getTable().'] -- Deleted : ' . json_encode($result));
                return $result;
            }catch(Exception $e){
                Log::info('[BaseDao] -- ' .'['.$this->getTable().'] -- DeleteKey_Value -- [Error] : ' .$e->getMessage());
            }
            return null;
        }
        public function db_prepareDeleteKey_Value($key,$id){
            try{
                $result = DB::table($this->getTable())->where($key, $id)->delete();
                Log::info('[BaseDao] -- ' .'['.$this->getTable().'] -- DeleteKey_Value : ' . json_encode($result));
                return $result;
            }catch(Exception $e){
                Log::info('[BaseDao] -- ' .'['.$this->getTable().'] -- DeleteKey_Value -- [Error] : ' .$e->getMessage());
            }
            return null;
        }
        public function customMultipleDelete($table,$id_array){
            $result = DB::table($table)->where('id', $id_array)->delete();
            Log::info('[BaseDao] -- ' .'['.$table.'] -- CustomMultipleDelete : ' . json_encode($result));
            return $result;
        }
        public function db_prepareInsert($table, $data){
            $list_cols =  DB::select('DESCRIBE '.$table);
                $nb_cols = count($list_cols);
                $target_array = array();
                foreach($list_cols as $row){
                    $column = $row->Field;
                    $column_type = $row->Type;

                    if(array_key_exists($column, $data)){
                        $object = array();
                        $count = (preg_match('/.*(date|datetime|char|text).*/i', $column_type));
                        $value = isset($data[$column]) ? html_entity_decode($data[$column]) :NULL;
                        // $value = (empty($data[$column]) && $data[$column] != 0 ) ? null : html_entity_decode($data[$column]);
                        $answer = $this->out_put_value($count,$value);
                        $target_array["$column"] = $answer;
                    }
                }
                DB::enableQueryLog();
                $insert_id = DB::table($table)->insertGetId($target_array);
                Log::notice('[BaseDao] -- ' .'[Insert SQL] --'.json_encode(DB::getQueryLog()));

                if($insert_id > 0 ){
                    Log::info('[BaseDao] -- ' .'Insert Effected Id --' . $insert_id);
                    return $insert_id;
                }else {
                    Log::notice('[BaseDao] -- ' .'[Insert Error] : '.$insert_id . ' Record' );
                    return false;
                }
        }
        public function db_prepareUpdate($table, $data,$key,$id){
            $list_cols =  DB::select('DESCRIBE '."$table");
            $nb_cols = count($list_cols);
            $target_array = array();
            foreach($list_cols as $row){
                $column = $row->Field;
                $column_type = $row->Type;

                if(array_key_exists($column, $data)){
                    $object = array();
                    $count = (preg_match('/.*(date|datetime|char|text).*/i', $column_type));
                    // $value = (empty($data[$column]) && $data[$column] != 0 ) ? null : html_entity_decode($data[$column]);
                    $value = isset($data[$column]) ? html_entity_decode($data[$column]) :NULL;
                    $answer = $this->out_put_value($count,$value);
                    $target_array["$column"] = $answer;
                }
            }
            DB::enableQueryLog();
            $update_result = DB::table($table)->where($key, $id)->update($target_array);
            Log::notice('[BaseDao] -- ' .'[Update SQL] --'.json_encode(DB::getQueryLog()));
            if($update_result > 0 ){
                Log::info('[BaseDao] -- ' .'Update Effected Rows --' . $update_result);
                return $update_result;
            }else {
                Log::notice('[BaseDao] -- ' .'[Update Error] : '.$update_result . ' Record' );
                return false;
            }
        }

        public function isExistingByMultipleKey_Value($array,$key_array,$id_array){
            $where = array();
            foreach ($key_array as $index => $key) {
                $where[$key] =$id_array[$index];
             }
            $check_result = DB::table($this->getTable())->where($where)->get();
            Log::info('[BaseDao] -- ' .'[isExistingByMultipleKey_Value]  : ');

            Log::info('[BaseDao] -- ' .'['.$this->getTable().'] -- isExistingByMultipleKey_Value : ' . json_encode($check_result));
            if(!empty($check_result) && sizeof($check_result) > 0 ){
                return true;
            }else {
                return false;
            }
        }

        public function db_prepareUpdateByMultipleKey($table,$data,$key_array,$id_array){
            $list_cols =  DB::select('DESCRIBE '.$table);
            $target_array = array();
            foreach($list_cols as $row){
                $column = $row->Field;
                $column_type = $row->Type;

                if(array_key_exists($column, $data)){
                    $count = (preg_match('/.*(date|datetime|char|text).*/i', $column_type));
                    $value = isset($data[$column]) ? html_entity_decode($data[$column]) :NULL;
                    $answer = $this->out_put_value($count,$value);
                    $target_array["$column"] = $answer;
                }
            }
            DB::enableQueryLog();
            $where = array();
            foreach ($key_array as $index => $key) {
               $where[$key] =$id_array[$index];
            }
            $update_result = DB::table($table)->where($where)->update($target_array);
            Log::notice('[BaseDao] -- ' .'[Update SQL] --'.json_encode(DB::getQueryLog()));
            if($update_result > 0 ){
                Log::info('[BaseDao] -- ' .'Update Effected Rows --' . $update_result);
                return $update_result;
            }else {
                Log::notice('[BaseDao] -- ' .'[Update Error] : '.$update_result . ' Record' );
                return false;
            }
        }

        private function out_put_value($count,$value){
            $query_part_2 = '';
            if(empty($value)){
                $query_part_2 .= NULL; 
            }else{
                if($count == 1){
                    $query_part_2 .= $value;
                }else {
                    $query_part_2 .= $value;
                }
            }
            return $query_part_2;
        }
        private function output_null($string){
            if(empty($string)){
                return 'NULL';
            }else {
                return $string;
            }
        }
        
        public function setTable($table){
            $this->table = $table;

            return $this;
        }
        public function getTable(){
                return $this->table;
        }
    }
?>