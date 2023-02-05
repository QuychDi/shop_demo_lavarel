<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class danhmuc extends Model
{
    public $timestamps = false;
    protected $fillable = ['tensp', 'mota_sp', 'status'];

    protected $primaryKey = 'id_prod';
    protected $table = 'tbl_product';

    // public function SanPham(){
    //     return $this->hasMany('')
    // }
}
