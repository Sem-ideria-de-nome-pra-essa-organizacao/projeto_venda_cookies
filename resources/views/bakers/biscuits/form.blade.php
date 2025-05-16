@extends('base')
@section('titulo', 'BoinaLachas')
@section('conteudo')
<div class="card mt-4 shadow-sm">
    <div class="card-header">
        <h3 class="mb-0">{{ isset($biscuit) ? 'Editar Biscoito' : 'Criar Novo Biscoito' }}</h3>
    </div>
    <div class="card-body">
        <form action="{{ isset($biscuit) ? route('bakerbiscuit.update', $biscuit->id) : route('bakerbiscuit.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @if (isset($biscuit))
                @method('PUT')
            @endif
            <input type="hidden" name="baker_id" value="{{ $baker->id }}">

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Nome:</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $biscuit->name ?? '') }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="flavor" class="form-label">Sabor:</label>
                    <input type="text" id="flavor" name="flavor" class="form-control" value="{{ old('flavor', $biscuit->flavor ?? '') }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="shape" class="form-label">Formato:</label>
                    <input type="text" id="shape" name="shape" class="form-control" value="{{ old('shape', $biscuit->shape ?? '') }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="size" class="form-label">Tamanho:</label>
                    <input type="text" id="size" name="size" class="form-control" value="{{ old('size', $biscuit->size ?? '') }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="price" class="form-label">Preço:</label>
                    <input type="text" id="price" name="price" class="form-control" value="{{ old('price', $biscuit->price ?? '') }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="description" class="form-label">Descrição:</label>
                    <textarea id="description" name="description" class="form-control" rows="2" required>{{ old('description', $biscuit->description ?? '') }}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="image" class="form-label">Imagem:</label>
                    <input type="file" id="image" name="image" class="form-control" accept="image/*">
                    @if (isset($biscuit) && $biscuit->image)
                        <img src="{{ asset('storage/' . $biscuit->image) }}" alt="Imagem do Biscoito" class="img-thumbnail mt-2" style="max-height: 150px;">
                    @endif
                </div>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <button type="submit" class="btn btn-success">{{ isset($biscuit) ? 'Atualizar' : 'Salvar' }}</button>
                <a href="{{ url('biscuits') }}" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>
@stop
