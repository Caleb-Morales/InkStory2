@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-between align-items-center mb-4">
        <div class="col-md-6">
            <h1>Modulo de administración de categorías</h1>
        </div>
        <div class="col-md-6 text-end">
            <!-- Botón para abrir el modal -->
            <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modalIns">
                Añadir
            </button>
        </div>
    </div>

    <!-- Modal de inserción -->
    <div class="modal fade" id="modalIns" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <x-form enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Inserción de Categoría</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Mostrar mensajes de error aquí -->
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre categoría</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="" required>
                            <small id="helpId" class="form-text text-muted">Ingrese el nombre de la categoría</small>
                        </div>
                        <div class="mb-3">
                            <label for="img" class="form-label">Imagen Categoría</label>
                            <input type="file" class="form-control" name="img" id="img" placeholder="" aria-describedby="fileHelpId">
                            <div id="fileHelpId" class="form-text">Seleccione una imagen para la categoría</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </x-form>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOMBRE</th>
                            <th>IMAGEN</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($listaCat as $index => $cat)
                            <tr class="{{ $index % 2 == 0 ? 'bg-primary' : 'bg-secondary' }}">
                                <th>{{ $cat->id }}</th>
                                <td>{{ $cat->nombre }}</td>
                                <td><img src="{{ url($cat->img) }}" alt="{{ $cat->nombre }}" width="64"></td>
                                <td>
                                    <a href="{{ url('categorias/edit/'.$cat->id)}}" class="btn btn-warning">Modificar</a>
                                    <x-form-btn method="DELETE" action="{{ url('categorias/delete/'.$cat->id)}}" class="btn btn-danger">Eliminar</x-form-btn>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">No hay datos...</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
