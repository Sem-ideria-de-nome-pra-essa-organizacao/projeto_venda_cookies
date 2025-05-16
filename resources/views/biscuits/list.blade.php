@extends('base')
@section('titulo', 'BoinaLachas')
@section('conteudo')
<div class="container mt-4">
    <h3 class="mb-4">Listagem de Biscoito</h3>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ url('biscuits/create') }}" class="btn btn-success">Criar</a>
        <form action="{{route('biscuit.search')}}" method="POST" class="d-flex align-items-center">
            @csrf
            <label for="type" class="me-2">Tipo</label>
            <select name="type" id="type" class="form-select me-2" style="width: auto;">
                <option value="name">Nome</option>
                <option value="flavor">Sabor</option>
                <option value="shape">formato</option>
            </select>
            <input type="text" name="value" placeholder="Valor" class="form-control me-2" style="width: auto;">
            <button type="submit" class="btn btn-secondary">Buscar</button>
        </form>
    </div>
</div>
<div class="mb-3">
    <a href="{{ route('biscuit.report') }}" class="btn btn-primary">
        Baixar PDF da Lista
    </a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Imagem</th>
            <th>Nome</th>
            <th>Sabor</th>
            <th>Confeiteiro</th>
            <th>Formmato</th>
            <th>Tamanho</th>
            <th>Preço</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>
                    @if ($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" alt="Imagem do Biscoito" width="400">
                    @else
                        Sem imagem
                    @endif
                <td>{{ $item->name }}</td>
                <td>{{ $item->flavor }}</td>
                <td>{{ $item->baker->name }}</td>
                <td>{{ $item->shape }}</td>
                <td>{{ $item->size }}</td>
                <td>{{ $item->price }}</td>
                <td>
                    <a href="{{ route('biscuit.edit', $item->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('biscuit.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Tem certeza que deseja excluir este confeiteiro?')">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@stop
