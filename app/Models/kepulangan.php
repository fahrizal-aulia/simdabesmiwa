<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kepulangan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'kepulangan';

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function keberangkatan()
    {
        return $this->belongsTo(Keberangkatan::class, 'id_keberangkatan');
    }
}
