@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h1>Modulo de Administración de Usuarios</h1>
    </div>
    <div class="col-md-6">
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- Modal trigger button -->
        <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modalIns">
            Añadir
        </button>

        <!-- Modal Body -->
        <div class="modal fade" id="modalIns" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
            role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <x-form action="{{ route('user.store') }}">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId">Inserción de Usuario</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- ... (resto del formulario) ... -->
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
<div class="row">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>EMAIL</th>
                    <th>ROLES</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $key => $usuario)
                    <tr class="{{ $key % 2 == 0 ? 'table-light' : 'table-white' }}">
                        <td>{{ $usuario->id }}</td>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->getRoleNames()->implode(', ') }}</td>
                        <td>
                            <a href="{{ route('user.edit', $usuario->id) }}" class="btn btn-warning">Modificar</a>
                            <form action="{{ route('user.destroy', $usuario->id) }}" method="post" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('¿Estás seguro de eliminar este usuario?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
