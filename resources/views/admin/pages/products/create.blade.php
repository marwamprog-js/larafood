@extends('adminlte::page')

@section('title', 'Cadastrar Produtos')

@section('content_header')
<h1>Novo Produto</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('products.store') }}" method="POST" class="form" enctype="multipart/form-data">
      @csrf
      @include('admin.pages.products.partials.form')
    </form>
  </div>
</div>
@stop