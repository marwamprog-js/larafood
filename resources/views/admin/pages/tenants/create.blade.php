@extends('adminlte::page')

@section('title', 'Cadastrar Empresas')

@section('content_header')
<h1>Nova Empresa</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('tenants.store') }}" method="POST" class="form" enctype="multipart/form-data">
      @csrf
      @include('admin.pages.tenants.partials.form')
    </form>
  </div>
</div>
@stop