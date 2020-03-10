



<h1>Registro de usuario</h1>
<form action="<?php echo base_url(); ?>cpersona/guardar" method="POST">
	<table>
		<tr>
			<td><label>Codigo</label></td>
			<td><Input type="text" id="dni" name="txtCodigo" maxlenght="2"></td>
		</tr>
		<tr>
			<td><label>Nombre</label></td>
			<td><Input type="text" name="txtNombre">	</td>
		</tr>
		<tr>
			<td><label>Apellido</label></td>
			<td><Input type="text" name="txtApellido">	</td>
		</tr>
		<tr>
			<td colspan="2"><label>Usuario</label></td>
		</tr>
		<tr>
			<td><label>Usuario</label></td>
			<td><Input type="text" name="txtUser">	</td>
		</tr>
				<tr>
			<td><label>Clave</label></td>
			<td><Input type="password" name="txtPass">	</td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="Guardar"></td>
		</tr>
	</table>
</form>
<a href="<?php echo base_url();?>clogin">Loguearse</a>
<br><br><br>
<div class="row">
	<div class="col-sm-7">
		<div class="card-body">
				<table id="tblPersonas" class="table table-bordered">
					<thead>
						<tr>
							<th style="width: 10px">#</th>
							<th>Nombre</th>
							<th>Paterno</th>
							<th>Materno</th>
							<th>DNI</th>
							<th>Ciudad</th>
						</tr>
					</thead>
				</table>
		</div>
	</div>
	<div class="col-sm-1">
		<div class="card-body">
			<button type="submit" id="btnGetPersonas" class="btn btn-info">Buscar</button>
		</div>

	</div>
</div>


<!-- script que inicializa variable con base url para usar en js -->
<script type="text/javascript">
	var baseurl = "<?php echo base_url(); ?>";
</script>
