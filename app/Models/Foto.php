<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_foto';
    protected $guarded = ['id_foto'];

    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
    public function album(){
        return $this->belongsTo(Album::class, 'id_album', 'id_album');
    }
}
