@extends('adminlte::page')

@section('title', "Planos do perfil {$profile->name}")

@section('content_header')
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
  <li class="breadcrumb-item"><a href="{{ route('profiles.index') }}">Perfis</a></li>
  <li class="breadcrumb-item"><a href="{{ route('profiles.plans', $profile->id) }}" class="active">Perfis</a></li>
</ol>
<h1 class="my-3">Planos do perfil <b>{{ $profile->name }}</b></h1>
@stop

@section('content')

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
        @foreach($plans as $plan)
        <tr>
          <td>
            {{ $plan->name }}
          </td>
          <td style="width: 10px;">
            <a href="{{ route('plans.profile.detach', [$profile->id, $plan->id]) }}" class="btn btn-danger">Desvincular</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="card-footer">
    @if(isset($filters))
    {!! $plans->appends($filters)->links() !!}
    @else
    {!! $plans->links() !!}
    @endif
  </div>
</div>
@stop