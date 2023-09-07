<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\BookAuthor;
use App\Models\BookCategorie;
use App\Models\BookPrograma;
use App\Models\BookPublisher;
use App\Models\BookTag;
use App\Models\Carrera;
use App\Models\Categorie;
use App\Models\Publisher;
use App\Models\Tag;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        $books = Book::orderBy('id','desc')->get();
        return view('dashboard.books.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $publishers = Publisher::orderBy('name','asc')->get();
        $authors = Author::orderBy('name','asc')->get();
        $categories = Categorie::orderBy('name','asc')->get();
        $tags = Tag::orderBy('name','asc')->get();
        $programas = Carrera::whereNotNull('ccarrera_id')->orderBy('nombreCarrera','asc')->get();
        return view('dashboard.books.crear',compact('authors','publishers','categories','tags','programas'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request);
        //ahora vamos a guardar
        //dd($request);
        try {
            //code...
            DB::beginTransaction();
            //revizamos si hay archivo de imagenes
            //portada -> cover
            
            //guardamos el archivo
            if($request->hasFile('pdf') && $request->file('pdf')->isValid()){
                $carpetaGuardado = 'pdfs';
                // Obtenemos el archivo PDF
                $pdfFile = $request->file('pdf');
                // Generamos un nombre único para el archivo
                $nombreArchivo = uniqid() . '.' . $pdfFile->getClientOriginalExtension();
                // Almacenamos el archivo en la carpeta especificada utilizando Storage::put()
                Storage::disk('public')->put($carpetaGuardado . '/' . $nombreArchivo, file_get_contents($pdfFile));
            //primero agregamos los datos del libro
            $book = new Book;
            $book->title=$request->title;
            $book->publisher_date=$request->publisher_date;
            $book->pages=$request->pages;
            $book->language=$request->language;
            $book->content_short=$request->content_short;
            $book->content=$request->content;
            //COVER
            if($request->hasFile('cover_file') && $request->file('cover_file')->isValid()){
                $carpeta_covers = 'covers';
                $img_covers = $request->file('cover_file');
                $nombre_covers = uniqid(). '.' . $img_covers->getClientOriginalExtension();
                Storage::disk('public')->put($carpeta_covers . '/' . $nombre_covers, file_get_contents($img_covers));
                $book->cover=$carpeta_covers . '/' . $nombre_covers;
            }else{
                $book->cover=$request->cover;
            }
            //IAMGEN PEQUEÑA
            if($request->hasFile('thumbnail_file') && $request->file('thumbnail_file')->isValid()){
                $carpeta_thumbnails = 'thumbnails';
                $img_thumbnails = $request->file('thumbnail_file');
                $nombre_thumbnails = uniqid(). '.' . $img_thumbnails->getClientOriginalExtension();
                Storage::disk('public')->put($carpeta_thumbnails . '/' . $nombre_thumbnails, file_get_contents($img_thumbnails));
                $book->thumbnail=$carpeta_thumbnails . '/' . $nombre_thumbnails;
            }else{
                $book->thumbnail=$request->thumbnail;
            }
            $book->url = $carpetaGuardado . '/' . $nombreArchivo;
            $book->save();
            //recorremos carreras
            for($i=0; $i < count($request->programas);$i++){
                $bookPrograma = new BookPrograma();
                $bookPrograma->book_id = $book->id;
                $bookPrograma->carrera_id = $request->programas[$i];
                $bookPrograma->save();
            }

            //recorremos authors
            for ($i=0; $i < count($request->authors) ; $i++) { 
                $author = Author::firstOrCreate([
                    'name'=>$request->authors[$i],
                ]);
                //agregamos los authors
                $bookAuthor = new BookAuthor;
                $bookAuthor->book_id = $book->id;
                $bookAuthor->author_id = $author->id;
                $bookAuthor->save();
            }
            //recorremos publishers
            for ($i=0; $i < count($request->publishers) ; $i++) { 
                $publisher = Publisher::firstOrCreate([
                    'name'=>$request->publishers[$i],
                ]);
                //agregamos los authors
                $bookPublisher = new BookPublisher;
                $bookPublisher->book_id = $book->id;
                $bookPublisher->publisher_id = $publisher->id;
                $bookPublisher->save();
            }
            //recorremos categorias
            for ($i=0; $i < count($request->categories) ; $i++) { 
                $categorie = Categorie::firstOrCreate([
                    'name'=>$request->categories[$i],
                ]);
                //agregamos los authors
                $bookCategorie = new BookCategorie;
                $bookCategorie->book_id = $book->id;
                $bookCategorie->categorie_id = $categorie->id;
                $bookCategorie->save();
            }
            //recorremos los tags
            for ($i=0; $i < count($request->tags) ; $i++) { 
                $tag = Tag::firstOrCreate([
                    'name'=>$request->tags[$i],
                ]);
                //agregamos los authors
                $bookTag = new BookTag;
                $bookTag->book_id = $book->id;
                $bookTag->tag_id = $tag->id;
                $bookTag->save();
            }
            //nos queda por agregar el PDF
            DB::commit();
            }
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            dd($th->getMessage());
            return Redirect::route('dashboard.books.index')->with('error',$th->getMessage());
        }
       return Redirect::route('dashboard.books.index')->with('info','se registro el libro correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            //code...
            $book = Book::findOrFail($id);
            $url = $book->url;
            $book->delete();
        } catch (\Throwable $th) {
            //throw $th;
            return Redirect::route('dashboard.books.index')->with('error','no se elimino el libro del sistema');
        }
        //eliminamos el pdf
        if (Storage::disk('public')->exists($url)) {
            Storage::disk('public')->delete($url);
            // El archivo ha sido eliminado exitosamente
        }
        return Redirect::route('dashboard.books.index')->with('info','se elimino el libro correctamente');
    }
    public function getbook($id){
        $data = file_get_contents('https://www.etnassoft.com/api/v1/get/?id='.$id);
        return $data;
    }
}
