<div class="content-wrapper">
	<section class="content header">
		<h1>
			Cliente
			<small>Nuevo</small>
		</h1>
		<section class="content">
			<div class="row">
				<div class="col-lg-12 text text-right">
					
						<h4 class="card-title right">
							<a href="<?php echo base_url();?>Clientes" class="btn btn-danger bt"><span class="fa fa-danger"></span>ATRAS</a>
						</h4>
					
				</div>
			</div>
		<section class="content">
			<div class="box box-solid">
				<div class="row">
					<div class="col-md-12">
					<form action="<?php echo base_url();?>Clientes/update" method="POST">
						<input type="hidden" value="<?php echo $cliente->id_cliente;?>"name="idCliente"></input>
						<div class="form-group">
							<label for="razon_social">Razon Social:</label>
							<input type="text" class="form-control" id="razon_social" name="razon_social" value="<?php echo $cliente->razon_social ?>">
						</div>
						<div class="form-group">
							<label for="direccion">Direccion:</label>
							<input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $cliente->direccion ?>">
						</div>
						<div class="form-group">
							<label for="nro_documento">Nº de Documento:</label>
							<input type="text" class="form-control" id="nro_documento" name="nro_documento" value="<?php echo $cliente->nro_documento ?>">
						</div>
						<div class="form-group">
							<label for="telefono_cliente">Telefono:</label>
							<input type="text" class="form-control" id="telefono_cliente" name="telefono_cliente" value="<?php echo $cliente->telefono_cliente ?>">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success btn_flat">Guardar</button>
						</div>
					</form>
					</div>
				</div>
			</div>
		</section>

	</section>
	
</div>