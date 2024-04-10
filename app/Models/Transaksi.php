<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable=[
        'outlet',
        'jenis_pembelian',
        'akun',
        'user',
        'debit',
        'kredit'
    ];
}
