<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Carrera;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $books = Book::paginate(4);
        return view('index',compact('books'));
    }
    public function show_book($id){
        $book = Book::findOrFail($id);
        $books = Book::take(4)->get();
        return view('books.show',compact('book','books'));
    }
    public function show_book_programas($id){
        $books = Book::whereHas('programas',function($query) use($id){
            $query->where('idCarrera','=',$id);
        })->get();
        $programa = Carrera::findOrFail($id);
        return view('programas.show_books',compact('books','programa'));
    }
    public function programas(){
        $programas = Carrera::whereNotNull('ccarrera_id')->orderBy('nombreCarrera','asc')->get();
        return view('programas.index',compact('programas'));
    }
    public function search_book(Request $request){
        $request->validate([
            'search'=>'required',
        ]);
        $books = Book::where('title','like','%'.$request->search.'%')->orWhere('content','like','%'.$request->search.'%')->get();
        return view('books.search',compact('books'));
    }
    public function index_panel(){
        return view('panel.index');
    }
}
