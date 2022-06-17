@if (Session::has("success_message"))
    <div class="success">
      {{Session::get("success_message")}}
    </div>
@endif

@if (count($errors) > 0)
    <div class="error">
      @foreach ($errors->all() as $error)
      <p>{{$error}}</p>
      @endforeach
    </div>
@endif
    