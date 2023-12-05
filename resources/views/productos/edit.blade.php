@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col">
            <h1>Formulario de modificación de producto</h1>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col">
            <x-form enctype="multipart/form-data" method="PUT">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre Producto</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="" value="{{ $producto->nombre }}">
                    <small id="helpId" class="form-text text-muted">Ingrese el nombre del producto</small>
                </div>
                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen Producto</label>
                    <div class="input-group">
                        <input type="file" class="form-control" name="img" id="imagen" aria-describedby="fileHelpId" onchange="previewImage()">
                        <div class="input-group-append">
                            <label class="input-group-text" for="imagen">Seleccionar</label>
                        </div>
                    </div>
                    <div id="fileHelpId" class="form-text">Seleccione una nueva imagen para el producto</div>
                    <img id="image-preview" src="{{ url($producto->img) }}" alt="{{ $producto->nombre }}" class="img-fluid mt-3">
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="text" class="form-control" name="precio" id="precio" placeholder="" value="{{ $producto->precio }}">
                    <small id="helpId" class="form-text text-muted">Ingrese el precio del producto</small>
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" class="form-control" name="stock" id="stock" placeholder="" value="{{ $producto->stock }}">
                    <small id="helpId" class="form-text text-muted">Ingrese la cantidad en stock del producto</small>
                </div>
                <div class="mb-3">
                    <label for="catId" class="form-label">Categoría</label>
                    <select class="form-select form-select-lg" name="catId" id="catId">
                        @foreach ($listaCat as $cat)
                            <option value="{{ $cat->id }}" {{ $cat->id == $producto->categoria_id ? 'selected' : '' }}>{{ $cat->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Modificar</button>
            </x-form>
        </div>
    </div>
</div>

<script>
    function previewImage() {
        var input = document.getElementById('imagen');
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
