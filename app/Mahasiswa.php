<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $primaryKey ='nim';
    protected $table = 'mahasiswa';

    protected $fillable = [
        'nim',
        'nama',
        'gender',
        'prodi',
        'minat'
    ];
}
