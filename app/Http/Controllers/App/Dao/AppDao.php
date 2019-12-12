<?php
    namespace App\Http\Controllers\App\Dao;
    use DB;
    use Log;
    use JWTAuth;
    use App\Http\Controllers\Repository\BaseRepository;

    abstract class AppDao extends BaseRepository{
        protected $table;
        protected $companyAuth = false;


        public function findAll(){
            $result = DB::table($this->getTable());
            if($this->companyAuth) $result = $result->where('company_id',JWTAuth::parseToken()->authenticate()->default_company_id);
            $result = $result->get();
            Log::info('[AppDao] -- ' .'['.$this->getTable().'] -- findAll : ' . json_encode($result));
            return $result;
        }
        public function findByArray($columns_values){
            $result = DB::table($this->getTable());
            if($this->companyAuth) $result = $result->where('company_id',JWTAuth::parseToken()->authenticate()->default_company_id);
            foreach($columns_values as $key =>$value){
                $result = $result->where($key,$value);
            }
            $result = $result->get();
            Log::info('[AppDao] -- ' .'['.$this->getTable().'] -- findByArray : ' . json_encode($result));
            return $result;
        }
        public function findByColumn_Value($field,$id){
            $result = DB::table($this->getTable())->where($field, $id);
            if($this->companyAuth)$result = $result->where('company_id',JWTAuth::parseToken()->authenticate()->default_company_id);
            $result = $result->get();
            Log::info('[AppDao] -- ' .'['.$this->getTable().'] -- findByColumn_Value : ' . json_encode($result));
            return $result;
        }
        public function findById($id){
            $result = DB::table($this->getTable())->where('id', $id);
            if($this->companyAuth)$result = $result->where('company_id',JWTAuth::parseToken()->authenticate()->default_company_id);
            $result = $result->get();
            Log::info('[AppDao] -- ' .'['.$this->getTable().'] -- findById : ' . json_encode($result));
            return $result;
        }
        public function findByColumn_Values($column,$values){
            $result = DB::table($this->getTable())->whereIn($column, $values);
            if($this->companyAuth)$result = $result->where('company_id',JWTAuth::parseToken()->authenticate()->default_company_id);
            $result = $result->get();
            Log::info('[AppDao] -- ' .'['.$this->getTable().'] -- findByColumn_Values : ' . json_encode($result));
            return $result;
        }
        // With Language
        public function findAllWithLanguage(){
            $result = DB::table($this->getTable())->where('language_id',session('language_id'));
            if($this->companyAuth)$result = $result->where('company_id',JWTAuth::parseToken()->authenticate()->default_company_id);
            $result = $result->get();
            Log::info('[AppDao] -- ' .'['.$this->getTable().'] -- findAllWithLanguage : ' . json_encode($result));
            return $result;
        }
        public function findByColumn_ValueWithLanguage($field,$id){
            $result = DB::table($this->getTable())->where('language_id',session('language_id'))->where($field, $id);
            if($this->companyAuth)$result = $result->where('company_id',JWTAuth::parseToken()->authenticate()->default_company_id);
            $result = $result->get();
            Log::info('[AppDao] -- ' .'['.$this->getTable().'] -- findByColumn_ValueWithLanguage : ' . json_encode($result));
            return $result;
        }
        public function findByColumn_ValuesWithLanguage($column,$values){
            $result = DB::table($this->getTable())->where('language_id',session('language_id'))->whereIn($column, $values);
            if($this->companyAuth)$result = $result->where('company_id',JWTAuth::parseToken()->authenticate()->default_company_id);
            $result = $result->get();
            Log::info('[AppDao] -- ' .'['.$this->getTable().'] -- findByColumn_ValuesWithLanguage : ' . json_encode($result));
            return $result;
        }

        public function findByColumn_Values_Return_Array($column,$target_column,$id){
            $result = DB::table($this->getTable())->where($column, $id);
            if($this->companyAuth)$result = $result->where('company_id',JWTAuth::parseToken()->authenticate()->default_company_id);
            $result = $result->get();
            $id_array = array();
            foreach($result as $row){
                $id = $row->$target_column;
                $id_array[] = $id;
            }
            Log::info('[AppDao] -- ' .'['.$this->getTable().'] -- findByColumn_Values_Return_Array : ' . json_encode($id_array));
            return $id_array;
        }
        
    }
?>