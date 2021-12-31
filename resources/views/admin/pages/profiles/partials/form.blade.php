@include('admin.includes.alerts')

@csrf
<div class="form-group">
  <label for="name">* Nome: </label>
  <input type="text" name="name" name="name" class="form-control" placeholder="Nome: " value="{{ $profile->name ?? old('name') }}">
</div>
<div class="form-group">
  <label for="description">Descrição: </label>
  <input type="text" name="description" id="description" class="form-control" placeholder="Descrição: " value="{{ $profile->description ?? old('description') }}">
</div>
<button type="submit" class="btn btn-dark">Enviar</button>