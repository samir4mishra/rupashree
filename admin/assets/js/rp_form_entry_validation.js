

function ValidateEmail(email) 
{
	var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	return expr.test(email);
}



var j = jQuery.noConflict();

j(document).ready(function(e) {
	
	
	dt_app = new Date();
	dt_app.setFullYear(new Date().getFullYear() - 18);
	
	//alert(dt_app);
	
	 // disbaling right click on html elements
	 j(document).on("contextmenu",function(e){
		 
       	if(e.target.nodeName == "INPUT" /*&& e.target.nodeName != "TEXTAREA"*/)
             e.preventDefault();
     });
	
	
	j('#datepicker_dob_applicant').datepicker({
  		autoclose: true,
		format: 'dd-mm-yyyy',
		viewMode: 'years',
		endDate: dt_app	// limiting selection of past dates, such that date selection will be available 18 years in the past
});



	j('#datepicker_pdom_applicant').datepicker({
	  autoclose: true,
	  format: 'dd-mm-yyyy',
	   startDate: new Date(),
	   endDate: '+60d'	// allowing selection of future date upto 60 days only...
    });		
		
	$("#basic_form_entry").submit(function(e) {
        
		
		
		var validation_flag = true;
		
		// retrieving value from html controls...
		
		var applicant_registration_year = $("#applicant_registration_year").val();
		
		var frm_serial_number = $("#frm_serial_number").val();
		
		var app_f_name = $("#app_first_name").val();	// applicant first name
		
		//var app_m_name = $("#app_middle_name").val();	// applicant middle name
		
		var app_l_name = $("#app_last_name").val();		// applicant last name
		
		
		var app_mother_f_name = $("#app_mother_f_name").val();	// applicant's mother first name
		
		//var app_mother_m_name = $("#app_mother_m_name").val();	// applicant's mother middle name
		
		var app_mother_l_name = $("#app_mother_l_name").val();		// applicant's  mother last name		


		var app_father_f_name = $("#app_father_f_name").val();	// applicant's father first name
		
		//var app_father_m_name = $("#app_father_m_name").val();	// applicant's father middle name
		
		var app_father_l_name = $("#app_father_l_name").val();		// applicant's father last name	
		
			
		
		
		var datepicker_dob_applicant = $("#datepicker_dob_applicant").val();	// applicant date of birth
		
		var datepicker_pdom_applicant = $("#datepicker_pdom_applicant").val();	// applicant proposed date of marriage
		
		var applicant_mobile = $("#applicant_mobile").val();	// applicant mobile number	
		
		
		var applicant_education = $("#applicant_education").val();  // applicant's education
		
		var applicant_caste = $("#applicant_caste").val();	// applicant's caste
		
		var applicant_religion = $("#applicant_religion").val();	// applicant's religion
		
		
		
		var applicant_village = $("#applicant_village").val();	// applicant's village
		
		var applicant_house_number = $("#applicant_house_number").val();	//applicant_house_number
		
		var applicant_street_name = $("#applicant_street_name").val();	//applicant_street_name
		
		var applicant_post_office = $("#applicant_post_office").val(); //applicant_post_office
		
		var applicant_police_station = $("#applicant_police_station").val(); //applicant_police_station
		
		var applicant_grmp_ward = $("#applicant_grmp_ward").val(); //applicant_grmp_ward
		
		var applicant_district = $("#applicant_district").val(); // applicant_district
		
		var applicant_bmc = $("#applicant_bmc").val();	//applicant_bmc
		
		var applicant_pin_code = $("#applicant_pin_code").val();	//applicant_pin_code
		
		var c_applicant_village = $("#c_applicant_village").val();	// c_applicant's village
		
		var c_applicant_house_number = $("#c_applicant_house_number").val();	//c_applicant_house_number
		
		var c_applicant_street_name = $("#c_applicant_street_name").val();	//c_applicant_street_name
		
		var c_applicant_post_office = $("#c_applicant_post_office").val(); //c_applicant_post_office
		
		var c_applicant_police_station = $("#c_applicant_police_station").val(); //c_applicant_police_station
		
		var c_applicant_grmp_ward = $("#c_applicant_grmp_ward").val(); //c_applicant_grmp_ward
		
		var c_applicant_district = $("#c_applicant_district").val(); // c_applicant_district
		
		var c_applicant_bmc = $("#c_applicant_bmc").val();	//c_applicant_bmc
		
		var c_applicant_pin_code = $("#c_applicant_pin_code").val();	//c_applicant_pin_code
		
		var applicant_bank_name = $("#applicant_bank_name").val();	//applicant_bank_name
				
		var applicant_account_no = $("#applicant_account_no").val();	//applicant_account_no
		
		var applicant_ifs_branch_code = $("#applicant_ifs_branch_code").val();	//applicant_ifs_branch_code
		
		var applicant_family_income = $("#applicant_family_income").val();
		
		var applicant_e_mail_id = $("#applicant_e_mail_id").val();	// applicant_e_mail_id
		
		var check = document.getElementById("perm_curr_add_same").checked;

		//alert(check);

		if(applicant_registration_year == "")
		{
			$("#applicant_registration_year_msg").html("Please select enrollment year.");
			$("#applicant_registration_year_msg").show('slow');
			$("#applicant_registration_year").css("border-color","#F55");
			
			validation_flag = false;
		}
		
		else if(frm_serial_number === "")
		{
			$("#frm_serial_number_msg").html("Please enter your form serial number.");
			$("#frm_serial_number_msg").show('slow');
			$("#frm_serial_number").css("border-color","#F55");
			
			validation_flag = false;
		}
	
		else if(app_f_name === "")
		{
			$("#app_first_msg").html("Please enter your first name.");
			$("#app_first_msg").show('slow');
			$("#app_first_name").css("border-color","#F55");
			
			validation_flag = false;

		}
		
		/*
		else if(app_m_name === "")
		{
			$("#app_middle_msg").html("Please enter your middle name.");
			$("#app_middle_msg").show('slow');
			$("#app_middle_name").css("border-color","#F55");
			
			validation_flag = false;
			
		}
		*/
		
		else if(app_l_name === "")
		{
			$("#app_last_msg").html("Please enter your last name.");
			$("#app_last_msg").show('slow');
			$("#app_last_name").css("border-color","#F55");
			
			validation_flag = false;
			
		}
		
		else if(app_mother_f_name === "")
		{
			$("#mother_first_msg").html("Please enter your mother's first name.");
			$("#mother_first_msg").show('slow');
			$("#app_mother_f_name").css("border-color","#F55");
			
			validation_flag = false;
			
		}
		
		/*
		else if(app_mother_m_name === "")
		{
			$("#mother_middle_msg").html("Please enter your mother's middle name.");
			$("#mother_middle_msg").show('slow');
			$("#app_mother_m_name").css("border-color","#F55");
			
			validation_flag = false;
			
		}
		*/
		
		else if(app_mother_l_name === "")
		{
			$("#mother_last_msg").html("Please enter your mother's last name.");
			$("#mother_last_msg").show('slow');
			$("#app_mother_l_name").css("border-color","#F55");
			
			validation_flag = false;
			
		}
		
		else if(app_father_f_name === "")
		{
			$("#father_first_msg").html("Please enter your father's first name.");
			$("#father_first_msg").show('slow');
			$("#app_father_f_name").css("border-color","#F55");
			
			validation_flag = false;
			
		}
		
		/*
		else if(app_father_m_name === "")
		{
			$("#father_middle_msg").html("Please enter your father's middle name.");
			$("#father_middle_msg").show('slow');
			$("#app_father_m_name").css("border-color","#F55");
			
			validation_flag = false;
			
		}
		*/
		
		else if(app_father_l_name === "")
		{
			$("#father_last_msg").html("Please enter your father's last name.");
			$("#father_last_msg").show('slow');
			$("#app_father_l_name").css("border-color","#F55");
			
			validation_flag = false;
			
		}
		
		else if(datepicker_dob_applicant === "")
		{
			$("#datepicker_dob_msg").html("Please select your date of birth.");
			$("#datepicker_dob_msg").show('slow');
			$("#datepicker_dob_applicant").css("border-color","#F55");
			
			validation_flag = false;
			
		}
		
		else if(datepicker_pdom_applicant === "")
		{
			$("#father_last_msg").html("Please select your proposed date of marriage.");
			$("#pdom_applicant_msg").show('slow');
			$("#datepicker_pdom_applicant").css("border-color","#F55");
			
			validation_flag = false;
			
		}
		
		else if(applicant_mobile === "")
		{
			$("#applicant_mobile_msg").html("Please enter your mmobile number.");
			$("#applicant_mobile_msg").show('slow');
			$("#applicant_mobile").css("border-color","#F55");
			
			validation_flag = false;
			
		}
		
		else if(applicant_mobile != "" && applicant_mobile.length < 10)
		{
			$("#applicant_mobile_msg").html("Mobile number should be of 10 digits.");
			$("#applicant_mobile_msg").show('slow');
			$("#applicant_mobile").css("border-color","#F55");
			
			validation_flag = false;
		}
		
		else if(applicant_e_mail_id != "" && !ValidateEmail(applicant_e_mail_id))
		{
			$("#applicant_e_mail_id_msg").html("Please provide valid e-mail address");
			$("#applicant_e_mail_id_msg").show();
				
			validation_flag = false;
		}
		
		else if(applicant_family_income === "")
		{
			$("#applicant_family_income_msg").html("Please enter your annual family income.");
			$("#applicant_family_income_msg").show('slow');
			$("#applicant_family_income").css("border-color","#F55");
			
			validation_flag = false;
		}
		
		else if(applicant_education == "")
		{
			$("#applicant_education_msg").html("Please select your highest education level.");
			$("#applicant_education_msg").show('slow');
			$("#applicant_education").css("border-color","#F55");
			
			validation_flag = false;
			
		}

		else if(applicant_caste == "")
		{
			$("#applicant_caste_msg").html("Please select your caste.");
			$("#applicant_caste_msg").show('slow');
			$("#applicant_caste").css("border-color","#F55");
			
			validation_flag = false;
			
		}
		
		else if(applicant_religion == "")
		{
			$("#applicant_religion_msg").html("Please select your religion.");
			$("#applicant_religion_msg").show('slow');
			$("#applicant_religion").css("border-color","#F55");
			
			validation_flag = false;
			
		}	
		
		else if(applicant_village === "")
		{
			$("#applicant_village_msg").html("Please enter your village name.");
			$("#applicant_village_msg").show('slow');
			$("#applicant_village").css("border-color","#F55");
			
			validation_flag = false;
			
		}		
		else if(applicant_house_number === "")
		{
			$("#applicant_house_number_msg").html("Please enter your house number.");
			$("#applicant_house_number_msg").show('slow');
			$("#applicant_house_number").css("border-color","#F55");
			
			validation_flag = false;
			
		}		
		else if(applicant_street_name === "")
		{
			$("#applicant_street_name_msg").html("Please enter your street name.");
			$("#applicant_street_name_msg").show('slow');
			$("#applicant_street_name").css("border-color","#F55");
			
			validation_flag = false;
			
		}		
		else if(applicant_post_office === "")
		{
			$("#applicant_post_office_msg").html("Please enter your post office name.");
			$("#applicant_post_office_msg").show('slow');
			$("#applicant_post_office").css("border-color","#F55");
			
			validation_flag = false;
			
		}		
		else if(applicant_police_station === "")
		{
			$("#applicant_police_station_msg").html("Please enter your police station name.");
			$("#applicant_police_station_msg").show('slow');
			$("#applicant_police_station").css("border-color","#F55");
			
			validation_flag = false;
			
		}		
		else if(applicant_grmp_ward === "")
		{
			$("#applicant_grmp_ward_msg").html("Please enter your gram panchayat or ward name.");
			$("#applicant_grmp_ward_msg").show('slow');
			$("#applicant_grmp_ward").css("border-color","#F55");
			
			validation_flag = false;
			
		}	

		
		
		else if(applicant_district == '')
		{
			$("#applicant_district_msg").html("Please select your district.");
			$("#applicant_district_msg").show('slow');
			$("#applicant_district").css("border-color","#F55");
			
			validation_flag = false;
			
		}		
		else if(applicant_bmc == '')
		{
			$("#applicant_bmc_msg").html("Please select your block / Muncipality / Corporation.");
			$("#applicant_bmc_msg").show('slow');
			$("#applicant_bmc").css("border-color","#F55");
			
			validation_flag = false;
			
		}		
		else if(applicant_pin_code === "")
		{
			$("#applicant_pin_code_msg").html("Please enter your pin code.");
			$("#applicant_pin_code_msg").show('slow');
			$("#applicant_pin_code").css("border-color","#F55");
			
			validation_flag = false;
			
		}
		
		else if(applicant_pin_code != "" && applicant_pin_code.length < 6)
		{
			$("#applicant_pin_code_msg").html("Pin code should be of 6 digits.");
			$("#applicant_pin_code_msg").show('slow');
			$("#applicant_pin_code").css("border-color","#F55");
			
			validation_flag = false;
			
		}
			
		else if($("#perm_curr_add_same").prop("checked") == false)
		{
			if(c_applicant_village === "")
			{
				$("#c_village_msg").html("Please enter your village name.");
				$("#c_village_msg").show('slow');
				$("#c_applicant_village").css("border-color","#F55");
			
				validation_flag = false;
			}
			else if(c_applicant_house_number === "")
			{
				$("#c_house_number_msg").html("Please enter your house number.");
				$("#c_house_number_msg").show('slow');
				$("#c_applicant_house_number").css("border-color","#F55");
				
				validation_flag = false;
			}		
			else if(c_applicant_street_name === "")
			{
				$("#c_applicant_street_name_msg").html("Please enter your street name.");
				$("#c_applicant_street_name_msg").show('slow');
				$("#c_applicant_street_name").css("border-color","#F55");
				
				validation_flag = false;
			}
			else if(c_applicant_post_office === "")
			{
				$("#c_applicant_post_office_msg").html("Please enter your post office name.");
				$("#c_applicant_post_office_msg").show('slow');
				$("#c_applicant_post_office").css("border-color","#F55");
				
				validation_flag = false;
			}		
			else if(c_applicant_police_station === "")
			{
				$("#c_applicant_police_station_msg").html("Please enter your police station name.");
				$("#c_applicant_police_station_msg").show('slow');
				$("#c_applicant_police_station").css("border-color","#F55");
			
				validation_flag = false;
			}		
			else if(c_applicant_grmp_ward === "")
			{
				$("#c_applicant_grmp_ward_msg").html("Please enter your gram panchayat or ward name.");
				$("#c_applicant_grmp_ward_msg").show('slow');
				$("#c_applicant_grmp_ward").css("border-color","#F55");
				
				validation_flag = false;
			}
				
			else if(c_applicant_district == '')
			{
		 		$("#c_applicant_district_msg").html("Please select your district.");
			 	$("#c_applicant_district_msg").show('slow');
			 	$("#c_applicant_district").css("border-color","#F55");
			
			 	validation_flag = false;
			}		
		
			else if(c_applicant_bmc == '')
			{
			 	$("#c_applicant_bmc_msg").html("Please select your block / Muncipality / Corporation.");
		 		$("#c_applicant_bmc_msg").show('slow');
			 	$("#c_applicant_bmc").css("border-color","#F55");
				
			 	validation_flag = false;
			
			}		
			else if(c_applicant_pin_code === "")
			{
				$("#c_applicant_pin_code_msg").html("Please enter your pin code.");
				$("#c_applicant_pin_code_msg").show('slow');
				$("#c_applicant_pin_code").css("border-color","#F55");
			
				validation_flag = false;
			}
			else if(c_applicant_pin_code != "" && c_applicant_pin_code.length < 6)
			{
				$("#c_applicant_pin_code_msg").html("Pin code should be of 6 digits.");
				$("#c_applicant_pin_code_msg").show('slow');
				$("#c_applicant_pin_code").css("border-color","#F55");
				validation_flag = false;	
			}
		}
		
		else if(applicant_bank_name == '')
		{
			$("#applicant_bank_name_msg").html("Please select your bank name.");
			$("#applicant_bank_name_msg").show('slow');
			$("#applicant_bank_name").css("border-color","#F55");
			
			validation_flag = false;
			
		}
		
		else if(applicant_account_no === "")
		{
			$("#applicant_account_no_msg").html("Please enter your account number.");
			$("#applicant_account_no_msg").show('slow');
			$("#applicant_account_no").css("border-color","#F55");
			
			validation_flag = false;
			
		}
		
		else if(applicant_ifs_branch_code === "")
		{
			$("#applicant_ifs_branch_code_msg").html("Please enter branch code of your selected bank.");
			$("#applicant_ifs_branch_code_msg").show('slow');
			$("#applicant_ifs_branch_code").css("border-color","#F55");
			
			validation_flag = false;
			
		}
		
		else if(applicant_ifs_branch_code != "" && applicant_ifs_branch_code.length < 6)
		{
			$("#applicant_ifs_branch_code_msg").html("Please enter last six digits of your IFS Code");
			$("#applicant_ifs_branch_code_msg").show('slow');
			$("#applicant_ifs_branch_code").css("border-color","#F55");
			
			validation_flag = false;
			
		}
		
		if(validation_flag == false)
		{
			return false;
		}
		else
		{
			return true;
		}
    });
	
	
	
	// removing error message lable when control will gain focus....
	
	
	$("#app_first_name").focus(function(e) {
        
		$("#app_first_msg").hide();
		$("#app_first_name").css('border-color','');
    });
	
	$("#app_middle_name").focus(function(e) {
        
		$("#app_middle_msg").hide();
		$("#app_middle_name").css('border-color','');
    });
	
	$("#app_last_name").focus(function(e) {
        
		$("#app_last_msg").hide();
		$("#app_last_name").css('border-color','');
    });
	
	
	
	$("#app_mother_f_name").focus(function(e) {
        
		$("#mother_first_msg").hide();
		$("#app_mother_f_name").css('border-color','');
    });
	
	$("#app_mother_m_name").focus(function(e) {
        
		$("#mother_middle_msg").hide();
		$("#app_mother_m_name").css('border-color','');
    });
	
	$("#app_mother_l_name").focus(function(e) {
        
		$("#mother_last_msg").hide();
		$("#app_mother_l_name").css('border-color','');
    });		
	
	
	$("#app_father_f_name").focus(function(e) {
        
		$("#father_first_msg").hide();
		$("#app_father_f_name").css('border-color','');
    });
	
	$("#app_father_m_name").focus(function(e) {
        
		$("#father_middle_msg").hide();
		$("#app_father_m_name").css('border-color','');
    });
	
	$("#app_father_l_name").focus(function(e) {
        
		$("#father_last_msg").hide();
		$("#app_father_l_name").css('border-color','');
    });			
	
	
	$("#datepicker_dob_applicant").focus(function(e) {
		
		$("#datepicker_dob_msg").hide();
		$(this).css("border-color","");
    });
	
	$("#datepicker_pdom_applicant").focus(function(e) {
		
		$("#pdom_applicant_msg").hide();
		$(this).css("border-color","");
    });
	
	$("#applicant_mobile").focus(function(e) {
		
		$(this).css("border-color","");
		$("#applicant_mobile_msg").hide();
    });
	
	$("#applicant_family_income").focus(function(e) {
		
		$("#applicant_family_income_msg").hide();
		$(this).css("border-color","");
    });	
	
	$("#applicant_education").focus(function(e) {

        $("#applicant_education_msg").hide();
		$(this).css("border-color","");
    });	
	
	$("#applicant_caste").focus(function(e) {

        $("#applicant_caste_msg").hide();
		$(this).css("border-color","");
    });

	$("#applicant_religion").focus(function(e) {

        $("#applicant_religion_msg").hide();
		$(this).css("border-color","");
    });
	
	
	$("#applicant_village").focus(function(e) {

        $("#applicant_village_msg").hide();
		$(this).css("border-color","");
    });
	
	$("#applicant_house_number").focus(function(e) {

        $("#applicant_house_number_msg").hide();
		$(this).css("border-color","");
    });
	
	$("#applicant_street_name").focus(function(e) {

        $("#applicant_street_name_msg").hide();
		$(this).css("border-color","");
    });
	
	$("#applicant_post_office").focus(function(e) {

        $("#applicant_post_office_msg").hide();
		$(this).css("border-color","");
    });
	
	$("#applicant_police_station").focus(function(e) {

        $("#applicant_police_station_msg").hide();
		$(this).css("border-color","");
    });
	
	$("#applicant_grmp_ward").focus(function(e) {

        $("#applicant_grmp_ward_msg").hide();
		$(this).css("border-color","");
    });
	
	$("#applicant_district").focus(function(e) {

        $("#applicant_district_msg").hide();
		$(this).css("border-color","");
    });
	
	$("#applicant_bmc").focus(function(e) {

        $("#applicant_bmc_msg").hide();
		$(this).css("border-color","");
    });
	
	$("#applicant_pin_code").focus(function(e) {

        $("#applicant_pin_code_msg").hide();
		$(this).css("border-color","");
    });
	
	
	$("#c_applicant_village").focus(function(e) {

        $("#c_village_msg").hide();
		$(this).css("border-color","");
    });
	
	$("#c_applicant_house_number").focus(function(e) {

        $("#c_house_number_msg").hide();
		$(this).css("border-color","");
    });
	
	$("#c_applicant_street_name").focus(function(e) {

        $("#c_applicant_street_name_msg").hide();
		$(this).css("border-color","");
    });
	
	$("#c_applicant_post_office").focus(function(e) {

        $("#c_applicant_post_office_msg").hide();
		$(this).css("border-color","");
    });
	
	$("#c_applicant_police_station").focus(function(e) {

        $("#c_applicant_police_station_msg").hide();
		$(this).css("border-color","");
    });
	
	$("#c_applicant_grmp_ward").focus(function(e) {

        $("#c_applicant_grmp_ward_msg").hide();
		$(this).css("border-color","");
    });
	
	$("#c_applicant_district").focus(function(e) {

        $("#c_applicant_district_msg").hide();
		$(this).css("border-color","");
    });
	
	$("#c_applicant_bmc").focus(function(e) {

        $("#c_applicant_bmc_msg").hide();
		$(this).css("border-color","");
    });
	
	$("#c_applicant_pin_code").focus(function(e) {

        $("#c_applicant_pin_code_msg").hide();
		$(this).css("border-color","");
    });	
	
	$("#applicant_bank_name").focus(function(e) {

        $("#applicant_bank_name_msg").hide();
		$(this).css("border-color","");
    });
	
	$("#applicant_account_no").focus(function(e) {

	    $("#applicant_account_no_msg").hide();
		$(this).css("border-color","");
    });
	
	$("#applicant_ifs_branch_code").focus(function(e) {
	
	   $("#applicant_ifs_branch_code_msg").hide();
	   $(this).css("border-color","");
    });
	
	$("#applicant_e_mail_id").focus(function(e) {
	
	   $("#applicant_e_mail_id_msg").hide();
	   $(this).css("border-color","");
    });
	
	
	$("#applicant_registration_year").focus(function(e) {
	
	   $("#applicant_registration_year_msg").hide();
	   $(this).css("border-color","");
    });
	
	$("#frm_serial_number").focus(function(e) {
	
	   $("#frm_serial_number_msg").hide();
	   $(this).css("border-color","");
    });
	
	
	// jquery function to only alphabets
	
	$('#app_first_name,	#app_middle_name,	#app_last_name,	#app_mother_f_name,	#app_mother_m_name,	#app_mother_l_name,#app_father_f_name,	#app_father_m_name,	#app_father_l_name,#app_guardian_f_name,#app_guardian_m_name,#app_guardian_l_name').keydown(function (e) {
          if (e.shiftKey || e.ctrlKey || e.altKey) {
              e.preventDefault();
          } else {
              var key = e.keyCode;
              if (!((key == 8) || (key == 9) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                  e.preventDefault();
              }
          }
      });
	  
	  
	  // jquery function to only numbers
	  
	  	$('#applicant_mobile,#applicant_pin_code,#c_applicant_pin_code,#applicant_ifs_branch_code,#applicant_family_income,#frm_serial_number').keydown(function (e) {
          if (e.shiftKey || e.ctrlKey || e.altKey) {
              e.preventDefault();
          } else {
              var key = e.keyCode;
              if (!((key == 8) || (key == 9) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57))) {
                  e.preventDefault();
              }
          }
      });
	  
		// jquery event to prevent user key input in do birth  and date of marriage  
		
	$('#datepicker_dob_applicant,#datepicker_pdom_applicant').keydown(function (e) {
		
   	        if (e.shiftKey || e.ctrlKey || e.altKey) 
			{
				e.preventDefault();
          	} 
		  
		  	if(e.keyCode != 9)
		  	{
				e.preventDefault();
			}
      });
	  
	  
	  
	  // code to copy permanent and current address on click of check box
	  
	  $("#perm_curr_add_same").click(function(e) {
		  
		if($(this).prop("checked") == true)
		{
			
			$("#c_applicant_village").attr('disabled', 'disabled');
			
			$("#c_applicant_house_number").attr('disabled', 'disabled');
	
			$("#c_applicant_house_number").attr('disabled', 'disabled');
		
			$("#c_applicant_street_name").attr('disabled', 'disabled');
		
			$("#c_applicant_post_office").attr('disabled', 'disabled');
		
			$("#c_applicant_police_station").attr('disabled', 'disabled');
		
			$("#c_applicant_grmp_ward").attr('disabled', 'disabled');
		
			$("#c_applicant_district").attr('disabled', 'disabled');
		
			$("#c_applicant_bmc").attr('disabled', 'disabled');
			
			$("#c_applicant_pin_code").attr('disabled', 'disabled');
		}
		else
		{
			
			
			$("#c_applicant_village").removeAttr('disabled')
			
			$("#c_applicant_house_number").removeAttr('disabled')
	
			$("#c_applicant_house_number").removeAttr('disabled')
		
			$("#c_applicant_street_name").removeAttr('disabled')
		
			$("#c_applicant_post_office").removeAttr('disabled')
		
			$("#c_applicant_police_station").removeAttr('disabled')
		
			$("#c_applicant_grmp_ward").removeAttr('disabled')
		
			$("#c_applicant_district").removeAttr('disabled')
		
			$("#c_applicant_bmc").removeAttr('disabled')
			
			$("#c_applicant_pin_code").removeAttr('disabled')
			
			/*

			//--------------c_applicant_bmc--------------------------
			
			$('#c_applicant_district').attr('disabled', 'disabled');

			$('#c_applicant_bmc').attr('disabled', 'disabled');

			//-----------------------------------------------------------
		
			$("#c_applicant_pin_code").val($("#applicant_pin_code").val());	//c_applicant_pin_code			
		}
		else
		{
			$("#c_applicant_village").val('');
			
			$("#c_applicant_house_number").val('');
	
			$("#c_applicant_house_number").val('');	
		
			$("#c_applicant_street_name").val('');	
		
			$("#c_applicant_post_office").val(''); 
		
			$("#c_applicant_police_station").val(''); 
		
			$("#c_applicant_grmp_ward").val(''); 
			
			$("#c_applicant_district").val(''); 
		
			$("#c_applicant_district").removeAttr("disabled");

		    $('#c_applicant_bmc').css('display','block');

		    $("#c_applicant_bmc").val('');
		
			$("#c_applicant_pin_code").val('');*/
		}
    });

   
	
	
	
	// code to implement length validation
	
	
	$("#applicant_mobile,").focusout(function(e) {
		$("#applicant_mobile_msg").hide();
    });
	
	
	$("#applicant_mobile").bind('keypress keyup keydown',function(e) {
		
		if($(this).val().length < 10)
		{
			$("#applicant_mobile_msg").html("Invalid mobile number.Should be of 10 digits.");
			$("#applicant_mobile_msg").show();
		}
		else
		{
			$("#applicant_mobile_msg").hide();
		}
		
    });
});