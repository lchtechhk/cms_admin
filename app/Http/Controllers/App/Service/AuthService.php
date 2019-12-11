<?php
namespace App\Http\Controllers\App\Service;
use Log;
use DB;
use Lang;
use Exception;
use JWTAuth;



class AuthService {

    function __construct(){
    }


    public function getOwner(){
        try {    
            return response()->json(JWTAuth::parseToken()->touser());
        } catch (Exception $e) {
            Log::error('error : ' . $e->getMessage());
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }
}

?>