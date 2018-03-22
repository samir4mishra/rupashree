function ValidateEmail(email) 
{
	var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	return expr.test(email);
}

var j = jQuery.noConflict();

j(document).ready(function(e) {
	
	
	 // disbaling right click on html elements
	 j(document).on("contextmenu",function(e){
		 
       	if(e.target.nodeName == "INPUT" /*&& e.target.nodeName != "TEXTAREA"*/)
             e.preventDefault();
     });
	
	
	j('#datepicker_dob_groom').datepicker({
	  autoclose: true,
	  format: 'dd-mm-yy'
	});
		
	/*j('#datepicker_pdom_groom').datepicker({
	  autoclose: true,
	  format: 'dd-mm-yy'
    });*/
	
		
	j('#datepicker_dob_groom').datepicker({
	  autoclose: true,
	  format: 'dd-mm-yy'
    });
		
		
	$("#basic_form_entry_groom").submit(function(e) {
        
		var validation_flag = true;
		
		// retrieving value from html controls...
		
		var groom_f_name = $("#groom_first_name").val();	// applicant first name
		
		var groom_m_name = $("#groom_middle_name").val();	// applicant middle name
		
		var groom_l_name = $("#groom_last_name").val();		// applicant last name
		
		
		var groom_mother_f_name = $("#groom_mother_f_name").val();	// groomlicant's mother first name
		
		var groom_mother_m_name = $("#groom_mother_m_name").val();	// groomlicant's mother middle name
		
		var groom_mother_l_name = $("#groom_mother_l_name").val();		// groomlicant's  mother last name		


		var groom_father_f_name = $("#groom_father_f_name").val();	// groomlicant's father first name
		
		var groom_father_m_name = $("#groom_father_m_name").val();	// groomlicant's father middle name
		
		var groom_father_l_name = $("#groom_father_l_name").val();		// groomlicant's father last name		
		
		
		var datepicker_dob_groom = $("#datepicker_dob_groom").val();	// groom date of birth
		
		
		
		var groom_mobile = $("#groom_mobile").val();	// groom mobile number	
		
		var groom_e_mail_id = $("#groom_e_mail_id").val();

		
		var groom_village = $("#groom_village").val();	// groom's village
		
		var groom_house_number = $("#groom_house_number").val();	//groom_house_number
		
		var groom_street_name = $("#groom_street_name").val();	//groom_street_name
		
		var groom_post_office = $("#groom_post_office").val(); //groom_post_office
		
		var groom_police_station = $("#groom_police_station").val(); //groom_police_station
		
		var groom_grmp_ward = $("#groom_grmp_ward").val(); //groom_grmp_ward
		
		var groom_district = $("#groom_district").val(); // groom_district
		
		
		var groom_bmc = $("#groom_bmc").val();	//groom_bmc
		
		var groom_pin_code = $("#groom_pin_code").val();	//groom_pin_code
		
		
		var c_groom_village = $("#c_groom_village").val();	// c_groom's village
		
		var c_groom_house_number = $("#c_groom_house_number").val();	//c_groom_house_number
		
		var c_groom_street_name = $("#c_groom_street_name").val();	//c_groom_street_name
		
		var c_groom_post_office = $("#c_groom_post_office").val(); //c_groom_post_office
		
		var c_groom_police_station = $("#c_groom_police_station").val(); //c_groom_police_station
		
		var c_groom_grmp_ward = $("#c_groom_grmp_ward").val(); //c_groom_grmp_ward
		
		var c_groom_district = $("#c_groom_district").val(); // c_groom_district
		
		var c_groom_bmc = $("#c_groom_bmc").val();	//c_groom_bmc
		
		var c_groom_pin_code = $("#c_groom_pin_code").val();	//c_groom_pin_code


	
		if(groom_f_name === '')
		{
			$("#groom_first_msg").html("Please enter your first name.");
			$("#groom_first_msg").show('slow');
			$("#groom_first_name").css("border-color","#F55");
			
			validation_flag = false;

		}
		
	
		
		else if(groom_l_name === '')
		{
			$("#groom_last_msg").html("Please enter your last name.");
			$("#groom_last_msg").show('slow');
			$("#groom_last_name").css("border-color","#F55");
			
			validation_flag = false;
			
		}
		
		else if(groom_mother_f_name === '')
		{
			$("#mother_first_msg").html("Please enter your mother's first name.");
			$("#mother_first_msg").show('slow');
			$("#groom_mother_f_name").css("border-color","#F55");
			
			validation_flag = false;
			
		}
		

		
		else if(groom_mother_l_name === '')
		{
			$("#mother_last_msg").html("Please enter your mother's last name.");
			$("#mother_last_msg").show('slow');
			$("#groom_mother_l_name").css("border-color","#F55");
			
			validation_flag = false;
			
		}
		
		else if(groom_father_f_name === '')
		{
			$("#father_first_msg").html("Please enter your father's first name.");
			$("#father_first_msg").show('slow');
			$("#groom_father_f_name").css("border-color","#F55");
			
			validation_flag = false;
			
		}
		

		
		else if(groom_father_l_name === '')
		{
			$("#father_last_msg").html("Please enter your father's last name.");
			$("#father_last_msg").show('slow');
			$("#groom_father_l_name").css("border-color","#F55");
			
			validation_flag = false;
			
		}
		
		
		else if(datepicker_dob_groom === '')
		{
			$("#dob_groom_msg").html("Please select your date of birth.");
			$("#dob_groom_msg").show('slow');
			$("#datepicker_dob_groom").css("border-color","#F55");
			
			validation_flag = false;
			
		}
		
		else if(groom_mobile === '')
		{
			$("#groom_mobile_msg").html("Mobile number should be of 10 digits.");
			$("#groom_mobile_msg").show('slow');
			$("#groom_mobile").css("border-color","#F55");
			
			validation_flag = false;
		}
		
		else if(groom_mobile != '' && groom_mobile.length < 10)
		{
			$("#groom_mobile_msg").html("Mobile number should be of 10 digits.");
			$("#groom_mobile_msg").show('slow');
			$("#groom_mobile").css("border-color","#F55");
			
			validation_flag = false;
		}
		
		else if(groom_e_mail_id != '' && !ValidateEmail(groom_e_mail_id))
		{
			$("#groom_e_mail_id_msg").html("Please provide valid e-mail address");
			$("#groom_e_mail_id_msg").show();
				
			validation_flag = false;
		}
	
		
		else if(groom_village === '')
		{
			$("#groom_village_msg").html("Please enter your village name.");
			$("#groom_village_msg").show('slow');
			$("#groom_village").css("border-color","#F55");
			
			validation_flag = false;
			
		}		
		else if(groom_house_number === '')
		{
			$("#groom_house_number_msg").html("Please enter your house number.");
			$("#groom_house_number_msg").show('slow');
			$("#groom_house_number").css("border-color","#F55");
			
			validation_flag = false;
			
		}		
		else if(groom_street_name === '')
		{
			$("#groom_street_name_msg").html("Please enter your street name.");
			$("#groom_street_name_msg").show('slow');
			$("#groom_street_name").css("border-color","#F55");
			
			validation_flag = false;
			
		}		
		else if(groom_post_office === '')
		{
			$("#groom_post_office_msg").html("Please enter your post office name.");
			$("#groom_post_office_msg").show('slow');
			$("#groom_post_office").css("border-color","#F55");
			
			validation_flag = false;
			
		}		
		else if(groom_police_station === '')
		{
			$("#groom_police_station_msg").html("Please enter your police station name.");
			$("#groom_police_station_msg").show('slow');
			$("#groom_police_station").css("border-color","#F55");
			
			validation_flag = false;
			
		}		
		else if(groom_grmp_ward === '')
		{
			$("#groom_grmp_ward_msg").html("Please enter your gram panchayat or ward name.");
			$("#groom_grmp_ward_msg").show('slow');
			$("#groom_grmp_ward").css("border-color","#F55");
			
			validation_flag = false;
			
		}		
		
		else if(groom_district == '')
		{
			$("#groom_district_msg").html("Please select your district.");
			$("#groom_district_msg").show('slow');
			$("#groom_district").css("border-color","#F55");
			
			validation_flag = false;
			
		}		
		else if(groom_bmc == '')
		{
			$("#groom_bmc_msg").html("Please select your block / Muncipality / Corporation.");
			$("#groom_bmc_msg").show('slow');
			$("#groom_bmc").css("border-color","#F55");
			
			validation_flag = false;
			
		}		
		else if(groom_pin_code === '')
		{
			$("#groom_pin_code_msg").html("Please enter your pin code.");
			$("#groom_pin_code_msg").show('slow');
			$("#groom_pin_code").css("border-color","#F55");
			
			validation_flag = false;
			
		}
		
		else if(groom_pin_code != '' && groom_pin_code.length < 6)
		{
			$("#groom_pin_code_msg").html("Pin code should be of 6 digits.");
			$("#groom_pin_code_msg").show('slow');
			$("#groom_pin_code").css("border-color","#F55");
			
			validation_flag = false;
			
		}
			
		else if(c_groom_village === '')
		{
			$("#c_village_msg").html("Please enter your village name.");
			$("#c_village_msg").show('slow');
			$("#c_groom_village").css("border-color","#F55");
			
			validation_flag = false;
			
		}		
		else if(c_groom_house_number === '')
		{
			$("#c_house_number_msg").html("Please enter your house number.");
			$("#c_house_number_msg").show('slow');
			$("#c_groom_house_number").css("border-color","#F55");
			
			validation_flag = false;
			
		}		
		else if(c_groom_street_name === '')
		{
			$("#c_groom_street_name_msg").html("Please enter your street name.");
			$("#c_groom_street_name_msg").show('slow');
			$("#c_groom_street_name").css("border-color","#F55");
			
			validation_flag = false;
			
		}		
		else if(c_groom_post_office === '')
		{
			$("#c_groom_post_office_msg").html("Please enter your post office name.");
			$("#c_groom_post_office_msg").show('slow');
			$("#c_groom_post_office").css("border-color","#F55");
			
			validation_flag = false;
			
		}		
		else if(c_groom_police_station === '')
		{
			$("#c_groom_police_station_msg").html("Please enter your police station name.");
			$("#c_groom_police_station_msg").show('slow');
			$("#c_groom_police_station").css("border-color","#F55");
			
			validation_flag = false;
			
		}		
		else if(c_groom_grmp_ward === '')
		{
			$("#c_groom_grmp_ward_msg").html("Please enter your gram panchayat or ward name.");
			$("#c_groom_grmp_ward_msg").show('slow');
			$("#c_groom_grmp_ward").css("border-color","#F55");
			
			validation_flag = false;
			
		}		
		// else if(c_groom_district == '')
		// {
		// 	$("#c_groom_district_msg").html("Please select your district.");
		// 	$("#c_groom_district_msg").show('slow');
		// 	$("#c_groom_district").css("border-color","#F55");
			
		// 	validation_flag = false;
			
		// }		
		// else if(c_groom_bmc == '')
		// {
		// 	$("#c_groom_bmc_msg").html("Please select your block / Muncipality / Corporation.");
		// 	$("#c_groom_bmc_msg").show('slow');
		// 	$("#c_groom_bmc").css("border-color","#F55");
			
		// 	validation_flag = false;
			
		// }		
		else if(c_groom_pin_code === '')
		{
			$("#c_groom_pin_code_msg").html("Please enter your pin code.");
			$("#c_groom_pin_code_msg").show('slow');
			$("#c_groom_pin_code").css("border-color","#F55");
			
			validation_flag = false;
			
		}
		
		else if(c_groom_pin_code != '' && c_groom_pin_code.length < 6)
		{
			$("#c_groom_pin_code_msg").html("Pin code should be of 6 digits.");
			$("#c_groom_pin_code_msg").show('slow');
			$("#c_groom_pin_code").css("border-color","#F55");
			
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
	
	
	$("#groom_first_name").focus(function(e) {
        
		$("#groom_first_msg").hide();
		$("#groom_first_name").css('border-color','');

    });
	
	$("#groom_middle_name").focus(function(e) {
        
		$("#groom_middle_msg").hide();
		$("#groom_middle_name").css('border-color','');
    });
	
	$("#groom_last_name").focus(function(e) {
        
		$("#groom_last_msg").hide();
		$("#groom_last_name").css('border-color','');
    });
	
	
	
	$("#groom_mother_f_name").focus(function(e) {
        
		$("#mother_first_msg").hide();
		$("#groom_mother_f_name").css('border-color','');
    });
	
	$("#groom_mother_m_name").focus(function(e) {
        
		$("#mother_middle_msg").hide();
		$("#groom_mother_m_name").css('border-color','');
    });
	
	$("#groom_mother_l_name").focus(function(e) {
        
		$("#mother_last_msg").hide();
		$("#groom_mother_l_name").css('border-color','');
    });		
	
	
	$("#groom_father_f_name").focus(function(e) {
        
		$("#father_first_msg").hide();
		$("#groom_father_f_name").css('border-color','');
    });
	
	$("#groom_father_m_name").focus(function(e) {
        
		$("#father_middle_msg").hide();
		$("#groom_father_m_name").css('border-color','');
    });
	
	$("#groom_father_l_name").focus(function(e) {
        
		$("#father_last_msg").hide();
		$("#groom_father_l_name").css('border-color','');
    });			
	
	
	$("#datepicker_dob_groom").focus(function(e) {
		
		$("#datepicker_dob_msg").hide();
		$(this).css("border-color","");
    });
	
	$("#datepicker_pdom_groom").focus(function(e) {
		
		$("#pdom_groom_msg").hide();
		$(this).css("border-color","");
    });
	
	$("#groom_mobile").focus(function(e) {
		
		$(this).css("border-color","");
		$("#groom_mobile_msg").hide();
    });
	
	$("#groom_family_income").focus(function(e) {
		
		$("#groom_family_income_msg").hide();
		$(this).css("border-color","");
    });	
	
	$("#groom_education").focus(function(e) {

        $("#groom_education_msg").hide();
		$(this).css("border-color","");
    });	
	
	$("#groom_caste").focus(function(e) {

        $("#groom_caste_msg").hide();
		$(this).css("border-color","");
    });

	$("#groom_religion").focus(function(e) {

        $("#groom_religion_msg").hide();
		$(this).css("border-color","");
    });
	
	
	$("#groom_village").focus(function(e) {

        $("#groom_village_msg").hide();
		$(this).css("border-color","");
    });
	
	$("#groom_house_number").focus(function(e) {

        $("#groom_house_number_msg").hide();
		$(this).css("border-color","");
    });
	
	$("#groom_street_name").focus(function(e) {

        $("#groom_street_name_msg").hide();
		$(this).css("border-color","");
    });
	
	$("#groom_post_office").focus(function(e) {

        $("#groom_post_office_msg").hide();
		$(this).css("border-color","");
    });
	
	$("#groom_police_station").focus(function(e) {

        $("#groom_police_station_msg").hide();
		$(this).css("border-color","");
    });
	
	$("#groom_grmp_ward").focus(function(e) {

        $("#groom_grmp_ward_msg").hide();
		$(this).css("border-color","");
    });
	
	$("#groom_district").focus(function(e) {

        $("#groom_district_msg").hide();
		$(this).css("border-color","");
    });
	
	$("#groom_bmc").focus(function(e) {

        $("#groom_bmc_msg").hide();
		$(this).css("border-color","");
    });
	
	$("#groom_pin_code").focus(function(e) {

        $("#groom_pin_code_msg").hide();
		$(this).css("border-color","");
    });
	
	
	$("#c_groom_village").focus(function(e) {

        $("#c_village_msg").hide();
		$(this).css("border-color","");
    });
	
	$("#c_groom_house_number").focus(function(e) {

        $("#c_house_number_msg").hide();
		$(this).css("border-color","");
    });
	
	$("#c_groom_street_name").focus(function(e) {

        $("#c_groom_street_name_msg").hide();
		$(this).css("border-color","");
    });
	
	$("#c_groom_post_office").focus(function(e) {

        $("#c_groom_post_office_msg").hide();
		$(this).css("border-color","");
    });
	
	$("#c_groom_police_station").focus(function(e) {

        $("#c_groom_police_station_msg").hide();
		$(this).css("border-color","");
    });
	
	$("#c_groom_grmp_ward").focus(function(e) {

        $("#c_groom_grmp_ward_msg").hide();
		$(this).css("border-color","");
    });
	
	$("#c_groom_district").focus(function(e) {

        $("#c_groom_district_msg").hide();
		$(this).css("border-color","");
    });
	
	$("#c_groom_bmc").focus(function(e) {

        $("#c_groom_bmc_msg").hide();
		$(this).css("border-color","");
    });
	
	$("#c_groom_pin_code").focus(function(e) {

        $("#c_groom_pin_code_msg").hide();
		$(this).css("border-color","");
    });	
	
	$("#groom_bank_name").focus(function(e) {

        $("#groom_bank_name_msg").hide();
		$(this).css("border-color","");
    });
	
	$("#groom_account_no").focus(function(e) {

	    $("#groom_account_no_msg").hide();
		$(this).css("border-color","");
    });
	
	$("#groom_ifs_branch_code").focus(function(e) {
	
	   $("#applicant_ifs_branch_code_msg").hide();
	   $(this).css("border-color","");
    });
	
	$("#groom_e_mail_id").focus(function(e) {
	
	   $("#groom_e_mail_id_msg").hide();
	   $(this).css("border-color","");
    });
	
	
	// jquery function to only alphabets
	
	$('#groom_first_name,	#groom_middle_name,	#groom_last_name,	#groom_mother_f_name,	#groom_mother_m_name,	#groom_mother_l_name,#groom_father_f_name,	#groom_father_m_name,	#groom_father_l_name,#groom_guardian_f_name,#groom_guardian_m_name,#groom_guardian_l_name').keydown(function (e) {
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
	  
	  	$('#groom_mobile,#groom_pin_code,#c_groom_pin_code,#groom_ifs_branch_code,#groom_family_income').keydown(function (e) {
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
		
	$('#datepicker_dob_groom,#datepicker_pdom_groom').keydown(function (e) {
		
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
			// setting value for current address fields
			
			$("#c_groom_village").val($("#groom_village").val());	// c_groom's village
			
			$("#c_groom_house_number").val($("#groom_house_number").val());
	
			$("#c_groom_house_number").val($("#groom_house_number").val());	//c_groom_house_number
		
			$("#c_groom_street_name").val($("#groom_street_name").val());	//c_groom_street_name
		
			$("#c_groom_post_office").val($("#groom_post_office").val()); //c_groom_post_office
		
			$("#c_groom_police_station").val($("#groom_police_station").val()); //c_groom_police_station
		
			$("#c_groom_grmp_ward").val($("#groom_grmp_ward").val()); //c_groom_grmp_ward
		
			$("#c_groom_district").val($("#groom_district").val()); // c_groom_district
		
			alert($("#groom_bmc").val());
			$("#c_groom_bmc").val($("#groom_bmc").val());	//c_groom_bmc

			//---------------c_groom_bmc-------------------------------//

			$('#c_groom_district').attr('disabled', 'disabled');
			$('#c_groom_bmc').attr('disabled', 'disabled');
			$("#c_groom_pin_code").val($("#groom_pin_code").val());	//c_groom_pin_code			
		}
		else
		{
			$("#c_groom_village").val('');
			
			$("#c_groom_house_number").val('');
	
			$("#c_groom_house_number").val('');	
		
			$("#c_groom_street_name").val('');	
		
			$("#c_groom_post_office").val(''); 
		
			$("#c_groom_police_station").val(''); 
		
			$("#c_groom_grmp_ward").val(''); 
			
			$("#c_groom_district").val(''); 

			$("#c_groom_district").removeAttr("disabled");

		    $('#c_groom_bmc').css('display','block');

		    $("#c_groom_bmc").val('');
			$("#c_groom_pin_code").val('');
		}
    });
	
	
	
	// code to implement length validation
	
	
	$("#groom_mobile,").focusout(function(e) {
		$("#groom_mobile_msg").hide();
    });
	
	
	$("#groom_mobile").bind('keypress keyup keydown',function(e) {
		
		if($(this).val().length < 10)
		{
			$("#groom_mobile_msg").html("Invalid mobile number.Should be of 10 digits.");
			$("#groom_mobile_msg").show();
		}
		else
		{
			$("#groom_mobile_msg").hide();
		}
		
    });
});// JavaScript Document