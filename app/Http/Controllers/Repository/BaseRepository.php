<?php
    namespace App\Http\Controllers\Repository;
    use Validator;
    use App;
    use Lang;
    use DB;
    use Log;
    use Session;
    
    abstract class BaseRepository{
        protected $table;

        protected function db_prepareDelete($id){
            try{
                $result = DB::table($this->getTable())->where('id', $id)->delete();
                Log::info('[BaseRepository] -- ' .'['.$this->getTable().'] -- Deleted : ' . json_encode($result));
                return $result;
            }catch(Exception $e){
                Log::info('[BaseRepository] -- ' .'['.$this->getTable().'] -- DeleteKey_Value -- [Error] : ' .$e->getMessage());
            }
            return null;
        }
        protected function db_prepareDeleteKey_Value($key,$id){
            try{
                $result = DB::table($this->getTable())->where($key, $id)->delete();
                Log::info('[BaseRepository] -- ' .'['.$this->getTable().'] -- DeleteKey_Value : ' . json_encode($result));
                return $result;
            }catch(Exception $e){
                Log::info('[BaseRepository] -- ' .'['.$this->getTable().'] -- DeleteKey_Value -- [Error] : ' .$e->getMessage());
            }
            return null;
        }
        protected function customMultipleDelete($table,$id_array){
            $result = DB::table($table)->where('id', $id_array)->delete();
            Log::info('[BaseRepository] -- ' .'['.$table.'] -- CustomMultipleDelete : ' . json_encode($result));
            return $result;
        }
        protected function db_prepareInsert($table, $data){
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
                Log::notice('[BaseRepository] -- ' .'[Insert SQL] --'.json_encode(DB::getQueryLog()));

                if($insert_id > 0 ){
                    Log::info('[BaseRepository] -- ' .'Insert Effected Id --' . $insert_id);
                    return $insert_id;
                }else {
                    Log::notice('[BaseRepository] -- ' .'[Insert Error] : '.$insert_id . ' Record' );
                    return false;
                }
        }
        protected function db_prepareUpdate($table, $data,$key,$id){
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
            Log::notice('[BaseRepository] -- ' .'[Update SQL] --'.json_encode(DB::getQueryLog()));
            if($update_result > 0 ){
                Log::info('[BaseRepository] -- ' .'Update Effected Rows --' . $update_result);
                return $update_result;
            }else {
                Log::notice('[BaseRepository] -- ' .'[Update Error] : '.$update_result . ' Record' );
                return false;
            }
        }
        protected function db_prepareUpdateByMultipleKey($table,$data,$key_array,$id_array){
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
            Log::notice('[BaseRepository] -- ' .'[Update SQL] --'.json_encode(DB::getQueryLog()));
            if($update_result > 0 ){
                Log::info('[BaseRepository] -- ' .'Update Effected Rows --' . $update_result);
                return $update_result;
            }else {
                Log::notice('[BaseRepository] -- ' .'[Update Error] : '.$update_result . ' Record' );
                return false;
            }
        }
        protected function isExistingByMultipleKey_Value($array,$key_array,$id_array){
            $where = array();
            foreach ($key_array as $index => $key) {
                $where[$key] =$id_array[$index];
             }
            $check_result = DB::table($this->getTable())->where($where)->get();
            Log::info('[BaseRepository] -- ' .'[isExistingByMultipleKey_Value]  : ');

            Log::info('[BaseRepository] -- ' .'['.$this->getTable().'] -- isExistingByMultipleKey_Value : ' . json_encode($check_result));
            if(!empty($check_result) && sizeof($check_result) > 0 ){
                return true;
            }else {
                return false;
            }
        }
        protected function setTable($table){
            $this->table = $table;

            return $this;
        }
        protected function getTable(){
                return $this->table;
        }
        protected function table_language(){
            $list_cols =  DB::select('DESCRIBE '.$this->table);
                $nb_cols = count($list_cols);
                $target_array = array();
                foreach($list_cols as $row){
                    $column = $row->Field;
                    if($column == 'language_id')return true;
                }
                return false;
        }
        protected function table_company_id(){
            $list_cols =  DB::select('DESCRIBE '.$this->table);
                $nb_cols = count($list_cols);
                $target_array = array();
                foreach($list_cols as $row){
                    $column = $row->Field;
                    if($column == 'company_id')return true;
                }
                return false;
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
        
    }
?>