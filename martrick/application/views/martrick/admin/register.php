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
</style>
<div class="row">
		<div class="col-lg-10 col-lg-push-1">
			<!-- Form Elements -->
			<div class="panel panel-default">
				<div class="panel-heading">
						Registration form
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-8 col-lg-push-2">
							<form role="form" method="post" action="" enctype="multipart/form-data">
								<div class="form-group col-lg-12">
									<div class="col-lg-3"><label > User Name:</label></div>
									 <div class="col-lg-9">
											<input text="text" name="username" class="form-control" placeholder="" value="<?php echo set_value('username');?>" >
											<span class="error"><?php echo form_error('username');?></span>
									</div>
								</div>
								 <div class="form-group col-lg-12">
									<div class="col-lg-3"><label >Email Id:</label></div>
									 <div class="col-lg-9">
										<input text="text" name="email_address"  class="form-control" placeholder="" value="<?php echo set_value('email_address');?>" >
										<span class="error"><?php echo form_error('email_address');?></span>
									</div>
								</div>
								
								 <div class="form-group col-lg-12">
									<div class="col-lg-3"><label>Portrait:</label></div>
									<div class="col-lg-7">
									
												<img class="img-circle" src="<?php echo base_url();?>assets/img/avatar.png" style="width:50px; height:50px; border-radius:50%; !important "/><input type="file" name="user_file" class="imageicon" style="padding-top:-50px;">
												
									 <span class="error"><?php echo form_error('user_file');?></span>
									 </div>
								</div>
								 <div class="form-group col-lg-12">
									<div class="col-lg-3"><label>Contact No:</label></div>
									 <div class="col-lg-9">
										<input text="text" name="contact_number"  class="form-control" placeholder="" value="<?php  echo set_value('contact_number');?>" >
										<span class="error"><?php echo form_error('contact_number');?></span>
									</div>
								</div>
								
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
								 <div class="col-lg-12">
								 <a href="<?php echo base_url('martrick');?>" class="btn btn-primary"style="background-color:#000; border-color:#000; color:#fff;"> Cancel</a>
								<button type="submit" class="btn btn-primary col-lg-3 col-lg-push-5" style="background-color:#000; border-color:#000; color:#fff;">Submit </button>
								  
								
							   </div>
							
							</form>
						</div>
					</div>
				</div>
			</div>
		<!-- End Form Elements -->
 </div>
  </div>
           