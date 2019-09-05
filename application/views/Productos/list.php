<div class="content-wrapper">
	<section class="content header">
	<div class="card">
		<div class="card-body">
		<h1>
			Producto
			<small>Listado</small>
		</h1>
		<section class="content">
		
				<div class="row">
					<div class="col-lg-12 text-right">
						<div class="card-title right">
						<a href="<?php echo base_url();?>Productos/add"	type= "submit" class="btn btn-primary btn-success"><span class="fa fa-plus"></span>Agregar Producto</a>
						</div>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-12">
						<table id="example1" class="table table-bordered btn-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Codigo</th>
									<th>Descripcion</th>
									<th>Precio Venta</th>
									<th>Precio Compra</th>
									<th>Stock</th>
									<th>Categoria</th>
									<th>Opciones</th>
								</tr>	
							</thead>
							<tbody>
									<?php if (!empty($productos)):?>
										<?php foreach ($productos as $key => $producto):?>
									<tr>
										<td><?php echo $key+1;?></td>
										<!--<td><?php echo $producto->id_producto;?></td>-->
										<td><?php echo $producto->codigo;?></td>
										<td><?php echo $producto->descripcion;?></td>
										<td><?php echo $producto->precio_venta;?></td>
										<td><?php echo $producto->precio_compra;?></td>
										<td><?php echo $producto->stock;?></td>
										<td><?php echo $producto->categoria;?></td>

										
										<td>
											<div class="btn-group">
												<button type="button" class="btn btn-info btn-view" data-toggle="modal" data-target="#modal-default" value="<?php echo $producto->id_producto;?>">
               										<span class="fa fa-search"></span>
             									</button>

												<a href="<?php echo base_url();?>Productos/edit/<?php echo $producto->id_producto;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
												<a href="<?php echo base_url();?>Productos/delete/<?php echo $producto->id_producto;?>" class="btn btn-danger btn-remove"><span class="fa fa-remove"></span></a>
												
											</div>
										</td>
									</tr>
								    <?php endforeach;?>
								    <?php endif;?>
							</tbody>
						</table>
					</div>
				</div>
	</div>	
		</section>
		</div>
	</section>
	
</div>

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Informacion del Producto</h3>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script type="text/javascript">

	var base_url= "<?php echo base_url();?>";
	$(".btn-view").on("click",function(){
        var id= $(this).val();
        $.ajax({
            url: base_url + "Productos/view/" + id,
            type: "POST",
            success:function(resp){
              $("#modal-default .modal-body").html(resp);
              //alert(resp);
            }
        });
    });

</script>