<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

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

    public function search(Request $request, Book $books){

        $searchQuery = $request->get('search_list');

        $searchResult = $books->select('books.*','categories.name as categoryName')
                      ->join('categories', 'books.category_id', '=', 'categories.id')
                      ->where('books.name','LIKE', "%".$searchQuery."%")
                      ->orWhere('author','LIKE', "%".$searchQuery."%")
                      ->orWhere('categories.name','LIKE', "%".$searchQuery."%")
                      ->get();

        return view('user.search',[
            'searchResult'=> $searchResult,
        ]);
    }
}
