@extends('adminlte::page')

@section('title', 'Cadastrar Cargo')

@section('content_header')
<h1>Nova Cargo</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('roles.store') }}" method="POST" class="form">
      @csrf
      @include('admin.pages.roles.partials.form')
    </form>
  </div>
</div>
@stop