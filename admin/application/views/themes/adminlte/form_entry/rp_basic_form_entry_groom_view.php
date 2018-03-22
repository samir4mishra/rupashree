<?php $this->load->view($this->config->item('theme_uri').'layout/header_view');?>
<?php $this->load->view($this->config->item('theme_uri').'layout/left_menu_view'); ?>
<?php
    
    $applicant_id = $this->session->userdata('d_cd');
	 
?>

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
  <script src="<?php echo base_url();?>/admin/assets/js/rp_groom_form_entry_validation.js"></script>
  
  <script src="<?php echo $this->config->item('theme_uri');?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>


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
    	<div class="alert alert-info">
    <?php echo $success_message;?>
    	</div>
    <?php } ?>
    <?php if($success_code == 0){?>
    	<div class="alert alert-warning">
     <?php echo $success_message;?>
    	</div>
    <?php } ?>
    
    	<?php 
			
			$attributes = array("name"=>"basic_form_entry_groom","id"=>"basic_form_entry_groom","autocomplete"=> "off"); // setting attributes of form
			
			echo form_open('admin/form_entry/BasicFormEntry/save_groom_details/',$attributes); ?>
			
			
            <div class="box box-info">
                <div class="box-header with-border">
                <h3 class="box-title"> 
                <font color="#660033"><strong> System Generated Rupashree Unique Applicant ID&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $applicant_id ;?></strong></font>
               </h3>
                </div>
            </div>

    	    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><strong>Groom's Personal Details</strong></h3>
            </div>
            
            <!-- groom's Name -->
            
            <div class="box-body">
                <div class="form-group">
    	            <label>Groom's Name&nbsp;<font color="red">*</font></label>
        	      <div class="row">
            	    <div class="col-sm-4">
                	  <input type="text" class="form-control" placeholder="First Name" name="groom_first_name" id="groom_first_name" autocomplete="off" value="<?php echo set_value('groom_first_name'); ?>">
					  <span class="error_info" id="groom_first_msg"></span>
                      <font color="red"><?php echo form_error('groom_first_name'); ?></font>
					</div>
                
                <div class="col-sm-4">
                  <input type="text" class="form-control" placeholder="Middle Name" name="groom_middle_name" id="groom_middle_name" autocomplete="off" value="<?php echo set_value('groom_middle_name'); ?>">
                </div>

                
                <div class="col-sm-4">
                  <input type="text" class="form-control" placeholder="Last Name" name="groom_last_name" id="groom_last_name" autocomplete="off" value="<?php echo set_value('groom_last_name'); ?>">
	              <span class="error_info" id="groom_last_msg"></span>
                  <font color="red"><?php echo form_error('groom_last_name'); ?></font>
                </div>
                
              </div>
            </div>
            </div>
            
            
            	<!-- Mother's Name -->
			<div class="box-body">
	           	
                <div class="form-group">
    	            <label>Mother's Name&nbsp;<font color="red">*</font></label>
        	      <div class="row">
                  
            	    <div class="col-sm-4">
                	  <input type="text" class="form-control" placeholder="First Name" name="groom_mother_f_name" id="groom_mother_f_name" autocomplete="off" value="<?php echo set_value('groom_mother_f_name'); ?>">
					  <span class="error_info" id="mother_first_msg"></span>
                      <font color="red"><?php echo form_error('groom_mother_f_name'); ?></font>
					</div>
                    
                    <div class="col-sm-4">
	                  <input type="text" class="form-control" placeholder="Middle Name" name="groom_mother_m_name" id="groom_mother_m_name" autocomplete="off" value="<?php echo set_value('groom_mother_m_name'); ?>">
					</div>
                
                <div class="col-sm-4">
                  <input type="text" class="form-control" placeholder="Last Name" name="groom_mother_l_name" id="groom_mother_l_name" autocomplete="off" value="<?php echo set_value('groom_mother_l_name'); ?>">
                  <span class="error_info" id="mother_last_msg"></span>
                  <font color="red"><?php echo form_error('groom_mother_l_name'); ?></font>
                </div>
                
              </div>
            </div>
            </div>
            
            	<!-- Father's Name -->
			<div class="box-body">
	           	
                <div class="form-group">
    	            <label>Father's Name&nbsp;<font color="red">*</font></label>
        	      <div class="row">
            	    <div class="col-sm-4">
                	  <input type="text" class="form-control" placeholder="First Name" autocomplete="off" name="groom_father_f_name" id="groom_father_f_name" value="<?php echo set_value('groom_father_f_name'); ?>">
					  <span class="error_info" id="father_first_msg"></span>
                      <font color="red"><?php echo form_error('groom_father_f_name'); ?></font>
					</div>
                
                <div class="col-sm-4">
                  <input type="text" class="form-control" placeholder="Middle Name" autocomplete="off"name="groom_father_m_name" id="groom_father_m_name" value="<?php echo set_value('groom_father_m_name'); ?>">
                </div>
                
                <div class="col-sm-4">
                  <input type="text" class="form-control" placeholder="Last Name" autocomplete="off"name="groom_father_l_name" id="groom_father_l_name" value="<?php echo set_value('groom_father_l_name'); ?>">
				  <span class="error_info" id="father_last_msg"></span>
                  <font color="red"><?php echo form_error('groom_father_l_name'); ?></font>
                </div>
                
              </div>
            </div>
            </div>
            	
			<div class="box-body">
	           	
                <div class="form-group">
    	            <label>Guardian's Name&nbsp;(If Parent is not alive)</label>
        	      <div class="row">
            	    <div class="col-sm-4">
                	  <input type="text" class="form-control" placeholder="First Name" autocomplete="off" name="groom_guardian_f_name" id="groom_guardian_f_name" value="<?php echo set_value('groom_guardian_f_name'); ?>">
					  <span class="error_info" id="guardian_first_msg"></span>
					</div>
                
                <div class="col-sm-4">
                  <input type="text" class="form-control" placeholder="Middle Name" autocomplete="off" name="groom_guardian_m_name" id="groom_guardian_m_name" value="<?php echo set_value('groom_guardian_m_name'); ?>">

                </div>
                
                <div class="col-sm-4">
                  <input type="text" class="form-control" placeholder="Last Name" autocomplete="off"name="groom_guardian_l_name" id="groom_guardian_l_name" value="<?php echo set_value('groom_guardian_l_name'); ?>">
					  <span class="error_info" id="guardian_last_msg"></span>
                </div>
                
              </div>
            </div>
            </div>
            
            <div class="box-body">
	           	
                <div class="form-group">
                	<div class="row">
						<div class="col-sm-4">
                        	<label>Relationship With Guardian</label>
                        </div>                    
	    	            <div class="col-sm-4">
                        	<label>Date Of Birth&nbsp;<font color="red">*</font></label>
                        </div>
                        
                        <div class="col-sm-4">
                        	<label>Mobile Number&nbsp;<font color="red">*</font></label>
                        </div>
                        
                        <!--<div class="col-sm-4">
                        	<label>Proposed Date Of Marriage&nbsp;<font color="red">*</font></label>
                        </div>-->
                    </div>
                    
        	      <div class="row">
                  	
                    <div class="col-sm-4">
                    	<select class="form-control" name="groom_relation_with_guardian" id="groom_relation_with_guardian">
							<option value="">---Please Select Relationship With Guardian---</option>
    	                     <?php foreach ($gurds as $gurd) { ?>

                            <option value="<?php echo $gurd->code; ?>"><?php echo $gurd->description; ?></option>

                            <?php } ?>  
						</select>
                    </div>
                    
            	    <div class="col-sm-4">
                	  <input type="text" class="form-control" id="datepicker_dob_groom" placeholder="Date Of Birth" autocomplete="off" name="datepicker_dob_groom" value="<?php echo set_value('datepicker_dob_groom'); ?>">
					  <span class="error_info" id="dob_groom_msg"></span>
                      <font color="red"><?php echo form_error('datepicker_dob_groom'); ?></font>
					</div>
                
                <div class="col-sm-4">
                	<input type="text" class="form-control" placeholder="Mobile Number" autocomplete="off" id="groom_mobile" name="groom_mobile" maxlength="10" value="<?php echo set_value('groom_mobile'); ?>">
                 	<span class="error_info" id="groom_mobile_msg"></span>
                    <font color="red"><?php echo form_error('groom_mobile'); ?></font>
                </div>
                
                
                  <!--<input type="text" class="form-control" placeholder="Mobile Number" autocomplete="off" id="applicant_mobile" name="applicant_mobile" maxlength="10">
                  <span class="error_info" id="applicant_mobile_msg"></span>-->
                
              </div>
            </div>
            </div>
            
	            
            
            
            <div class="box-body">
	           	
                <div class="form-group">
                	<div class="row">
	    	            <div class="col-sm-4">
                        	<label>E-Mail ID<!--&nbsp;<font color="red">*</font>--></label>
                        </div>
					</div>
                    
        	      <div class="row">
                	
                  <div class="col-sm-4">
                	  <input type="text" class="form-control" id="groom_e_mail_id" placeholder="E-Mail ID" autocomplete="off" name="groom_e_mail_id" value="<?php echo set_value('groom_e_mail_id'); ?>">
						<span class="error_info" id="groom_e_mail_id_msg"></span>
                        <font color="red"><?php echo form_error('groom_e_mail_id'); ?></font>
					</div>
				</div>
            </div>
            </div>
            
            <!--<div class="box-body">
	           	
                <div class="form-group">
                	<div class="row">
	    	            <div class="col-sm-4">
                        	<label>Highest Educational Qualification&nbsp;<font color="red">*</font></label>
                        </div>
                        <div class="col-sm-4">
                        	<label>Caste&nbsp;<font color="red">*</font></label>
                        </div>
                        <div class="col-sm-4">
                        	<label>Religion&nbsp;<font color="red">*</font></label>
                        </div>
                    </div>
                    
        	      <div class="row">
            	    <div class="col-sm-4">
                 	<select class="form-control" name="applicant_education" id="applicant_education">
                 	  <option value="NA">---Please Select Highest Educational Qualification---</option>
                        <option value="DV">---Dynamic Values---</option>
					</select>
					  <span class="error_info" id="applicant_education_msg"></span>
					</div>
                
                <div class="col-sm-4">
					<select class="form-control" name="applicant_caste" id="applicant_caste">
                    	<option value="NA">---Please Select Caste---</option>
                        <option value="DV">---Dynamic Values---</option>
					</select>
                    <span class="error_info" id="applicant_caste_msg"></span>
                </div>
                
                <div class="col-sm-4">
					<select class="form-control" name="applicant_religion" id="applicant_religion">
                    	<option value="NA">---Please Select Religion---</option>
                        <option value="DV">---Dynamic Values---</option>
					</select>
                  <span class="error_info" id="applicant_religion_msg"></span>
                </div>
                
              </div>
            </div>
            </div>-->
            
		</div>
        
        
        
        	<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Groom's Address Details</h3>
            </div>
            
            <div class="box-header with-border">
              <h2 class="box-title">Permanent Address</h2>
            </div>
            
            <div class="box-body">
	           	
                <div class="form-group">
                	<div class="row">
	    	            <div class="col-sm-4">
                        	<label>Village&nbsp;<font color="red">*</font></label>
                        </div>
                        <div class="col-sm-4">
                        	<label>House Number&nbsp;<font color="red">*</font></label>
                        </div>
                        <div class="col-sm-4">
                        	<label>Street&nbsp;<font color="red">*</font></label>
                        </div>
                    </div>
                    
        	      <div class="row">
            	    <div class="col-sm-4">
                	  <input type="text" class="form-control" name ="groom_village" id="groom_village" placeholder="Village Name" autocomplete="off" value="<?php echo set_value('groom_village'); ?>">
					  <span class="error_info" id="groom_village_msg"></span>
                      <font color="red"><?php echo form_error('groom_village'); ?></font>
					</div>
                
                <div class="col-sm-4">
                  <input type="text" class="form-control" placeholder="House Number" id="groom_house_number" name="groom_house_number" autocomplete="off" value="<?php echo set_value('groom_house_number'); ?>">
                  <span class="error_info" id="groom_house_number_msg"></span>
                  <font color="red"><?php echo form_error('groom_house_number'); ?></font>
                </div>
                
                <div class="col-sm-4">
                  <input type="text" class="form-control" placeholder="Street Name" id="groom_street_name" name="groom_street_name" autocomplete="off" value="<?php echo set_value('groom_street_name'); ?>">
                  <span class="error_info" id="groom_street_name_msg"></span>
                  <font color="red"><?php echo form_error('groom_street_name'); ?></font>
                </div>
                
              </div>
            </div>
            </div>
            
            <div class="box-body">
	           	
                <div class="form-group">
                	<div class="row">
	    	            <div class="col-sm-4">
                        	<label>Post Office&nbsp;<font color="red">*</font></label>
                        </div>
                        <div class="col-sm-4">
                        	<label>Police Station&nbsp;<font color="red">*</font></label>
                        </div>
                        <div class="col-sm-4">
                        	<label>Gram Panchayat/Ward&nbsp;<font color="red">*</font></label>
                        </div>
                    </div>
                    
        	      <div class="row">
            	    <div class="col-sm-4">
                	  <input type="text" class="form-control" id="groom_post_office" name="groom_post_office" placeholder="Post Office" autocomplete="off" value="<?php echo set_value('groom_post_office'); ?>">
					  <span class="error_info" id="groom_post_office_msg"></span>
                      <font color="red"><?php echo form_error('groom_post_office'); ?></font>
					</div>
                
                <div class="col-sm-4">
                  <input type="text" class="form-control" placeholder="Police Station" id="groom_police_station" autocomplete="off" name="groom_police_station" value="<?php echo set_value('groom_police_station'); ?>">
                  <span class="error_info" id="groom_police_station_msg"></span>
                  <font color="red"><?php echo form_error('groom_police_station'); ?></font>
                </div>
                
                <div class="col-sm-4">
                  <input type="text" class="form-control" placeholder="Gram Panchayat / Ward" id="groom_grmp_ward" autocomplete="off" name="groom_grmp_ward" value="<?php echo set_value('groom_grmp_ward'); ?>">
                  <span class="error_info" id="groom_grmp_ward_msg"></span>
                  <font color="red"><?php echo form_error('groom_grmp_ward'); ?></font>
                </div>
                
              </div>
            </div>
            </div>
            
            <div class="box-body">
	           	
                <div class="form-group">
                	<div class="row">
	    	            <div class="col-sm-4">
                        	<label>District&nbsp;<font color="red">*</font></label>
                        </div>
                        <div class="col-sm-4">
                        	<label>Block/Municipality/Corporation&nbsp;<font color="red">*</font></label>
                        </div>
                        <div class="col-sm-4">
                        	<label>Pin Code&nbsp;<font color="red">*</font></label>
                        </div>
                    </div>
                    
        	      <div class="row">
            	    <div class="col-sm-4">
                 	<select class="form-control" name="groom_district" id="groom_district">
                    	<option value="">---Please Select District---</option>
                        <?php foreach ($districts as $district) { ?>

                        <option value="<?php echo $district->schcd; ?>"><?php echo $district->district_name; ?></option>

                        <?php } ?>
					</select>
					  <span class="error_info" id="groom_district_msg"></span>
                      <font color="red"><?php echo form_error('groom_district'); ?></font>
					</div>
                
                <div class="col-sm-4">
					<select class="form-control" name="groom_bmc" id="groom_bmc">
                    	<option value="">---Please Select Block/Municipality/Corporation---</option>
                        
					</select>
                    <span class="error_info" id="groom_bmc_msg"></span>
                    <font color="red"><?php echo form_error('groom_bmc'); ?></font>
                </div>
                
                <div class="col-sm-4">
					<input class="form-control" type="text" name="groom_pin_code" id="groom_pin_code" placeholder="Pin Code" autocomplete="off" maxlength="6" value="<?php echo set_value('groom_pin_code'); ?>">
                  <span class="error_info" id="groom_pin_code_msg"></span>
                  <font color="red"><?php echo form_error('groom_pin_code'); ?></font>
                </div>
                
              </div>
            </div>
            </div>
            
			<div class="box-header with-border">
              <h2 class="box-title">Current Address (&nbsp;Same as Permanent Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="perm_curr_add_same" id="perm_curr_add_same" autocomplete="off"  value="1">&nbsp;)</h2>
            </div>
            
            <div class="box-body">
	           	
                <div class="form-group">
                	<div class="row">
	    	            <div class="col-sm-4">
                        	<label>Village&nbsp;<font color="red">*</font></label>
                        </div>
                        <div class="col-sm-4">
                        	<label>House Number&nbsp;<font color="red">*</font></label>
                        </div>
                        <div class="col-sm-4">
                        	<label>Street&nbsp;<font color="red">*</font></label>
                        </div>
                    </div>
                    
        	      <div class="row">
            	    <div class="col-sm-4">
                	  <input type="text" class="form-control" name ="c_groom_village" id="c_groom_village" placeholder="Village Name" autocomplete="off" value="<?php echo set_value('c_groom_village'); ?>">
					  <span class="error_info" id="c_village_msg"></span>
                      <font color="red"><?php echo form_error('c_groom_village'); ?></font>
					  <span class="error_info"></span>
					</div>
                
                <div class="col-sm-4">
                  <input type="text" class="form-control" placeholder="House Number" id="c_groom_house_number" name="c_groom_house_number" autocomplete="off" value="<?php echo set_value('c_groom_house_number'); ?>">
                  <span class="error_info" id="c_house_number_msg"></span>
                  <font color="red"><?php echo form_error('c_groom_house_number'); ?></font>
                </div>
                
                <div class="col-sm-4">
                  <input type="text" class="form-control" placeholder="Street Name" id="c_groom_street_name" autocomplete="off" name="c_groom_street_name" value="<?php echo set_value('c_groom_street_name'); ?>">
                  <span class="error_info" id="c_groom_street_name_msg"></span>
                  <font color="red"><?php echo form_error('c_groom_street_name'); ?></font>
                </div>
                
              </div>
            </div>
            </div>
            
            <div class="box-body">
	           	
                <div class="form-group">
                	<div class="row">
	    	            <div class="col-sm-4">
                        	<label>Post Office&nbsp;<font color="red">*</font></label>
                        </div>
                        <div class="col-sm-4">
                        	<label>Police Station&nbsp;<font color="red">*</font></label>
                        </div>
                        <div class="col-sm-4">
                        	<label>Gram Panchayat/Ward&nbsp;<font color="red">*</font></label>
                        </div>
                    </div>
                    
        	      <div class="row">
            	    <div class="col-sm-4">
                	  <input type="text" class="form-control" id="c_groom_post_office" name="c_groom_post_office" placeholder="Post Office" autocomplete="off" value="<?php echo set_value('c_groom_post_office'); ?>">
					  <span class="error_info" id="c_groom_post_office_msg"></span>
                      <font color="red"><?php echo form_error('c_groom_post_office'); ?></font>
					</div>
                
                <div class="col-sm-4">
                  <input type="text" class="form-control" placeholder="Police Station" id="c_groom_police_station" autocomplete="off" name="c_groom_police_station" value="<?php echo set_value('c_groom_police_station'); ?>">
                  <span class="error_info" id="c_groom_police_station_msg"></span>
                  <font color="red"><?php echo form_error('c_groom_police_station'); ?></font>
                </div>
                
                <div class="col-sm-4">
                  <input type="text" class="form-control" placeholder="Gram Panchayat / Ward" id="c_groom_grmp_ward" autocomplete="off" name="c_groom_grmp_ward" value="<?php echo set_value('c_groom_grmp_ward'); ?>">
                  <span class="error_info" id="c_groom_grmp_ward_msg"></span>
                  <font color="red"><?php echo form_error('c_groom_grmp_ward'); ?></font>
                </div>
                
              </div>
            </div>
            </div>
            
            <div class="box-body">
	           	
                <div class="form-group">
                	<div class="row">
	    	            <div class="col-sm-4">
                        	<label>District&nbsp;<font color="red">*</font></label>
                        </div>
                        <div class="col-sm-4">
                        	<label>Block/Municipality/Corporation&nbsp;<font color="red">*</font></label>
                        </div>
                        <div class="col-sm-4">
                        	<label>Pin Code&nbsp;<font color="red">*</font></label>
                        </div>
                    </div>
                    
        	      <div class="row">
            	    <div class="col-sm-4">
                 	<select class="form-control" name="c_groom_district" id="c_groom_district">
                    	<option value="">---Please Select District---</option>
                        <?php foreach ($cur_districts as $cur_district) { ?>

                        <option value="<?php echo $cur_district->schcd; ?>"><?php echo $cur_district->district_name; ?></option>

                        <?php } ?>
					</select>
					  <span class="error_info" id="c_groom_district_msg"></span>
                      <font color="red"><?php echo form_error('c_groom_district'); ?></font>
					</div>
                
                <div class="col-sm-4">
					<select class="form-control" name="c_groom_bmc" id="c_groom_bmc" style="display: block">
                    	<option value="">---Please Select Block/Municipality/Corporation---</option>
                        
					</select>
                     <input type="hidden" id="c_groom_bmc_hid" name="c_groom_bmc_hid" class="form-control" >
                    <span class="error_info" id="c_groom_bmc_msg"></span>
                    <font color="red"><?php echo form_error('c_groom_bmc_hid'); ?></font>
                </div>
                
                <div class="col-sm-4">
					<input class="form-control" type="text" name="c_groom_pin_code" id="c_groom_pin_code" placeholder="Pin Code" autocomplete="off" maxlength="6" value="<?php echo set_value('c_groom_pin_code'); ?>">
                  <span class="error_info" id="c_groom_pin_code_msg"></span>
                  <font color="red"><?php echo form_error('c_groom_pin_code'); ?></font>
                </div>
                
              </div>
            </div>
            </div>
		</div>
        
        <div class="box">
        	<div class="box-body">
            	<div class="form-group" style="text-align: right;">
    	          
                <button type="submit" name="btn_form_entry_submit" id="btn_form_entry_submit" class="btn btn-info">Save Details</button>
                <button type="reset" name="btn_form_entry_cancel" id="btn_form_entry_cancel" class="btn btn-danger">Cancel</button>                   
        	      <!--<div class="row">
					<div class="col-sm-6"></div>
                    <div class="col-sm-6"></div>
				  </div>-->
                  
				</div>
			</div>
		</div>
        
        <?php echo form_close(); ?>
      
    </section>

    
    
  </div>
  
<?php $this->load->view($this->config->item('theme_uri').'layout/footer_view');?>

<script type="text/javascript">
        $(document).ready(function() {
            $('#groom_district').on('change', function() {

                var district_id = $(this).val();
               
                    if(district_id) {
                    //alert(district_id);
                    $.ajax({
                        url: "./form_entry/BasicFormEntry/get_block",
                        type: "GET",
                        data: {'district_id' : district_id},
                        dataType: "json",
                        success:function(data) {
                            //alert(data);
                            $('#groom_bmc').html(data);
                        }
                    });
                }else{
                    
                }

            });
        });
</script>

<script type="text/javascript">
        $(document).ready(function() {
            $('#c_groom_district').on('change', function() {

                var cur_district_id = $(this).val();
               
                    if(cur_district_id) {
                    //alert(cur_district_id);
                    $.ajax({
                        url: "./form_entry/BasicFormEntry/get_cur_block",
                        type: "GET",
                        data: {'cur_district_id' : cur_district_id},
                        dataType: "json",
                        success:function(data) {
                            //alert(data);
                            $('#c_groom_bmc').html(data);
                        }
                    });
                }else{
                    
                }

            });
        });
</script>