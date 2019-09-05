<div class="content-wrapper">
	<section class="content header">
		<h1>
			Categoria
			<small>Nuevo</small>
		</h1>
		<section class="content">
			<div class="row">
				<div class="col-lg-12 text text-right">
					
						<h4 class="card-title right">
							<a href="<?php echo base_url();?>Categorias" class="btn btn-danger bt"><span class="fa fa-danger"></span>ATRAS</a>
						</h4>
					
				</div>
			</div>
		</section>
		<section class="content">
			<div class="box box-solid">
				<div class="row">
					<div class="col-md-12">
					<form action="<?php echo base_url();?>Categorias/update" method="POST">
						<input type="hidden" value="<?php echo $categoria->id_categoria;?>"name="idCategoria"></input>
						<div class="form-group">
							<label for="descripcion">Descripcion:</label>
							<input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $categoria->descripcion ?>">
						</div>
						<div class="form-group">
							<label for="estado">Estado:</label>
							<input type="text" class="form-control" id="estado" name="estado"value="<?php echo $categoria->estado ?>">
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