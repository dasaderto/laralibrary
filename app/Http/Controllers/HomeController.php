<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Book;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $books = Book::offset(0)->limit(3)->get();

        return view('index',[
            'books'=>$books,
        ]);
    }

    public function search($search, Book $book){

        $books = $book->join('categories', 'books.category_id', '=', 'categories.id')
                      ->where('books.name','LIKE', "%".$search."%")
                      ->orWhere('author','LIKE', "%".$search."%")
                      ->orWhere('categories.name','LIKE', "%".$search."%")
                      ->get();

        return $books;
    }
}
