<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
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
        $authors = Author::orderBy('name','asc')->get();
        return $authors;
    }
    public function get(){
        $authors = Author::orderBy('name','asc')->get();
        return $authors;
    }
    public function save(Request $request){
        try {
            //code...
            $author = new Author();
            $author->name = $request->name;
            $author->save();
            $array = ["respuesta"=>true];
        } catch (\Throwable $th) {
            //throw $th;          
            $array = ["respuesta"=>false];
        }
        return json_encode($array);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    }
}
