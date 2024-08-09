<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kota extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'kota';

    public function kecamatan(){

        return $this->hasMany(kecamatan::class,'id_kecamatan');
    }
    public function users(){

        return $this->belongsTo(User::class);
    }
}
