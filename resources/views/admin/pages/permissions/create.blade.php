@extends('adminlte::page')

@section('title', 'Cadastrar Permissões')

@section('content_header')
<h1>Novo Permissões</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('permissions.store') }}" method="POST" class="form">
      @csrf
      @include('admin.pages.permissions.partials.form')
    </form>
  </div>
</div>
@stop