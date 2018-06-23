{{-- <div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}"> --}}

    @if($label == null)
        {{-- botoes padroes  --}}
        @if($name == 'pesquisar')
            {{ Form::button('<i class="fa fa-search"></i> Pesquisar',
                ( isset($attributes) 
                    ? array_merge( ['type' => 'button', 'class' => 'btn btn-primary'
                        , 'id' => 'pesquisar', 'nome' => 'pesquisar'], $attributes ) 
                    : ['type' => 'button', 'class' => 'btn btn-primary'
                        , 'id' => 'pesquisar', 'nome' => 'pesquisar'] 
                ))
            }}
        @elseif($name == 'novo')
            {{ Form::button('<i class="fa fa-plus-circle"></i> Novo',
                ( isset($attributes) 
                    ? array_merge( ['type' => 'button', 'class' => 'btn btn-primary'
                        , 'id' => 'novo', 'nome' => 'novo'], $attributes ) 
                    : ['type' => 'button', 'class' => 'btn btn-primary'
                        , 'id' => 'novo', 'nome' => 'novo'] 
                ))
            }}
        @endif
    @else
        {{-- botoes fora do padrao --}}
        @php
            $icon = $attributes['icon'];
        @endphp
        {{ array_forget($attributes, 'icon') }}

        {{ Form::button('<i class="fa fa-'.$icon.'"></i>' . $label,
                ( isset($attributes) 
                    ? array_merge( ['type' => 'button', 'class' => 'btn btn-warning'
                        , 'id' => $name, 'nome' => $name], $attributes ) 
                    : ['type' => 'button', 'class' => 'btn btn-primary'
                        , 'id' => $name, 'nome' => $name] 
                ))
        }}
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
{{-- </div> --}}