<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use App\Notifications\CustomResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];
    protected $table = 'users';

    // protected $fillable = [
    //     'nik', 'id_kota', 'id_kecamatan', 'jenis_kelamin', 'pekerjaan',
    //     'status_perkawinan', 'pendapatan_perbulan', 'nama', 'nomer_telfon',
    //     'tanggal_lahir', 'pendidikan_terakhir', 'alamat_lengkap',
    //     'tanggungan', 'status_approve', 'password', 'role'
    // ];

    // protected $table = 'buku';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function kecamatan(){

        return $this->belongsTo(kecamatan::class,'id_kecamatan');
    }
    public function kota(){

        return $this->belongsTo(kota::class,'id_kota');
    }
    public function keberangkatans()
{
    return $this->hasMany(Keberangkatan::class, 'id_user');
}
    public function kepulangan(){

        return $this->hasMany(kepulangan::class,'id_kepulangan');
    }
    public function getRouteKeyName()
    {
        return 'id';
    }
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPassword($token, $this));
    }
}
