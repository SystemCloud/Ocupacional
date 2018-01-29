<nav>
	<div id="jCrumbs" class="breadCrumb module">
		<ul>
			<li><a href="#" onclick="cargar_layout('home')"><i class="icon-home"></i></a> </li>
			<li><a href="#" onclick="cargar_layout('clinicas')" > Clínicas</a></li>
			<li>Datos de Clinicas </li>
		</ul>
	</div>
</nav>
<div class="row-fluid">
	<div class="span12">
		<h3 class="heading">
			Clínicas del Sistema
		</h3>
		<div class="botonera">
			<div class="span10">
				<button onclick="cargar_layout('clinicas')" class="btn btn-lg btn-gebo" type="button" name="button"><i class="ion-android-home"></i></button>
				<button onclick="cargar_layout('clinicas/create')" class="btn btn-success" type="button" name="button"><i class="ion-android-add-circle" aria-hidden="true"></i> AGREGAR</button>
				<button onclick="edit_form('clinicas')" class="btn btn-warning" type="button" name="button"><i class="ion-edit" aria-hidden="true"></i> EDITAR</button>
				<button class="btn btn-info" type="button" name="button"><i class="ion-information-circled" aria-hidden="true"></i> DETALLES</button>
				<button class="btn btn-danger" type="button" name="button"><i class="ion-android-delete" aria-hidden="true"></i> ELIMINAR</button>
			</div>
			<div class="span2">
				<div class="input-prepend input-append text-right">
					<input type="text" size="16" width="100%" class="span5"><span class="add-on"><i class="ion-search"></i></span>
				</div>
			</div>
		</div>
		<div class="dataTables_wrapper form-inline" rol="grid">
			<table id="tbClinicas" class="table table-bordered" id="dt_gal" aria-describedby="dt_gal_info">

				<thead>
					<tr>
						<th>ID</th>
						<th>RAZON SOCIAL</th>
						<th>RUC</th>
						<th>DIRECCION</th>
						<th>TELEFONO</th>
					</tr>
				</thead>
				<tbody>
					@foreach($clinicas as $clinica)
					<tr>
						<td>{{$clinica->id}}</td>
						<td>{{$clinica->razon_social}}</td>
						<td>{{$clinica->ruc}}</td>
						<td>{{$clinica->direccion}}</td>
						<td>{{$clinica->telefono}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<div class="row" style="height:50px">
				<div class="span6">
					<div class="dataTables_info" id="dt_gal_info">Showing 1 to 6 of 6 entries</div>
				</div>
				<div class="span6">
					<div class="dataTables_paginate paging_bootstrap pagination">
						{{$clinicas->appends(Request::all())->render()}}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<input type="hidden" readonly name="codigo" id="codigo" value="">
<script type="text/javascript">
$(document).ready(function(){
	$("#tbClinicas tbody tr").click(function() {
		$("#tbClinicas tbody tr").removeClass('selected');
	  var codigo = $(this).find("td:first-child").text();
		$(this).addClass('selected');
		$('#codigo').val(codigo);
	});
});
</script>
