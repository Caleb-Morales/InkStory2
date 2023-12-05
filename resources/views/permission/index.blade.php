@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <h1>Modulo de administración de permisos</h1>
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
                        <x-form action="{{ route('permission.store') }}" method="POST">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitleId">Insercion de Permisos</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre Permiso</label>
                                    <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="" required>
                                    <small id="helpId" class="form-text text-muted">Help text</small>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
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
                        <th>NOMBRE</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($permissions as $key => $permission)
                        <tr class="{{ $key % 2 == 0 ? 'table-light' : 'table-white' }}">
                            <td>{{ $permission->id }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>
                                <x-form-btn method="DELETE" action="{{ route('permission.destroy', $permission->id) }}" class="btn btn-danger">Eliminar</x-form-btn>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">No hay datos...</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
