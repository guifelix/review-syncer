<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
    {{ Form::label($name, $label) }} {!! ( isset($attributes['required']) ? '<span class="asteriskField">*</span>' : '' ) !!}
    {{ Form::file($name, ( isset($attributes) ? array_merge(['class'=>'file-loading'],$attributes) : ['class'=>'file-loading'] )) }}
    @if($help)
        <span class="help-block">
            <strong>{{$help}}</strong>
        </span>
    @endif
    @if ($errors->has($name))
        <span class="help-block">
            <strong>{{ $errors->first($name) }}</strong>
        </span>
    @endif
</div>