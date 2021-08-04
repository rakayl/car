<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Transaksi extends Model
{
    use SoftDeletes;

    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $fillable = [
        'id_kategori',
        'id_user',
        'nominal',
        'deskripsi',
        'created_at',
        'updated_at',
        'deleted_at'
        ];
      public function user() {
        return $this->belongsTo('App\Models\User', 'id_user');
    }
      public function kategori() {
        return $this->belongsTo('App\Models\Kategori', 'id_kategori');
    }
}
