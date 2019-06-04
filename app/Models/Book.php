<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    protected $table = 'books';

    protected $fillable = [
        'name', 'author', 'category_id', 'date', 'class', 'image', 'about', 'file', 'book_access'
    ];

}