<div class="col-md-6 col-md-offset-3" >
	<div class="login-panel panel panel-default">                  
		<div class="panel-heading">
			<h3 class="panel-title" style="text-align:center; font-size:25px; font-weight:bold;"> Sign In</h3>
		</div>
		<div class="panel-body">
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
		<form  method="post" action="" autocomplete="off">
				<fieldset>
					<div class="row">
						<div class="col-lg-10 col-lg-offset-1">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Username or E-mail" name="username" value="">
								<span class="error"><?php echo form_error('username');?></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-10 col-lg-offset-1">
							<div class="form-group">
								<input type="password" class="form-control" placeholder="Password" name="password"  value="">
								<span class="error"><?php echo form_error('password');?></span>
							</div>
						</div>
					</div>
					<!-- Change this to a button or input when using this as a form -->
					<div class="row">
						<div class="col-lg-12 col-lg-offset-1">
							<div class="col-lg-6 " style="margin-left:-15px;">
							<button type="submit" class="btn btn-lg btn-success btn-block" style="background-color:#000;    border-color: #000; color:#fff;" >Login</button>
							</div>
							<!--
							<div class="col-lg-6 checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div>  -->
						</div> 
					</div>
					<div class="row">
						<div class="col-lg-12 col-lg-offset-1">
							<div class=" col-lg-6 forgot">
								<a href="<?php echo base_url('martrick/forgotPassword');?>" style="text-decoration:none;"><p class="forgot" style="padding-top:9px; margin-left:-13px; ">Forgot Password?</p></a>
							</div>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
</div>