<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use Session;
use Config;
use Log;
use App\Http\Controllers\Admin\Service\View_CompanyService;
use App\Http\Controllers\Admin\Service\UserToCompanyService;

class CompanyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    private $View_CompanyService;
    private $UserToCompanyService;
    function __construct(){
        $this->View_CompanyService = new View_CompanyService();
        $this->UserToCompanyService = new UserToCompanyService();
	}
    public function handle($request, Closure $next)
    {
        $user_auth = auth()->guard('admin')->user();
        Log::info('CompanyMiddleware : ' . json_encode($user_auth));        
        $default_company_id = $user_auth->default_company_id;
        $request->session()->put('default_company_id', $default_company_id);

        $own_companies = $this->View_CompanyService->getCompanyBelongOwn();
        if(\sizeof($own_companies) > 0){
            $request->session()->put('owner_companies', $own_companies);
        }else {
            // go to register company
            return redirect('/admin/view_registerCompany');
        }
        return $next($request);
    }
}
