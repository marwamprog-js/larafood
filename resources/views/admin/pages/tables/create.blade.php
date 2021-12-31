@extends('adminlte::page')

@section('title', 'Cadastrar Mesas')

@section('content_header')
<h1>Novo Mesa</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('tables.store') }}" method="POST" class="form">
      @csrf
      @include('admin.pages.tables.partials.form')
    </form>
  </div>
</div>
@stop