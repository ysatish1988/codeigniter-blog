 <div class="row" style="margin-top:50px;">
	<div class="col-lg-10 col-lg-push-1">
		<!-- Form Elements -->
		<div class="panel panel-default">
			<div class="row">
								<div class="col-md-12">
									<?php
										if($this->session->flashdata('error_message'))
										{?>
									 <p class="alert alert-danger" ><?php echo $this->session->flashdata('error_message');?> <button href="#" class="close" data-dismiss="alert" aria-label="close">&times;</button></p>
											
										<?php }elseif($this->session->flashdata('success_message'))
										{?>
										<p class="alert alert-success"><?php echo $this->session->flashdata('success_message');?> <button href="#" class="close" data-dismiss="alert" aria-label="close">&times;</button></p>
										<?php }  ?>
								</div>
							</div>
			<div class="panel-heading">
			 Change Password
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-8 col-lg-push-2">
						<form role="form" action="" method="post">
							<div class="form-group col-lg-12">
							
								<div class="col-lg-6"><label>Current Password</label></div>
								 <div class="col-lg-6">
									<input type="password"  name="currentpassword" class="form-control" placeholder="" >
									<span class="error"><?php echo form_error('currentpassword');?></span>
									</div>
						</div>
							<div class="form-group col-lg-12">
								<div class="col-lg-6"><label>New Password</label></div>
								 <div class="col-lg-6">
								 <input type="password"  name="newpassword" class="form-control" placeholder="">
								 <span class="error"><?php echo form_error('newpassword');?></span>
								 </div>
							
							</div>
							<div class="form-group col-lg-12">
								<div class="col-lg-6"><label>Confirm Password</label></div>
								 <div class="col-lg-6">
									<input type="password"  name="confirmpassword" class="form-control" placeholder="" >
									<span class="error"><?php echo form_error('confirmpassword');?></span>
									</div>
							</div>
							
							 <div class="col-lg-12">
							 <div class="col-md-6"></div>
							 <div class="col-md-6">
							<button type="submit" class="btn btn-primary col-lg-5 " style="background-color:#000; border-color:#000; color:#fff;">Submit</button>
							<a href="<?php echo base_url('martrick');?>" class="btn  btn-primary col-lg-5 col-lg-push-1" style="background-color:#000; border-color:#000; color:#fff;">Cancel</a>
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
<div class="clearfix"></div>
           
          