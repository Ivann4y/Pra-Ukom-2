<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_komentar';
    protected $guarded = ['id_komentar'];

    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

}
