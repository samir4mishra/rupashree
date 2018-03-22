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
	<!-- Datepicker -->
  <link rel="stylesheet" href="<?php echo $this->config->item('theme_uri');?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  
  <script src="<?php echo base_url();?>admin/assets/js/jquery-3.3.1.min.js"></script>
  <script src="<?php echo base_url();?>admin/assets/js/rp_form_entry_validation.js"></script>
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
	
    	<?php 
			
			$attributes = array("name"=>"basic_form_entry","id"=>"basic_form_entry","autocomplete"=> "off"); // setting attributes of form
			
			echo form_open('admin/form_entry/BasicFormEntry',$attributes); ?>
            
            
            <div class="box box-warning">
            <div class="box-header with-border">
          
              <h3 class="box-title"><strong>Rupashree Prakalpa Form Details</strong></h3>
            </div>
            

            
            <div class="box-body">
	           	
                <div class="form-group">
                	<div class="row">
                    	
                        <div class="col-sm-6">
    	                	<label>Year&nbsp;<font color="red">*</font></label>
						</div>
                        
                        <div class="col-sm-6">
                        	<label>Form Serial Number&nbsp;<font color="red">*</font></label>
                        </div>
                        
                    </div>
                    
        	      	<div class="row">
                  
            	    	<div class="col-sm-6">
                        
                        <select class="form-control" name="applicant_registration_year" id="applicant_registration_year" readonly="readonly">
                    			<option value="">---Please Select Year---</option>
                            <?php 
								
								for($i = intval(date('Y')); $i <= (intval(date('Y'))); $i++)
								{?>
			                        <option value="<?=$i?>"
                                    <?php 
										
										if(date('Y') == $i)
										?>		
                                        selected="selected"							
                                        <?php 
                                     ?>
                                    ><?=$i." - ".(intval(substr($i,2,2))+1);?></option>
                                <?php } ?>
							</select>
                            
                            <span class="error_info" id="applicant_registration_year_msg"></span>
					</div>
                    
                                    	
                    <div class="col-sm-6">
                  		<input type="text" class="form-control" placeholder="Form Serial Number" autocomplete="off" id="frm_serial_number" name="frm_serial_number" value="<?php echo set_value('frm_serial_number'); ?>">
                  		<span class="error_info" id="frm_serial_number_msg"></span>
                        <font color="red"><?php echo form_error('frm_serial_number'); ?></font>
                	</div>
                             
              </div>
            </div>
            </div>
            
		</div>
        
    	    <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title"><strong>Applicant's Personal Details</strong></h3>
            </div>
            
            <!-- Applicant's Name -->
            
            <div class="box-body">
                <div class="form-group">
    	            <label>Applicant's Name&nbsp;<font color="red">*</font></label>
        	      <div class="row">
            	    <div class="col-sm-4">
                	  <input type="text" class="form-control" placeholder="First Name" name="app_first_name" id="app_first_name" autocomplete="off" value="<?php echo set_value('app_first_name'); ?>">
					  <span class="error_info" id="app_first_msg"></span>
                      <font color="red"><?php echo form_error('app_first_name'); ?></font>
					</div>
                
                <div class="col-sm-4">
                  <input type="text" class="form-control" placeholder="Middle Name" name="app_middle_name" id="app_middle_name" autocomplete="off" value="<?php echo set_value('app_middle_name'); ?>">                  
                </div>

                
                <div class="col-sm-4">
                  <input type="text" class="form-control" placeholder="Last Name" name="app_last_name" id="app_last_name" autocomplete="off" value="<?php echo set_value('app_last_name'); ?>">
	              <span class="error_info" id="app_last_msg"></span>
                  <font color="red"><?php echo form_error('app_last_name'); ?></font>
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
                	  <input type="text" class="form-control" placeholder="First Name" name="app_mother_f_name" id="app_mother_f_name" autocomplete="off" value="<?php echo set_value('app_mother_f_name'); ?>">
					  <span class="error_info" id="mother_first_msg"></span>
                      <font color="red"><?php echo form_error('app_mother_f_name'); ?></font>
					</div>
                    
                    <div class="col-sm-4">
	                  <input type="text" class="form-control" placeholder="Middle Name" name="app_mother_m_name" id="app_mother_m_name" autocomplete="off" value="<?php echo set_value('app_mother_m_name'); ?>">
					</div>
                
                <div class="col-sm-4">
                  <input type="text" class="form-control" placeholder="Last Name" name="app_mother_l_name" id="app_mother_l_name" autocomplete="off" value="<?php echo set_value('app_mother_l_name'); ?>">
                  <span class="error_info" id="mother_last_msg"></span>
                  <font color="red"><?php echo form_error('app_mother_l_name'); ?></font>
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
                	  <input type="text" class="form-control" placeholder="First Name" autocomplete="off" name="app_father_f_name" id="app_father_f_name" value="<?php echo set_value('app_father_f_name'); ?>">
					  <span class="error_info" id="father_first_msg"></span>
                      <font color="red"><?php echo form_error('app_father_f_name'); ?></font>
					</div>
                
                <div class="col-sm-4">
                  <input type="text" class="form-control" placeholder="Middle Name" autocomplete="off"name="app_father_m_name" id="app_father_m_name" value="<?php echo set_value('app_father_m_name'); ?>">
                </div>
                
                <div class="col-sm-4">
                  <input type="text" class="form-control" placeholder="Last Name" autocomplete="off"name="app_father_l_name" id="app_father_l_name" value="<?php echo set_value('app_father_l_name'); ?>">
					  <span class="error_info" id="father_last_msg"></span>
                      <font color="red"><?php echo form_error('app_father_l_name'); ?></font>
                </div>
                
              </div>
            </div>
            </div>
            	
                <div class="box-body">
                <div class="form-group">
    	            <label>Guardian's Name&nbsp;(If Parent is not alive)</label>
        	      <div class="row">
            	    <div class="col-sm-4">
                	  <input type="text" class="form-control" placeholder="First Name" autocomplete="off" name="app_guardian_f_name" id="app_guardian_f_name" value="<?php echo set_value('app_guardian_f_name'); ?>">
					</div>
                
                <div class="col-sm-4">
                  <input type="text" class="form-control" placeholder="Middle Name" autocomplete="off"name="app_guardian_m_name" id="app_guardian_m_name" value="<?php echo set_value('app_guardian_m_name'); ?>">
                </div>
                
                <div class="col-sm-4">
                  <input type="text" class="form-control" placeholder="Last Name" autocomplete="off"name="app_guardian_l_name" id="app_guardian_l_name" value="<?php echo set_value('app_guardian_l_name'); ?>">
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
                        	<label>Proposed Date Of Marriage&nbsp;<font color="red">*</font></label>
                        </div>
                    </div>
                    
        	      <div class="row">
                  	
                    <div class="col-sm-4">
                    	<select class="form-control" name="applicant_relation_with_guardian" id="applicant_relation_with_guardian">
							<option value="">---Please Select Relationship With Guardian---</option>
                            <?php foreach ($gurds as $gurd) { ?>

                            <option value="<?php echo $gurd->code; ?>"><?php echo $gurd->description; ?></option>

                            <?php } ?> 
						</select>
                    </div>
                    
            	    <div class="col-sm-4">
                	  <input type="text" class="form-control" id="datepicker_dob_applicant" placeholder="Date Of Birth" autocomplete="off" name="datepicker_dob_applicant" value="<?php echo set_value('datepicker_dob_applicant'); ?>">
					  <span class="error_info" id="dob_applicant_msg"></span>
                      <font color="red"><?php echo form_error('datepicker_dob_applicant'); ?></font>
					</div>
                
                <div class="col-sm-4">
                  <input type="text" class="form-control" placeholder="Proposed Date Of Marriage" id="datepicker_pdom_applicant" autocomplete="off" name="datepicker_pdom_applicant" value="<?php echo set_value('datepicker_pdom_applicant'); ?>">
                  <span class="error_info" id="pdom_applicant_msg"></span>
                  <font color="red"><?php echo form_error('datepicker_pdom_applicant'); ?></font>
                </div>
                
              </div>
            </div>
            </div>
            
            
            <div class="box-body">
	           	
                <div class="form-group">
                	<div class="row">
                        <div class="col-sm-4">
                        	<label>Mobile Number&nbsp;<font color="red">*</font></label>
                        </div>
                        
	    	            <div class="col-sm-4">
                        	<label>E-Mail ID<!--&nbsp;<font color="red">*</font>--></label>
                        </div>
                        
                        <div class="col-sm-4">
                        	<label>Family Income&nbsp;<font color="red">*</font></label>
                        </div>                        
                        
                    </div>
                    
        	      <div class="row">
                	
                    <div class="col-sm-4">
                  		<input type="text" class="form-control" placeholder="Mobile Number" autocomplete="off" id="applicant_mobile" name="applicant_mobile" maxlength="10" value="<?php echo set_value('applicant_mobile'); ?>">
                  		<span class="error_info" id="applicant_mobile_msg"></span>
                        <font color="red"><?php echo form_error('applicant_mobile'); ?></font>
                	</div>
                                  
            	    <div class="col-sm-4">
                	  <input type="text" class="form-control" id="applicant_e_mail_id" placeholder="E-Mail ID" autocomplete="off" name="applicant_e_mail_id" value="<?php echo set_value('applicant_e_mail_id'); ?>">
						<span class="error_info" id="applicant_e_mail_id_msg"></span>
                        <font color="red"><?php echo form_error('applicant_e_mail_id'); ?></font>
					</div>
                
                <div class="col-sm-4">
                  <input type="text" class="form-control" placeholder="Family Income" id="applicant_family_income" autocomplete="off" name="applicant_family_income" maxlength="6" value="<?php echo set_value('applicant_family_income'); ?>">
                  <span class="error_info" id="applicant_family_income_msg"></span>
                  <font color="red"><?php echo form_error('applicant_family_income'); ?></font>
                </div>
              </div>
            </div>
            </div>
            
            <div class="box-body">
	           	
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
                 	  <option value="">---Please Select Highest Educational Qualification---</option>
                        <?php foreach ($edus as $edu) { ?>

                        <option value="<?php echo $edu->code; ?>"><?php echo $edu->description; ?></option>

                        <?php } ?>
					</select>
					  <span class="error_info" id="applicant_education_msg"></span>
                      <font color="red"><?php echo form_error('applicant_education'); ?></font>
					</div>

                
                <div class="col-sm-4">
					<select class="form-control" name="applicant_caste" id="applicant_caste">
                    	<option value="">---Please Select Caste---</option>
                        <?php foreach ($casts as $cast) { ?>

                        <option value="<?php echo $cast->code; ?>"><?php echo $cast->description; ?></option>

                        <?php } ?>
					</select>
                    <span class="error_info" id="applicant_caste_msg"></span>
                    <font color="red"><?php echo form_error('applicant_caste'); ?></font>
                </div>
                
                <div class="col-sm-4">
					<select class="form-control" name="applicant_religion" id="applicant_religion">
                    	<option value="">---Please Select Religion---</option>
                        <?php foreach ($religions as $religion) { ?>

                        <option value="<?php echo $religion->code; ?>"><?php echo $religion->description; ?></option>

                        <?php } ?>
					</select>
                  <span class="error_info" id="applicant_religion_msg"></span>
                  <font color="red"><?php echo form_error('applicant_religion'); ?></font>
                </div>
                
              </div>
            </div>
            </div>
            
		</div>
        
        	<div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title"><strong>Applicant's Address Details</strong></h3>
            </div>
            
            <div class="box-header with-border">
              <h2 class="box-title"><strong>Permanent Address</strong></h2>
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
                	  <input type="text" class="form-control" name ="applicant_village" id="applicant_village" placeholder="Village Name" autocomplete="off" value="<?php echo set_value('applicant_village'); ?>">
					  <span class="error_info" id="applicant_village_msg"></span>
                      <font color="red"><?php echo form_error('applicant_village'); ?></font>
					</div>
                
                <div class="col-sm-4">
                  <input type="text" class="form-control" placeholder="House Number" id="applicant_house_number" name="applicant_house_number" autocomplete="off" value="<?php echo set_value('applicant_house_number'); ?>">
                  <span class="error_info" id="applicant_house_number_msg"></span>
                  <font color="red"><?php echo form_error('applicant_house_number'); ?></font>
                </div>
                
                <div class="col-sm-4">
                  <input type="text" class="form-control" placeholder="Street Name" id="applicant_street_name" name="applicant_street_name" autocomplete="off" value="<?php echo set_value('applicant_street_name'); ?>">
                  <span class="error_info" id="applicant_street_name_msg"></span>
                  <font color="red"><?php echo form_error('applicant_street_name'); ?></font>
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
                	  <input type="text" class="form-control" id="applicant_post_office" name="applicant_post_office" placeholder="Post Office" autocomplete="off" value="<?php echo set_value('applicant_post_office'); ?>">
					  <span class="error_info" id="applicant_post_office_msg"></span>
                      <font color="red"><?php echo form_error('applicant_post_office'); ?></font>
					</div>
                
                <div class="col-sm-4">
                  <input type="text" class="form-control" placeholder="Police Station" id="applicant_police_station" autocomplete="off" name="applicant_police_station" value="<?php echo set_value('applicant_police_station'); ?>">
                  <span class="error_info" id="applicant_police_station_msg"></span>
                  <font color="red"><?php echo form_error('applicant_police_station'); ?></font>
                </div>
                
                <div class="col-sm-4">
                  <input type="text" class="form-control" placeholder="Gram Panchayat / Ward" id="applicant_grmp_ward" autocomplete="off" name="applicant_grmp_ward" value="<?php echo set_value('applicant_grmp_ward'); ?>">
                  <span class="error_info" id="applicant_grmp_ward_msg"></span>
                  <font color="red"><?php echo form_error('applicant_grmp_ward'); ?></font>
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
                 	<select class="form-control" name="applicant_district" id="applicant_district">
                    	<option value="">---Please Select District---</option>
                        <?php foreach ($districts as $district) { ?>

                        <option value="<?php echo $district->schcd; ?>"><?php echo $district->district_name; ?></option>

                        <?php } ?>
					</select>
					  <span class="error_info" id="applicant_district_msg"></span>
                      <font color="red"><?php echo form_error('applicant_district'); ?></font>
					</div>
                
                <div class="col-sm-4">
					<select class="form-control" name="applicant_bmc" id="applicant_bmc">
                    	<option value="">---Please Select Block/Municipality/Corporation---</option>
					</select>
                    <span class="error_info" id="applicant_bmc_msg"></span>
                    <font color="red"><?php echo form_error('applicant_bmc'); ?></font>
                </div>
                
                <div class="col-sm-4">
					<input class="form-control" type="text" name="applicant_pin_code" id="applicant_pin_code" placeholder="Pin Code" autocomplete="off" maxlength="6" value="<?php echo set_value('applicant_pin_code'); ?>">
                  <span class="error_info" id="applicant_pin_code_msg"></span>
                  <font color="red"><?php echo form_error('applicant_pin_code'); ?></font>
                </div>
                
              </div>
            </div>
            </div>
            
			<div class="box-header with-border">
              <h2 class="box-title"><strong>Current Address (Please tick if Current Address&nbsp;Same as Permanent Address&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="checkbox" name="perm_curr_add_same" id="perm_curr_add_same" autocomplete="off" value="1">&nbsp;)</strong></h2>
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
                	  <input type="text" class="form-control" name ="c_applicant_village" id="c_applicant_village" placeholder="Village Name" autocomplete="off" value="<?php echo set_value('c_applicant_village'); ?>">
					  <span class="error_info" id="c_village_msg"></span>
					  <span class="error_info"></span>
                      <font color="red"><?php echo form_error('c_applicant_village'); ?></font>
					</div>
                
                <div class="col-sm-4">
                  <input type="text" class="form-control" placeholder="House Number" id="c_applicant_house_number" name="c_applicant_house_number" autocomplete="off" value="<?php echo set_value('c_applicant_house_number'); ?>">
                  <span class="error_info" id="c_house_number_msg"></span>
                  <font color="red"><?php echo form_error('c_applicant_house_number'); ?></font>
                </div>
                
                <div class="col-sm-4">
                  <input type="text" class="form-control" placeholder="Street Name" id="c_applicant_street_name" autocomplete="off" name="c_applicant_street_name" value="<?php echo set_value('c_applicant_street_name'); ?>">
                  <span class="error_info" id="c_applicant_street_name_msg"></span>
                  <font color="red"><?php echo form_error('c_applicant_street_name'); ?></font>
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
                	  <input type="text" class="form-control" id="c_applicant_post_office" name="c_applicant_post_office" placeholder="Post Office" autocomplete="off" value="<?php echo set_value('c_applicant_post_office'); ?>">
					  <span class="error_info" id="c_applicant_post_office_msg"></span>
                      <font color="red"><?php echo form_error('c_applicant_post_office'); ?></font>
					</div>
                
                <div class="col-sm-4">
                  <input type="text" class="form-control" placeholder="Police Station" id="c_applicant_police_station" autocomplete="off" name="c_applicant_police_station" value="<?php echo set_value('c_applicant_police_station'); ?>">
                  <span class="error_info" id="c_applicant_police_station_msg"></span>
                  <font color="red"><?php echo form_error('c_applicant_police_station'); ?></font>
                </div>
                
                <div class="col-sm-4">
                  <input type="text" class="form-control" placeholder="Gram Panchayat / Ward" id="c_applicant_grmp_ward" autocomplete="off" name="c_applicant_grmp_ward" value="<?php echo set_value('c_applicant_grmp_ward'); ?>">
                  <span class="error_info" id="c_applicant_grmp_ward_msg"></span>
                  <font color="red"><?php echo form_error('c_applicant_grmp_ward'); ?></font>
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
                 	<select class="form-control" name="c_applicant_district" id="c_applicant_district">
                    	<option value="">---Please Select District---</option>
                        <?php foreach ($cur_districts as $cur_district) { ?>

                        <option value="<?php echo $cur_district->schcd; ?>"><?php echo $cur_district->district_name; ?></option>

                        <?php } ?>
					</select>
					  <span class="error_info" id="c_applicant_district_msg"></span>
                      <font color="red"><?php echo form_error('c_applicant_district'); ?></font>
					</div>
                
                <div class="col-sm-4">
					<select class="form-control" name="c_applicant_bmc" id="c_applicant_bmc" style="display: block">
                    	<option value="">---Please Select Block/Municipality/Corporation---</option>
					</select>
                    <span class="error_info" id="c_applicant_bmc_msg"></span>
                    <font color="red"><?php echo form_error('c_applicant_bmc'); ?></font>
                </div>
                
                <div class="col-sm-4">
					<input class="form-control" type="text" name="c_applicant_pin_code" id="c_applicant_pin_code" placeholder="Pin Code" autocomplete="off" maxlength="6" value="<?php echo set_value('c_applicant_pin_code'); ?>">
                  <span class="error_info" id="c_applicant_pin_code_msg"></span>
                  <font color="red"><?php echo form_error('c_applicant_pin_code'); ?></font>
                </div>
                
              </div>
            </div>
            </div>
		</div>
        
        	<div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title"><strong>Applicant's Bank Account Details</strong></h3>
            </div>
         
            <div class="box-body">
	           	
                <div class="form-group">
                	<div class="row">
	    	            <div class="col-sm-4">
                        	<label>Bank Name&nbsp;<font color="red">*</font></label>
                        </div>
                        <div class="col-sm-4">
                        	<label>Account Number&nbsp;<font color="red">*</font></label>
                        </div>
                        
                        <div class="col-sm-4">
                        	<label>Branch Name&nbsp;<font color="red">*</font></label>
                        </div>
					</div>
                    
                    <div class="row">
            	    	<div class="col-sm-4">
	                 		<select class="form-control" name="applicant_bank_name" id="applicant_bank_name">
    	                		<option value="">---Please Select Bank Name---</option>
                                <?php foreach ($bank_names as $bank_name) { ?>
                                <option value="<?php echo $bank_name->code."*".$bank_name->account_length; ?>"><?php echo $bank_name->description; ?></option>
                                <?php } ?>
							</select>
        	        	    <span class="error_info" id="applicant_bank_name_msg"></span>
                            <font color="red"><?php echo form_error('applicant_bank_name'); ?></font>
						</div>
                        
                        <div class="col-sm-4">
							<input type="text" class="form-control" name="applicant_account_no" id="applicant_account_no" placeholder="Account Number" autocomplete="off" value="<?php echo set_value('applicant_account_no'); ?>">
	    	                <span class="error_info" id="applicant_account_no_msg"></span>
                            <font color="red"><?php echo form_error('applicant_account_no'); ?></font>
        		        </div>
                		
                        <div class="col-sm-4">
							<input type="text" class="form-control" name="applicant_bank_branch_name" id="applicant_bank_branch_name" placeholder="Branch Name" autocomplete="off" value="<?php echo set_value('applicant_bank_branch_name'); ?>"> 
        		            <span class="error_info" id="applicant_bank_branch_name_msg"></span>
                            <font color="red"><?php echo form_error('applicant_bank_branch_name'); ?></font>
						</div>
					</div>
				</div>
                
                <div class="form-group">
                	<div class="row">
	    	            <div class="col-sm-6">
                        	<label>IFS Code&nbsp;<font color="red">*</font></label>
                        </div>
                        
                        <div class="col-sm-6">
                        	<label>Branch Address&nbsp;<font color="red">*</font></label>
                        </div>
                                                
					</div>
                    
                    <div class="row">
                      
                        <div class="col-sm-6">
							<div class="col-sm-6">
                    			<input type="text" class="form-control" name="applicant_ifsc_bank_code" id="applicant_ifsc_bank_code" placeholder="Bank Code" autocomplete="off" readonly="readonly" maxlength="5"> 
		                    </div>
                    
							<div class="col-sm-6">
                		    	<input type="text" class="form-control" name="applicant_ifs_branch_code" id="applicant_ifs_branch_code" placeholder="Enter last six digits" autocomplete="off" maxlength="6" value="<?php echo set_value('applicant_ifs_branch_code'); ?>">
                        		<span class="error_info" id="applicant_ifs_branch_code_msg"></span>
                                <font color="red"><?php echo form_error('applicant_ifs_branch_code'); ?></font>
                    		</div>
        		        </div>
                		
                        <div class="col-sm-6">
							<input type="text" class="form-control" name="applicant_bank_branch_address" id="applicant_bank_branch_address" placeholder="Branch Address" autocomplete="off" value="<?php echo set_value('applicant_bank_branch_address'); ?>"> 
        		            <span class="error_info" id="applicant_bank_branch_address_msg"></span>
                            <font color="red"><?php echo form_error('applicant_bank_branch_address'); ?></font>
						</div>
					</div>
				</div>
                
              </div>
            </div>
            
            <div class="box">
        	<div class="box-body">
            	<div class="form-group" style="text-align: right;">
    	          
                  <button type="submit" name="btn_form_entry_submit" id="btn_form_entry_submit" class="btn btn-info">Generate Applicant ID</button>
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
            $('#applicant_district').on('change', function() {

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
                            $('#applicant_bmc').html(data);
							$('#c_applicant_bmc').html(data);
                        }
                    });
                }else{
                    
                }

            });
        });
</script>
<script type="text/javascript">
        $(document).ready(function() {
            $('#c_applicant_district').on('change', function() {

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
                            $('#c_applicant_bmc').html(data);
                        }
                    });
                }else{
                    
                }

            });
        });
</script>
<script type="text/javascript">
        $(document).ready(function() {
            $('#applicant_bank_name').on('change', function() {
					
                	
					var bank_name = $(this).val();
					
               		var val = bank_name.split("*");
					
					if(val[0] != '') {
                    //alert(bank_name);
                    $.ajax({
                        url: "./form_entry/BasicFormEntry/get_ifsc",
                        type: "GET",
                        data: {'bank_id' : val[0]},
                        dataType: "json",
                        success:function(data) {
                           // alert(data);
                            $('#applicant_ifsc_bank_code').val(data);
							$("#applicant_account_no_msg").html("Account Number must not be less than "+val[1]+" digits");
							$("#applicant_account_no_msg").show();
							$("#applicant_account_no").attr("maxlength",val[1]);
                        }
                    });
                }
				else
				{
         			$("#applicant_account_no").attr("placeholder","Account Number");
                }

            });
        });
</script>
