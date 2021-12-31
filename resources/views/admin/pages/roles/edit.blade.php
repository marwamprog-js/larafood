@extends('adminlte::page')

@section('title', 'Editar cargo {$role->name}')

@section('content_header')
<h1>Editar Cargo {{ $role->name }}</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('roles.update', $role->id) }}" method="POST" class="form">
      @csrf
      @method('PUT')
      @include('admin.pages.roles.partials.form')
    </form>
  </div>
</div>
@stop