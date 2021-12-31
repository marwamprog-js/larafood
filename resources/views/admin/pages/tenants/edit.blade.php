@extends('adminlte::page')

@section('title', "Editar a Empresa {$tenant->name}")

@section('content_header')
<h1>Editar a Empresa {{ $tenant->name }}</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('tenants.update', $tenant->id) }}" method="POST" class="form" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      @include('admin.pages.tenants.partials.form')
    </form>
  </div>
</div>
@stop