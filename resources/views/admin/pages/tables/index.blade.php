@extends('adminlte::page')

@section('title', 'Mesas')

@section('content_header')
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
  <li class="breadcrumb-item"><a href="{{ route('tables.index') }}" class="active">Mesas</a></li>
</ol>
<h1 class="my-3">Mesas</h1>
@stop

@section('content')
<div style="margin-bottom: 1rem;">
  <a href="{{ route('tables.create') }}" class="btn btn-dark">ADD <i class="fas fa-plus-square"></i></a>
</div>

<div class="card">
  <div class="card-header">
    <form action="{{ route('tables.search') }}" method="POST" class="form form-inline">
      @csrf
      <input type="text" name="filter" placeholder="Filtrar:" class="form-control" value="{{ $filters['filter'] ?? '' }}">
      <button type="submit" class="btn btn-dark ml-2">Filtrar</button>
    </form>
  </div>
  <div class="card-body">
    <table class="table table-condensed">
      <thead>
        <tr>
          <th>Identificador da Mesa</th>
          <th>Descrição</th>
          <th width="300">Ações</th>
        </tr>
      </thead>
      <tbody>
        @foreach($tables as $table)
        <tr>
          <td>
            {{ $table->identify }}
          </td>
          <td>
            {{ $table->description }}
          </td>
          <td style="width: 10px;">
            <a href="{{ route('tables.qrcode', $table->identify) }}" class="btn btn-default" target="_blank">
              <i class="fas fa-qrcode"></i>
            </a>
            <a href="{{ route('tables.edit', $table->id) }}" class="btn btn-info">Editar</a>
            <a href="{{ route('tables.show', $table->id) }}" class="btn btn-warning">Ver</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="card-footer">
    @if(isset($filters))
    {!! $tables->appends($filters)->links() !!}
    @else
    {!! $tables->links() !!}
    @endif
  </div>
</div>
@stop