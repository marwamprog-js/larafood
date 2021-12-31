@include('admin.includes.alerts')

<div class="form-group">
  <label for="image">Imagem: </label>
  <input type="file" name="image" id="image" class="form-control">
</div>
<div class="form-group">
  <label for="title">* Produto: </label>
  <input type="text" name="title" id="title" class="form-control" placeholder="Produto: " value="{{ $product->title ?? old('title') }}">
</div>
<div class="form-group">
  <label for="title">* Preço: </label>
  <input type="text" name="price" id="price" class="form-control" placeholder="Preço: " value="{{ $product->price ?? old('price') }}">
</div>
<div class="form-group">
  <label for="description">* Descrição: </label>
  <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{ $product->description ?? old('description') }}</textarea>
</div>
<button type="submit" class="btn btn-dark">Enviar</button>