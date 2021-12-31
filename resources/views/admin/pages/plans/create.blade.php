@extends('adminlte::page')

@section('title', 'Cadastrar Planos')

@section('content_header')
<h1>Novo Plano</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('plans.store') }}" method="POST" class="form">
      @csrf
      @include('admin.pages.plans.partials.form')
    </form>
  </div>
</div>
@stop