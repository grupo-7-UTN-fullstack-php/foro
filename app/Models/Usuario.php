<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Usuario extends ModeloBase
{
    public static function getColumns() : array
    {
        $reflect = new \ReflectionClass(get_called_class());
        return Schema::getColumnListing(strtolower($reflect->getShortName()));
    }
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];
    //protected $table = 'usuario';
    //protected $primaryKey = 'idUsuario';

}
