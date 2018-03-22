//var j = jQuery.noConflict();

$(document).ready(function(e){


	
	$("#basic_form_entry_declaration_upload").submit(function(e)
	{
		// for applicant age proof
		var applicant_age_proof_doc_name = $("#applicant_age_proof_doc_name").val();
		
		var applicant_age_proof_doc = $("#applicant_age_proof_doc").val();
		
		var extension_age_proof_doc = applicant_age_proof_doc.substring(applicant_age_proof_doc.lastIndexOf('.') + 1).toLowerCase();

		// for groom age proof
		
		var groom_age_proof_doc_name = $("#groom_age_proof_doc_name").val();
		
		var groom_age_proof_doc = $("#groom_age_proof_doc").val();
		
		var extension_groom_age_proof_doc = groom_age_proof_doc.substring(groom_age_proof_doc.lastIndexOf('.') + 1).toLowerCase();
		

		// for applicant never  married status proof
		
		var applicant_never_married_doc_name = $("#applicant_never_married_doc_name").val();
		
		var applicant_never_married_doc = $("#applicant_never_married_doc").val();
		
		var extension_applicant_never_married_doc = applicant_never_married_doc.substring(applicant_never_married_doc.lastIndexOf('.') + 1).toLowerCase();
		
		
		// for applicant family income proof
		
		var applicant_family_income_doc_name = $("#applicant_family_income_doc_name").val();
		
		var applicant_family_income_doc = $("#applicant_family_income_doc").val();
		
		var extension_applicant_family_income_doc = applicant_family_income_doc.substring(applicant_family_income_doc.lastIndexOf('.') + 1).toLowerCase();
		
		
		// for applicant address proof
		
		var applicant_address_proof_doc_name = $("#applicant_address_proof_doc_name").val();
		
		var applicant_address_proof_doc = $("#applicant_address_proof_doc").val();
		
		var extension_applicant_address_proof_doc = applicant_address_proof_doc.substring(applicant_address_proof_doc.lastIndexOf('.') + 1).toLowerCase();
				
		// for applicant bank account details proof
		
		var applicant_bank_acc_details_doc_name = $("#applicant_bank_acc_details_doc_name").val();
		
		var applicant_bank_acc_details_doc = $("#applicant_bank_acc_details_doc").val();
		
		var extension_applicant_bank_acc_details_doc = applicant_bank_acc_details_doc.substring(applicant_bank_acc_details_doc.lastIndexOf('.') + 1).toLowerCase();
		
		// for applicant proposed marriage proof
		
		var applicant_proposed_marriage_proof_doc_name = $("#applicant_proposed_marriage_proof_doc_name").val();
		
		var applicant_proposed_marriage_proof_doc = $("#applicant_proposed_marriage_proof_doc").val();
		
		var extension_applicant_proposed_marriage_proof_doc = applicant_proposed_marriage_proof_doc.substring(applicant_proposed_marriage_proof_doc.lastIndexOf('.') + 1).toLowerCase();
		
		var flag = $("#self_declarn_check").prop("checked");
		
		
		
		if(applicant_age_proof_doc_name == "NA")
		{
			$("#applicant_age_proof_doc_name").css("border-color","#F55");
			$("#applicant_age_proof_doc_name_msg").html("Please specify document name as your age proof");
			$("#applicant_age_proof_doc_name_msg").show('slow');
			
			return false;
		}
		else if(applicant_age_proof_doc === '')
		{
			$("#applicant_age_proof_doc_msg").html("Please upload your file for age proof");
			$("#applicant_age_proof_doc_msg").show();
			$("#applicant_age_proof_doc").css("border-color","#F55");
			
			return false;
		}
		
		else if(!(extension_age_proof_doc == "jpeg" || extension_age_proof_doc == "jpg"))
		{
			$("#applicant_age_proof_doc_msg").html("Only JPG or JPEG format is allowed.");
			$("#applicant_age_proof_doc_msg").show();
			$("#applicant_age_proof_doc").css("border-color","#F55");
			return false;
		}
		
		
		else if(groom_age_proof_doc_name == "NA")
		{
			$("#groom_age_proof_doc_name_msg").html("Please specify document name as prospective groom's age proof");
			$("#groom_age_proof_doc_name_msg").show();
			$("#groom_age_proof_doc_name").css("border-color","#F55");
			return false;
		}
		
		else if(groom_age_proof_doc === "")
		{
			$("#groom_age_proof_doc_msg").html("Please upload your file for prospective groom's age proof");
			$("#groom_age_proof_doc_msg").show();
			$("#groom_age_proof_doc").css("border-color","$F55");
			return false;
		}
		
		else if(!(extension_groom_age_proof_doc == "jpeg" || extension_groom_age_proof_doc == "jpg"))
		{
			$("#groom_age_proof_doc_msg").html("Only JPG or JPEG format is allowed.");
			$("#groom_age_proof_doc_msg").show();
			$("#groom_age_proof_doc").css("border-color","$F55");
			return false;
		}
		
		else if(applicant_never_married_doc_name == "NA")
		{
			$("#applicant_never_married_doc_name_msg").html("Please specify document name as prospective groom's age proof");
			$("#applicant_never_married_doc_name_msg").show();
			$("#applicant_never_married_doc_name").css("border-color","#F55");
			return false;
		}
		
		else if(applicant_never_married_doc === "")
		{
			$("#applicant_never_married_doc_msg").html("Please upload your file for prospective groom's age proof");
			$("#applicant_never_married_doc_msg").show();
			$("#applicant_never_married_doc").css("border-color","$F55");
			return false;
		}
		
		else if(!(extension_applicant_never_married_doc == "jpeg" || extension_applicant_never_married_doc == "jpg"))
		{
			$("#applicant_never_married_doc_msg").html("Only JPG or JPEG format is allowed.");
			$("#applicant_never_married_doc_msg").show();
			$("#applicant_never_married_doc").css("border-color","$F55");
			return false;
		}
		
		else if(applicant_family_income_doc_name == "NA")
		{
			$("#applicant_family_income_doc_name_msg").html("Please specify document name as prospective groom's age proof");
			$("#applicant_family_income_doc_name_msg").show();
			$("#applicant_family_income_doc_name").css("border-color","#F55");
			return false;
		}
		
		else if(applicant_family_income_doc === "")
		{
			$("#applicant_family_income_doc_msg").html("Please upload your file for prospective groom's age proof");
			$("#applicant_family_income_doc_msg").show();
			$("#applicant_family_income_doc").css("border-color","$F55");
			return false;
		}
		
		else if(!(extension_applicant_family_income_doc == "jpeg" || extension_applicant_family_income_doc == "jpg"))
		{
			$("#applicant_family_income_doc_msg").html("Only JPG or JPEG format is allowed.");
			$("#applicant_family_income_doc_msg").show();
			$("#applicant_family_income_doc").css("border-color","$F55");
			return false;
		}
		
		else if(applicant_address_proof_doc_name == "NA")
		{
			$("#applicant_address_proof_doc_name_msg").html("Please specify document name as your address proof");
			$("#applicant_address_proof_doc_name_msg").show();
			$("#applicant_address_proof_doc_name").css("border-color","#F55");
			return false;
		}
		
		else if(applicant_address_proof_doc === "")
		{
			$("#applicant_address_proof_doc_msg").html("Please upload your file for address proof");
			$("#applicant_address_proof_doc_msg").show();
			$("#applicant_address_proof_doc").css("border-color","$F55");
			return false;
		}
		
		else if(!(extension_applicant_address_proof_doc == "jpeg" || extension_applicant_address_proof_doc == "jpg"))
		{
			$("#applicant_family_income_doc_msg").html("Only JPG or JPEG format is allowed.");
			$("#applicant_family_income_doc_msg").show();
			$("#applicant_family_income_doc").css("border-color","$F55");
			return false;
		}
		
		else if(applicant_bank_acc_details_doc_name == "NA")
		{
			$("#applicant_bank_acc_details_doc_name_msg").html("Please specify document name as bank account details proof");
			$("#applicant_bank_acc_details_doc_name_msg").show();
			$("#applicant_bank_acc_details_doc_name").css("border-color","#F55");
			return false;
		}
		
		else if(applicant_bank_acc_details_doc === "")
		{
			$("#applicant_bank_acc_details_doc_msg").html("Please upload your file for bank account details proof");
			$("#applicant_bank_acc_details_doc_msg").show();
			$("#applicant_bank_acc_details_doc").css("border-color","$F55");
			return false;
		}
		
		else if(!(extension_applicant_bank_acc_details_doc == "jpeg" || extension_applicant_bank_acc_details_doc == "jpg"))
		{
			$("#extension_applicant_bank_acc_details_doc_msg").html("Only JPG or JPEG format is allowed.");
			$("#extension_applicant_bank_acc_details_doc_msg").show();
			$("#extension_applicant_bank_acc_details_doc").css("border-color","$F55");
			return false;
		}
		
		else if(applicant_proposed_marriage_proof_doc_name == "NA")
		{
			$("#applicant_proposed_marriage_proof_doc_name_msg").html("Please specify document name as your proposed marriage proof");
			$("#applicant_proposed_marriage_proof_doc_name_msg").show();
			$("#applicant_proposed_marriage_proof_doc_name").css("border-color","#F55");
			return false;
		}
		
		else if(applicant_proposed_marriage_proof_doc === "")
		{
			$("#applicant_proposed_marriage_proof_doc_msg").html("Please upload your file for proposed marriage proof");
			$("#applicant_proposed_marriage_proof_doc_msg").show();
			$("#applicant_proposed_marriage_proof_doc").css("border-color","$F55");
			return false;
		}
		
		else if(!(extension_applicant_proposed_marriage_proof_doc == "jpeg" || extension_applicant_proposed_marriage_proof_doc == "jpg"))
		{
			$("#applicant_proposed_marriage_proof_doc_msg").html("Only JPG or JPEG format is allowed.");
			$("#applicant_proposed_marriage_proof_doc_msg").show();
			$("#applicant_proposed_marriage_proof_doc").css("border-color","$F55");
			return false;
		}
		
		else if(flag == false)
		{
			$("#declaration_msg").html("Please mark the declaration above.")
			$("#declaration_msg").show();
			$("#self_declarn_check").css("border-color","#F55");
			return false;
		}
		else if(flag == true)
		{
			$("#declaration_msg").hide();
			$("#self_declarn_check").css("border-color","");
		}
		
	});
	
	
	$("#applicant_age_proof_doc_name").focus(function(e) {
        $(this).css("border-color","");
		$("#applicant_age_proof_doc_name_msg").hide();		
    });
	
	
	$("#applicant_age_proof_doc").focus(function(e) {
        $(this).css("border-color","");
		$("#applicant_age_proof_doc_msg").hide();		
    });
	
	// checking file contnet for age proof document
	
	$("#applicant_age_proof_doc").on('change',function(){
				
		var size = this.files[0].size;
		size = (size)/1024;
		size = Math.round(size);
		
		if(size > 500)
		{
			$("#applicant_age_proof_doc_msg").html("Scanned image size should not exceed more than 500 KB");
			$("#applicant_age_proof_doc_msg").show();
			$("#applicant_age_proof_doc").css("border-color","#F55");
		}
	});
});
