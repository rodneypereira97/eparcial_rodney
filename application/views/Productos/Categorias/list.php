<div class="content-wrapper">
	<section class="content header">
		<h1>
			Categoria
			<small>Listado</small>
		</h1>
		<section class="content">
			<div class="box box-solid">
				<div class="row">
					<div class="col-md-12 text-right">
						<a href="<?php echo base_url();?>Categorias/add" class="btn btn-primary btn-success"><span class="fa fa-plus"></span>Agregar Categoria</a>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-12">
						<table id="example1" class="table table-bordered btn-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Descripcion</th>
									<th>Estado</th>
									<th>Opciones</th>
								</tr>	
							</thead>
							<tbody>
									<?php if (!empty($categorias)):?>
										<?php foreach ($categorias as $categoria):?>
									<tr>
										<td><?php echo $categoria->id_categoria;?></td>
										<td><?php echo $categoria->descripcion;?></td>
										<td><?php echo $categoria->estado;?></td>
										<td>
											<div class="btn-group">
												<button type="button" class="btn btn-info btn-view" data-toggle="modal" data-target="#modal-default" value="<?php echo $categoria->id_categoria; ?>">
               										<span class="fa fa-search"></span>
             									</button>

												<a href="<?php echo base_url();?>Categorias/edit/<?php echo $categoria->id_categoria;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
												<a href="<?php echo base_url();?>Categorias/delete/<?php echo $categoria->id_categoria;?>" class="btn btn-danger btn-remove"><span class="fa fa-remove"></span></a>
												
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

	</section>
	
</div>

<div class="modal" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title">Informacion de la Categoria</h2>
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
        var id_categoria= $(this).val();
        $.ajax({
            url: base_url + "Categorias/view/" + id_categoria,
            type: "POST",
            success:function(resp){
              $("#modal-default .modal-body").html(resp);
              //alert(resp);
            }
        });
    });

</script>