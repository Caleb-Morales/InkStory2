@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <h1>Modulo de administración de Comics</h1>
        </div>
        <div class="col-md-6">
            <!-- Botón para abrir el modal -->
            <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modalIns">
                Añadir
            </button>
            <!-- Modal de inserción -->
            <div class="modal fade" id="modalIns" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content">
                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>                                    
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <x-form enctype="multipart/form-data" style="max-height: 400px; overflow-y: auto;">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitleId">Insercion de Comics</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="" class="form-label">Nombre del Comic</label>
                                    <input type="text" class="form-control" name="nombre" aria-describedby="helpId" placeholder="" value="{{ old('nombre') }}">
                                    <small id="helpId" class="form-text text-muted">Help text</small>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Portada</label>
                                    <input type="file" class="form-control" name="img" placeholder="" aria-describedby="fileHelpId">
                                    <div id="fileHelpId" class="form-text">Help text</div>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Precio</label>
                                    <input type="text" class="form-control" name="precio" aria-describedby="helpId" placeholder="">
                                    <small id="helpId" class="form-text text-muted">Help text</small>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Stock</label>
                                    <input type="number" class="form-control" name="stock" aria-describedby="helpId" placeholder="">
                                    <small id="helpId" class="form-text text-muted">Help text</small>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Comics</label>
                                    <select class="form-select form-select-lg" name="catId">
                                        @foreach ($listaCat as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->nombre }}</option>
                                        @endforeach
                                    </select>
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
        </div>
    </div>

    <div class="row mt-4">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE DEL COMIC</th>
                        <th>PORTADA</th>
                        <th>PRECIO</th>
                        <th>STOCK</th>
                        <th>COMICS</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($listaProd as $p)
                        <tr>
                            <th>{{ $p->id }}</th>
                            <td>{{ $p->nombre }}</td>
                            <td><img src="{{ url($p->img) }}" alt="" width="64"></td>
                            <td>{{ $p->precio }}</td>
                            <td>{{ $p->stock }}</td>
                            <td>{{ $p->categoria->nombre }}</td>
                            <td>
                                @can('producto-modificar')
                                    <a href="{{ url("productos/edit/".$p->id) }}" class="btn btn-warning btn-sm">Modificar</a>
                                @endcan
                                @can('producto-eliminar')
                                    <x-form-btn method="DELETE" action="{{ url('productos/delete/'.$p->id)}}" class="btn btn-danger btn-sm">Eliminar</x-form-btn>
                                @endcan
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">No hay datos...</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
