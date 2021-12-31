@extends('adminlte::page')

@section('title', "Permissões disponíveis para o cargo {$role->name}")

@section('content_header')
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
  <li class="breadcrumb-item"><a href="{{ route('roles.index') }}" class="active">Regras</a></li>
</ol>
<h1 class="my-3">Permissões disponíveis para o cargo <b>{{ $role->name }}</b></h1>
@stop

@section('content')

<div class="card">
  <div class="card-header">
    <form action="{{ route('roles.permissions.available', $role->id) }}" method="POST" class="form form-inline">
      @csrf
      <input type="text" name="filter" placeholder="Filtro" class="form-control" value="{{ $filters['filter'] ?? '' }}">
      <button type="submit" class="btn btn-dark ml-2">Filtrar</button>
    </form>
  </div>
  <div class="card-body">
    <table class="table table-condensed">
      <thead>
        <tr>
          <th width="50">#</th>
          <th>Nome</th>
        </tr>
      </thead>
      <tbody>
        <form action="{{ route('roles.permissions.attach', $role->id) }}" method="POST">
          @csrf

          @foreach($permissions as $permission)
          <tr>
            <td>
              <input type="checkbox" name="permissions[]" value="{{ $permission->id }}">
            </td>
            <td>
              {{ $permission->name }}
            </td>
          </tr>
          @endforeach

          <tr>
            <td colspan="500">
              <button type="submit" class="btn btn-primary mb-5">Vincular</button>
              @include('admin.includes.alerts')
            </td>
          </tr>
        </form>
      </tbody>
    </table>
  </div>

  <div class="card-footer">
    @if(isset($filters))
    {!! $permissions->appends($filters)->links() !!}
    @else
    {!! $permissions->links() !!}
    @endif
  </div>
</div>
@stop