@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <h2 class="btn-lg">Formulario de Modificación de Rol</h2>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <x-form enctype="multipart/form-data" method="PUT" :action="route('roles.update', $role->id)">
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre del Rol</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $role->name }}" aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted">Ingresa el nombre del rol.</small>
                </div>
                @foreach ($permissions as $p)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{ $p->id }}" id="{{ $p->id }}" name="permission[]" {{ in_array($p->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
                        <label class="form-check-label" for="{{ $p->id }}">
                            {{ $p->name }}
                        </label>
                    </div>
                @endforeach
                <button type="submit" class="btn btn-primary">Modificar</button>
            </x-form>
        </div>
    </div>
</div>
@endsection
