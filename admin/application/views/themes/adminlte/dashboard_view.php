<?php $this->load->view($this->config->item('theme_uri').'layout/header_view');?>
<?php $this->load->view($this->config->item('theme_uri').'layout/left_menu_view'); ?>

<style>
	.error_info
	{
		display:none;
		color:#F55;
	}
	input
	{
		text-transform:uppercase;
	}
</style>       

  <script src="<?php echo base_url();?>/admin/assets/js/jquery-3.3.1.min.js"></script>
  
  
  <script src="<?php echo $this->config->item('theme_uri');?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    
      <h1>
        Dash Board 
      </h1>
      
      
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard fa-2x"></i>Home</a></li>
        <li><a href="login/logout"><i class="fa fa-sign-out fa-2x"></i> Logout</a></li>
      	</ol>
    </section>
    <br />

    <section class="content">
    
      
    </section>

    
    
  </div>
  
<?php $this->load->view($this->config->item('theme_uri').'layout/footer_view');?>
