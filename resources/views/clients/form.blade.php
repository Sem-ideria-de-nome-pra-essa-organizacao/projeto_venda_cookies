@extends('base')
@section('titulo', 'BoinaLachas')
@section('conteudo')
<div class="container mt-5">
    <div class="card shadow-sm border-0">
        <div class="card-header">
            <h3 class="mb-0">{{ isset($client) ? 'Editar Cliente' : 'Criar Novo Cliente' }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ isset($client) ? route('client.update', $client->id) : route('client.store') }}" method="post">
                @csrf
                @if (isset($client))
                    @method('PUT')
                @endif

                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label fw-bold">Nome:</label>
                        <input type="text" id="name" name="name" class="form-control " value="{{ old('name', $client->name ?? '') }}" required>
                    </div>

                    <div class="col-md-6">
                        <label for="cpf" class="form-label fw-bold">CPF:</label>
                        <input type="text" id="cpf" name="cpf" class="form-control " value="{{ old('cpf', $client->cpf ?? '') }}" required>
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label fw-bold">Email:</label>
                        <input type="email" id="email" name="email" class="form-control " value="{{ old('email', $client->email ?? '') }}" required>
                    </div>

                    <div class="col-md-6">
                        <label for="phone" class="form-label fw-bold">Telefone:</label>
                        <input type="text" id="phone" name="phone" class="form-control " value="{{ old('phone', $client->phone ?? '') }}" required>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-4">
                    <button type="submit" class="btn btn-success px-4">{{ isset($client) ? 'Atualizar' : 'Salvar' }}</button>
                    <a href="{{ url('clients') }}" class="btn btn-secondary px-4">Voltar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
