<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Str;

use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        
        return view('admin.books.index', [
            'books' => $books,
        ]);
    }
    
    public function create()
    {
        $book = new Book();
        $categories = Category::all();
        
        return view('admin.books.create', [
            'book' => $book,
            'categories' => $categories,
        ]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|min:2|max:255',
            'author'        => 'required|min:2|max:255',
            'category_id'   => 'required|max:10',
            'date'          => 'required|date',
            'class'         => 'required|max:255',
            'image'         => 'max:255',
            'about'         => 'required|max:65535',
            'file'          => 'required|max:255',
            'book_access'   => 'required|max:255',
        ]);
        
        $book = new Book();
        
        $book->name = $request->name;
        $book->author = $request->author;
        $book->category_id = $request->category_id;
        $book->date = $request->date;
        $book->class = $request->class;
        $book->image = $request->image;
        $book->about = $request->about;
        $book->file = $request->file;
        $book->book_access = $request->book_access;
        
        $book->save();
        
        return redirect()->route('admin.book.index');
    }
    
    public function edit($id)
    {
        $book = Book::find($id);
        $categories = Category::all();
        
        return view('admin.books.edit', [
            'categories' => $categories,
            'book' => $book,
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'          => 'required|min:2|max:255',
            'author'        => 'required|min:2|max:255',
            'category_id'   => 'required|max:10',
            'date'          => 'required|date',
            'class'         => 'required|max:255',
            'image'         => 'max:255',
            'about'         => 'required|max:65535',
            'file'          => 'required|max:255',
            'book_access'   => 'required|max:255',
        ]);
        
        $book = Book::find($id);
        
        $book->name = $request->name;
        $book->author = $request->author;
        $book->category_id = $request->category_id;
        $book->date = $request->date;
        $book->class = $request->class;
        $book->image = $request->image;
        $book->about = $request->about;
        $book->file = $request->file;
        $book->book_access = $request->book_access;
        
        $book->save();
        
        return redirect()->route('admin.book.index');
    }
    
    public function destroy($id)
    {
        
    }
}

