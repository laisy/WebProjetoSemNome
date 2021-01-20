<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Farmacia extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cnpj',
    ];

    public static $regras_validacao_criar = [
        'cnpj' => 'required|numeric|unique:farmacias,cnpj',
    ];

    public function user() {
        return $this->belongsTo('\App\Models\User', 'id', 'user_id');
    }

    public function pedido(){
      return $this->hasMany('\App\Models\Pedido')
    }
}
