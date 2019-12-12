<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
use Log;
use App\Http\Controllers\App\Service\AuthService;
use Exception;

class ApiMiddleware{
    private $AuthService;

    function __construct(){
        $this->AuthService = new AuthService();
	}
    public function handle($request, Closure $next){
        try{
            $own = $this->AuthService->getOwner();
            if(!$own['success'])throw new Exception($own['msg']);
        }catch (Exception $e) {
            Log::error('[Error - ApiMiddleware] : ' . $e->getMessage());
            return response()->json(['success' => false, 'msg' => $e->getMessage()], 500);
        }
             
        return $next($request);
    }
}  