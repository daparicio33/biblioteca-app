<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookView;
use App\Models\Carrera;
use App\Models\Categorie;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
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
        //aca registramos la visitas.
        try {
            //code...
            /* $view = new BookView();
            $view->user_id = auth()->id();
            $view->book_id = $book->id;
            $view->date = Carbon::now();
            $view->save(); */
            $view = BookView::updateOrInsert([
                'book_id'=>$book->id,
                'user_id'=>auth()->id()
            ],[
                'book_id'=>$book->id,
                'user_id'=>auth()->id(),
                'date'=>Carbon::now(),
                'time'=>Carbon::now()->format('H:i:s')
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
            return view('books.show',compact('book','books'));
        }
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
        $views = BookView::where('user_id','=',auth()->id())->orderBy('date','desc')->orderBy('time','desc')->get();
        return view('panel.index',compact('views'));
    }
    public function categorias(){
        $categories = Categorie::orderBy('name','asc')->get();
        return view('categorias.index',compact('categories'));
    }
    public function show_book_categorias($id){
        $categorie = Categorie::findOrFail($id);
        $books = Book::whereHas('categories',function($query) use($id){
            $query->where('categorie_id','=',$id);
        })->get();
        return view('categorias.show',compact('books','categorie'));
    }
}
