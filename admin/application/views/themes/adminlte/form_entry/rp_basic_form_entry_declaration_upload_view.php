<?php $this->load->view($this->config->item('theme_uri').'layout/header_view');?>
<?php $this->load->view($this->config->item('theme_uri').'layout/left_menu_view'); ?>
<?php $applicant_id = $this->session->userdata('d_cd'); ?>
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
	<script src="<?php echo base_url();?>admin/assets/js/jquery-3.3.1.min.js"></script>
	<script src="<?php echo base_url();?>admin/assets/js/rp_declaration_upload_validation.js"></script>
    <script src="<?php echo $this->config->item('theme_uri');?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    
      <h1>
        Online Rupashree Prakalpa Application Form
      </h1>
      <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard fa-2x"></i>Home</a></li>
        <li><a href="login/logout"><i class="fa fa-sign-out fa-2x"></i> Logout</a></li>
      	</ol>
    </section>
    
    <br />

   	<section class="content">
    
		<?php if($success_code == 1){?>
        	<div class="alert alert-success">
        <?php echo $success_message;?>
        	</div>
        <?php } ?>
        <?php if($success_code == 0){?>
        	<div class="alert alert-warning">
        <?php echo $success_message;?>
       	 	</div>
        <?php } ?>    
    
    
	<?php if ($this->session->flashdata('success')) 
			{?>
		<pre><strong><?php echo $this->session->flashdata('success'); ?></strong></pre>
	<?php } ?>
	<?php if ($this->session->flashdata('error')) { ?>
    	<pre><strong><?php echo $this->session->flashdata('error'); ?></strong></pre>
<?php } ?>
    	<?php 
			
			$attributes = array("name"=>"basic_form_entry_declaration_upload","id"=>"basic_form_entry_declaration_upload"); // setting attributes of form
			
			echo form_open_multipart('admin/form_entry/BasicFormEntry/insert_declaration',$attributes); ?>
            
            <div class="box box-warning">
            	<div class="box-header with-border">
           		 <h3 class="box-title"> 
            		<font color="#660033"><strong>Rupashree Unique Applicant ID&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $applicant_id ;?></strong></font>
            	 </h3>
           		 </div>
            </div>
            
            <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Declarations & Certifications</h3>
            </div>
            
            <div class="box-body">
	           	
                <div class="form-group">
                	<div class="row">
	    	            <div class="col-sm-4">
                        	<label>Select Applicant Age Proof Document&nbsp;<font color="red">*</font></label>
                        </div>
                        <div class="col-sm-4">
                        	<label>Document Number&nbsp;</label>
                        </div>
                        <div class="col-sm-4">
                        	<label>Upload Scanned Document&nbsp;<font color="red">*</font></label>
                        </div>
                    </div>
                    
        	      <div class="row">
            	    <div class="col-sm-4">
                 	<select class="form-control" name="applicant_age_proof_doc_name" id="applicant_age_proof_doc_name">
                    	<option value="NA">---Please Select Age Proof Document---</option>
                        <?php 
							foreach($records->result() as $rec)
							{
								if($rec->code >= 1 and $rec->code <= 3)
								{
							?>
                            	<option value='<?=$rec->code?>'><?=$rec->description?></option>
                                
                            <?php } 
							}
						?>
					</select>
					  <span class="error_info" id="applicant_age_proof_doc_name_msg"></span>
					</div>
                
                <div class="col-sm-4">
					<input class="form-control" type="text" name="applicant_age_proof_doc_number" id="applicant_age_proof_doc_number" placeholder="Document Number ( if any )" autocomplete="off">
                </div>
                
                <div class="col-sm-4">
					<input class="form-control" type="file" name="applicant_age_proof_doc" id="applicant_age_proof_doc" autocomplete="off" placeholder="Upload Scanned Document">
                  <span class="error_info" id="applicant_age_proof_doc_msg"></span>
                </div>
                
              </div>
            </div>
            </div>
            
            <div class="box-body">
	           	
                <div class="form-group">
                	<div class="row">
	    	            <div class="col-sm-4">
                        	<label>Select Groom's Age Proof Document&nbsp;<font color="red">*</font></label>
                        </div>
                        <div class="col-sm-4">
                        	<label>Document Number&nbsp;</label>
                        </div>
                        <div class="col-sm-4">
                        	<label>Upload Scanned Document&nbsp;<font color="red">*</font></label>
                        </div>
                    </div>
                    
        	      <div class="row">
            	    <div class="col-sm-4">
                 	<select class="form-control" name="groom_age_proof_doc_name" id="groom_age_proof_doc_name">
                    	<option value="NA">---Please Select Age Proof Document---</option>
                                                <?php 
							foreach($records->result() as $rec)
							{
								if($rec->code >= 1 and $rec->code <= 3)
								{
							?>
                            	<option value='<?=$rec->code?>'><?=$rec->description?></option>
                                
                            <?php } 
							}
						?>
					</select>
					  <span class="error_info" id="groom_age_proof_doc_name_msg"></span>
					</div>
                
                <div class="col-sm-4">
					<input class="form-control" type="text" name="groom_age_proof_doc_number" id="groom_age_proof_doc_number" placeholder="Document Number ( if any )" autocomplete="off">
                </div>
                
                <div class="col-sm-4">
					<input class="form-control" type="file" name="groom_age_proof_doc" id="groom_age_proof_doc" autocomplete="off" placeholder="Upload Scanned Document">
                  <span class="error_info" id="groom_age_proof_doc_msg"></span>
                </div>
                
              </div>
            </div>
            </div>
            
            <div class="box-body">
	           	
                <div class="form-group">
                	<div class="row">
	    	            <div class="col-sm-4">
                        	<label>Select Never Married Status Document&nbsp;<font color="red">*</font></label>
                        </div>
                        <div class="col-sm-4">
                        	<label>Document Number&nbsp;</label>
                        </div>
                        <div class="col-sm-4">
                        	<label>Upload Scanned Document&nbsp;<font color="red">*</font></label>
                        </div>
                    </div>
                    
        	      <div class="row">
            	    <div class="col-sm-4">
                 	<select class="form-control" name="applicant_never_married_doc_name" id="applicant_never_married_doc_name">
                    	<option value="NA">---Please Select Never Married Document---</option>
						<?php 
							foreach($records->result() as $rec)
							{
								if($rec->code == 4)
								{
							?>
                            	<option value='<?=$rec->code?>'><?=$rec->description?></option>
                                
                            <?php } 
							}
						?>
					</select>
					  <span class="error_info" id="applicant_never_married_doc_name_msg"></span>
					</div>
                
                <div class="col-sm-4">
					<input class="form-control" type="text" name="applicant_never_married_doc_number" id="applicant_never_married_doc_number" placeholder="Document Number ( if any )" autocomplete="off">
                </div>
                
                <div class="col-sm-4">
					<input class="form-control" type="file" name="applicant_never_married_doc" id="applicant_never_married_doc" autocomplete="off" placeholder="Upload Scanned Document">
                  <span class="error_info" id="applicant_never_married_doc_msg"></span>
                </div>
                
              </div>
            </div>
            </div>
            
            <div class="box-body">
	           	
                <div class="form-group">
                	<div class="row">
	    	            <div class="col-sm-4">
                        	<label>Select Family Income Document&nbsp;<font color="red">*</font></label>
                        </div>
                        <div class="col-sm-4">
                        	<label>Document Number&nbsp;</label>
                        </div>
                        <div class="col-sm-4">
                        	<label>Upload Scanned Document&nbsp;<font color="red">*</font></label>
                        </div>
                    </div>
                    
        	      <div class="row">
            	    <div class="col-sm-4">
                 	<select class="form-control" name="applicant_family_income_doc_name" id="applicant_family_income_doc_name">
                    	<option value="NA">---Please Family Income document---</option>
                        <?php 
							foreach($records->result() as $rec)
							{
								if($rec->code == 5)
								{
							?>
                            	<option value='<?=$rec->code?>'><?=$rec->description?></option>
                                
                            <?php } 
							}
						?>
					</select>
					  <span class="error_info" id="applicant_family_income_doc_name_msg"></span>
					</div>
                
                <div class="col-sm-4">
					<input class="form-control" type="text" name="applicant_family_income_doc_number" id="applicant_family_income_doc_number" placeholder="Document Number ( if any )" autocomplete="off">
                </div>
                
                <div class="col-sm-4">
					<input class="form-control" type="file" name="applicant_family_income_doc" id="applicant_family_income_doc" autocomplete="off" placeholder="Upload Scanned Document">
                  <span class="error_info" id="applicant_family_income_doc_msg"></span>
                </div>
                
              </div>
            </div>
            </div>
            
            <div class="box-body">
	           	
                <div class="form-group">
                	<div class="row">
	    	            <div class="col-sm-4">
                        	<label>Select Address Proof Document&nbsp;<font color="red">*</font></label>
                        </div>
                        <div class="col-sm-4">
                        	<label>Document Number&nbsp;</label>
                        </div>
                        <div class="col-sm-4">
                        	<label>Upload Scanned Document&nbsp;<font color="red">*</font></label>
                        </div>
                    </div>
                    
        	      <div class="row">
            	    <div class="col-sm-4">
                 	<select class="form-control" name="applicant_address_proof_doc_name" id="applicant_address_proof_doc_name">
                    	<option value="NA">---Please Select Address Proof Document---</option>
                        <?php 
							foreach($records->result() as $rec)
							{
								if($rec->code == 9)
								{
							?>
                            	<option value='<?=$rec->code?>'><?=$rec->description?></option>
                                
                            <?php } 
							}
						?>
					</select>
					  <span class="error_info" id="applicant_address_proof_doc_name_msg"></span>
					</div>
                
                <div class="col-sm-4">
					<input class="form-control" type="text" name="applicant_address_proof_doc_number" id="applicant_address_proof_doc_number" placeholder="Document Number ( if any )" autocomplete="off">
                </div>
                
                <div class="col-sm-4">
					<input class="form-control" type="file" name="applicant_address_proof_doc" id="applicant_address_proof_doc" autocomplete="off" placeholder="Upload Scanned Document">
                  <span class="error_info" id="applicant_address_proof_doc_msg"></span>
                </div>
                
              </div>
            </div>
            </div>
            
            <div class="box-body">
	           	
                <div class="form-group">
                	<div class="row">
	    	            <div class="col-sm-4">
                        	<label>Select Bank Account Details Proof Document&nbsp;<font color="red">*</font></label>
                        </div>
                        <div class="col-sm-4">
                        	<label>Document Number&nbsp;</label>
                        </div>
                        <div class="col-sm-4">
                        	<label>Upload Scanned Document&nbsp;<font color="red">*</font></label>
                        </div>
                    </div>
                    
        	      <div class="row">
            	    <div class="col-sm-4">
                 	<select class="form-control" name="applicant_bank_acc_details_doc_name" id="applicant_bank_acc_details_doc_name">
                    	<option value="NA">---Please Select Bank Account Proof Document---</option>
                        <?php 
							foreach($records->result() as $rec)
							{
								if($rec->code == 6)
								{
							?>
                            	<option value='<?=$rec->code?>'><?=$rec->description?></option>
                                
                            <?php } 
							}
						?>
					</select>
					  <span class="error_info" id="applicant_bank_acc_details_doc_name_msg"></span>
					</div>
                
                <div class="col-sm-4">
					<input class="form-control" type="text" name="applicant_bank_acc_details_doc_number" id="applicant_bank_acc_details_doc_number" placeholder="Document Number ( if any )" autocomplete="off">
                </div>
                
                <div class="col-sm-4">
					<input class="form-control" type="file" name="applicant_bank_acc_details_doc" id="applicant_bank_acc_details_doc" autocomplete="off" placeholder="Upload Scanned Document">
                  <span class="error_info" id="applicant_bank_acc_details_doc_msg"></span>
                </div>
              </div>
              
              <!--<div class="row">
              	<input type="checkbox" />&nbsp;&nbsp;I hereby declare that the details furnished above are true and correct to the best of my knowledge and belief
              </div>-->
            </div>
            </div>
            
            <div class="box-body">
	           	
                <div class="form-group">
                	<div class="row">
	    	            <div class="col-sm-4">
                        	<label>Select Proposed Marriage Proof Document&nbsp;<font color="red">*</font></label>
                        </div>
                        <div class="col-sm-4">
                        	<label>Document Number&nbsp;</label>
                        </div>
                        <div class="col-sm-4">
                        	<label>Upload Scanned Document&nbsp;<font color="red">*</font></label>
                        </div>
                    </div>
                    
        	      <div class="row">
            	    <div class="col-sm-4">
                 	<select class="form-control" name="applicant_proposed_marriage_proof_doc_name" id="applicant_proposed_marriage_proof_doc_name">
                    	<option value="NA">---Please Select Marriage Proof Document---</option>
                        <?php 
							foreach($records->result() as $rec)
							{
								if($rec->code >= 7 and $rec->code<=8)
								{
							?>
                            	<option value='<?=$rec->code?>'><?=$rec->description?></option>
                                
                            <?php } 
							}
						?>
					</select>
					  <span class="error_info" id="applicant_proposed_marriage_proof_doc_name_msg"></span>
					</div>
                
                <div class="col-sm-4">
					<input class="form-control" type="text" name="applicant_proposed_marriage_proof_doc_number" id="applicant_proposed_marriage_proof_doc_number" placeholder="Document Number ( if any )" autocomplete="off">
                </div>
                
                <div class="col-sm-4">
					<input class="form-control" type="file" name="applicant_proposed_marriage_proof_doc" id="applicant_proposed_marriage_proof_doc" autocomplete="off" placeholder="Upload Scanned Document">
                  <span class="error_info" id="applicant_proposed_marriage_proof_doc_msg"></span>
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
                  
				</div>
			</div>
		</div>
        
        <?php echo form_close(); ?>
      
    </section>

    </div>
  
<?php $this->load->view($this->config->item('theme_uri').'layout/footer_view');?>