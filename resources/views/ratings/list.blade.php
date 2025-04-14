@extends('base')
@section('titulo', 'BoinaLachas')
@section('conteudo')
<div class="container mt-4">
    <h3 class="mb-4">Listagem de Notas</h3>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ url('ratings/create') }}" class="btn btn-success">Criar</a>
        <form action="{{route('rating.search')}}" method="POST" class="d-flex align-items-center">
            @csrf
            <label for="type" class="me-2">Tipo</label>
            <select name="type" id="type" class="form-select me-2" style="width: auto;">
                <option value="name">Nome</option>
            </select>
            <input type="text" name="value" placeholder="Valor" class="form-control me-2" style="width: auto;">
            <button type="submit" class="btn btn-secondary">Buscar</button>
        </form>
    </div>
</div>


<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Usuário</th>
            <th>Produto</th>
            <th>Avaliação</th>
            <th>Comentário</th>
            <th>Data</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->biscuit->name }}</td>
                <td>{{ $item->rating }}</td>
                <td>{{ $item->comment }}</td>
                <td>{{ $item->created_at->format('d/m/Y') }}</td>
                <td>
                    <a href="{{ route('rating.edit', $item->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('rating.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Tem certeza que deseja excluir esta avaliação?')">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@stop
