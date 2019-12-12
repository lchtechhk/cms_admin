<?php

namespace App\Http\Controllers\App\Controller;

use Illuminate\Http\Request;
use App\User;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Validator, DB, Hash, Mail, Illuminate\Support\Facades\Password;
use Illuminate\Routing\Controller;
use Log;
use App\Http\Controllers\App\Service\AuthService;

class AuthController extends Controller
{
    private $AuthService;

    function __construct(){
        $this->AuthService = new AuthService();    }
    
    public function test(){
        return "1233";
    }

    public function register(Request $request){
        $credentials = $request->only('username', 'email', 'password');
        $rules = [
            'username' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',  
            'password' => 'required|min:6',
        ];
        $validator = Validator::make($credentials, $rules);
        if($validator->fails()) {
            return response()->json(['success'=> false, 'error'=> $validator->messages()]);
        }
        $username = $request->username;
        $email = $request->email;
        $password = $request->password;
        // User::create(['username' => $username, 'email' => $email, 'password' => Hash::make($password)]);
        // return $this->login($request);
    }

    public function login(Request $request){
        $credentials = $request->only('email', 'password');
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];
        $validator = Validator::make($credentials, $rules);
        if($validator->fails()) {
            return response()->json(['success'=> false, 'error'=> $validator->messages()]);
        }
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['success' => false, 'error' => 'We cant find an account with this credentials.'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['success' => false, 'error' => 'Failed to login, please try again.'], 500);
        }
        return response()->json(['success' => true, 'data'=> [ 'token' => $token ]]);
    }

    public function logout(Request $request) {
        $credentials = $request->only('token');
        $validator = Validator::make($credentials, ['token' => 'required']);
        try {
            JWTAuth::parseToken()->invalidate();
            return response()->json(['success' => true, 'message'=> "You have successfully logged out."]);
        } catch (JWTException $e) {
            Log::error('error : ' . $e->getMessage());
            return response()->json(['success' => false, 'error' => 'Failed to logout, please try again.'], 500);
        }
    }

    protected function respondWithToken(Request $request){
        $token = $request->input('token');
        Log::error('token : ' . $token);

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::factory()->getTTL() * 60
        ]);
    }

    public function me(){
        return $this->AuthService->getOwner()['msg'];
    }

    public function authenticate(){
        return $owner = JWTAuth::parseToken()->authenticate()->default_company_id;
    }
}
