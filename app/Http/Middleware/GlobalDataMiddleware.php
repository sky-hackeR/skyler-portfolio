<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use App\Models\SiteInfo as Setting;
use App\Models\Social;

use Log;

class GlobalDataMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        // Add your data to the request object.
        $setting = Setting::first();
        $socials = Social::all();

        $data = new \stdClass();
        $data->setting = $setting;
        $data->socials = $socials;

        $request->merge([
            'global_data' => $data,
        ]);

        return $next($request);
    }
}
