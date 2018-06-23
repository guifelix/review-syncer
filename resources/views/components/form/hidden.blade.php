<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
		{{ Form::text($name, $value, ( isset($attributes) ? array_merge( ['class' => 'form-control hidden'], $attributes ) : ['class' => 'form-control hidden'] ) ) }}
	@if ($errors->has($name))
		<span class="help-block">
			<strong>{{ $errors->first($name) }}</strong>
		</span>
	@endif
</div>