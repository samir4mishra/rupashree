<?php $this->load->view($this->config->item('theme_uri').'layout/header_view'); ?>
<?php $this->load->view($this->config->item('theme_uri').'layout/left_menu_view'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard 
<!--        <small>it all starts here</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard fa-2x"></i>Home</a></li>
        <li><a href="login/logout"><i class="fa fa-sign-out fa-2x"></i> Logout</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    
    <?php 
	
	$this->load->view($this->config->item('theme_uri').'dashboard/main_view');
	
	?>
	<?php /*?><?php
	$stake_id = $this->session->userdata('stake_id_fk');
	
	if($stake_id == 1){ //Super Admin
		$this->load->view($this->config->item('theme_uri').'dashboard/main_view');
		
	} elseif($stake_id == 2) { //Department
		$this->load->view($this->config->item('theme_uri').'dashboard/main_view');
		
	} elseif($stake_id == 3) { //Minister
		$this->load->view($this->config->item('theme_uri').'dashboard/main_view');
		
	} elseif($stake_id == 4) { //Principal Secretary
		$this->load->view($this->config->item('theme_uri').'dashboard/main_view');
		
	} elseif($stake_id == 5) { //Joint Secretary
		$this->load->view($this->config->item('theme_uri').'dashboard/main_view');
		
	} elseif($stake_id == 6) { //Project Director
		$this->load->view($this->config->item('theme_uri').'dashboard/main_view');
		
	} elseif($stake_id == 7) { //Training Partner
		$this->load->view($this->config->item('theme_uri').'dashboard/main_view');
		
	} elseif($stake_id == 8) { //Training Centre
		$this->load->view($this->config->item('theme_uri').'dashboard/main_view');

	} elseif($stake_id == 9) { //Trainee
		$this->load->view($this->config->item('theme_uri').'dashboard/main_view');
		
	} elseif($stake_id == 10) { //Inspector
		$this->load->view($this->config->item('theme_uri').'dashboard/main_view');
		
	} elseif($stake_id == 11) { //Assessor
		$this->load->view($this->config->item('theme_uri').'dashboard/main_view');
		
	} elseif($stake_id == 12) { //Employer
		$this->load->view($this->config->item('theme_uri').'dashboard/main_view');
		
	} elseif($stake_id == 13) { //Webmaster
		$this->load->view($this->config->item('theme_uri').'dashboard/main_view');
		
	}

	?><?php */?>
      <!-- /.row -->
      <!-- Info boxes -->
      <div class="row">
      
      </div>
      
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view($this->config->item('theme_uri').'layout/footer_view'); ?>