<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Schema;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property bool $activo
 */
class Usuario extends Authenticatable
{
    use SoftDeletes;

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

    public static function encontrarPorUsername($username)
    {
        $usuario = self::where('usuario.usuario', '=', $username)->join('rol', 'rol.idRol', '=', 'usuario.idRol')->
        join('estado_usuario', 'estado_usuario.idEstado', '=', 'usuario.idEstado')->get();
//        dd($usuario);
        return ($usuario->isEmpty()) ? null : $usuario[0];
    }

    public static function encontrarUsername($id)
    {
        return self::find($id);
    }

    public static function obtenerUsuario($id)
    {
        $usuario = self::where('usuario.idUsuario', '=', $id)->join('rol', 'rol.idRol', '=', 'usuario.idRol')->
        join('estado_usuario', 'estado_usuario.idEstado', '=', 'usuario.idEstado')->
        select('usuario.idUsuario', 'usuario.usuario', 'usuario.idEstado', 'usuario.idRol')->first();
        return $usuario;
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

    public static function getColumns(): array
    {
        global $table;
        return Schema::getColumnListing("usuario");
    }

    public static function esMod($id)
    {
        return self::find($id)->idRol == 2;
    }

    public static function esAdmin($id)
    {
        return self::find($id)->idRol == 3;
    }

    public static function bajaLogica($username)
    {
        $usuario = self::encontrarPorUsername($username);
        $usuario->runSoftDelete();
        $usuario->activo = false;
        $usuario->save();
    }

    public static function altaLogica(int $id)
    {
        $usuario = self::obtenerUsuario($id);
        $usuario->restore();
        $usuario->activo = true;
        $usuario->save();
    }
}
