@extends('adminlte::page')

@section('title', "Cadastrar Detalhe do Plano ao plano {$plan->name}")

@section('content_header')
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
  <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
  <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
  <li class="breadcrumb-item"><a href="{{ route('details.plan.index', $plan->url) }}">Detahes</a></li>
  <li class="breadcrumb-item active"><a href="{{ route('details.plan.create', $plan->url) }}" class="active">Novo</a></li>
</ol>
<h1>Cadastrar Detalhe do Plano ao plano <b>{{ $plan->name }}</b></h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('details.plan.store', $plan->url) }}" method="POST" class="form">
      @include('admin.pages.plans.details.partials.form')
    </form>
  </div>
</div>
@stop