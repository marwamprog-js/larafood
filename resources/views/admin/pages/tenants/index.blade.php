@extends('adminlte::page')

@section('title', 'Empresas')

@section('content_header')
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
  <li class="breadcrumb-item"><a href="{{ route('tenants.index') }}" class="active">Empresas</a></li>
</ol>
<h1 class="my-3">Empresas</h1>
@stop

@section('content')

<div class="card">
  <div class="card-header">
    <form action="{{ route('tenants.search') }}" method="POST" class="form form-inline">
      @csrf
      <input type="text" name="filter" placeholder="Filtrar:" class="form-control" value="{{ $filters['filter'] ?? '' }}">
      <button type="submit" class="btn btn-dark ml-2">Filtrar</button>
    </form>
  </div>
  <div class="card-body">
    <table class="table table-condensed">
      <thead>
        <tr>
          <th width="150">Logo</th>
          <th>Empresa</th>
          <th width="300">Ações</th>
        </tr>
      </thead>
      <tbody>
        @foreach($tenants as $tenant)
        <tr>
          <td>
            <img src="{{ url("storage/{$tenant->logo}") }}" alt="{{ $tenant->name }}" width="100">
          </td>
          <td>
            {{ $tenant->name }}
          </td>
          <td style="width: 10px;">
            <a href="{{ route('tenants.edit', $tenant->id) }}" class="btn btn-info">Editar</a>
            <a href="{{ route('tenants.show', $tenant->id) }}" class="btn btn-warning">Ver</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="card-footer">
    @if(isset($filters))
    {!! $tenants->appends($filters)->links() !!}
    @else
    {!! $tenants->links() !!}
    @endif
  </div>
</div>
@stop