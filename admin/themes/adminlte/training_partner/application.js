$( document ).ready(function() {
	
	//PDF View
	$(".pdf_view").click(function(){
		var file_hash = $(this).attr('href');
		//alert(file_hash);
		$('#myModal .modal_title').text('View PDF');
		$('#modal_view').html(file_hash);
		var url = 'training_partner/applications/ajax_pdf_view';
		$.ajax({
			type: 'POST',
			data: {
				'file_hash':file_hash,
				'csrf_pbssd':$.cookie('csrf_cookie_pbssd')
			},
			url: url,
			success: function(result){
				$('#modal_view').html(result);
			},
			 beforeSend: function(){
				$('#modal_view').html('<div class="loader_con"><div class="loader"></div>Loading ...</div>');
			}
		});
	});
	
	//Application Details View
	$(".reg_view").click(function(){
		var file_hash = $(this).attr('href');
		$('#myModal .modal_title').text('View Application');
		//alert(file_hash);
		
		$('#modal_view').html(file_hash);
		var url = 'training_partner/applications/ajax_view_more/'+file_hash;
		$.ajax({
			type: 'GET',
			url: url,
			success: function(result){
				$('#modal_view').html(result);
			},
			 beforeSend: function(){
				$('#modal_view').html('<div class="loader_con"><div class="loader"></div>Loading ...</div>');
			}
		});
	});
	//Rejection
//	$('.reject_apl').click(function(){
//		var pt_hash = $(this).attr('href');
//		$('input[name="hash"]').val($(this).attr('href'));
//	});
	
	//Approve
	$('.approve_apl').click(function(){
		var pt_hash = $(this).attr('href');
		//$('#modal_view').html('aaaaaaaaaa');
		//$('#myModal .modal_title').text('Application Approve');
		
		var url = 'training_partner/applications/ajax_approve/'+pt_hash;
		$.ajax({
			type: 'GET',
			url: url,
			success: function(result){
				$('.modal_success_content').html(result);
			}
		});
	});
	
	//Reject
	$('.reject_apl').click(function(){
		var pt_hash = $(this).attr('href');
		//$('#modal_view').html('aaaaaaaaaa');
		//$('#myModal .modal_title').text('Application Approve');
		
		var url = 'training_partner/applications/ajax_reject/'+pt_hash;
		$.ajax({
			type: 'GET',
			url: url,
			success: function(result){
				$('.modal_reject_content').html(result);
			}
		});
	});

});