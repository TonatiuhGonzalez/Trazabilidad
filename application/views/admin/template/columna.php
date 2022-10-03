<!-- aqui comienza la columna donde iran las actividades -->
<!-- Sidebar Menu -->
<!-- Sidebar -->
 <!-- Main Sidebar Container -->
 
<aside class="main-sidebar sidebar-dark-info elevation-4" >
    <!-- Brand Logo -->
    <a href="<?php echo base_url()?>h" class="brand-link  navbar-info ">
     <i class="far fa-building ml-3 "></i>             
      <span class="brand-text font-weight-normal" style="font-size: 16px;">
      <?php echo  strtoupper($this->session->userdata('establecimiento')) ?>
     
      </span>
    </a>
  <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="mt-1 ml-3">
        <i class="nav-icon fas fa-user-alt" style="color: white;"></i>
      </div>
      <div class="info">
        <a  class="d-block">
        <?php echo   strtoupper($this->session->userdata('nombre')) ?>
        
        </a>
      </div>
    </div>
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu" data-accordion="false" >
        <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
        
              <!-- menu-open   active-->
        <li class="nav-item">
          <a href="<?php echo base_url() ?>Uc" class="nav-link" id="unidad">
            <span class="fas fa-fish"></span> <p>Actividades</p> 
          </a>            
        </li>

        <li class="nav-item" id="tanques">
          <a href="<?php echo base_url() ?>Ta" class="nav-link" id="tanques2" >
            <span class="fas fa-glass-whiskey"></span>  <p>  Tanques</p>            
          </a>            
        </li>

        <?php if($this->session->userdata('tipousuario')==2 || $this->session->userdata('tipousuario')==4 ){ ?>
          <li class="nav-item" >
            <a href="<?php echo base_url() ?>Ru" class="nav-link " id="administracion2">
              <span class="fas fa-user-friends"></span>
              <p>
                Usuarios
              </p>
            </a>
            
          </li>
        <?php } ?>
        
        <li class="nav-item " id="socios">
          <a href="<?php echo base_url() ?>Sr" class="nav-link" id="socios2" >
            <span class="fas fa-hands-helping"></span>
            <p>
              Clientes-Proveedores
            </p>
          </a>
        </li>

        
        <?php if($this->session->userdata('tipousuario')==2 || $this->session->userdata('tipousuario')==4 ){ ?>
        <li class="nav-item ">
          <a href="<?php echo base_url() ?>Vpe" class="nav-link" id="establecimiento">
            <i class="fas fa-map-marked-alt"></i>
            <p>
              Establecimientos             
            </p>
          </a>
          
        </li>

        <?php } ?>
        
        <li class="nav-item ">
          <a href="<?php echo base_url() ?>Al" class="nav-link" id="almacen">
            <i class=" fas fa-boxes"></i>
            <p>
              Almacén              
            </p>
          </a>          
        </li>

        <li class="nav-item">
          <a href="<?php echo base_url() ?>IniSige" class="nav-link">
            <i class="fas fa-chart-bar"></i> 
            <p>SIGETA - Análisis productivo</p> 
          </a> 
        </li>

      </ul>
    </nav>
      <!-- /.sidebar-menu -->
    <!-- /.sidebar-menu -->
  </div>
    <!-- /.sidebar -->
  </aside>