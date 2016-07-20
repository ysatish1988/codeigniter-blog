<div class="container">
    <div class="row">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default" style="background-color:#000;">
                    <div class="panel-body">
                        <div class="text-center">
                          <h3><i class="fa fa-lock fa-4x" style="color:#fff;"></i></h3>
                          <h2 class="text-center" style="color:#fff;">Forgot Password?</h2>
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
                              <form class="form" method="post" action="" autocomplete="off">
                                <fieldset>
									  <div class="form-group">
											<div class="input-group">
												  <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
												  <input id="emailInput" placeholder=" Enter email address" class="form-control" type="email" name="email_address">
											</div>
											 <span class="error"><?php echo form_error('email_address'); ?> </span>
									  </div>
									  <div class="form-group" style=" color:#000;border-color: #DDD;">
											<button type="submit"  class="btn btn-lg btn-primary btn-block" style="background-color:#fff; border-color: #fff; color:#000;">Send </button>
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