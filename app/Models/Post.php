<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends ModeloBase
{
    protected $table = "post";
    protected $primaryKey = "idPost";

    use HasFactory;
}
