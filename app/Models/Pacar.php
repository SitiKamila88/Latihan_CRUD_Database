<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacar extends Model
{
    use HasFactory;

    protected $table = 'pacar'; // pastikan sesuai nama tabelmu

    protected $fillable = [
        'nama_pacar',
        'asal',
        'foto',
    ];
}

