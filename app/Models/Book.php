<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    protected $table = 'books';

    public $timestamps = true;

    protected $fillable = [
        'name', 'author', 'category_id', 'class', 'image', 'about', 'file', 'book_access'
    ];

}