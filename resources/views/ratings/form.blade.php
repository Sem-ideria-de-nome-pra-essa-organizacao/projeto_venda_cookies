@extends('base')
@section('titulo', 'BoinaLachas')
@section('conteudo')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header">
            <h3 class="mb-0 ">{{ isset($rating) ? 'Editar Biscoito' : 'Criar Novo Biscoito' }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ isset($rating) ? route('rating.update', $rating->id) : route('rating.store') }}" method="post">
                @csrf
                @if (isset($rating))
                    @method('PUT')
                @endif

                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Nome:</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $rating->name ?? '') }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="rating" class="form-label">Nota:</label>
                        <input type="text" id="rating" name="rating" class="form-control" value="{{ old('rating', $rating->rating ?? '') }}" required>
                    </div>
                </div>

                <div class="row g-3 mt-3">
                    <div class="col-md-6">
                        <label for="biscuit_id" class="form-label">Confeiteiro:</label>
                        <select id="biscuit_id" name="biscuit_id" class="form-control" required>
                            <option value="" disabled {{ old('biscuit_id', $rating->biscuit_id ?? '') == '' ? 'selected' : '' }}>Selecione um Biscoito</option>
                            @foreach($biscuits as $biscuit)
                                <option value="{{ $biscuit->id }}" {{ old('biscuit_id', $rating->biscuit_id ?? '') == $biscuit->id ? 'selected' : '' }}>
                                    {{ $biscuit->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="comment" class="form-label">Descrição:</label>
                        <textarea id="comment" name="comment" class="form-control" rows="3" required>{{ old('comment', $rating->comment ?? '') }}</textarea>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-4">
                    <button type="submit" class="btn btn-success px-4">{{ isset($rating) ? 'Atualizar' : 'Salvar' }}</button>
                    <a href="{{ url('ratings') }}" class="btn btn-secondary px-4">Voltar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
