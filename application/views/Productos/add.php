<div class="content-wrapper">
	<section class="content header">
		<h1>
			Producto
			<small>Nuevo</small>
		</h1>
		<section class="content">
			<div class="box box-solid">
				<div class="row">
					<div class="col-md-12">
					<form action="<?php echo base_url();?>Productos/store" method="POST">
						<div class="form-group">
							<label for="codigo">Codigo:</label>
							<input type="text" class="form-control" id="codigo" name="codigo">
						</div>
						<div class="form-group">
							<label for="descripcion">Descripcion:</label>
							<input type="text" class="form-control" id="descripcion" name="descripcion">
						</div>
						<div class="form-group">
							<label for="precio_venta">Precio Venta:</label>
							<input type="text" class="form-control" id="precio_venta" name="precio_venta">
						</div>
						<div class="form-group">
							<label for="precio_compra">Precio Compra:</label>
							<input type="text" class="form-control" id="precio_compra" name="precio_compra">
						</div>
						<div class="form-group">
							<label for="stock">Stock:</label>
							<input type="text" class="form-control" id="stock" name="stock">
						</div>
						<div class="form-group">
							<label for="categoria">Categoria:</label>
							<select name="categoria" id="categoria" class="form-control">
								<?php foreach($categorias as $categoria):?>
									<option value="<?php echo($categoria->id_categoria)?>"><?php echo($categoria->descripcion)?></option>
								<?php endforeach?>
							</select>
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