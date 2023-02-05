<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;

    protected $table_sanpham = 'tbl_admin';

    protected $fillable = [
        'admin_email',
        'admin_name',	
    ];

}
