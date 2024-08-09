<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kecamatan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'kecamatan';

    public function kota(){

        return $this->belongsTo(kota::class,'id_kota');
    }
    public function users(){

        return $this->belongsTo(User::class);
    }
}
