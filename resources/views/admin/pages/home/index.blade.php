@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
  <li class="breadcrumb-item"><a href="{{ route('users.index') }}" class="active">Usuários</a></li>
</ol>
<h1 class="my-3">Dashboard</h1>
@stop

@section('content')
<h1>Dashboard</h1>
@stop