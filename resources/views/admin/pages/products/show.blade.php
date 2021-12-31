@extends('adminlte::page')

@section('title', "Detalhes dos Produtos {$product->title}")

@section('content_header')
<h1>Detalhes da Produtos <b>{{ $product->title }}</b></h1>
@stop

@section('content')
<div class="card">
  <div class="card-body">
    <ul>
      <li>
        <img src="{{ url("storage/{$product->image}") }}" alt="{{ $product->title }}" width="200">
      </li>
      <li><strong>Produto: </strong> {{ $product->title }}</li>
      <li><strong>Flag: </strong> {{ $product->flag }}</li>
      <li><strong>Preço: </strong> {{ $product->price }}</li>
      <li><strong>Descrição: </strong> {{ $product->description }}</li>
    </ul>

    @include('admin.includes.alerts')

    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger">Deletar Produto</button>
    </form>
  </div>
</div>
@stop