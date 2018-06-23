<div class="form-group">
  @if($label)
    {{ Form::label($name, $label) }}
  @endif
  {{-- <p class="form-control-static" id="{{ $name }}">{{ $value }}</p> --}}
  @if($number)
  	<p class="form-control-static" style="text-align:right" id="{{ $name }}">{{ $value }}</p>
  @else
  	<p class="form-control-static" id="{{ $name }}">{{ $value }}</p>
  @endif
  @if($help)
    <span class="help-block">
        <strong>{{$help}}</strong>
    </span>
  @endif
</div>