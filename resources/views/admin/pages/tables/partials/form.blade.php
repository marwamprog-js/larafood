@include('admin.includes.alerts')

<div class="form-group">
  <label for="identify">Identificador da Mesa: </label>
  <input type="text" name="identify" id="identify" class="form-control" placeholder="Identificador da Mesa: " value="{{ $table->identify ?? old('identify') }}">
</div>
<div class="form-group">
  <label for="description">Descrição: </label>
  <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{ $table->description ?? old('description') }}</textarea>
</div>
<button type="submit" class="btn btn-dark">Enviar</button>