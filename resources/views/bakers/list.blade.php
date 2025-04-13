@extends('base')
@section('titulo', 'BoinaLachas')
@section('conteudo')
<div class="container mt-4">
    <h3 class="mb-4">Listagem de Confeiteiros</h3>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ url('bakers/create') }}" class="btn btn-success">Criar</a>
        <form action="{{route('baker.search')}}" method="POST" class="d-flex align-items-center">
            @csrf
            <label for="type" class="me-2">Tipo</label>
            <select name="type" id="type" class="form-select me-2" style="width: auto;">
                <option value="name">Nome</option>
                <option value="age">Idade</option>
                <option value="role">Cargo</option>
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
            <th>Nome</th>
            <th>Email</th>
            <th>Idade</th>
            <th>Cargo</th>
            <th>Profissão</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->age }}</td>
                <td>{{ $item->role }}</td>
                <td>{{ $item->experience }}</td>
                <td>
                    <a href="{{ route('baker.edit', $item->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('baker.destroy', $item->id) }}" method="POST" style="display:inline;">
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
