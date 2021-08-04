<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Transaksi;
use App\Models\User;
use Form;
use DataTables;
use Session;
use Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class TransaksiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function rules($request){
        $rulesku=array(
            'nominal' => 'required',
            'id_kategori' => 'required',
            'deskripsi' => 'required',
           );
        $pesan = [
            'required'    => ':attribute tidak boleh kosong.',
        ];
        foreach ($rulesku as $key => $value) {
            $atribut[$key]=ucwords(str_replace('_',' ',$key));
        };
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
    public function index()
    {
        return view('transaksi.index');
    }
    public function store(Request $request)
    {
        $validator=$this->rules($request);
        if ($validator['status']){
            $karyawan = Transaksi::create([
                    'nominal'=>$request->nominal,
                    'id_kategori'=>$request->id_kategori,
                    'deskripsi'=>$request->deskripsi,
                    'id_user'=> Auth::user()->id,
                    ]);
           }
        return response()->json($validator);
    }
     public function getDtRowData(Request $request){ 
        $awal  = date('Y-m-d 00:00:00',strtotime($request->absen_dari));
        $akhir = date('Y-m-d 23:59:59',strtotime($request->absen_sampai));
        $karyawan = Transaksi::with(['kategori'])
                ->whereBetween('created_at', [$awal, $akhir])
                ->where(array('id_user'=>Auth::user()->id))
                ->orderBy('created_at','DESC')
                ->get();
        return Datatables::of($karyawan)
            ->addColumn('action', function ($data) {
                $btnEdit = '<button type="button" class="btn btn-sm btn-icon btn-primary update-data" value="' . $data->id_kategori. '"><i class="fa fa-edit"></i></button>';
                $btnDelete = '<button type="button" class="btn btn-danger btn-sm btn-icon delete-data" value="' . $data->id_kategori . '">'
                . '<i class="fa fa-trash"></i>'
                . '</button>';  
                return '<div class="btn-group btn-group" role="group">'.$btnEdit . ' ' . $btnDelete.'</div>';
            })
            ->editColumn('id_kategori', function($row) {
                return $row->id_kategori;
            })
            ->editColumn('id_kategori', '{{$id_kategori}}')
            ->editColumn('created_at', '{{ date("Y-m-d H:i:s",strtotime($created_at))}}')
            ->editColumn('updated_at', '{{ Carbon\Carbon::parse($updated_at)->diffForHumans() }}')
            ->setRowId('id_kategori')
            ->make(true);
    }

    public function getDropdown(Request $request){
        $search = $request->search;
        $karyawan = Kategori::where(array('id_user'=>Auth::user()->id))->where(function($query) use ($search)
                {
                        if($search!=''){
                            $query->where('nama', 'like', '%' .$search . '%');
                            }
                })->get();
        $response = array();
        foreach($karyawan as $data){
            $response[] = array(
                "id"=>$data->id_kategori,
                "text"=>$data->nama.' ('.$karyawan->kategori.")"
            );
        }
        return response()->json($response);
    }
    public function update(Request $request, $id)
    {
        $cek= Kategori::where('kategori.id_kategori',$id)->exists();
        if (!$cek) {
            return abort(404);
        }
        $validator=$this->rules($request);
        if ($validator['status']){
            $kategori = Kategori::where(array('id_kategori'=>$id))->first();
            $kategori->nama = $request->nama;
            $kategori->deskripsi = $request->deskripsi;
            $kategori->kategori = $request->kategori;
            $kategori->save();
        }
        return response()->json($validator);
    }

    public function destroy($id)
    {
         $cek= Kategori::where('kategori.id_kategori',$id)->exists();
        if (!$cek) {
            return abort(404);
        }
        $kategori = Kategori::find($id)->delete();
        return response()->json($jabatan);
    }
}
