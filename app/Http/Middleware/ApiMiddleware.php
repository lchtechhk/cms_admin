<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
use Log;
use App\Http\Controllers\App\Service\AuthService;

class ApiMiddleware{
    private $AuthService;

    function __construct(){
        $this->AuthService = new AuthService();
        Log::info('AuthService : ');  
	}
    public function handle($request, Closure $next){
        try{
            $own = $this->AuthService->getOwner();
            Log::info('own : ' . $own);  

            if($own){
                return response()->json(['success' => true, 'own' => $own]);
            }  
        }catch (Exception $e) {
            Log::error('error : ' . $e->getMessage());
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
             
        return $next($request);
    }
}  