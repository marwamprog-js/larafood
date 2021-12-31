@extends('adminlte::page')

@section('title', "Categorias disponíveis para o produto {$product->title}")

@section('content_header')
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
  <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Produtos</a></li>
  <li class="breadcrumb-item"><a href="{{ route('products.categories', $product->id) }}">Categorias</a></li>
  <li class="breadcrumb-item"><a href="{{ route('products.categories.available', $product->id) }}" class="active">Disponíveis</a></li>
</ol>
<h1 class="my-3">Categorias disponíveis para o produto <b>{{ $product->title }}</b></h1>
@stop

@section('content')
<div style="margin-bottom: 1rem;">
  <a href="{{ route('products.categories.available', $product->id) }}" class="btn btn-dark">ADD CATEGORIA(S)</a>
</div>

<div class="card">
  <div class="card-header">
    <form action="{{ route('products.categories.available', $product->id) }}" method="POST" class="form form-inline">
      @csrf
      <input type="text" name="filter" placeholder="Filtro" class="form-control" value="{{ $filters['filter'] ?? '' }}">
      <button type="submit" class="btn btn-dark ml-2">Filtrar</button>
    </form>
  </div>
  <div class="card-body">
    <table class="table table-condensed">
      <thead>
        <tr>
          <th width="50">#</th>
          <th>Nome</th>
        </tr>
      </thead>
      <tbody>
        <form action="{{ route('products.categories.attach', $product->id) }}" method="POST">
          @csrf

          @foreach($categories as $category)
          <tr>
            <td>
              <input type="checkbox" name="categories[]" value="{{ $category->id }}">
            </td>
            <td>
              {{ $category->name }}
            </td>
          </tr>
          @endforeach

          <tr>
            <td colspan="500">
              <button type="submit" class="btn btn-primary mb-5">Vincular</button>
              @include('admin.includes.alerts')
            </td>
          </tr>
        </form>
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