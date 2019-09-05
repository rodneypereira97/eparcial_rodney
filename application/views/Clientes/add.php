<div class="content-wrapper">
	<section class="content header">
		<h1>
			Cliente
			<small>Nuevo</small>
		</h1>
		<section class="content">
			<div class="box box-solid">
				<div class="row">
					<div class="col-md-12">
					<form action="<?php echo base_url();?>Clientes/store" method="POST">
						<div class="form-group">
							<label for="razon_social">Razon Social:</label>
							<input type="text" class="form-control" id="razon_social" name="razon_social">
						</div>
						<div class="form-group">
							<label for="direccion">Direccion:</label>
							<input type="text" class="form-control" id="direccion" name="direccion">
						</div>
						<div class="form-group">
							<label for="nro_documento">Nº de Documento:</label>
							<input type="text" class="form-control" id="nro_documento" name="nro_documento">
						</div>
						<div class="form-group">
							<label for="telefono_cliente">Telefono:</label>
							<input type="text" class="form-control" id="telefono_cliente" name="telefono_cliente">
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