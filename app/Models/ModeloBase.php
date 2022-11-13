<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

abstract class ModeloBase extends Model
{
    public function getTable(): string
    {
        return strtolower(class_basename($this));
    }
    public function getKeyName(): string
    {
        return "id".class_basename($this);
    }

    public static function getColumns() : array
    {
        $reflect = new \ReflectionClass(static::class);
        return Schema::getColumnListing(strtolower($reflect->getShortName()));
    }
}
