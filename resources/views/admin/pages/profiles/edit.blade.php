@extends('adminlte::page')

@section('title', 'Editar o Perfil {$profile->name}')

@section('content_header')
<h1>Editar o Perfil {{ $profile->name }}</h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('profiles.update', $profile->id) }}" method="POST" class="form">
      @csrf
      @method('PUT')
      @include('admin.pages.profiles.partials.form')
    </form>
  </div>
</div>
@stop