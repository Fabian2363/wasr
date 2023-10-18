<div class="form-group">
	{{ Form::label(' documento_cabeza_hogar', 'Nombre de la etiqueta') }}
	{{ Form::text(' documento_cabeza_hogar', null, ['class' => 'form-control', 'id' => 'name']) }}
</div>



<h5>A: Plantas condimentarías y aromáticas </h5>
<div class="">
	<ul class="">
		@foreach($permissions as $permission)
	    <li>
	        <label>
	        {{ Form::checkbox('plancondiaroma[]', $permission->id_PanCod, null) }}
	        {{ $permission->nombre }}
	        
	        </label>
	    </li>
	    @endforeach
    </ul>
</div>
<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>