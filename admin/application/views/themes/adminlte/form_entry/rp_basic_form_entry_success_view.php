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


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    
      <h1>
        Online Rupashree Prakalpa Application Form
      </h1>
      
      
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard fa-2x"></i>Home</a></li>
        <li><a href="login/logout"><i class="fa fa-sign-out fa-2x"></i> Logout</a></li>
      	</ol>
    </section>
    <br />

    <section class="content">
          
		<?php if($success_code == 1){?>
		<div class="col-sm-8 col-offset-sm-2">
		  <h1><?php echo $success_message;?></h1>
		</div>
		<?php } ?>
		<?php if($success_code == 0){?>
		<div class="col-sm-8 col-offset-sm-2">
		  <h1>Warning!</h1> <?php echo $success_message;?>
		</div>
		<?php } ?>
		
    </section>
    
  </div>
  
<?php $this->load->view($this->config->item('theme_uri').'layout/footer_view');?>


