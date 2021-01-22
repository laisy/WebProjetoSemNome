<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
  use HasFactory;
  public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cpf',
    ];

    public function user() {
        return $this->belongsTo('\App\Models\User', 'id', 'user_id');
    }

    public function pedido(){
      return $this->hasMany('\App\Models\Pedido');
    }

    public static $regras_validacao_criar = [
        'cpf' => 'required|max:11|min:11|unique:clientes,cpf',
    ];
}
