@extends('adminlte::page')

@section('title', 'Cadastrar Categorias')

@section('content_header')
<h1>Novo Categoria</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('categories.store') }}" method="POST" class="form">
      @csrf
      @include('admin.pages.categories.partials.form')
    </form>
  </div>
</div>
@stop