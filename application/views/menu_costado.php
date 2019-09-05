  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo base_url();?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
      <span class="brand-text font-weight-light">4to Politecnica</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url();?>dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Rodney Pereira</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
           <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Panel de Control
              </p>
            </a>
            
          </li>
          
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link  ">
              <i class="nav-icon fa fa-cart-arrow-down nav-icon"></i>
              <p>
                Productos
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>Categorias" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Categorias</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url(); ?>Productos" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Productos</p>
                </a>
              </li>
              
            

            </ul>

          </li>

          <li class="nav-item has-treeview menu-open">
            <a href="<?php echo base_url(); ?>Clientes" class="nav-link ">
              <i class="nav-icon fa fa-child"></i>
              <p>
                Clientes
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>Clientes" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Clientes</p>
                </a>
              </li>

            </ul>
          </li>
          
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa fa-bar-chart"></i>
              <p>
                Ventas
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Nueva Venta</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>Ventas" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Ventas</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Reporte Ventas</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link ">
              <i class="nav-icon fa fa-cog"></i>
              <p>
                Configuracion
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Empresa</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Comprobantes</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Usuarios</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item">
            <a href="http://www.google.com" class="nav-link">
              <i class="nav-icon fa fa-th"></i>
              <p>
                Ayuda
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Notificaciones</h5>
      <p>Contenido notificaciones</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->
