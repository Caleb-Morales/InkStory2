@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col">
            <h1>Formulario de modificación de categoría</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <x-form enctype="multipart/form-data" method="PUT">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre categoría</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="" required value="{{ $cat->nombre }}">
                    <small id="helpId" class="form-text text-muted">Ingrese el nombre de la categoría</small>
                </div>
                <div class="mb-3">
                    <label for="img" class="form-label">Imagen Categoría</label>
                    <input type="file" class="form-control" name="img" id="img" placeholder="" aria-describedby="fileHelpId" onchange="previewImage()">
                    <div id="fileHelpId" class="form-text">Seleccione una nueva imagen para la categoría</div>
                    <img id="image-preview" src="{{ url($cat->img) }}" alt="{{ $cat->nombre }}" class="img-fluid mb-3">
                </div>
                <button type="submit" class="btn btn-primary">Modificar</button>
            </x-form>
        </div>
    </div>
</div>

<script>
    function previewImage() {
        var input = document.getElementById('img');
        var preview = document.getElementById('image-preview');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@endsection
