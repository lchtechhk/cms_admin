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
            $owner = JWTAuth::parseToken()->touser();
            if($owner)return ['success' => true, 'msg' => $owner];
            throw new Exception("User is not existing");
        } catch (Exception $e) {
            Log::error('[Api Auth Error] - getOwner : ' . $e->getMessage());
            return ['success' => false, 'msg' => $e->getMessage()];
        }
    }
}

?>