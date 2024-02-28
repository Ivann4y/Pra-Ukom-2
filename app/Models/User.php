<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as Ivann;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    use HasFactory, Ivann;
    protected $primaryKey = 'id_user';
    protected $guarded = ['id_user'];
    public $timestamps = false;

    public function album(){
        return $this->hasMany(Album::class, 'id_user', 'id_user');
    }

    public function foto(){
        return $this->hasMany(Foto::class, 'id_user', 'id_user');
    }

    public function like(){
        return $this->hasMany(Like::class, 'id_user', 'id_user');
    }

    public function komentar(){
        return $this->hasMany(Komentar::class, 'id_user', 'id_user');
    }
}
