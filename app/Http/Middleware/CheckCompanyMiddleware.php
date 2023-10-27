<?php

namespace App\Http\Middleware;

use App\Models\admin\Agent;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckCompanyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $companyName = $request->route('company_name'); // Assuming the parameter is named 'company_name'
        info('Subdomain: ' . $companyName);
        // Check if the company exists in the database
        if ($companyName) {
            $company = Agent::where('slug_en', $companyName)->first();

            if (!$company) {
                // Company not found, you can customize the response or redirect as needed
                return abort(405, 'Company not found');
            }
        }

        // The company exists, proceed with the request
        return $next($request);
    }
}
