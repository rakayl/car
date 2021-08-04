<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Kategori extends Model
{
    use SoftDeletes;

    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';
    protected $fillable = [
        'nama',
        'kategori',
        'id_user',
        'deskripsi',
        'created_at',
        'updated_at',
        'deleted_at'
        ];
      public function user() {
        return $this->belongsTo('App\Models\User', 'id_user');
    }
}
