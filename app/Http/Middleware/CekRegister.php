<?php
namespace App\Http\Middleware;
use Closure;
use App\Helper\VerifikasiToken;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
class CekRegister
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        $user = User::orderby('created_at','desc')->first();
        if(!$user){
        return $response;
        }
        return redirect()->route('login');
    }
}