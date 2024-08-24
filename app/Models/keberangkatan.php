<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keberangkatan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'keberangkatan';

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function kepulangan()
    {
        return $this->hasMany(kepulangan::class, 'id_keberangkatan');
    }
}
