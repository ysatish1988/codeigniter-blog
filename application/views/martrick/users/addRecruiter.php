<style>
.img-circle {
    border-radius: 50%;
}


.col-lg-7 img:hover{
opacity:0.7;
}
.imageicon{
position: absolute; margin: -5px 0px 0px -175px; padding: 0px; width: 220px; height: 30px; font-size: 14px; opacity: 0; cursor: pointer; display: hidden; z-index: 2147483583; top: 43px; left: 105px;
}	

.imageicon {
    cursor: pointer;
    font-size: 14px;
    height: 51px;
    left: 105px;
    margin: -42px 0 0 -175px;
    opacity: 0;
    padding: 0;
    position: absolute;
    top: 43px;
    width: 220px;
    z-index: 2147483583;
}
</style>
<div class="row">
		<div class="col-lg-10 col-lg-push-1" style="margin-top:50px;">
			<!-- Form Elements -->
			<div class="panel panel-default">
				<div class="panel-heading">
				   Manage Recruiter
				   <a href="<?php echo base_url('martrick/recruiterList');?>"><p style="float:right; color:#fff;">View Listing</p></a>
				</div>
				<div class="panel-body">
				<?php if(isset($recruiter) && !empty($recruiter)) {  $username = $recruiter->username;} ?>
					<div class="row">
						<div class="col-lg-8 col-lg-push-2">
							<form role="form" method="post" action="" enctype="multipart/form-data">
								<div class="form-group col-lg-12">
									<div class="col-lg-3"><label > User Name:</label></div>
									 <div class="col-lg-9">
											<?php if(isset($recruiter) && !empty($recruiter)) { ?>
											<input text="text" name="username" class="form-control" placeholder=""  readonly value="<?php if(isset($recruiter) && !empty($recruiter)) { echo $recruiter->username;} ?>" >
											<?php }else{ ?>
											<input text="text" name="username"  class="form-control" placeholder="" value="<?php  echo set_value('username');?>" >
											<?php }?>
											<span class="error"><?php echo form_error('username');?></span>
									</div>
								</div>
								 <div class="form-group col-lg-12">
									<div class="col-lg-3"><label >Email Id:</label></div>
									 <div class="col-lg-9">
										<input text="text" name="email_address"  class="form-control" placeholder="" value="<?php if(isset($recruiter) && !empty($recruiter)) { echo $recruiter->email_address;}else{ echo set_value('email_address');}?>" >
										<span class="error"><?php echo form_error('email_address');?></span>
									</div>
								</div>
								
								 <div class="form-group col-lg-12">
									<div class="col-lg-3"><label>Image:</label></div>
									<div class="col-lg-7">
									 <?php if(isset($recruiter->portrait) && !empty($recruiter->portrait)){?>
											<img  src="<?php if(!empty($recruiter->portrait))
											 echo base_url('files/uploads/'.$username.'/thumbs/'. $recruiter->portrait);		 
											?>" style="width:50px; height:50px; border-radius:50%; !important " />
											<input type="file" name="user_file" class="imageicon" style="padding-top:-50px;">
											<?php }else{?>
												<img class="img-circle" src="<?php echo base_url();?>assets/img/avatar.png" style="width:50px; height:50px; border-radius:50%; !important "/><input type="file" name="user_file" class="imageicon" style="padding-top:-50px;">
												<?php }?>
									 <span class="error"><?php echo form_error('user_file');?></span>
									 </div>
								</div>
								 <div class="form-group col-lg-12">
									<div class="col-lg-3"><label>Contact No:</label></div>
									 <div class="col-lg-9">
										<input text="text" name="contact_number"  class="form-control" placeholder="" value="<?php if(isset($recruiter) && !empty($recruiter)) { echo $recruiter->contact_number;}else{ echo set_value('contact_number');}?>" >
										<span class="error"><?php echo form_error('contact_number');?></span>
									</div>
								</div>
								<?php if(!isset($recruiter) && empty($recruiter)) {?>
								<div class="form-group col-lg-12">
									<div class="col-lg-3"><label>Password</label></div>
									 <div class="col-lg-9">
											<input type="password" name="password"  class="form-control" placeholder="" >
											<span class="error"><?php echo form_error('password');?></span>
									 </div>
								</div>
								<div class="form-group col-lg-12">
									<div class="col-lg-3"><label> Confirm Password</label></div>
									 <div class="col-lg-9">
										<input type="password" name="confirmpassword" class="form-control" placeholder="" >
										<span class="error"><?php echo form_error('confirmpassword');?></span>
									 </div>
								</div>
								<? } ?>
								<div class="col-lg-12">
<div class="row">
								 		<div class="col-lg-7 center col-lg-push-5">
										 	<button type="submit" class="btn btn-primary" style="background-color:#000; border-color:#000; color:#fff;">Submit </button>
											<a href="<?php echo base_url('martrick/recruiterList');?>" class="btn  btn-primary" style="background-color:#000; border-color:#000; color:#fff; margin-left:10px;">Cancel</a>
										</div>
								 	</div>
							   	</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		<!-- End Form Elements -->
 </div>
  </div>
           
