<?php $this->load->view($this->config->item('theme_uri').'layout/header_view'); ?>
<?php $this->load->view($this->config->item('theme_uri').'layout/left_menu_view'); ?>
<?php     $applicant_id = $this->session->userdata('d_cd'); ?>
  <!-- Content Wrapper. Contains page content -->
<link rel="stylesheet" href="<?php echo base_url();?>admin/assets/image_tool_css/style_ocr.css" />
<link rel="stylesheet" href="<?php echo base_url();?>admin/assets/image_tool_css/canvasCrop_ocr.css" />
<style>
    .tools{
        margin-top: 20px;
    }
    .tools span{
        float: left;
        display: inline-block;
        padding: 5px 20px;
        background-color: #f40;
        color: #fff;
        cursor: pointer;
        margin-bottom: 5px;
        margin-right: 5px;
    }
    .clearfix {
        *zoom: 1;
    }
    .clearfix:before{
        content: " ";
        display: table;
    }
    .clearfix:after{
        content: " ";
        display: table;
        clear: both;
    }
    .cropPoint{
        position: absolute;
        height: 8px;
        width: 8px;
        background-color: rgba(255,255,255,0.7);
        cursor: pointer;
    }
    /*.upload-wapper{
        position: relative;
        float: left;
        height: 26px;
        line-height: 26px;
        width: 132px;
        background-color: #f40;
        color: #fff;
        text-align: center;
        overflow: hidden;
        cursor: pointer;
    }*/
    /*#upload-file{
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
        filter: alpha(opacity=0);
        width: 132px;
        height: 26px;
        cursor: pointer;
    }*/
	
	
 .numplet{
		border: 2px solid #8B0000;
		position: absolute;
		left: 532px; 
		top: 63px;
		height: 25px;
    	width: 100px;
		z-index: 9;
		cursor: grab;
		}
		
.britcont {
		height: 16px;
		width: 136px;
		}
</style>
 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Online Rupashree Prakalpa Application Form - Declaration Upload
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard fa-2x"></i> Home</a></li>
        <li><a href="login/logout"><i class="fa fa-sign-out fa-2x"></i> Logout</a></li>
      	</ol>
    </section>

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
    <div class="box box-success">
            	<div class="box-header with-border">
           		 <h3 class="box-title"> 
            		<font color="#660033"><strong>Rupashree Unique Applicant ID&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $applicant_id ;?></strong></font>
            	</h3>
           		 </div>
            </div>
    <?php echo form_open_multipart('./admin/form_entry/BasicFormEntry/submit_declaration'); ?>
    	<div class="box" style="border-color:#605ca8;">
            <div class="box-header with-border">
              <h3 class="box-title">Upload Scanned Copy of Declaration in the Form</h3>
            </div>
            
	
            
            <div class="box-body">
	           	
                <div class="form-group">
                	<div class="row">
                    	<div class="col-sm-12">
    	                	<label>Upload Scanned Copy&nbsp;<font color="red">*</font></label>
						</div>
                        
                    </div>
                    
        	      	<div class="row">
                    	<div class="col-sm-6">
                        	<input type="file" id="upload-file"  name="upload_file" class="form-control">
                        	<span class="error_info" id="upload_file_msg"></span>
						</div>   
                        <div class="col-sm-6">
                        	<button type="button" class="btn" id="rotateLeft" style="border-color:#605ca8; color:white; background-color:#605ca8;">Rotate Left</button>
        					<button type="button" class="btn" id="rotateRight" style="border-color:#605ca8; color:white; background-color:#605ca8;">Rotate Right</button>
					        <button type="button" class="btn" id="zoomIn" style="border-color:#605ca8; color:white; background-color:#605ca8;">Zoom In</button>
					        <button  type="button" class="btn" id="zoomOut" style="border-color:#605ca8; color:white; background-color:#605ca8;">Zoom Out</button>
					        <button type="button" class="btn" id="crop" style="border-color:#605ca8; color:white; background-color:#605ca8;">Crop</button>
					        <button type="button" class="btn" id="alertInfo" style="border-color:#605ca8; color:white; background-color:#605ca8;">Detect OCR</button>
                        </div>
              		</div>
            </div>
            
            	<div class="row">
                	<div class="col-sm-6">
                        <div class="numplet"  id="numplets"></div>
				        <div class="imageBox" >
                        <div class="mask"></div>
                        <div class="thumbBox"></div>
                        <div class="spinner" style="display: none">Loading...</div></div>
                    </div>
                    </div>
                    <br />
                    <div class="row">
                    <div class="col-sm-6">
                    	<input type="hidden" id="serial" value="0000402">
				        <div id="pic_cont" >
        </div>
				        <div id="pic" style="display:none">
        </div>
				        <div class="paneldiv">
        <div class="brdiv" id="form_ocrd">
        <input class="btn btn-success" type="submit" name="upload" id="upload" value="submit" align="right" style="display:none;" />
        </div>
        </div>
                    </div>
                </div>
            </div>
            
		</div>

<?php echo form_close();?>

</section>    
  </div>
<?php $this->load->view($this->config->item('theme_uri').'layout/footer_view'); ?>

<script src="<?php echo base_url();?>admin/assets/image_tool_js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url();?>admin/assets/image_tool_js/jquery.canvasCrop.js" ></script>
<script src="<?php echo base_url();?>admin/assets/image_tool_js/Tesseract.js" ></script>
<script src="<?php echo base_url();?>admin/assets/image_tool_js/jquery-ui.js" ></script>

<script type="text/javascript">

 $(function() { $('.numplet').draggable(); });
    $(function(){
        var rot = 0,ratio = 1;
        var CanvasCrop = $.CanvasCrop({
            cropBox : ".imageBox",
            imgSrc : "<?php echo base_url();?>admin/assets/image_tool_image/OCR_SCAN.jpg",
            limitOver : 2
        });
		//var CropNumber = $.CanvasCrop({
       //     cropBox : ".numplet",
      //      imgSrc : "images/avatar.jpg",
      //      limitOver : 2
      //  });        
	  
        $('#upload-file').on('change', function(){
			
			MAX_SIZE = 500;
			var FileUploadPath = this.value;
			//alert(FileUploadPath);
			if (FileUploadPath == '') {
   				 alert("Please upload an image");
				 return false;
			}
			else {
   			 var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
			 
			  if (Extension == "jpg" || Extension == "jpeg") 
			  {
				  
				   if (this.files && this.files[0]) {

                		var size = this.files[0].size;

                		if(size > (MAX_SIZE+5)*1024){
                    		alert("Images must be under 500Kb in size");
                    		return false;
               			 }
						 else{

            var reader = new FileReader();
            reader.onload = function(e) {
                CanvasCrop = $.CanvasCrop({
                    cropBox : ".imageBox",
                    imgSrc : e.target.result,
                    limitOver : 2
                });
                rot =0 ;
                ratio = 1;
				$('.thumbBox').html('');
            }
            reader.readAsDataURL(this.files[0]);
			 
			}
						}
				   }
				   else
						{
							alert("Select a JPEG image for the upload");
							return false;
						}
			  }
        });
        
        $("#rotateLeft").on("click",function(){
            rot -= 5;
            rot = rot<90?360:rot;
            CanvasCrop.rotate(rot);
			//$('.thumbBox').html('');
        });
        $("#rotateRight").on("click",function(){
            rot += 5;
            rot = rot>360?90:rot;
            CanvasCrop.rotate(rot);
			//$('.thumbBox').html('');
        });
        $("#zoomIn").on("click",function(){
            ratio =ratio*1.1;
            CanvasCrop.scale(ratio);
			//$('.thumbBox').html('');
        });
        $("#zoomOut").on("click",function(){
			ratio =ratio*0.9;
            CanvasCrop.scale(ratio);
			//$('.thumbBox').html('');
        });
		
        $("#alertInfo").on("click",function(){
			
			//alert('hello');
          var image = new Image();
		 
		   image.src=CanvasCrop.getDataURL("jpeg");
		  // image.src=CanvasCrop.getDataURL("jpeg");;
		   var  imgcanvas= document.createElement("canvas");
		   //document.getElementById('myCanvas')
		   //714 20%/142.8 595 116 - 43 73 
		   
		   var context=imgcanvas.getContext("2d");
		   
		  
		   
		  // context.scale(2,2); 27 -73 =4
		      //    var riox=parseInt($('.numplet').css('left').replace(/\D+$/g, '')) + 1;
		//positionX=  $('.thumbBox').css('left').replace(/\D+$/g, '')  ;
//var  posX= parseInt($('.numplet').css('left').replace(/[^-\d\.]/g, '')) + parseInt($('.thumbBox').css('left').replace(/[^-\d\.]/g, '')) ;
	//	 var  posY= parseInt($('.thumbBox').css('top').replace(/[^-\d\.]/g, '')) + parseInt($('.thumbBox').css('margin-top').replace(/[^-\d\.]/g, '')) + $('.numplet').css('width').replace(/[^-\d\.]/g, '');
		  // alert(posX) ;thumbBox
		  
		  var positionX= parseInt($('.numplet').css('left').replace(/\D+$/g, '')) ;
		  
		  var rrr=parseInt($('.thumbBox').css('top').replace(/\D+$/g, '')) + parseInt($('.thumbBox').css('margin-top').replace(/\D+$/g, ''))
		  var uuu=parseInt($('.thumbBox').css('left').replace(/\D+$/g, '')) + parseInt($('.thumbBox').css('margin-left').replace(/\D+$/g, ''))
		 
		  
		  positionX=positionX-uuu -3;
		  
		  
		// positionX= posX ;
		//  positionY= posY;
		//   alert(positionX);
		//var rioy=parseInt($('.numplet').css('top').replace(/\D+$/g, '')) +1 ;
		var positionY= parseInt($('.numplet').css('top').replace(/\D+$/g, '')) ;//-99;
		
		positionY=positionY-rrr -2;
		// alert(positionX  ) ; alert(positionY ) ;
	//	alert(positionY);
		var cropY= $('.numplet').css('height').replace(/[^-\d\.]/g, '');
		//alert(cropY);
		var cropX=$('.numplet').css('width').replace(/[^-\d\.]/g, '');
		//var csscont=$('.britcont').css('height').replace(/[^-\d\.]/g, '');
		
		//alert(cropX);
		//alert(image.width);
		var resizX=imgcanvas.width=cropX;
		var resizY=imgcanvas.height=cropY;
		context.fillStyle = "white";
        context.fillRect(0, 0, cropX, cropY);
		
        var imgData = context.getImageData(0, 0, cropX, cropY);
		
		//alert(imgData);
		
        context.putImageData(imgData, cropX,cropY);
		context.imageSmoothingEnabled = false;
        context.drawImage(image,positionX,positionY,cropX,cropY,0,0,resizX,resizY);
		
		//imgcanvas.draw(image).brightnessContrast(0.16, 1).update();
		
		//var contra=contrastImage(context.getImageData(0,0,resizX,resizY), csscont);
		//context.putImageData(contra,0,0);
		
		//var srcd=  imgcanvas.toDataURL("image/jpeg");
	  // document.getElementById('imgout').src=srcd;
	//	document.getElementById('imgout').src=imgcanvas.toDataURL("image/jpeg");
		////////////////////////OCR////////////////////////////////////////////////
	   
	   Tesseract.recognize(imgcanvas,{
		
		progress: function(e){
			//console.log(e);
			
		}
	}).then(function(d){
	//console.log(d);
	var applicant_serial_no = document.getElementById('serial').value;
	//var applicant_serial_no = 0000402;
	var crop_applicant_serial_no = d.text.replace(/\D/g,'');
	
	alert(crop_applicant_serial_no);
	
	//document.getElementById('serial1').value=d.text;
	//alert(applicant_serial_no);
	
	if(crop_applicant_serial_no == '')
	{
			alert("OCR Detection not successful!! Please Try Again");	
	}
	else
	{
			alert(crop_applicant_serial_no);
			
			var length = crop_applicant_serial_no.toString().length;
			//alert(length);
				if (crop_applicant_serial_no.toString().length < 7){
				var lenval = crop_applicant_serial_no.toString().length;
				var dif = 7 - lenval;
				while (dif != 0){
				crop_applicant_serial_no = "0" + crop_applicant_serial_no;
				dif= dif-1;
				}
				
				} 
				alert(crop_applicant_serial_no);
		
		if(crop_applicant_serial_no!=applicant_serial_no){
			alert("Form serial number is not matched.");
		}
		else
		{
			alert("Form serial number is matched.Please submit the document!!");
			
			
			document.getElementById('upload').style.display = 'block';
			
			/*document.getElementById('upload').style.display = 'block';
			document.getElementById('rotateLeft').style.display = 'none';
			document.getElementById('rotateRight').style.display = 'none';
			document.getElementById('zoomIn').style.display = 'none';
			document.getElementById('zoomOut').style.display = 'none';
			document.getElementById('crop').style.display = 'none';
			//document.getElementById('alertInfo').style.display = 'none';
			document.getElementById('detect').style.display = 'none';*/
		}
		
	}
	
	} );
	   
//	   var img_ocr = new Image();
		// img_ocr.src=srcd;
		 // OCRAD(img_ocr,{numeric:true}, function(text){
							//document.getElementById('transcription').className = "done";
							//document.getElementById('transcription').innerText = text;
					//		alert(text);
					//	})
		       });
        
        $("#crop").on("click",function(){
            
            var src = CanvasCrop.getDataURL("jpeg");
			//alert(src);
			//var aaaa= bin2hex(src);
			//$("#imgdata").val(src);
		    $("#pic").html('<img id="picture" src="'+src+'" />');
			alert("Crop done Successfully !!! Now Click on (Detect OCR) button for further processing")
            //$("body").append("<div style='word-break: break-all;'>"+src+"</div>");  
            //$("#pic_cont").html('<img id="picture" src="'+src+'" />');
			//$('.thumbBox').html('');
			var crop_applicant_serial_no = d.text.replace(/\D/g,'');
			
			
			//document.getElementById('serial1').value=d.text;
			alert(crop_applicant_serial_no);
        });
		
		 $("#numplate").on("click",function(){
           // var src = CropNumber.getDataURL("jpeg");
			//alert('ojojj');
            //$("body").append("<div style='word-break: break-all;'>"+src+"</div>");  
          //  $("#pic_cont").html('<img id="picture" src="'+src+'" />');
			//$('.thumbBox').html('');
        });
		
        
        console.log("ontouchend" in document);
    })
</script>
