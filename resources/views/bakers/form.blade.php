@extends('base')
@section('titulo', 'BoinaLachas')
@section('conteudo')
<div class="card mt-4 shadow-sm">
    <div class="card-header ">
        <h3 class="mb-0">{{ isset($baker) ? 'Editar Confeiteiro' : 'Criar Novo Confeiteiro' }}</h3>
    </div>
    <div class="card-body">
        <form action="{{ isset($baker) ? route('baker.update', $baker->id) : route('baker.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @if (isset($baker))
                @method('PUT')
            @endif

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Nome:</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $baker->name ?? '') }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $baker->email ?? '') }}" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="age" class="form-label">Idade:</label>
                    <input type="number" id="age" name="age" class="form-control" value="{{ old('age', $baker->age ?? '') }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="role" class="form-label">Função:</label>
                    <input type="text" id="role" name="role" class="form-control" value="{{ old('role', $baker->role ?? '') }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="experience" class="form-label">Experiência (anos):</label>
                    <input type="number" id="experience" name="experience" class="form-control" value="{{ old('experience', $baker->experience ?? '') }}" required>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="image" class="form-label">Foto de Perfil:</label>
                    <input type="file" id="image" name="image" class="form-control">
                    @if (isset($baker) && $baker->image)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $baker->image) }}" alt="Foto de Perfil" class="img-thumbnail" width="150">
                        </div>
                    @endif
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-success">{{ isset($baker) ? 'Atualizar' : 'Salvar' }}</button>
                <a href="{{ url('bakers') }}" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
</div>
@stop
