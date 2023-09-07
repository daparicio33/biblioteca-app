<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function authors(){
        return $this->belongsToMany(Author::class,'book_authors');
    }
    public function tags(){
        return $this->belongsToMany(Tag::class,'book_tags');
    }
    public function categories(){
        return $this->belongsToMany(Categorie::class,'book_categories');
    }
    public function programas(){
        return $this->belongsToMany(Carrera::class,'book_programas','book_id','carrera_id');
    }
}
