@extends('adminlte::page')

@section('title', 'Dashboard Libros')

@section('content_header')
    <h1>Registro de Libro</h1>
    <a href="{{ route('dashboard.books.index') }}" class="btn btn-danger">
        <i class="fa fa-arrow-left"></i> Regresar
    </a>
@stop

@section('content')
        <div class="row">
            <div class="col-sm-12 col-md-3">
                <div class="input-group mb-3">
                    <input type="text" id="book_id" class="form-control" placeholder="código" aria-label="Recipient's username"
                        aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <a class="btn btn-outline-primary" id="btn_search">
                            <i class="fa fa-search" aria-hidden="true"></i> Buscar
                        </a>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::open(['route' => 'dashboard.books.store', 'method' => 'post', 'id' => 'frm_search','enctype'=>'multipart/form-data']) !!}
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    {!! Form::label('title', 'Titulo', [null]) !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    @error('title')
                        <small class="text-danger d-block">{{ $message }}</small>
                    @enderror
                    {!! Form::label('publisher_date', 'Año de Publicacion', ['class'=>'mt-2']) !!}
                    {!! Form::text('publisher_date', null, ['class'=>'form-control']) !!}
                    @error('publisher_date')
                        <small class="text-danger d-block">{{ $message }}</small>
                    @enderror
                    {!! Form::label('pages', "Páginas", ['class'=>'mt-2']) !!}
                    {!! Form::text('pages', null, ['class'=>'form-control']) !!}
                    @error('pages')
                        <small class="text-danger d-block">{{ $message }}</small>
                    @enderror
                    {!! Form::label('language', "Lenguaje", ['class'=>'mt-2']) !!}
                    {!! Form::text('language', null, ['class'=>'form-control']) !!}
                    @error('language')
                        <small class="text-danger d-block">{{ $message }}</small>
                    @enderror
                    {!! Form::label('authors', 'Autor(es)', ['class'=>'mt-2']) !!}
                    @php
                        $config = [
                            "placeholder" => "Puedes seleccionar ...",
                            "allowClear" => false,
                        ];
                    @endphp
                    <x-adminlte-select2 id="authors" name="authors[]"
                    label-class="text-danger" igroup-size="sm" :config="$config" multiple>
                        <x-slot name="prependSlot">
                            <div class="input-group-text bg-gradient-red">
                                <i class="fas fa-tag"></i>
                            </div>
                        </x-slot>
                    </x-adminlte-select2>
                    <button type="button" id="btn_get_authors" class="btn btn-outline-warning btn-sm" title="llenar de autores">
                        <i class="fa fa-eye"></i>
                    </button>
                    <!-- Button crear Autor -->
                    <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#author-create">
                        <i class="far fa-plus-square"></i>
                    </button>
                    @include('dashboard.authors.modal')
                {!! Form::label('publisher', 'Editor', ['class'=>'mt-2 d-block']) !!}
                <x-adminlte-select2 id="publishers" name="publishers[]"
                    label-class="text-danger" igroup-size="sm" :config="$config" multiple>
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-red">
                            <i class="fas fa-tag"></i>
                        </div>
                     </x-slot>
                </x-adminlte-select2>
                <button type="button" id="btn_get_publishers" class="btn btn-outline-warning btn-sm" title="llenar de autores">
                    <i class="fa fa-eye"></i>
                </button>
                <!-- Button crear Editor -->
                <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#publisher-create">
                    <i class="far fa-plus-square"></i>
                </button>
                {!! Form::label('categories', 'Categorias', ['class'=>'mt-2 d-block']) !!}
                <x-adminlte-select2 id="categories" name="categories[]"
                    label-class="text-danger" igroup-size="sm" :config="$config" multiple>
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-red">
                            <i class="fas fa-tag"></i>
                        </div>
                     </x-slot>
                </x-adminlte-select2>

                <button type="button" id="btn_get_categories" class="btn btn-outline-warning btn-sm" title="llenar de categorias">
                    <i class="fa fa-eye"></i>
                </button>
                <!-- Button crear Categoria -->
                <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#categorie-create">
                    <i class="far fa-plus-square"></i>
                </button>

                {!! Form::label('tags', 'Etiquetas', ['class'=>'mt-2 d-block']) !!}
                <x-adminlte-select2 id="tags" name="tags[]"
                    label-class="text-danger" igroup-size="sm" :config="$config" multiple>
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-gradient-red">
                            <i class="fas fa-tag"></i>
                        </div>
                     </x-slot>
                </x-adminlte-select2>

                <button type="button" id="btn_get_tags" class="btn btn-outline-warning btn-sm" title="llenar de Etiqueta">
                    <i class="fa fa-eye"></i>
                </button>
                <!-- Button crear Etiqueta -->
                <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#tag-create">
                    <i class="far fa-plus-square"></i>
                </button>

                {!! Form::label('content_short', 'Contenido Corto', ['class'=>'mt-2 d-block']) !!}
                <x-adminlte-text-editor name="content_short" id="content_short" :config='["height" => "100"]'>
                    <p id="content_short_p"></p>
                </x-adminlte-text-editor>
                @error('content_short')
                    <small class="text-danger d-block">{{ $message }}</small>
                @enderror
                {!! Form::label('content', 'Contenido', ['class'=>'mt-2']) !!}
                <x-adminlte-text-editor name="content" id="content" :config='["height" => "200"]'>
                    <p id="content_p"></p>
                </x-adminlte-text-editor>
                @error('content')
                    <small class="text-danger d-block">{{ $message }}</small>
                @enderror
                {!! Form::label('cover', 'Portada', [null]) !!}
                {!! Form::text('cover', null, ['class'=>'form-control mb-2']) !!}
                @error('cover')
                    <small class="text-danger d-block">{{ $message }}</small>
                @enderror
                <x-adminlte-input-file name="cover_file" igroup-size="sm" placeholder="Choose a file...">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-lightblue">
                            <i class="fas fa-upload"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-file>

                {!! Form::label('thumbnail', 'Miniatura', ['class'=>'mt-2']) !!}
                {!! Form::text('thumbnail', null, ['class'=>'form-control mb-2']) !!}
                @error('thumbnail')
                    <small class="text-danger d-block">{{ $message }}</small>
                @enderror
                <x-adminlte-input-file name="thumbnail_file" igroup-size="sm" placeholder="Choose a file...">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-lightblue">
                            <i class="fas fa-upload"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-file>
                {!! Form::label('pdf', 'PDF', ['class'=>'mt-2']) !!}
                <x-adminlte-input-file name="pdf" igroup-size="sm" placeholder="Choose a file...">
                    <x-slot name="prependSlot">
                        <div class="input-group-text bg-lightblue">
                            <i class="fas fa-upload"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input-file>
                <button type="submit" class="btn btn-primary mt-3">
                    <i class="fa fa-save"></i> Guardar
                </button>
                @error('pdf')
                    <small class="text-danger d-block">{{ $message }}</small>
                @enderror
            </div>
        </div>
        {!! Form::close() !!}
@stop


@section('js')
    <script src="{{ asset('js/main.js') }}">
    </script>
    <script>
        let btn_search = document.getElementById('btn_search');
        btn_search.addEventListener('click',function(){                    
            let code = document.getElementById('book_id');
            let url = "{{ asset('')}}";
            searchbookbycode(url,code.value).then(respuesta => {
                console.log(respuesta[0]);
                //adding title
                document.getElementById('title').value = respuesta[0].title;
                //adding author
                if(!searchinselect(respuesta[0].author,"authors")){
                    addtoselect(respuesta[0].author,"authors")
                }
                //adding publisher_date
                document.getElementById('publisher_date').value = respuesta[0].publisher_date;
                //adding publisher EDITOR
                if(!searchinselect(respuesta[0].publisher,"publishers")){
                    addtoselect(respuesta[0].publisher,"publishers")
                }
                //adding pages
                document.getElementById('pages').value = respuesta[0].pages;
                //adding language
                document.getElementById('language').value = respuesta[0].language;
                //adding content
                let html = respuesta[0].content.replace(/&lt;/g,'<');
                html = html.replace(/&gt;/g,'>');
                document.getElementById('content_p').innerHTML = html;
                //adding content_short
                let short = respuesta[0].content_short.replace(/&lt;/g,'<');
                short = short.replace(/&gt;/g,'>');
                document.getElementById('content_short_p').innerHTML = short;
                //adding categories
                //se que es un array
                if(Array.isArray(respuesta[0].categories)){
                    for(let i = 0; i < respuesta[0].categories.length; i++){
                        if(!searchinselect(respuesta[0].categories[i].name,"categories")){
                            addtoselect(respuesta[0].categories[i].name,"categories")
                        }
                    }
                }else{
                    if(!searchinselect(respuesta[0].categories,"categories")){
                        addtoselect(respuesta[0].categories,"categories")
                    }
                }
                //adding tags
                if(Array.isArray(respuesta[0].tags)){
                    for(let i = 0; i < respuesta[0].categories.length; i++){
                        if(!searchinselect(respuesta[0].tags[i].name,"tags")){
                            addtoselect(respuesta[0].tags[i].name,"tags")
                        }
                    }
                }else{
                    if(!searchinselect(respuesta[0].tags,"tags")){
                        addtoselect(respuesta[0].tags,"tags")
                    }
                }
                //adding covers
                document.getElementById('cover').value = respuesta[0].cover;
                //adging thumbnail
                document.getElementById('thumbnail').value = respuesta[0].thumbnail;
            });
        });
        //get authors
        document.getElementById('btn_get_authors').addEventListener('click',function(){
            let route = "{{ route('dashboard.authors.api.get') }}";
            console.log(route);
            get(route).then(respuesta => {
                //limpiamos el select
                clearselect("authors");
                //agregamos al select
                respuesta.forEach(element => {
                    addtoselect(element.name,"authors");
                    //console.log(element);
                });
                //console.log(respuesta);
            });
        });
        //OBTENER EDITORES
        document.getElementById('btn_get_publishers').addEventListener('click',function(){
            let route = "{{ route('dashboard.publishers.api.get') }}";
            get(route).then(respuesta => {
                //limpiamos el select
                console.log(respuesta);
                clearselect("publishers");
                //agregamos al select
                respuesta.forEach(element => {
                    addtoselect(element.name,"publishers");
                });
            });
        });
        //OBTENER CATEGORIAS
        document.getElementById('btn_get_categories').addEventListener('click',function(){
            let route = "{{ route('dashboard.categories.api.get') }}";
            get(route).then(respuesta => {
                //limpiamos el select
                console.log(respuesta);
                clearselect("categories");
                //agregamos al select
                respuesta.forEach(element => {
                    addtoselect(element.name,"categories");
                });
            });
        });
        //OBTENER ETIQUETAS
        document.getElementById('btn_get_tags').addEventListener('click',function(){
            let route = "{{ route('dashboard.tags.api.get') }}";
            console.log(route);
            get(route).then(respuesta => {
                //limpiamos el select
                console.log(respuesta);
                clearselect("tags");
                //agregamos al select
                respuesta.forEach(element => {
                    addtoselect(element.name,"tags");
                });
            });
        });



        //SAVE AUTHORS
        document.getElementById('btn_save_authors').addEventListener('click',function(){
            let route = "{{ route('dashboard.author.api.save') }}";
            let token = '{{ csrf_token() }}';
            let name = document.getElementById('name_author').value;
            if(name.length>0){
                save(route,token,name);
            }else{
                alert('Debe ingresar un nombre');
            }
            
        });
        //SAVE PUBLISHERS
        document.getElementById('btn_save_publishers').addEventListener('click',function(){
            let route = "{{ route('dashboard.publishers.api.save') }}";
            let token = '{{ csrf_token() }}';
            let name = document.getElementById('name_publisher').value;
            if(name.length>0){
                save(route,token,name);
            }else{
                alert('Debe ingresar un nombre');
            }
            
        });
        //SAVE CATEGORIE
        document.getElementById('btn_save_categories').addEventListener('click',function(){
            let route = "{{ route('dashboard.categories.api.save') }}";
            let token = '{{ csrf_token() }}';
            let name = document.getElementById('name_categorie').value;
            if(name.length>0){
                save(route,token,name);
            }else{
                alert('Debe ingresar un nombre');
            }
        });
        //SAVE TAG
        document.getElementById('btn_save_tags').addEventListener('click',function(){
            let route = "{{ route('dashboard.tags.api.save') }}";
            let token = '{{ csrf_token() }}';
            let name = document.getElementById('name_tag').value;
            if(name.length>0){
                save(route,token,name);
            }else{
                alert('Debe ingresar un nombre');
            }
        });
    </script>
@stop