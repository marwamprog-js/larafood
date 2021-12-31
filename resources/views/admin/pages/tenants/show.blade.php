@extends('adminlte::page')

@section('title', "Detalhes da Empresa {$tenant->name}")

@section('content_header')
<h1>Detalhes da Empresa <b>{{ $tenant->name }}</b></h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <ul>
      <li>
        <img src="{{ url("storage/{$tenant->logo}") }}" alt="{{ $tenant->name }}" width="200">
      </li>
      <li><strong>Plano: </strong> {{ $tenant->plan->name }}</li>
      <li><strong>Empresa: </strong> {{ $tenant->name }}</li>
      <li><strong>Url: </strong> {{ $tenant->url }}</li>
      <li><strong>Email: </strong> {{ $tenant->email }}</li>
      <li><strong>CNPJ: </strong> {{ $tenant->cnpj }}</li>
      <li><strong>Ativo: </strong> {{ $tenant->active == 'Y' ? 'SIM' : 'NÃO' }}</li>
    </ul>

    <hr>
    <h3>Assinatura</h3>
    <ul>
      <li><strong>Data Assinatura: </strong> {{ $tenant->subscription }}</li>
      <li><strong>Data Expiração: </strong> {{ $tenant->expires_at }}</li>
      <li><strong>Identificador: </strong> {{ $tenant->subscription_id }}</li>
      <li><strong>Ativo: </strong> {{ $tenant->subscription_active == 'Y' ? 'SIM' : 'NÃO' }}</li>
      <li><strong>Cancelou? </strong> {{ $tenant->subscription_suspended == 'Y' ? 'SIM' : 'NÃO' }}</li>
    </ul>




  </div>
</div>
@stop