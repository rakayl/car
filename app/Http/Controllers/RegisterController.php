<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Form;
use DataTables;
use Session;
use Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Datetime;
class RegisterController extends Controller
{


    public function index(){    
       return view('auth.register'); 
    }
    public function rules($request){
        $rulesku=array(
           'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|max:16|cek',
        );
        $pesan = [
            'required' => ':attribute tidak boleh kosong.',
            'max'=> ':attribute maksimal :max karakter',
            'min'=> ':attribute minimal :min karakter',
            'cek'=> 'Password Confirmasi tidak sama dengan password',
          
        ];
        
        foreach ($rulesku as $key => $value) {
            $atribut[$key]=str_replace('id_','',$key);
            $atribut[$key]=ucwords(str_replace('_',' ',$atribut[$key]));
        };
            Validator::extend('cek', function($attribute, $value, $parameters, $validator) {
                $request = $validator->getData();
                if($request['password']!=$request['password-confirm']){
                    return false;
                }
                    return true;
                
            });
           

        $validator = Validator::make($request->all(),$rulesku ,$pesan);
        $validator->setAttributeNames($atribut); 
        if ($validator->passes()) {
            $data['status']=1;
            $data['pesan']='Data berhasil disimpan.';
        }else{
            $data['status']=0;
            $data['pesan']=$validator->errors()->all();
        }
        return $data;
    }
    public function data(Request $request)
    {
          $validator=$this->rules($request);
           if ($validator['status']){
           $data = User::create([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'password'=>Hash::make($request->password),
                    ]
                   );
           $validator['url'] = route('login');
        }
        return response()->json($validator);
    }
    
}
