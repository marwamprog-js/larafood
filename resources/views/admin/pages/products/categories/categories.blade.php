@extends('adminlte::page')

@section('title', "Categorias do Produto {$product->title}")

@section('content_header')
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
  <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Produtos</a></li>
  <li class="breadcrumb-item"><a href="{{ route('products.categories', $product->id) }}" class="active">Categorias</a>
</ol>
<h1 class="my-3">Categorias do Produto <b>{{ $product->title }}</b></h1>
@stop

@section('content')
<div style="margin-bottom: 1rem;">
  <a href="{{ route('products.categories.available', $product->id) }}" class="btn btn-dark">ADD NOVA CATEGORIA</a>
</div>

<div class="card">
  <div class="card-body">
    <table class="table table-condensed">
      <thead>
        <tr>
          <th>Nome</th>
          <th width="50">Ações</th>
        </tr>
      </thead>
      <tbody>
        @foreach($categories as $category)
        <tr>
          <td>
            {{ $category->name }}
          </td>
          <td style="width: 10px;">
            <a href="{{ route('products.category.detach', [$product->id, $category->id]) }}" class="btn btn-danger">Desvincular</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="card-footer">
    @if(isset($filters))
    {!! $categories->appends($filters)->links() !!}
    @else
    {!! $categories->links() !!}
    @endif
  </div>
</div>
@stop