@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<div class="panel panel-herbalife">
			<div class="panel-body">
				 <div class="row">
				 	<div class="col-md-12">
				 		<ol class="breadcrumb">
				 		  <li><a href="{{ route('paises.index') }}">Paises</a></li>
						  <li><a href="/pais-departamento/{{ $municipio->departamento->pais->id }}">{{ $municipio->departamento->pais->nombre }}</a></li>
						  <li><a href="/departamento-municipio/{{ $municipio->departamento->id }}">{{ $municipio->departamento->nombre }}</a></li>
						</ol>				 		
				 	</div>
				 	<div class="col-md-12 text-center"><h4>Editar municipio</h4></div>
				 </div>
				 <div class="row">
				 	<div class="col-md-12">
				 		<form method="POST" id="form_registro" action="{{ url('municipios', [$municipio->id]) }}" autocomplete="off">
	                    <input name="_method" type="hidden" value="PUT">
				 		{{ csrf_field() }}
				 			<input type="hidden" name="municipio" value="{{ $municipio->id }}">

					 		<div class="form-group {{ $errors->has('nombre') ? ' has-error' : '' }}">
					 			<label class="control-label">Nombre</label>
					 			<input type="text" name="nombre" class="form-control" value="{{ $municipio->nombre }}">
					 			@if ($errors->has('nombre'))
                                    <span class="help-block">
                                        {{ $errors->first('nombre') }}
                                    </span>
                                @endif
					 		</div>
					 		<div class="form-group">
					 			<button type="submit" class="btn btn-success pull-right" id="guardar">Editar</button>
					 		</div>
				 		</form>
				 	</div>
				 </div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('js')
<script type="text/javascript">
$('#form_registro').on('submit',function(){
    $('#guardar').text('Editando...');
});
</script>
@endsection