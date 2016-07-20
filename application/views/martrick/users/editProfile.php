
 <div class="row" style="margin-top:50px;">
	<div class="col-lg-10 col-lg-push-1">
		<!-- Form Elements -->
		<div class="panel panel-default">
			<div class="panel-heading">
			  Manage Profile
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-8 col-lg-push-2">
						<form role="form">
							<div class="form-group col-lg-12">
								<div class="col-lg-6"><label>User Name:</label></div>
								 <div class="col-lg-6">

								 <input class="form-control" placeholder="" name="username" value="<?php if(isset($profile->username) && !empty($profile->username)){echo $profile->username;} else{  echo set_value('username');} ?>" > 
								 
								 
								 </div>
							</div>
							 <div class="form-group col-lg-12">
								<div class="col-lg-6"><label>Email Id:</label></div>
								 <div class="col-lg-6"><input class="form-control" placeholder="" name="email_address" value="<?php if(isset($profile->email_address) && !empty($profile->email_address)) { echo $profile->email_address;}else{ echo set_value('email_address');} ?>" ></div>
							</div>
							 <div class="form-group col-lg-12">
								<div class="col-lg-6"><label>Confirm Email Id:</label></div>
								 <div class="col-lg-6"><input class="form-control" placeholder="" name="confirm_email_address" value="<?php  echo set_value('confirm_email_address');?>"  ></div>
							</div>
							<div class="form-group col-lg-12">
								<div class="col-lg-6"><label>Password</label></div>
								 <div class="col-lg-6"><input class="form-control" placeholder=""  name="password" ></div>
							</div>
							<div class="form-group col-lg-12">
								<div class="col-lg-6"><label>Confirm Password</label></div>
								 <div class="col-lg-6"><input class="form-control" placeholder="" name="confirmpassword" ></div>
							</div>
							 <div class="col-lg-12" >
							 <div class="col-md-6"></div>
							 <div class="col-md-6">
								<button type="submit" class="btn btn-primary col-lg-6" style="background-color:#000; border-color:#000; color:#fff;">Update</button>
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
           
          