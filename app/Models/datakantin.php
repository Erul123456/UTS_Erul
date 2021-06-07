<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datakantin extends Model
{
    use HasFactory;
    protected $fillable = [
        'namakantin', 'alamat', 'kontak'
   ];
}
