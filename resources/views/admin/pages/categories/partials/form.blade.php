@include('admin.includes.alerts')

<div class="form-group">
  <label for="name">Nome: </label>
  <input type="text" name="name" id="name" class="form-control" placeholder="Nome: " value="{{ $category->name ?? old('name') }}">
</div>
<div class="form-group">
  <label for="description">Descrição: </label>
  <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{ $category->description ?? old('description') }}</textarea>
</div>
<button type="submit" class="btn btn-dark">Enviar</button>