<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }} {{$name}}">
    @if($label)
        {{ Form::label($name, $label, ['class' => 'control-label']) }} {!! ( isset($attributes['required']) ? '<span class="asteriskField">*</span>' : '' ) !!}
    @endif
    @if(isset($attributes['popover']))
        @php
            $popover = $attributes['popover'];
        @endphp
        {{ array_forget($attributes, 'popover') }}
        {{ Form::select($name, $arrOptions, $value, ( isset($attributes) ? array_merge( ['class' => 'form-control', 'data-toggle'=>'popover', 'title'=>trans('inputhinttittle.' . $popover), 'data-content'=>trans('inputhinttext.' . $popover)], $attributes ) : ['class' => 'form-control'] ) ) }}
    @else
        {{ Form::select($name, $arrOptions, $value, ( isset($attributes) ? array_merge( ['class' => 'form-control'], $attributes ) : ['class' => 'form-control'] ) ) }}
    @endif
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