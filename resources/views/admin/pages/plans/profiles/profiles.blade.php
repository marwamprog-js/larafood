@extends('adminlte::page')

@section('title', "Perfis do plano {$plan->name}")

@section('content_header')
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
  <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
  <li class="breadcrumb-item"><a href="{{ route('plans.profiles', $plan->id) }}" class="active">Perfis</a></li>
</ol>
<h1 class="my-3">Perfis do plano <b>{{ $plan->name }}</b></h1>
@stop

@section('content')
<div style="margin-bottom: 1rem;">
  <a href="{{ route('plans.profiles.available', $plan->id) }}" class="btn btn-dark">ADD Novo Perfil</a>
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
        @foreach($profiles as $profile)
        <tr>
          <td>
            {{ $profile->name }}
          </td>
          <td style="width: 10px;">
            <a href="{{ route('plans.profile.detach', [$plan->id, $profile->id]) }}" class="btn btn-danger">Desvincular</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="card-footer">
    @if(isset($filters))
    {!! $profiles->appends($filters)->links() !!}
    @else
    {!! $profiles->links() !!}
    @endif
  </div>
</div>
@stop