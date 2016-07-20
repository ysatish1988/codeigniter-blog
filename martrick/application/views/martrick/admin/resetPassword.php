<div class="container">
    <div class="row">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default" style="background-color:#000;">
                    <div class="panel-body">
                        <div class="text-center">
                          <h3><i class="fa fa-lock fa-4x" style="color:#fff;"></i></h3>
                          <h2 class="text-center" style="color:#fff;">Reset Password?</h2>
                            <div class="panel-body">
                              <form class="form" method="post" action="" autocomplete="off">
                                <fieldset>
									  <div class="form-group">
											<div class="input-group">
												  <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
												  <input  type="password" name="newpassword" id="emailInput" placeholder="New Password" class="form-control">
											</div>
											<span class="error"><?php echo form_error('newpassword');?></span>
									  </div>
									   <div class="form-group">
											<div class="input-group">
												  <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
												   <input type="password" name="confirmpassword" id="emailInput" placeholder="confirm password" class="form-control" >
											</div>
											<span class="error"><?php echo form_error('confirmpassword');?></span>
									  </div>
									  <div class="form-group" style=" color:#000;border-color: #DDD;">
											<button type="submit"  class="btn btn-lg btn-primary btn-block"  style="background-color:#fff; border-color: #fff; color:#000;">Reset Password</button>
									  </div>
										<div class="form-group" style=" color:#000;border-color: #DDD;">
											<a href="<?php echo base_url('martrick');?>" class="btn btn-lg btn-primary btn-block" style="background-color:#fff; border-color: #fff; color:#000;">Cancel</a>
										</div>
                                </fieldset>
                              </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
