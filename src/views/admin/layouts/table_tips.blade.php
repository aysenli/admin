@if ($errors->all())
<div class="callout callout-success">
      <h4>
      @foreach($errors->all() as $error)
      {{ $error }}
      @endforeach
      </h4>
  </div>
@endif