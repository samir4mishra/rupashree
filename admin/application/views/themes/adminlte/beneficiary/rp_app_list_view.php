<?php $this->load->view($this->config->item('theme_uri').'layout/header_view'); ?>
<?php $this->load->view($this->config->item('theme_uri').'layout/left_menu_view'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Applicant List
      </h1>
     <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard fa-2x"></i>Home</a></li>
        <li><a href="login/logout"><i class="fa fa-sign-out fa-2x"></i> Logout</a></li>
      	</ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<div class="box">
<!--            <div class="box-header with-border">-->
<!--              <h3 class="box-title">List of trainee </h3>-->
<!--            </div>-->
            <!-- /.box-header -->
            <div class="box-body">
         <?php if(count($applicants)){?>
            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>Applicant Id</th>
                  <th>Applicant Name</th>
                  <th>Contact No.</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                <?php $i = 1; foreach($applicants as $applicant) { ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $applicant['applicant_id']; ?></td>
                  <td><?php echo trim($applicant['applicant_fname'] . ' ' .$applicant['applicant_mname'] . ' ' .$applicant['applicant_lname']); ?></td>
                  <td><?php echo $applicant['applicant_mobile_no']; ?></td>
                  <?php if($applicant['current_status'] == '6'){ ?>
                  <td>Uploaded</td>
                  <? } else if($applicant['current_status'] == '5') { ?>
                  <td>Declaration Page Uploaded</td>
                  <?php } else if($applicant['current_status'] == '4') { ?>
                  <td>Groom Photograph Uploaded</td>
                  <?php } else if($applicant['current_status'] == '3') { ?>
                  <td>Applicant Photograph Uploaded</td>
                  <?php } else if($applicant['current_status'] == '2') { ?>
                  <td>Groom Details Uploaded</td>
                  <?php } else if($applicant['current_status'] == '1') { ?>
                  <td>Applicant Details Uploaded</td>
                  <?php } ?>
                  <td></td>
                </tr>
                <?php $i++; } ?>
              </tbody>
              </table>
              </div>
             <?php } else { ?>
              <p>No record found</p>
              <?php } ?>
            </div>
            <!-- /.box-body -->

            <div class="box-footer clearfix">
             
            </div>
          </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view($this->config->item('theme_uri').'layout/footer_view'); ?>