<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
    @if($label)
    {{ Form::label(null, $label, ['class' => 'control-label']) }} {!! ( isset($attributes['required']) ? '<span class="asteriskField">*</span>' : '' ) !!}
    @endif
    @if ( count($arrOptions) > 0 )
        @foreach( $arrOptions as $option )
            <label class="{!! ( isset($attributes['inline']) ? 'radio-inline' : 'radio' ) !!}">
                @if ( isset($value) && $value == $option->id )
                    {{ Form::radio($name,$option->id,true) }}
                @else
                    {{ Form::radio($name,$option->id,false,( isset($attributes['disabled']) ? ['disabled'] : false )) }}
                @endif
                    {{ $option->name }}
            </label>
        @endforeach
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