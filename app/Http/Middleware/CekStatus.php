<?php
namespace App\Http\Middleware;
use Closure;
use App\Helper\VerifikasiToken;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CekStatus
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
        $helper = new VerifikasiToken();
        $token = $request->header('Authorization');
        $cek = $helper->verify_token($token);
        if($cek['status'] == false){
                $response = array(
			'status' => false,
			'message' => "Gagal",
			'content' => array()	
			);
                return response()->json($response, 401);    
        }
        return $response;
    }
}