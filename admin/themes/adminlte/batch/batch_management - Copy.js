$(document).ready(function () {
	
	var corse_dur=$('#course_duration').val();
	alert(corse_dur);
	$('#show_btn').hide();
	
	var date_st = new Date();
	date_st.setDate(date_st.getDate());
	
	var date_ed = new Date();
	date_ed.setDate(date_ed.getDate()+1);
	
	$('#datepicker_batch_ed').datepicker({
        format: "dd-mm-yyyy",
        //startDate: date_ed,
		autoclose: true
    }).on('changeDate', function(e) {
        $('#create_btch').formValidation('revalidateField', 'dbe');
    });
	
	
	$('#datepicker_batch_st').datepicker({
        format: "dd-mm-yyyy",
        startDate: date_st,
		autoclose: true,
        minDate:  0,
        onSelect: function(date){            
            
			var date1 = $('#datepicker_batch_st').datepicker('getDate');           
            var date = new Date( Date.parse( date1 ) ); 
            date.setDate( date.getDate() + 73);        
            var newDate = date.toDateString(); 
            newDate = new Date( Date.parse( newDate ) );                      

            $('#datepicker_batch_ed').datepicker("option","minDate",newDate); 
          
        }
    }).on('changeDate', function(e) {
        $('#create_btch').formValidation('revalidateField', 'dbs');
    });
	
    
    
    var $checkboxes = $('#create_btch td input[type="checkbox"]');
    
    $checkboxes.change(function(){
        var countCheckedCheckboxes = $checkboxes.filter(':checked').length;
        $('#show_checked_trainee').text(countCheckedCheckboxes+' no of trainee selected');
        
        if(countCheckedCheckboxes>14 && countCheckedCheckboxes<31)
        {
        	$('#show_inst').hide();
        	$('#show_btn').show();
        }
        else
        {
        	$('#show_btn').hide();
        	$('#show_inst').show();
        }
    });
    $('#create_btch').formValidation({
		message: 'This value is not valid',
		icon: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {
			dbs: {
			row: '.common_input_div',
			validators: {
				notEmpty: {
					message: 'Start date Required'
				},
				date: {
					 format: 'DD-MM-YYYY',
					 message: 'Start date is not a valid'
					}
				 }
			},
			dbe: {
			row: '.common_input_div',
			validators: {
				notEmpty: {
					message: 'End date Required'
				},
				date: {
					 format: 'DD-MM-YYYY',
					 message: 'End date is not a valid'
					}
				 }
			},
			'appl_id[]': {
				row: '.common_input_div',
                validators: {
                    choice: {
                        min: 15,
                        max: 30,
                        message: 'The Batch must have 15 to 30 trainee'
                    }
                }
            }
		}
}).on('success.form.fv', function(e) {
	// Prevent form submission
	e.preventDefault();
	
	var start_date=$("#datepicker_batch_st").val();
	var end_date=$("#datepicker_batch_ed").val();

	function parseDate(str) {
		var mdy = str.split('-');
		return new Date(mdy[2], mdy[1]-1, mdy[0]);
		}

	function daydiff(first, second) {
		return Math.round((second-first)/(1000*60*60*24));
		}
	//alert(parseDate(start_date));
	var daydiff_vr1= daydiff(parseDate(start_date), parseDate(end_date));
	
	if(daydiff_vr1 < 1)
	{
		$("#end_date_div").removeClass("has-success","has-error");
		$("#end_date_div").addClass("has-error");
		$("#end_date_div").remove("i");
		$(".hpa_end_date").remove();
		$("#end_date_div").append('<i class="form-control-feedback fv-icon-no-label fv-bootstrap-icon-input-group glyphicon glyphicon-remove" data-fv-icon-for="end_date" style="display: block;"></i><small class="help-block hpa_end_date" data-fv-validator="notEmpty" data-fv-for="end_date" data-fv-result="INVALID" style="display: block;">End date cannot be previous/same of start date.</small>');
		$("#datepicker_batch_ed").focus();
		return false;
	}
	
	
	
	
	 // You can get the form instance
    var $form = $(e.target);

    // and the FormValidation instance
    var fv = $form.data('formValidation');
	fv.defaultSubmit();
});
});