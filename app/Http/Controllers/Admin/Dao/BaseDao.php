<?php
    namespace App\Http\Controllers\Admin\Dao;
    use Validator;
    use App;
    use Lang;
    use DB;
    use Log;

    abstract class BaseDao {
        protected $table;

        public function findAll(){
            $result = DB::table($this->getTable())->get();
            Log::info('['.$this->getTable().'] -- findAll : ' . json_encode($result));
            return $result;
        }
        public function findById($id){
            $result = DB::table($this->getTable())->where('id', $id)->get();
            Log::info('['.$this->getTable().'] -- findById : ' . json_encode($result));
            return $result;
        }
        public function db_prepareDelete($id){
            $result = DB::table($this->getTable())->where('id', $id)->delete();
            Log::info('['.$this->getTable().'] -- Deleted : ' . json_encode($result));
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
                Log::notice('[Insert SQL] --'.json_encode(DB::getQueryLog()));

                if($insert_id > 0 ){
                    Log::info('Insert Effected Id --' . $insert_id);
                    return $insert_id;
                }else {
                    Log::notice('[Insert Error] : '.$insert_id . ' Record' );
                    return false;
                }
        }
        public function db_prepareUpdate($table, $data,$id){
                $list_cols =  DB::select('DESCRIBE '.$table);
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
                $update_result = DB::table($table)->where('id', $id)->update($target_array);
                Log::notice('[Update SQL] --'.json_encode(DB::getQueryLog()));
                if($update_result > 0 ){
                    Log::info('Update Effected Rows --' . $update_result);
                    return $update_result;
                }else {
                    Log::notice('[Update Error] : '.$update_result . ' Record' );
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