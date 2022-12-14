<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Schema;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{

    protected $guarded = [];

    use HasApiTokens, HasFactory, Notifiable;

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $table = "usuario";
    protected $primaryKey = "idUsuario";

    public static function encontrarPorUsername($username){
        $usuario = self::where('usuario.usuario', '=', $username)->join('rol','usuario.idRol','=','usuario.idRol')->
        join('estado_usuario','usuario.idEstado','=','estado_usuario.idEstado')->get();
        return ($usuario->isEmpty()) ? null : $usuario[0];
    }
    public static function encontrarUsername($id){
        return self::find($id);
    }

    /**
     * @return int
     */
    public function getIdUsuario(): int
    {
        return $this->idUsuario;
    }

    /**
     * @param int $idUsuario
     */
    public function setIdUsuario(int $idUsuario): void
    {
        $this->idUsuario = $idUsuario;
    }



    /**
     * @return string
     */
    public function getUsuario(): string
    {
        return $this->usuario;
    }

    /**
     * @param string $usuario
     */
    public function setUsuario(string $usuario): void
    {
        $this->usuario = $usuario;
    }

    public static function getColumns() : array
    {
        global $table;
        return Schema::getColumnListing("usuario");
    }

    public static function esMod($id){
        return self::find($id)->idRol == 2;
    }

    public static function esAdmin($id){
        return self::find($id)->idRol == 3;
    }


}
