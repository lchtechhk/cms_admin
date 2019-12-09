<?php
    namespace App\Http\Controllers\Admin\Dao;
    use Validator;
    use App;
    use Lang;
    use DB;
    use Log;
    use Session;
    use App\Http\Controllers\Repository\BaseRepository;

    abstract class CompnayAdminDao extends BaseRepository{
        protected $table;

        public function findAll(){
            $result = DB::table($this->getTable());
            if($this->table_company_id()) $result = $result->where('company_id',Session::get('default_company_id'));
            $result = $result->get();
            Log::info('[AdminDao] -- ' .'['.$this->getTable().'] -- findAll : ' . json_encode($result));
            return $result;
        }
        public function findByColumn_Value($field,$id){
            $result = DB::table($this->getTable())->where($field, $id);
            if($this->table_company_id())$result = $result->where('company_id',Session::get('default_company_id'));
            $result = $result->get();
            Log::info('[AdminDao] -- ' .'['.$this->getTable().'] -- findByColumn_Value : ' . json_encode($result));
            return $result;
        }
        public function findById($id){
            $result = DB::table($this->getTable())->where('id', $id);
            if($this->table_company_id())$result = $result->where('company_id',Session::get('default_company_id'));
            $result = $result->get();
            Log::info('[AdminDao] -- ' .'['.$this->getTable().'] -- findById : ' . json_encode($result));
            return $result;
        }
        public function findByColumn_Values($column,$values){
            $result = DB::table($this->getTable())->whereIn($column, $values);
            if($this->table_company_id())$result = $result->where('company_id',Session::get('default_company_id'));
            $result = $result->get();
            Log::info('[AdminDao] -- ' .'['.$this->getTable().'] -- findByColumn_Values : ' . json_encode($result));
            return $result;
        }
        // With Language
        public function findAllWithLanguage(){
            $result = DB::table($this->getTable())->where('language_id',session('language_id'));
            if($this->table_company_id())$result = $result->where('company_id',Session::get('default_company_id'));
            $result = $result->get();
            Log::info('[AdminDao] -- ' .'['.$this->getTable().'] -- findAllWithLanguage : ' . json_encode($result));
            return $result;
        }
        public function findByColumnWithLanguage($field,$id){
            $result = DB::table($this->getTable())->where('language_id',session('language_id'))->where($field, $id);
            if($this->table_company_id())$result = $result->where('company_id',Session::get('default_company_id'));
            $result = $result->get();
            Log::info('[AdminDao] -- ' .'['.$this->getTable().'] -- findByColumnWithLanguage : ' . json_encode($result));
            return $result;
        }
        public function findByColumn_ValuesWithLanguage($column,$values){
            $result = DB::table($this->getTable())->where('language_id',session('language_id'))->whereIn($column, $values);
            if($this->table_company_id())$result = $result->where('company_id',Session::get('default_company_id'));
            $result = $result->get();
            Log::info('[AdminDao] -- ' .'['.$this->getTable().'] -- findByColumn_ValuesWithLanguage : ' . json_encode($result));
            return $result;
        }

        public function findByColumn_Values_Return_Array($column,$target_column,$id){
            $result = DB::table($this->getTable())->where($column, $id);
            if($this->table_company_id())$result = $result->where('company_id',Session::get('default_company_id'));
            $result = $result->get();
            $id_array = array();
            foreach($result as $row){
                $id = $row->$target_column;
                $id_array[] = $id;
            }
            Log::info('[AdminDao] -- ' .'['.$this->getTable().'] -- findByColumn_Values_Return_Array : ' . json_encode($id_array));
            return $id_array;
        }
        



        // public function findAll(){
        //     $result = DB::table($this->getTable());
        //     $result = $result->get();
        //     Log::info('[AdminDao] -- ' .'['.$this->getTable().'] -- findAll : ' . json_encode($result));
        //     return $result;
        // }
        // public function findById($id){
        //     $result = DB::table($this->getTable())->where('id', $id);
        //     $result = $result->get();
        //     Log::info('[AdminDao] -- ' .'['.$this->getTable().'] -- findById : ' . json_encode($result));
        //     return $result;
        // }
        // public function findByColumn_Value($field,$value){
        //     $result = DB::table($this->getTable())->where($field, $value);
        //     $result = $result->get();
        //     Log::info('[AdminDao] -- ' .'['.$this->getTable().'] -- findByColumn_Value : ' . json_encode($result));
        //     return $result;
        // }
        // public function findByColumn_Values($column,$values){
        //     $result = DB::table($this->getTable())->whereIn($column, $values);
        //     $result = $result->get();
        //     Log::info('[AdminDao] -- ' .'['.$this->getTable().'] -- findByColumn_Values : ' . json_encode($result));
        //     return $result;
        // }
        // public function findByArray($columns_values){
        //     $result = DB::table($this->getTable());
        //     foreach($columns_values as $key =>$value){
        //         $result = $result->where($key,$value);
        //     }
        //     $result = $result->get();
        //     Log::info('[AdminDao] -- ' .'['.$this->getTable().'] -- findByArray : ' . json_encode($result));
        //     return $result;
        // }
        // // With Language
        // public function findAllWithLanguage(){
        //     $result = DB::table($this->getTable())->where('language_id',session('language_id'));
        //     $result = $result->get();
        //     Log::info('[AdminDao] -- ' .'['.$this->getTable().'] -- findAllWithLanguage : ' . json_encode($result));
        //     return $result;
        // }
        // public function findByColumn_ValueWithLanguage($field,$id){
        //     $result = DB::table($this->getTable())->where('language_id',session('language_id'))->where($field, $id);
        //     $result = $result->get();
        //     Log::info('[AdminDao] -- ' .'['.$this->getTable().'] -- findByColumnWithLanguage : ' . json_encode($result));
        //     return $result;
        // }
        // public function findByColumn_ValuesWithLanguage($column,$values){
        //     $result = DB::table($this->getTable())->where('language_id',session('language_id'))->whereIn($column, $values);
        //     $result = $result->get();
        //     Log::info('[AdminDao] -- ' .'['.$this->getTable().'] -- findByColumn_ValuesWithLanguage : ' . json_encode($result));
        //     return $result;
        // }

        // public function findByColumn_Values_Return_Array($column,$target_column,$id){
        //     $result = DB::table($this->getTable())->where($column, $id);
        //     $result = $result->get();
        //     $id_array = array();
        //     foreach($result as $row){
        //         $id = $row->$target_column;
        //         $id_array[] = $id;
        //     }
        //     Log::info('[AdminDao] -- ' .'['.$this->getTable().'] -- findByColumn_Values_Return_Array : ' . json_encode($id_array));
        //     return $id_array;
        // }

    }
?>