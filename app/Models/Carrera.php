<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;
    protected $table = "ccarreras";
    protected $primaryKey = "idCarrera";
    public $timestamps = false;
}