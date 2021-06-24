{{--if any data add , active, inactive this message will show--}}
@if(Session::get('success'))
    <div class="alert alert-info fade in">
        <a href="#" class="close" data-dismiss="alert">×</a>
        {{ Session::get('success') }}
    </div>
@endif
{{-- 
@if(Session::get('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
@endif --}}
{{--//validation error show--}}
@if($errors->any())
    @foreach($errors->all() as $error)
    <div class="alert alert-danger fade in">
        <a href="#" class="close" data-dismiss="alert">×</a>
        {{ $error }}
    </div>
    @endforeach
@endif