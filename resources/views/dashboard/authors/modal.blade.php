<!-- Modal CREATE AUTHOR -->
<div class="modal fade" id="author-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
            <i class="fas fa-user-edit text-primary"></i> Registrar Autor
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            {!! Form::label('name_author', 'Nombre del Author', [null]) !!}
            {!! Form::text('name_author', null, ['class'=>'form-control','id'=>'name_author']) !!}
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <i class="fas fa-power-off"></i> Cancelar
        </button>
        <button type="button" class="btn btn-primary" id="btn_save_authors" data-dismiss="modal">
            <i class="fas fa-save"></i> Guardar
        </button>
        </div>
    </div>
    </div>
</div>

<!-- Modal CREATE PUBLISHER -->
<div class="modal fade" id="publisher-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
            <i class="fas fa-user-edit text-primary"></i> Registrar Autor
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            {!! Form::label('name_publisher', 'Nombre del Editor', [null]) !!}
            {!! Form::text('name_publisher', null, ['class'=>'form-control','id'=>'name_publisher']) !!}
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <i class="fas fa-power-off"></i> Cancelar
        </button>
        <button type="button" class="btn btn-primary" id="btn_save_publishers" data-dismiss="modal">
            <i class="fas fa-save"></i> Guardar
        </button>
        </div>
    </div>
    </div>
</div>


<!-- Modal CREATE CATEGORIES -->
<div class="modal fade" id="categorie-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
            <i class="fas fa-user-edit text-primary"></i> Registrar Categoria
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            {!! Form::label('name_categorie', 'Nombre de la categoria', [null]) !!}
            {!! Form::text('name_categorie', null, ['class'=>'form-control','id'=>'name_categorie']) !!}
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <i class="fas fa-power-off"></i> Cancelar
        </button>
        <button type="button" class="btn btn-primary" id="btn_save_categories" data-dismiss="modal">
            <i class="fas fa-save"></i> Guardar
        </button>
        </div>
    </div>
    </div>
</div>

<!-- Modal CREATE TAG -->
<div class="modal fade" id="tag-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
            <i class="fas fa-user-edit text-primary"></i> Registrar Etiqueta
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            {!! Form::label('name_tag', 'Nombre de la Etiqueta', [null]) !!}
            {!! Form::text('name_tag', null, ['class'=>'form-control','id'=>'name_tag']) !!}
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <i class="fas fa-power-off"></i> Cancelar
        </button>
        <button type="button" class="btn btn-primary" id="btn_save_tags" data-dismiss="modal">
            <i class="fas fa-save"></i> Guardar
        </button>
        </div>
    </div>
    </div>
</div>