<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notification\MahasiswaResetNotification;

class Mahasiswa extends Authenticatable
{
    use Notifiable;
    protected $guard = 'mahasiswa';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','nim', 'email', 'password','dosen_wali',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MahasiswaResetPasswordNotification($token));
    }
}
