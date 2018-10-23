<?
  $last  = $this->uri->total_segments();
  $letak = $this->uri->segment(2);
  //$status = $this->session->userdata('status');
  $this->load->model('admin/Usersinmd');
  
?>
<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url().'assets/admin/dist/img/inven.png';?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $username;?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div> 
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MENU NAVIGASI</li>

        <li <?php if($letak=="dashboardct"){echo "class='active'";}?>>
          <a href="<?php echo base_url().'admin/dashboardct' ;?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
             
            </span>
          </a>
        </li>

        <li class='treeview'>
          <a href="#">
            <i class="fa fa-tablet"></i> <span>Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
       <?php   
              if ($this->Usersinmd->ishakok($username,'lmak'))
                { ?>
        <li <?php if($letak=="dashboardct"){echo "class='active'";}?>>
          <a href="<?php echo base_url().'admin/makananct' ;?>">
            <i class="fa fa-gulp"></i> <span>Makanan</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <?php   
         }    
              
          if ($this->Usersinmd->ishakok($username,'lmin'))
                {  
           ?>     
        <li <?php if($letak=="dashboardct"){echo "class='active'";}?>>
          <a href="<?php echo base_url().'admin/minumanct' ;?>">
            <i class="fa fa-gulp"></i> <span>Minuman</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
       <?php   
         }    
              
         
           ?> 
       

           

         

        </ul>
        </li>
        <li class='treeview'>
          <a href="#">
            <i class="fa fa-tablet"></i> <span>Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
         <?php   
              if ($this->Usersinmd->ishakok($username,'lpesanan'))
                { ?>
        <li <?php if($letak=="dashboardct"){echo "class='active'";}?>>
          <a href="<?php echo base_url().'admin/pesananct' ;?>">
            <i class="fa fa-gulp"></i> <span>Pesanan</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
           <?php } ?>

        

        </ul>
        </li>
        
    
        
                     
        <li class='treeview'>
          <a href="#">
            <i class="fa fa-tablet"></i> <span>Konfigurasi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <?php   
              if ($this->Usersinmd->ishakok($username,'loper'))
                { ?>
            <li <?php if($letak=="salesct"){echo "class='active'";}?>><a href="<?php echo base_url().'admin/Usersinct' ;?>"><i class="fa fa-user"></i>Konfigurasi User</a></li>
            <?php } ?>
          </ul>
        </li>
              
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>