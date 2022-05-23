@if (\Session::has('success'))
    <div class="alert alert-success">
        <ul style="list-style-type: none;">
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul style="list-style-type: none;">
            <li>{{  $errors }}</li>
        </ul>
    </div>
@endif
