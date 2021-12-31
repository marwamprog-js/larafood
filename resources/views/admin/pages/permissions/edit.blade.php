@extends('adminlte::page')

@section('title', 'Editar o Permissões {$permission->name}')

@section('content_header')
<h1>Editar o Permissões {{ $permission->name }}</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('permissions.update', $permission->id) }}" method="POST" class="form">
      @csrf
      @method('PUT')
      @include('admin.pages.permissions.partials.form')
    </form>
  </div>
</div>
@stop