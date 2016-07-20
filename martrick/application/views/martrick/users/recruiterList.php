 <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>
	<div class="row">
                <div class="col-lg-10 col-lg-push-1" style="margin-top:50px;">
                    <!-- Advanced Tables -->
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
                    <div class="panel panel-default">
                        <div class="panel-heading" style="font-weight:bold;">
                            Listing
							<a href="<?php echo base_url('martrick/addRecruiter');?>"><p style="float:right; color:#fff;">Add New Recruiter</p></a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>User Name</th>
                                            <th>Email Id</th>
                                            
                                            <th>Contact No.</th>
                                            <th>Image</th>
                                           
                                            <th>Status</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php if(isset($recruiters) && !empty($recruiters)){ foreach($recruiters as $recruiter){   $id =$recruiter->user_id; $username =$recruiter->username;?>
									
                                        <tr class="odd gradeX">
                                            <td><?php echo $recruiter->username; ?></td>
                                            <td><?php echo $recruiter->email_address; ?></td>
                                            <td><?php echo $recruiter->contact_number; ?></td>
                                            <td class="center">
													<?php if(isset($recruiter->portrait) && !empty($recruiter->portrait)){?>
													<img  src="<?php echo base_url('files/uploads/'.$username.'/thumbs/'. $recruiter->portrait);		 
													?>" style="width:50px; height:50px; border-radius:50%; !important " />
													<?php }else{?>
													<img class="img-circle" src="<?php echo base_url();?>assets/img/avatar.png" style="width:50px; height:50px; border-radius:50%; !important "/>
													<?php }?>
											</td>
												<?php /*
												<td><?php if($recruiter->email_status==0){?> <span class="label label-warning"><?php  echo 'verification Pending'?></span><?php }elseif($recruiter->email_status==1){ ?>
												<span class="label label-success"><?php echo 'Verified'; ?></span>
												<?php }?>
												</td>
												*/?>
												<td>
													<?php if($recruiter->status==0){?> <span class="label label-warning"><?php  echo 'Deactive'?></span><?php }elseif($recruiter->status==1){ ?>
														<span class="label label-success"><?php echo 'Active'; ?></span>
														<?php }?>
												</td>
												
                                            <td>
													<a class="btn btn-primary btn-sm " href="<?php  echo base_url('martrick/addRecruiter'); ?>/?zxcvbnm=<?php echo base64_encode($id); ?>" title="Edit"><i class="fa fa-edit"></i>Edit</a>
													<a  class="btn btn-danger btn-sm " onclick="return confirm('Are you sure you want to delete ?');"  href="<?php echo base_url("martrick/deleteRecruiter")?>/?zxcvbnm=<?php echo base64_encode($id); ?>&user=<?php echo base64_encode($username);?>" title="Delete">
													Delete <i class="fa fa-times"></i></a>	
													<?php  if($recruiter->status==1){  ?>
													<a class="btn btn-primary btn-sm"  href="<?php  echo base_url('martrick/activation/');?>/?id_old=<?php echo base64_encode($id); ?>">
													Deactivate
													</a>
													<?php   }elseif($recruiter->status==0) { ?>
													<a class="btn btn-success btn-sm" href="<?php  echo base_url('martrick/activation/');?>/?id_old=<?php echo base64_encode($id); ?>">
													Activate 
													</a>
													<?php  } ?>			
								
											</td>
                                        </tr>
										<?php }} ?>
                                    </tbody>
                                </table>
                            </div>
                             
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
