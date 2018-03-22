<?php $this->load->view($this->config->item('theme_uri').'layout/header_view'); ?>
<?php $this->load->view($this->config->item('theme_uri').'layout/left_menu_view'); ?>
<?php
    
    $applicant_id = $this->session->userdata('d_cd');

?>

  <!-- Content Wrapper. Contains page content -->


<link rel="stylesheet" href="<?php echo base_url();?>admin/assets/image_tool_css/cropbox.css" />
<link rel="stylesheet" href="<?php echo base_url();?>admin/assets/image_tool_css/canvasCrop.css" />
<link rel="stylesheet" href="<?php echo base_url();?>admin/assets/css/font-awesome.min.css" />
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
        background-image:url(image_tool_image/rotate_left-512.png)
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
</style>
<style>
  .face {
  border:2px solid #FFF;
  }
</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
      
		<section class="content-header">
    		<h1>
				Online Rupashree Prakalpa Application Form - Image Upload
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
        	<div class="box box-success">
            	<div class="box-header with-border">
              		<h3 class="box-title"><strong>Upload Image of Applicant</strong></h3>
            	</div>
                
				<div class="box-body">
             		<div class="form-group">
                    	<div class="row">
                        	<div class="col-sm-6">
                            	<div class="paneldiv">
                					<div class="brdiv">
						                <div class="imageBox" >
							                <div class="mask"></div>
						    	            <div class="thumbBox"></div>
							                <div class="spinner" style="display: none">Loading...</div>
						                </div>
                                        <br clear="all"/> 
						                Photograph must be under [50 Kb] &nbsp;<font color="#FF0000">[JPG,JPEG ONLY]</font>
        							</div>

        						</div>
                            </div>
                            
                            <div class="col-sm-6">
                            	<div class="fieldsetdiv" id="tumbnail_blck" style="display:none">
                                	<div class="paneldiv">
							           <div class="brdiv">
									   		<?php echo form_open_multipart('admin/form_entry/BasicFormEntry/savephoto/'); ?>
											<div class="" id="pic_cont1" style="height: 200px; width: 200px;">                    
					                        <div id="pic_cont"  style="height:200px;width:200px;position:absolute;"></div>
                                        </div>
				                        <input type="hidden" value="imgdata" name="imgdata" id="imgdata" />
                        				<br />
                        				<button class="btn btn-success"  type="submit" name="upload" id="upload" style="display:none;">
                                        	Submit
                                        </button>
						                <?php echo form_close();?>
        								
          								</div>
    								</div>
       							</div>
                            </div>
                        </div>
                        
                        <div class="row">
                        	<div class="col-sm-6">
            	                <input type="file" id="upload-file"  name="img" class="form-control">
                             </div>
						</div>
                    </div>
				</div>
                
                <div class="box">
	                <div class="box-body">
    	         		<div class="form-group">
                        	<table width="50%">
                            	<tr>
                                	<td><button class="btn btn-success" id="rotateLeft">Rotate Left</button></td>
                                    <td><button class="btn btn-success" id="rotateRight">Rotate Right</button></td>
                                    <td><button class="btn btn-success" id="zoomIn">Zoom In</button></td>
                                    <td><button class="btn btn-success" id="zoomOut">Zoom Out</button></td>
                                    <td><button class="btn btn-success" id="crop">Crop</button></td>
                                    <td><button class="btn btn-success" id="detect">Detect Photo</button></td>
                                </tr>
							</table>
						</div>
					</div>
				</div>
			</div>             
    </section>
  </div>
<?php $this->load->view($this->config->item('theme_uri').'layout/footer_view'); ?>

<script src="<?php echo base_url();?>/admin/assets/image_tool_js/jquery.canvasCrop.js" ></script>
<script src="<?php echo base_url();?>/admin/assets/image_tool_js/ccv.js" ></script>
<script src="<?php echo base_url();?>/admin/assets/image_tool_js/face.js" ></script>
<script src="<?php echo base_url();?>/admin/assets/image_tool_js/jquery.facedetection.js" ></script>

 
<script type="text/javascript">
  function bin2hex(str)  
  {  
  //alert("11111111111");
    var arr1 = [];  
    for (var n = 0, l = str.length; n < l; n ++)   
     {  
        var hex = Number(str.charCodeAt(n)).toString(16);  
        arr1.push(hex);  
     }  
    return arr1.join('');  
   }  
    $(function(){
        var rot = 0,ratio = 1;
        var CanvasCrop = $.CanvasCrop({
            cropBox : ".imageBox",
            imgSrc : "<?php echo base_url();?>/admin/assets/image_tool_image/avatar.jpg",
            limitOver : 2
        });
        $('#upload-file').on('change', function(){

			
			//document.getElementById('tumbnail_blck').style.display = 'none';
			//document.getElementById('rotateLeft').style.display = 'block';
			//document.getElementById('rotateRight').style.display = 'block';
			//document.getElementById('zoomIn').style.display = 'block';
			//document.getElementById('zoomOut').style.display = 'block';
			//document.getElementById('crop').style.display = 'block';
			//document.getElementById('alertInfo').style.display = 'none';
			
			document.getElementById('detect').style.display = 'block';
			MAX_SIZE = 50;
			var FileUploadPath = this.value;
			//alert(FileUploadPath);
			if (FileUploadPath == '') {
				
   				 alert("Please upload an image");
				 return false;
			}
			else {
   			 var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
			 //alert(Extension);
			  if (Extension == "jpg" || Extension == "jpeg") {
				  
				   if (this.files && this.files[0]) {

                		var size = this.files[0].size;

                		if(size > (MAX_SIZE+5)*1024){
                    		alert("Images must be under 50Kb in size");
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
			$('.thumbBox').html('');
        });
        $("#rotateRight").on("click",function(){
            rot += 5;
            rot = rot>360?90:rot;
            CanvasCrop.rotate(rot);
			$('.thumbBox').html('');
        });
        $("#zoomIn").on("click",function(){
			ratio =ratio*1.1;
            CanvasCrop.scale(ratio);
			$('.thumbBox').html('');
        });
        $("#zoomOut").on("click",function(){
            ratio =ratio*0.9;
            CanvasCrop.scale(ratio);
			$('.thumbBox').html(''); 
        });
        $("#alertInfo").on("click",function(){
            var canvas = document.getElementById("visbleCanvas");
            var context = canvas.getContext("2d");
            context.clearRect(0,0,canvas.width,canvas.height);
			$('.thumbBox').html('');
        });
        
        $("#crop").on("click",function(){
			document.getElementById('tumbnail_blck').style.display = 'block';	
			document.getElementById('upload').style.display = 'none';	
            var src = CanvasCrop.getDataURL("jpeg");
            //$("body").append("<div style='word-break: break-all;'>"+src+"</div>");  
			
            $("#pic_cont1").html('<div id="pic_cont" style="height:200px;width:200px;position:absolute;"><img id="picture" style="position:absolute;background-color: white;" src="'+src+'" /></div>');
			
			$("#imgdata").val(bin2hex(src));
			//alert($("#imgdata").val(src));
			$('.thumbBox').html('');
        });
        
        console.log("ontouchend" in document);
    })
</script>

<script>
	$(function() {
		//alert("2222222222");
		$('#detect').click(function() {
			var $this = $(this);
			$this.text('detecting...');
          
			var coords = $('#picture').faceDetection({
				complete:function() {
					$this.text('Detect Photo');
				},
				error:function(img, code, message) {
					$this.text('error!');
					alert('Error: '+message);
				}
			});
			//alert(coords.length);
			if(coords.length == 1){
			for (var i = 0; i < coords.length; i++) {
				
			var hhh=$('#pic_cont1').html();
$('.thumbBox').html('<div class="face" style="position:relative;left:' + coords[i].positionX +'px;top:'+ coords[i].positionY +'px;width:'+coords[i].width+'px;height:' + coords[i].height +'px"> </div>' );	
$('#pic_cont1').html(hhh+ '<div class="face" style="position:relative;left:' + coords[i].positionX +'px;top: '+ coords[i].positionY +'px;width:'+coords[i].width+'px;height:' + coords[i].height +'px;z-index:20"> </div>' );	

			document.getElementById('upload').style.display = 'block';
			//document.getElementById('rotateLeft').style.display = 'none';
			//document.getElementById('rotateRight').style.display = 'none';
			//document.getElementById('zoomIn').style.display = 'none';
			//document.getElementById('zoomOut').style.display = 'none';
			//document.getElementById('crop').style.display = 'none';
			//document.getElementById('alertInfo').style.display = 'none';
			//document.getElementById('detect').style.display = 'none';
			}
		return false;
			}
			else
			{
				alert("Face not detected!! Please crop it correctly!!");
				return false;
			}
	
		}); 
	});
</script>


