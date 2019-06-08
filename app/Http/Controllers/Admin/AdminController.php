<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Validator;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function index()
    {

        return view('admin.index');
    }

    public function upload(){

        return view('admin.upload');
    }

    public function uploadStore(Request $request){

        $messages = [
            "bookname.required" => "Имя книги обязательно для ввода",
            "bookname.unique" => "Книга с таким именем уже существует",
            "fileauthor.required" => "Введите автора книги",
            "downloadcat.required" => "Поле категории не заполнено",
            "class.required" => "Выберите для кого предназначена данная книга!",
            "level.required" => "Выберите уровень доступа книги!",
            "level.integer" => "Не стоит редактировать код, обновите страницу и повторите!",
            "about.required" => "Напишите малое описание для книги!",
            "about.min" => "Поле описания должно содержать более 10 символов!",
            "fileimage.image" => "Некорректно выбран файл для изображения, повторите",
            "filename.required" => "Пожалуйста выберите файл книги!",
            "filename.mimes" => "Данный формат книги не поддерживается!",
        ];

        $validator = Validator::make($request->all(),[
            'bookname' => 'required|unique:books,name',
            'fileauthor' => 'required',
            'downloadcat' => 'required',
            'class' => 'required',
            'level' => 'required|integer|min:1|max:2',
            'about' => 'required|min:10',
            'fileimage' => 'image',
            'filename' => 'required|mimes:pdf,txt,doc,docx',
        ],$messages)->validate();

        $category = Category::firstOrCreate(array('name'=>$request->downloadcat));
        $categoryId = $category->id;

        $book = new Book();

        if($request->file('fileimage')){
            $fileimage = $request->file('fileimage');
            $fileImageName = md5(microtime() . rand(0, 9999)).".".$fileimage->getClientOriginalExtension();
            $destinationImagePath = public_path() . '/img/Books';
            $fileimage->move($destinationImagePath, $fileImageName);

            $book->image = $fileImageName;
        }

        $filename = $request->file('filename');
        $fileSendName = md5(microtime() . rand(0, 9999)).".".$filename->getClientOriginalExtension();
        $destinationFilePath = public_path() . '/files';
        $filename->move($destinationFilePath, $fileSendName);

        $book->name = $request->bookname;
        $book->author = $request->fileauthor;
        $book->category_id = $categoryId;
        $book->class = $request->class;
        $book->about = $request->about;
        $book->book_access = $request->level;
        $book->file = $fileSendName;

        if($book->save()){
            Session::flash('message', 'Книга была успешно загружена');
            Session::flash('msg_type', 'success');
        }else{
            Session::flash('message', 'Произошла ошибка, повторите еще раз!');
            Session::flash('msg_type', 'error');
        }

        return Redirect::to('/upload');
    }
}
