@extends('adminlte::page')

@section('title', "Editar a categoria {$category->name}")

@section('content_header')
<h1>Editar a categoria {{ $category->name }}</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('categories.update', $category->id) }}" method="POST" class="form">
      @csrf
      @method('PUT')
      @include('admin.pages.categories.partials.form')
    </form>
  </div>
</div>
@stop