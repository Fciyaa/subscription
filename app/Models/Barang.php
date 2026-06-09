<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    // Beritahu Laravel nama tabelnya adalah 'barang' (bukan barangs)
    protected $table = 'barang';

    // Izinkan semua kolom diisi
    protected $guarded = [];
}