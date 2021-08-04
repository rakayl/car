<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Form;
use DataTables;
use Session;
use Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Datetime;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){   
        return view('home.home');
    }
    public function home()
    {
         return redirect('home');
    }
    public function data(Request $request) {
         $default_mulai = date('Y-m-01');
         $default_akhir = date('Y-m-t');
          if($request->absen_dari != ""){
              $default_mulai = $request->absen_dari;
          }
          if($request->absen_sampai != ""){
              $default_akhir = $request->absen_sampai;
          }
          $total = 0;
          $total_range = 0; 
          $pemasukan = 0;
          $pengeluaran = 0;
          $all = Transaksi::with(['kategori'])->where(array('id_user'=>Auth::user()->id))->orderby('created_at','desc')->get();
          foreach ($all as $value) {
              if($value['kategori']['kategori']=="Pemasukan"){
                  $total += $value['nominal'];
              }else{
                   $total -= $value['nominal'];
              }
          }
          $awal  = date('Y-m-d 00:00:00',strtotime($default_mulai));
          $akhir = date('Y-m-d 23:59:59',strtotime($default_akhir));
          $transaksi = Transaksi::with(['kategori'])->whereBetween('created_at', [$awal, $akhir])->where(array('id_user'=>Auth::user()->id))->orderby('created_at','desc')->get();
          foreach ($transaksi as $value) {
                if($value['kategori']['kategori']=="Pemasukan"){
                  $total_range += $value['nominal'];
                  $pemasukan += $value['nominal'];
              }else{
                   $total_range -= $value['nominal'];
                    $pengeluaran += $value['nominal'];
              }
          }
          $response = array(
              'total'=>"Rp " . number_format($total,2,',','.'),
              'total_range'=>"Rp " . number_format($total_range,2,',','.'),
              'pemasukan'=>"Rp " . number_format($pemasukan,2,',','.'),
              'pengeluaran'=>"Rp " . number_format($pengeluaran,2,',','.'),
          );
          return $response;
    }
}
