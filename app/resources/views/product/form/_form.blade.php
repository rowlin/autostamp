
    {{ csrf_field() }}

    <div class="form-group">
        <label for="code">Product code</label>
        <input name="code" type="text" id="code" class="form-control @if($errors->has('code')) is-invalid @else is-valid @endif"
               value="{{ isset($product) ? $product->code : old('code') ?? ''  }}" required>
    </div>

    <div class="form-group">
        <label for="name">Product name</label>
        <input name="name" type="text" id="name" class="form-control @if($errors->has('name')) is-invalid @else is-valid @endif"
               value="{{ isset($product) ? $product->name : old('name') ?? ''  }}" required >
    </div>

    <div class="form-group">
        <label for="image">Product image</label>

        <div class="flex-start">
        @if(isset($product->image))
            <div id="image-box" >
                <img src="{{ url($product->image) }}" alt="Images" width="100">
                <div class="text-center">
                    <input type="checkbox" name="has_delete" id="has_delete" >
                    <label for="has_delete">Delete</label>
                </div>
            </div>
        @endif
            <div class="ml-10">
        <input type="file" name="image" id="image" value="{{ old('image') }}"
               accept="image/png, image/jpeg , image/jpg"
               class="@if($errors->has('image')) is-invalid @else is-valid @endif">
        <sub>JPG, JPEG or PNG with resolution from 100x100px to 500x500px. Max file size is 250Kb.</sub>
            </div>
        </div>
        @if($errors->has('image'))
            <div class="alert alert-danger" role="alert">
                @foreach($errors->get('image') as $message )
                    <p>{{ $message }}</p>
                @endforeach
            </div>
        @endif


    </div>

    <label for="description">Description</label>
    <textarea name="description" id="description" class="form-control @if($errors->has('description')) is-invalid @else is-valid @endif" cols="30" rows="3">{{ isset($product) ? $product->description :  old('image') ?? ''}}</textarea>

