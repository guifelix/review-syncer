<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
    @if($label)
        {{ Form::label($name, $label, ['class' => 'control-label']) }} {!! ( isset($attributes['required']) ? '<span class="asteriskField">*</span>' : '' ) !!}
    @endif
    <div class="input-group">
        @if (isset($addon['prefix']))
            <span class="input-group-addon">{!! $addon['prefix'] !!}</span>
        @endif
        @if(isset($attributes['popover']))
            @php
                $popover = $attributes['popover'];
            @endphp
            {{ array_forget($attributes, 'popover') }}
            {{ Form::text($name, $value, ( isset($attributes) ? array_merge( ['class' => 'form-control', 'data-toggle'=>'popover', 'title'=>trans('inputhint.' . $popover .'.titulo'), 'data-content'=>trans('inputhint.' . $popover . '.texto')], $attributes ) : ['class' => 'form-control'] ) ) }}
        @else
            {{ Form::text($name, $value, ( isset($attributes) ? array_merge( ['class' => 'form-control'], $attributes ) : ['class' => 'form-control'] ) ) }}
        @endif
        @if (isset($addon['sufix']))
        <span class="input-group-addon">{!! $addon['sufix'] !!}</span>
        @endif
    </div>
    @if ($errors->has($name))
        <span class="help-block">
            <strong>{{ $errors->first($name) }}</strong>
        </span>
    @endif
</div>