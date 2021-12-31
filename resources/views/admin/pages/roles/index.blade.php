@extends('adminlte::page')

@section('title', 'Cargos')

@section('content_header')
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
  <li class="breadcrumb-item"><a href="{{ route('roles.index') }}" class="active">Cargos</a></li>
</ol>
<h1 class="my-3">Cargos</h1>
@stop

@section('content')
<div style="margin-bottom: 1rem;">
  <a href="{{ route('roles.create') }}" class="btn btn-dark">ADD <i class="fas fa-plus-square"></i></a>
</div>

<div class="card">
  <div class="card-header">
    <form action="{{ route('roles.search') }}" method="POST" class="form form-inline">
      @csrf
      <input type="text" name="filter" placeholder="Filtro" class="form-control" value="{{ $filters['filter'] ?? '' }}">
      <button type="submit" class="btn btn-dark ml-2">Filtrar</button>
    </form>
  </div>
  <div class="card-body">
    <table class="table table-condensed">
      <thead>
        <tr>
          <th>Nome</th>
          <th width="300">Ações</th>
        </tr>
      </thead>
      <tbody>
        @foreach($roles as $role)
        <tr>
          <td>
            {{ $role->name }}
          </td>
          <td style="width: 10px;">
            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-info">Editar</a>
            <a href="{{ route('roles.show', $role->id) }}" class="btn btn-warning">Ver</a>
            <a href="{{ route('roles.permissions', $role->id) }}" class="btn btn-warning"><i class="fas fa-lock"></i></a>

          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="card-footer">
    @if(isset($filters))
    {!! $roles->appends($filters)->links() !!}
    @else
    {!! $roles->links() !!}
    @endif
  </div>
</div>
@stop