<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
    {{ Form::label($name[0], $label[0], ['class' => 'control-label']) }} {!! ( isset($attributes[0]['required']) || isset($attributes[1]['required']) ? '<span class="asteriskField">*</span>' : '' ) !!}
    <div class="input-group input-daterange">
        @if(isset($attributes[0]['popover']) || isset($attributes[1]['popover']))
            @php
                $popover = $attributes['popover'];
            @endphp
            {{ array_forget($attributes, 'popover') }}
            {{ Form::text($name[0], $value[0], ( isset($attributes[0]) ? array_merge( ['class' => 'form-control', 'data-toggle'=>'popover', 'title'=>trans('inputhint.' . $popover[0] .'.titulo'), 'data-content'=>trans('inputhint.' . $popover[0] . '.texto')], $attributes[0] ) : ['class' => 'form-control'] ) ) }}
            <div class="input-group-addon">À</div>
            {{ Form::text($name[1], $value[1], ( isset($attributes[1]) ? array_merge( ['class' => 'form-control', 'data-toggle'=>'popover', 'title'=>trans('inputhint.' . $popover[1] .'.titulo'), 'data-content'=>trans('inputhint.' . $popover[1] . '.texto')], $attributes[1] ) : ['class' => 'form-control'] ) ) }}

        @else
            {{ Form::text($name[0], $value[0], ( isset($attributes[0]) ? array_merge( ['class' => 'form-control'], $attributes[0] ) : ['class' => 'form-control'] ) ) }}
            <div class="input-group-addon">À</div>
            {{ Form::text($name[1], $value[1], ( isset($attributes[1]) ? array_merge( ['class' => 'form-control'], $attributes[1] ) : ['class' => 'form-control'] ) ) }}
        @endif
    </div>
    @if($help[0])
        <span class="help-block">
                <strong>{{$help[0]}}</strong>
            </span>
    @endif
    @if ($errors->has($name[0]))
        <span class="help-block">
            <strong>{{ $errors->first($name[0]) }}</strong>
        </span>
    @endif
</div>

