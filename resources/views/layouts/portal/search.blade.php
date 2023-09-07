{!! Form::open(['route'=>'search_book','method'=>'post']) !!}
    <div class="tm-main-content" style="max-height: 200px">
        <section class="tm-margin-b-l">
            <div class="row mt-3">
                <div class="col-sm-12">
                    <h2 class="tm-main-title">
                        <i class="fa fa-search" aria-hidden="true"></i> Buscar Contenidos
                    </h2>
                </div>
                <div class="col-sm-12">
                    <div class="input-group">
                        <input type="search" class="form-control rounded" name="search" placeholder="criterios de busqueda" aria-label="Search" aria-describedby="search-addon" />
                        
                        <button type="submit" class="btn btn-outline-primary">
                            <i class="fa fa-search" aria-hidden="true"></i> Buscar
                        </button>
                    </div>
                </div>
                @error('search')
                    <div class="col-sm-12">
                        <p class="d-block text-danger"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> {{ $message }}</p>    
                    </div>
                @enderror
            </div>
        </section>
    </div>
{!! Form::close() !!}