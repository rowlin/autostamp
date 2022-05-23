

{{ csrf_field() }}

<div class="form-group">
    <label for="name">Store name</label>
    <input name="name" type="text" id="code" class="form-control @if($errors->has('name')) is-invalid @else is-valid @endif"
           value="{{ isset($store) ? $store->name : old('name') ?? ''  }}" required>
</div>

<label for="description">Description</label>
<textarea name="description" id="description" class="form-control @if($errors->has('description')) is-invalid @else is-valid @endif" cols="30" rows="3">{{ isset($store) ? $store->description :  old('description') ?? ''}}</textarea>

