
<!-- include input widgets; this is independent of Datepair.js -->

<style>
.img-circle {
border-radius: 50%;
}	
	#image:hover{
	opacity:0.7;
	}
	.imageicon{
position: absolute; margin: -5px 0px 0px -175px; padding: 0px; width: 220px; height: 30px; font-size: 14px; opacity: 0; cursor: pointer; display: hidden; z-index: 2147483583; top: 187px; left: 105px;
}

/*
.k-animation-container{background-color:#ff0000 !important; border:1px #ff0000 solid !important; border-radius:5px !important;}
.k-content .k-state-hover{background-color:blue !important; border-radius:50%;}
#0ffc1c8c-5eca-48e7-9e04-34e6569b8bcb_cell_selected{background-color:blue !important; border-radius:50%;}
.k-state-selected{background-color:blue !important; border-radius:50%;}
*/


	
</style>


<div class="row">
	<!--Default Pannel, Primary Panel And Success Panel   -->
	<div class="col-lg-10" style="margin-top:20px; margin-left:34px;">
		<div class="col-lg-3 col-lg-push-1">
			<div class="row">
				<div class="col-lg-8" id="image" style="background-color:#EEE; height:221px; width:210px; border:2px solid #58ADCC; color:#D9534F;" >
					<img src="<?php echo base_url();?>assets/img/men.jpg" width="210px;" height="221px;" alt="upload image" style="margin-left:-18px; margin-top:-3px;">
					<div style="margin-top:-25px; margin-left:28px;">Upload Image <i class="fa fa-camera" style="color:#D9534F;"></i><input type="file" class="imageicon">
					</div>
				</div>
			</div>
		</div>
			 <div class="col-lg-8 col-lg-push-1">         
					<div class="col-lg-12" >
						<div class="col-lg-5" style="font-weight:bold; margin-top:2px; font-size:16px;">Full Name Of Candidate:</div>
						<div class="col-lg-7">Johny<a href=""><i class="fa fa-edit" style="color:red; padding-left:10px;"></i></a></div>
					</div>
					<div class="col-lg-12" >
						<div class="col-lg-5" style="font-weight:bold; margin-top:2px; font-size:16px;">Qualification:</div>
						<div class="col-lg-7">Graduate</div>
					</div>
					<div class="col-lg-12" >
						<div class="col-lg-5" style="font-weight:bold; margin-top:2px; font-size:16px;">Age:</div>
						<div class="col-lg-7">24</div>
					</div>
					<div class="col-lg-12" >
						<div class="col-lg-5" style="font-weight:bold; margin-top:2px; font-size:16px;">Nationality:</div>
						<div class="col-lg-7">Indian</div>
					</div>
					<div class="col-lg-12" >
						<div class="col-lg-5" style="font-weight:bold; margin-top:2px; font-size:16px;">Acheivements:</div>
						<div class="col-lg-7">ABCD</div>
					</div>
					<div class="row" >
						<div>
							<div class="row" >
								<div class="col-lg-4" style="margin-top:20px; margin-left:14px;">
									<div class="col-lg-4">
										<div class="col-lg-4" style="font-weight:bold; font-size:14px;">CV:</div>
										<div class="col-lg-4">Link</div>
									</div>
									<div class="col-lg-4">
										<div class="col-lg-4" style="font-weight:bold; font-size:14px;">Video:</div>
										<div class="col-lg-4">Link</div>
									</div>
								</div>
								<div class="col-lg-6" style="margin-top:20px;">
									<div class="col-lg-12">
										<div class="col-lg-8" style="font-weight:bold; font-size:14px;">Video Meeting:</div>
										<div class="col-lg-4">ABCDE</div>
									</div>
									<div class="col-lg-12">
										<div class="col-lg-8" style="font-weight:bold; font-size:14px;">Personal Meeting:</div>
										<div class="col-lg-4">ABCDE</div>
									</div>
									<div class="col-lg-12">
										<div class="col-lg-8" style="font-weight:bold; font-size:14px;">Qualification Test:</div>
										<div class="col-lg-4">ABCDE</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
		<div class="row" style="margin-top:50px;">
			<div class="col-lg-12 col-lg-push-1" style="margin-top:50px; margin-left: -5px;">
				<div class="panel panel-default">
					<div class="panel-group" id="accordion1">
                        <div class="panel panel-default">
							<div class="panel-heading">
								<div class="row">
									<div class="col-lg-12">
										<h4 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne" style="text-decoration:none;">
												<div class="col-lg-2 "><i class="fa fa-sort-down"></i></div>
												<div class="col-lg-8 col-lg-pull-2" style="margin-left:20px; font-size:18px; font-weight:bold;">Personal Data</div>
											</a>
										</h4>
									</div>
								</div>
							</div>
							<div id="collapseOne" class="panel-collapse collapse in">
								<div class="panel-body" id="personal_data">
								<form name="candidate_personal_info_form" id="candidate_personal_info_form" action="" method="post">
									<div class="col-lg-12" >
										<div class="col-lg-1" ></div>
										<div class="col-lg-5" >
											<div class="col-lg-10"><input type="text" name ="title" class="form-control" placeholder="Title" value="<?php echo set_value('title');?>"></div>
										</div>
										<div class="col-lg-5" >
											<div class="col-lg-10"><input type="text" name ="street"  class="form-control" placeholder="Street" value="<?php echo set_value('street');?>" ></div>
										</div>
									</div>
									<div class="col-lg-12" style="    margin-top: 10px;">
										<div class="col-lg-1" ></div>
										<div class="col-lg-5" >
											<div class="col-lg-10"><input type="text" name ="first_name"  class="form-control" placeholder="First Name" value="<?php echo set_value('first_name');?>"></div>
										</div>
										<div class="col-lg-5" >
											<div class="col-lg-7" style="padding-left:0px;">
												<div class="col-lg-12"><input type="text" name ="city"  class="form-control" placeholder="City" value="<?php echo set_value('city');?>"></div>
											</div>
											<div class="col-lg-5 col-lg-pull-1">
												<div class="col-lg-10"><input type="text" name ="zip_code"  class="form-control" placeholder="Zip" value="<?php echo set_value('zip_code');?>"></div>
											</div>
										</div>
									</div>
									<div class="col-lg-12" style="   margin-top: 10px;">
										<div class="col-lg-1" ></div>
										<div class="col-lg-5" >
											<div class="col-lg-10"><input type="text" name ="middle_name"  class="form-control" placeholder="Middle Name" value="<?php echo set_value('middle_name');?>"></div>
										</div>
										<div class="col-lg-5" >
											<div class="col-lg-10"><input type="text" name ="country"  class="form-control" placeholder="Country" value="<?php echo set_value('country');?>"></div>
										</div>
									</div>
										   <div class="col-lg-12" style="    margin-top: 10px;">
										      <div class="col-lg-1" >
											 </div>
											 <div class="col-lg-5" >
											  
											<div class="col-lg-10">
											<input type="text" name ="last_name" class="form-control" placeholder="Last Name" value="<?php echo set_value('last_name');?>">
											</div>
											 </div>
											 <div class="col-lg-5" >
											 
											<div class="col-lg-10">
											<input type="text" name ="additional_address" class="form-control" placeholder="Additional Address Information" value="<?php echo set_value('additional_address');?>">
											</div>
											 </div>
										  </div>
											<div class="col-lg-12" style="margin-top: 10px;">
												<div class="col-lg-1" ></div>
												<div class="col-lg-5" >
													<div class="col-lg-7" style="padding-left:0px;">
														<div class="col-lg-12">
														 <input id="datepicker" name ="date_of_birth" class="form-control date_of_birth" placeholder="Birth Date" value="<?php echo set_value('date_of_birth');?>"/>
														</div>
													</div>
													<div class="col-lg-5 col-lg-pull-1">
														<div class="col-lg-10"><input type="text" name ="age" id="age"  class="form-control age" readonly placeholder="Age" ></div>
													</div>
												</div>
												<div class="col-lg-5" >
													<div class="col-lg-10"><input type="text" name ="phone_number"  class="form-control" placeholder="Phone Number Home" value="<?php echo set_value('phone_number');?>"></div>
												</div>
											</div>
										   <div class="col-lg-12" style="   margin-top: 10px;">
												 <div class="col-lg-1" ></div>
												 <div class="col-lg-5" >
													<div class="col-lg-10"><input  type="text" name ="nationality"  class="form-control" placeholder="Nationality" value="<?php echo set_value('nationality');?>"></div>
												 </div>
												 <div class="col-lg-5" >
													<div class="col-lg-10"><input type="text" name ="mobile_number"  class="form-control" placeholder="Mobile Number" value="<?php echo set_value('mobile_number');?>"></div>
												 </div>
										  </div>
										   <div class="col-lg-12" style="    margin-top: 10px;">
												 <div class="col-lg-1" ></div>
												 <div class="col-lg-5" >
													<div class="col-lg-10"><input type="text" name ="born_in"  class="form-control" placeholder="Born in" value="<?php echo set_value('born_in');?>" ></div>
												</div>
												<div class="col-lg-5" >
													<div class="col-lg-10"><input type="text" name ="fax_number"  class="form-control" placeholder="Fax Number" value="<?php echo set_value('fax_number');?>"></div>
												 </div>
										  </div>
										   <div class="col-lg-12" style="    margin-top: 10px;">
												<div class="col-lg-1" ></div>
												<div class="col-lg-5" >
													<div class="col-lg-10"><input type="text" name ="mother_tongue"  class="form-control" placeholder="Mother Tongue" value="<?php echo set_value('mother_tongue');?>"></div>
												</div>
												<div class="col-lg-5" >
													<div class="col-lg-10"><input type="text" name ="email_address"  class="form-control" placeholder="Email" value="<?php echo set_value('email_address');?>"></div>
												</div>
										  </div>
										   <div class="col-lg-12" style="    margin-top: 10px;">
												<div class="col-lg-1" ></div>
												<div class="col-lg-5" >
													<div class="col-lg-10"><input type="text" name ="language1"  class="form-control" placeholder="Language1" value="<?php echo set_value('language1');?>"></div>
												</div>
												<div class="col-lg-5" >
													<div class="col-lg-10"><input type="text" name ="wedding_status"  class="form-control" placeholder="Wedding Status" value="<?php echo set_value('wedding_status');?>"></div>
												</div>
										  </div>
										   <div class="col-lg-12" style="   margin-top: 10px;">
												<div class="col-lg-1" ></div>
												<div class="col-lg-5" >
													<div class="col-lg-10"><input type="text" name ="language2"  class="form-control" placeholder="Language2" value="<?php echo set_value('language2');?>"></div>
												</div>
												<div class="col-lg-5" >
													<div class="col-lg-10"><input type="text" name ="children"  class="form-control" placeholder="Children" value="<?php echo set_value('children');?>"></div>
												</div>
										  </div>
										   <div class="col-lg-12" style="    margin-top: 10px;">
												<div class="col-lg-1" ></div>
												<div class="col-lg-5" >
													<div class="col-lg-10"><input type="text" name ="actual_position"  class="form-control" placeholder="Actual Position" value="<?php echo set_value('actual_position');?>"></div>
												</div>
												<div class="col-lg-5" >
													<div class="col-lg-10"><input type="text" name ="hobbies"  class="form-control" placeholder="Hobbies" value="<?php echo set_value('hobbies');?>"></div>
												</div>
										  </div>
										   <div class="col-lg-12" style="    margin-top: 10px;">
												<div class="col-lg-1" ></div>
												<div class="col-lg-5" >
													<div class="col-lg-10"><input type="text" name ="company"  class="form-control" placeholder="Company" value="<?php echo set_value('company');?>"></div>
												</div>
												<div class="col-lg-5" >
													<div class="col-lg-10"><input type="text" name ="driving_licence"  class="form-control" placeholder="Driving Licences" value="<?php echo set_value('driving_licence');?>"></div>
												</div>
												<div class="btn-group col-lg-2 col-lg-push-3" style="margin-top:30px;">
													<button type="button"  id="personalinformation"class="btn btn-primary btn-sm dropdown-toggle col-lg-12 col-lg-push-12" style="background-color:#000;">Submit</button>
												</div>
										  </div>
										  </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
									<div class="panel-heading">
										<div class="row">
											<div class="col-lg-12">
												<div class="col-lg-12 ">
													<h4 class="panel-title">
														<a data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo" style="text-decoration:none;"><div class="col-lg-2"><i class="fa fa-sort-down"></i></div><div class="col-lg-8 col-lg-pull-2" style="margin-left:20px; font-size:18px; font-weight:bold;">Work History</div></a>
													</h4>
												</div>
											</div>
										</div>
									</div>
                                    <div id="collapseTwo" class="panel-collapse collapse">
                                        <div class="panel-body">
											 <div class="row" id="add_div">
													<div class="col-lg-12">
														  <div class="panel-group" id="accordion8">
																<div class="panel panel-default">
																	<div class="panel-heading">
																		<div class="row">
																			<div class="col-lg-12">
																				<div class="col-lg-12">
																					<h4 class="panel-title">
																						<a data-toggle="collapse" data-parent="#accordion8" href="#collapseEight" style="text-decoration:none;">
																							<div class="col-lg-2"><i class="fa fa-sort-down"></i></div>
																							<div class="col-lg-8 col-lg-pull-2" style="margin-left:20px; font-size:18px; font-weight:bold;">Company</div>
																						</a>
																						<a id="" class="glyphicons col-md-2 add_field_button_medicine" style=" width:30px; cursor: pointer; cursor: hand;float:right;"><i class="fa fa-plus"></i></a>
																					</h4>
																				</div>
																			</div>
																		</div>
																	 </div>
																	<div id="collapseEight" class="panel-collapse collapse">
																		<div id="collapseOne" class="panel-collapse collapse in">
																			<div class="panel-body">
																				<div class="col-lg-12" style="margin-top: 10px;">
																					<div class="col-lg-1" ></div>
																					<div class="col-lg-5" >
																						<div class="col-lg-10">
																							<input class="form-control" placeholder="Company Name" >
																						</div>
																					</div>
																					<div class="col-lg-5" >
																						<div class="col-lg-6" style="padding-left:0px;">
																							<div class="col-lg-10">
																								<input class="form-control" placeholder="From" >
																							</div>
																						</div>
																						<div class="col-lg-6">
																							<div class="col-lg-10 col-lg-pull-2" style="margin-left:5px;">
																								<input class="form-control" placeholder="To" >
																							</div>
																						</div>
																					</div>
																				</div>
																				<div class="col-lg-12" style="margin-top: 10px;" >
																					<div class="col-lg-1" ></div>
																					<div class="col-lg-5" >
																						<div class="col-lg-10">
																							<input class="form-control" placeholder="Position" >
																						</div>
																					</div>
																					<div class="col-lg-5" >
																						<div class="col-lg-10">
																							<input class="form-control" placeholder="Country" >
																						</div>
																					</div>
																				</div>
																				<div class="col-lg-12" style="    margin-top: 10px;">
																					<div class="col-lg-1" >
																					</div>
																					<div class="col-lg-5" >
																						<div class="col-lg-10">
																							<input class="form-control" placeholder="City" >
																						</div>
																					</div>
																					<div class="col-lg-5" >
																						<div class="col-lg-10">
																							<input class="form-control" placeholder="Street" >
																						</div>
																					</div>
																				</div>
																				<div class="col-lg-12" style="   margin-top: 10px;">
																					<div class="col-lg-1" >
																					</div>
																					<div class="col-lg-10" >
																					<div class="col-lg-2">
																					</div>
																					</div>
																					<div class="btn-group col-lg-2 col-lg-push-3" style="margin-top:30px;">
																						<button type="button" class="btn btn-primary btn-sm dropdown-toggle col-lg-12 col-lg-push-12" data-toggle="dropdown" style="background-color:#000;">Submit
																						</button>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
													</div>
											</div>
                                        </div>
                                    </div>
                                </div>
								<div class="panel panel-default">
									<div class="panel-heading">
										<div class="row">
											<div class="col-lg-12">
												<div class="col-lg-12 ">
													<h4 class="panel-title">
														<a data-toggle="collapse" data-parent="#accordion3" href="#collapseThree" style="text-decoration:none;"><div class="col-lg-2"><i class="fa fa-sort-down"></i></div><div class="col-lg-8 col-lg-pull-2" style="margin-left:20px; font-size:18px; font-weight:bold;">Education and Qualification</div></a>
													</h4>
												</div>
											</div>
										</div>
									</div>
								<div id="collapseThree" class="panel-collapse collapse">
									<div class="panel-body">
										<div class="row" id="add_education_div">
											<div class="col-lg-12">
												<div class="panel-group" id="accordion8">
													<div class="panel panel-default">
														<div class="panel-heading">
															<div class="row">
																<div class="col-lg-12">
																	<div class="col-lg-12 ">
																		<h4 class="panel-title">
																			<a data-toggle="collapse" data-parent="#accordion11" href="#collapseEleven" style="text-decoration:none;">
																				<div class="col-lg-2"><i class="fa fa-sort-down"></i>
																				</div>
																				<div class="col-lg-8 col-lg-pull-2" style="margin-left:20px; font-size:18px; font-weight:bold;">Education</div>
																			</a>
																			<a id="" class="glyphicons col-md-2 add_field_button_recruiter" style=" width:30px; cursor: pointer; cursor: hand;float:right;"><i class="fa fa-plus"></i></a>
																		</h4>
																	</div>
																</div>
															</div>
														</div>
														<div id="collapseEleven" class="panel-collapse collapse">
															<div id="collapseOne" class="panel-collapse collapse in">
																<div class="panel-body">
																	<div class="col-lg-12" style="   margin-top: 10px;">
																		<div class="col-lg-1" >
																		</div>
																		<div class="col-lg-5" >
																			<div class="col-lg-10">
																				<input class="form-control" placeholder="Passing Year" >
																			</div>
																		</div>
																		<div class="col-lg-5" >
																			<div class="col-lg-10">
																				<input class="form-control" placeholder="Institute" >
																			</div>
																		</div>
																	</div>
																	<div class="col-lg-12" style="   margin-top: 10px;">
																		<div class="col-lg-1" >
																		</div>
																		<div class="col-lg-5" >
																			<div class="col-lg-10">
																				<input class="form-control" placeholder="Qualification" >
																			</div>
																		</div>
																		<div class="col-lg-5" >
																			<div class="col-lg-10">
																				<input class="form-control" placeholder="Achievements" >
																			</div>
																		</div>
																	</div>
																	<div class="col-lg-12" style="margin-top: 10px;">
																		<div class="col-lg-1" >
																		</div>
																		<div class="col-lg-10" >
																			<div class="col-lg-2">
																			</div>
																		</div>
																		<div class="btn-group col-lg-2 col-lg-push-4" style="margin-top:30px;">
																			<button type="button" class="btn btn-primary btn-sm dropdown-toggle col-lg-12 col-lg-push-5" data-toggle="dropdown" style="background-color:#000;">Submit
																			</button>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<div class="row">
										<div class="col-lg-12">
											<div class="col-lg-12 ">
												<h4 class="panel-title">
													<a data-toggle="collapse" data-parent="#accordion4" href="#collapseFour" style="text-decoration:none;">
														<div class="col-lg-2"><i class="fa fa-sort-down"></i>
														</div>
														<div class="col-lg-8 col-lg-pull-2" style="margin-left:20px; font-size:18px; font-weight:bold;">Administrational Data</div>
													</a>
												</h4>
											</div>
										</div>
									</div>
								</div>
								<div id="collapseFour" class="panel-collapse collapse">
									<div class="panel-body">
										<div class="row" >
											<div class="col-lg-12">
												<div class="panel-group" id="accordion8">
													<div class="panel panel-default">
														<div class="panel-heading">
															<div class="row">
																<div class="col-lg-12">
																	<div class="col-lg-12 ">
																		<h4 class="panel-title">
																			<a data-toggle="collapse" data-parent="#accordion15" href="#collapseSixteen" style="text-decoration:none;"><div class="col-lg-2"><i class="fa fa-sort-down"></i></div><div class="col-lg-8 col-lg-pull-2" style="margin-left:20px; font-size:18px; font-weight:bold;">Availability</div></a>
																		</h4>
																	</div>
																</div>
															</div>
														</div>
														<div id="collapseSixteen" class="panel-collapse collapse">
															<div id="collapseOne" class="panel-collapse collapse in">
																<div class="panel-body">
																	<div class="col-lg-12" style="margin-top: 10px;">
																		<div class="col-lg-1" >
																		</div>
																		<div class="col-lg-10" >
																			<div class="col-lg-5">
																				Current Available:
																			</div>
																			<div class="col-lg-7 col-lg-pull-2" style="margin-left:-29px;" >
																				Yes  <input type="checkbox" >
																				No  <input type="checkbox" >
																			</div>
																		</div>
																	</div>
																	<div class="col-lg-12 col-lg-pull-1" style="margin-top: 10px;">
																		<div class="col-lg-2 col-lg-push-2" style="margin-left:-10px; padding-left:39px;" >
																			Available Until:
																		</div>
																		<div class="col-lg-10" >
																			<div class="col-lg-6">
																				<div class="col-lg-5">
																				</div>
																				<div class="col-lg-7">
																					<input class="form-control" placeholder="Available From" >
																				</div>
																			</div>
																			<div class="col-lg-6">
																				<div class="col-lg-5">
																				</div>
																				<div class="col-lg-7 col-lg-pull-3">
																					<input class="form-control" placeholder="Available To" >
																				</div>
																			</div>
																			<div class="btn-group col-lg-2 col-lg-push-4" style="margin-top:30px;">
																				<button type="button" class="btn btn-primary btn-sm dropdown-toggle col-lg-12 col-lg-push-12" data-toggle="dropdown" style="background-color:#000;">Submit
																				</button>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" >
											<div class="col-lg-12">
												<div class="panel-group" id="accordion8">
													<div class="panel panel-default">
														<div class="panel-heading">
															<div class="row">
																<div class="col-lg-12">
																	<div class="col-lg-12 ">
																		<h4 class="panel-title">
																			<a data-toggle="collapse" data-parent="#accordion14" href="#collapseFifteen" style="text-decoration:none;">
																				<div class="col-lg-2"><i class="fa fa-sort-down"></i>
																				</div>
																				<div class="col-lg-8 col-lg-pull-2" style="margin-left:20px; font-size:18px; font-weight:bold;">Personal Documents</div>
																			</a>
																		</h4>
																	</div>
																</div>
															</div>
														</div>
														<div id="collapseFifteen" class="panel-collapse collapse">
															<div id="collapseOne" class="panel-collapse collapse in">
																<div class="panel-body">
																	<div class="row" >
																		<div class="col-lg-12">
																			<div class="panel-group" id="accordion8">
																				<div class="panel panel-default">
																					<div class="panel-heading">
																						<div class="row">
																							<div class="col-lg-12">
																								<div class="col-lg-12 ">
																									<h4 class="panel-title">
																										<a data-toggle="collapse" data-parent="#accordion18" href="#collapseNineteen" style="text-decoration:none;">
																											<div class="col-lg-2"><i class="fa fa-sort-down"></i>
																											</div>
																											<div class="col-lg-8 col-lg-pull-2" style="margin-left:20px; font-size:18px; font-weight:bold;">Passport/ Id Cards/ Licences
																											</div>
																										</a>
																									</h4>
																								</div>
																							</div>
																						</div>
																					</div>
																					<div id="collapseNineteen" class="panel-collapse collapse">
																						<div id="collapseOne" class="panel-collapse collapse in">
																							<div class="panel-body">
																								<div class="col-lg-12" style="   margin-top: 10px;">
																									<div class="col-lg-1" >
																									</div>
																									<div class="col-lg-5" >
																										<div class="col-lg-10">
																											<input class="form-control" placeholder="Type Of Document" >
																										</div>
																									</div>
																									<div class="col-lg-5" >
																										<div class="col-lg-10">
																											<input class="form-control" placeholder="Country" >
																										</div>
																									</div>
																								</div>
																								<div class="col-lg-12" style="   margin-top: 10px;">
																									<div class="col-lg-1" >
																									</div>
																									<div class="col-lg-5" >
																										<div class="col-lg-10">
																											<input class="form-control" placeholder="Document No" >
																										</div>
																									</div>
																									<div class="col-lg-5" >
																										<div class="col-lg-10">
																											<input class="form-control" placeholder="Valid Through" >
																										</div>
																									</div>
																								</div>
																								<div class="col-lg-12" style="border-right:1px solid #ccc;    margin-top: 10px;">
																									<div class="col-lg-1" >
																									</div>
																									<div class="col-lg-10" >
																										<div class="col-lg-2">
																										</div>
																									</div>
																									<div class="btn-group col-lg-2 col-lg-push-4" style="margin-top:30px;">
																										<button type="button" class="btn btn-primary btn-sm dropdown-toggle col-lg-12 col-lg-push-5" data-toggle="dropdown" style="background-color:#000;">Submit
																										</button>
																									</div>
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="row" >
																		<div class="col-lg-12">
																			<div class="panel-group" id="accordion8">
																				<div class="panel panel-default">
																					<div class="panel-heading">
																						<div class="row">
																							<div class="col-lg-12">
																								<div class="col-lg-12 ">
																									<h4 class="panel-title">
																										<a data-toggle="collapse" data-parent="#accordion17" href="#collapseEighteen" style="text-decoration:none;"><div class="col-lg-2"><i class="fa fa-sort-down"></i></div><div class="col-lg-8 col-lg-pull-2" style="margin-left:20px; font-size:18px; font-weight:bold;">Passport/ Id Cards/ Licences</div></a>
																									</h4>
																								</div>
																							</div>
																						</div>
																					</div>
																					<div id="collapseEighteen" class="panel-collapse collapse">
																						<div id="collapseOne" class="panel-collapse collapse in">
																							<div class="panel-body">
																								<div class="col-lg-12" style="   margin-top: 10px;">
																									<div class="col-lg-1" >
																									</div>
																									<div class="col-lg-5" >
																										<div class="col-lg-10">
																											<input class="form-control" placeholder="Type Of Document" >
																										</div>
																									</div>
																									<div class="col-lg-5" >
																										<div class="col-lg-10">
																											<input class="form-control" placeholder="Country" >
																										</div>
																									</div>
																								</div>
																								<div class="col-lg-12" style="   margin-top: 10px;">
																									<div class="col-lg-1" >
																									</div>
																									<div class="col-lg-5" >
																										<div class="col-lg-10">
																											<input class="form-control" placeholder="Document No" >
																										</div>
																									</div>
																									<div class="col-lg-5" >
																										<div class="col-lg-10">
																											<input class="form-control" placeholder="Valid Through" >
																										</div>
																									</div>
																								</div>
																								<div class="col-lg-12" style="border-right:1px solid #ccc;    margin-top: 10px;">
																									<div class="col-lg-1" >
																									</div>
																									<div class="col-lg-10" >
																										<div class="col-lg-2">
																										</div>
																									</div>
																									<div class="btn-group col-lg-2 col-lg-push-4" style="margin-top:30px;">
																										<button type="button" class="btn btn-primary btn-sm dropdown-toggle col-lg-12 col-lg-push-5" data-toggle="dropdown" style="background-color:#000;">Submit
																										</button>
																									</div>
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="row" >
																		<div class="col-lg-12">
																			<div class="panel-group" id="accordion8">
																				<div class="panel panel-default">
																					<div class="panel-heading">
																						<div class="row">
																							<div class="col-lg-12">
																								<div class="col-lg-12 ">
																									<h4 class="panel-title">
																										<a data-toggle="collapse" data-parent="#accordion16" href="#collapseSeventeen" style="text-decoration:none;"><div class="col-lg-2"><i class="fa fa-sort-down"></i></div><div class="col-lg-8 col-lg-pull-2" style="margin-left:20px; font-size:18px; font-weight:bold;">Insurance</div></a>
																									</h4>
																								</div>
																							</div>
																						</div>
																					</div>
																					<div id="collapseSeventeen" class="panel-collapse collapse">
																						<div id="collapseOne" class="panel-collapse collapse in">
																							<div class="panel-body">
																								<div class="col-lg-12" style="   margin-top: 10px;">
																									<div class="col-lg-1" >
																									</div>
																									<div class="col-lg-5" >
																										<div class="col-lg-10">
																											<input class="form-control" placeholder="Type Of Document" >
																										</div>
																									</div>
																									<div class="col-lg-5" >
																										<div class="col-lg-10">
																											<input class="form-control" placeholder="Country" >
																										</div>
																									</div>
																								</div>
																								<div class="col-lg-12" style="   margin-top: 10px;">
																									<div class="col-lg-1" >
																									</div>
																									<div class="col-lg-5" >
																										<div class="col-lg-10">
																											<input class="form-control" placeholder="Document No" >
																										</div>
																									</div>
																									<div class="col-lg-5" >
																										<div class="col-lg-10">
																											<input class="form-control" placeholder="Valid Through" >
																										</div>
																									</div>
																								</div>
																								<div class="col-lg-12" style="border-right:1px solid #ccc;    margin-top: 10px;">
																									<div class="col-lg-1" >
																									</div>
																									<div class="col-lg-10" >
																										<div class="col-lg-2">
																										</div>
																									</div>
																									<div class="btn-group col-lg-2 col-lg-push-4" style="margin-top:30px;">
																										<button type="button" class="btn btn-primary btn-sm dropdown-toggle col-lg-12 col-lg-push-5" data-toggle="dropdown" style="background-color:#000;">Submit
																										</button>
																									</div>
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row" >
											<div class="col-lg-12">
												<div class="panel-group" id="accordion8">
													<div class="panel panel-default">
														<div class="panel-heading">
															<div class="row">
																<div class="col-lg-12">
																	<div class="col-lg-12 ">
																		<h4 class="panel-title">
																			<a data-toggle="collapse" data-parent="#accordion19" href="#collapseTwenty" style="text-decoration:none;"><div class="col-lg-2"><i class="fa fa-sort-down"></i></div><div class="col-lg-8 col-lg-pull-2" style="margin-left:20px; font-size:18px; font-weight:bold;">Next of Kin</div></a>
																		</h4>
																	</div>
																</div>
															</div>
														</div>
														<div id="collapseTwenty" class="panel-collapse collapse ">
															<div class="panel-body">
																<div class="col-lg-12" >
																	<div class="col-lg-1" >
																	</div>
																	<div class="col-lg-5" >
																		<div class="col-lg-10">
																			<input class="form-control" placeholder="Relation to Candidate" >
																		</div>
																	</div>
																	<div class="col-lg-5" >
																		<div class="col-lg-10">
																			<input class="form-control" placeholder="Candidate Address " >
																		</div>
																	</div>
																</div>
																<div class="col-lg-12" style="border-right:1px solid #ccc;    margin-top: 10px;">
																	<div class="col-lg-1" >
																	</div>
																	<div class="col-lg-5" >
																		<div class="col-lg-10">
																			<input class="form-control" placeholder="Title" >
																		</div>
																	</div>
																	<div class="col-lg-5" >
																		<div class="col-lg-10">
																			<input class="form-control" placeholder="Street" >
																		</div>
																	</div>
																</div>
																<div class="col-lg-12" style="border-right:1px solid #ccc;    margin-top: 10px;">
																	<div class="col-lg-1" >
																	</div>
																	<div class="col-lg-5" >
																		<div class="col-lg-10">
																			<input class="form-control" placeholder="First Name" >
																		</div>
																	</div>
																	<div class="col-lg-5" >
																		<div class="col-lg-10">
																			<input class="form-control" placeholder="City" >
																		</div>
																	</div>
																</div>
																<div class="col-lg-12" style="border-right:1px solid #ccc;    margin-top: 10px;">
																	<div class="col-lg-1" >
																	</div>
																	<div class="col-lg-5" >
																		<div class="col-lg-10">
																			<input class="form-control" placeholder="Last Name" >
																		</div>
																	</div>
																	<div class="col-lg-5" >
																		<div class="col-lg-10">
																			<input class="form-control" placeholder="Zip" >
																		</div>
																	</div>
																</div>
																<div class="col-lg-12" style="border-right:1px solid #ccc;    margin-top: 10px;">
																	<div class="col-lg-1" >
																	</div>
																	<div class="col-lg-5" >
																		<div class="col-lg-10">
																			<input class="form-control" placeholder="Birth Date" >
																		</div>
																	</div>
																	<div class="col-lg-5" >
																		<div class="col-lg-7">
																			<input class="form-control" placeholder="Country" >
																		</div>
																	</div>
																</div>
																<div class="col-lg-12" style="border-right:1px solid #ccc;    margin-top: 10px;">
																	<div class="col-lg-1" >
																	</div>
																	<div class="col-lg-5" >
																		<div class="col-lg-10">
																			<input class="form-control" placeholder="Age" >
																		</div>
																	</div>
																	<div class="col-lg-5" >
																		<div class="col-lg-10">
																			<input class="form-control" placeholder="Additional Address" >
																		</div>
																	</div>
																</div>
																<div class="col-lg-12" style="border-right:1px solid #ccc;    margin-top: 10px;">
																	<div class="col-lg-1" >
																	</div>
																	<div class="col-lg-5" >
																		<div class="col-lg-10">
																			<input class="form-control" placeholder="Nationality" >
																		</div>
																	</div>
																	<div class="col-lg-5" >
																		<div class="col-lg-10">
																			<input class="form-control" placeholder="Phone Number Home" >
																		</div>
																	</div>
																</div>
																<div class="col-lg-12" style="border-right:1px solid #ccc;    margin-top: 10px;">
																	<div class="col-lg-1" >
																	</div>
																	<div class="col-lg-5" >
																		<div class="col-lg-10">
																			<input class="form-control" placeholder="Born In" >
																		</div>
																	</div>
																	<div class="col-lg-5" >
																		<div class="col-lg-10">
																			<input class="form-control" placeholder="Mobile NUmber" >
																		</div>
																	</div>
																</div>
																<div class="col-lg-12" style="border-right:1px solid #ccc;    margin-top: 10px;">
																	<div class="col-lg-1" >
																	</div>
																	<div class="col-lg-5" >
																		<div class="col-lg-5">
																		</div>
																		<div class="col-lg-7">
																		</div>
																	</div>
																	<div class="col-lg-5" >
																		<div class="col-lg-5">
																		</div>
																		<div class="col-lg-7">
																		</div>
																	</div>
																	<div class="btn-group col-lg-2 col-lg-push-3" style="margin-top:30px;">
																		<button type="button" class="btn btn-primary btn-sm dropdown-toggle col-lg-12 col-lg-push-12" data-toggle="dropdown" style="background-color:#000;">
																		Submit
																		</button>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<div class="row">
										<div class="col-lg-12">
											<div class="col-lg-12 ">
												<h4 class="panel-title">
													<a data-toggle="collapse" data-parent="#accordion5" href="#collapseFive" style="text-decoration:none;"><div class="col-lg-2"><i class="fa fa-sort-down"></i></div><div class="col-lg-8 col-lg-pull-2" style="margin-left:20px; font-size:18px; font-weight:bold;">Candidate's Internal History</div></a>
												</h4>
											</div>
										</div>
									</div>
								</div>
								<div id="collapseFive" class="panel-collapse collapse">
									<div class="panel-body">
										<div class="col-lg-12 col-lg-pull-2" style="margin-top: 10px;">
											<div class="col-lg-1" >
											</div>
											<div class="col-lg-10" >
												<div class="col-lg-5">
												</div>
												<div class="col-lg-7" >
													<input class="form-control" placeholder="Main Recruiter's Name" >
												</div>
											</div>
										</div>
										<div class="col-lg-12 col-lg-pull-2" style="margin-top: 10px;">
											<div class="col-lg-1" >
											</div>
											<div class="col-lg-10" >
												<div class="col-lg-5">
												</div>
												<div class="col-lg-7" >
													<input class="form-control" placeholder="Candidate Added To Database" >
												</div>
											</div>
										</div>
										<div class="col-lg-12 col-lg-pull-2" style="margin-top: 10px;">
											<div class="col-lg-1" >
											</div>
											<div class="col-lg-10" >
												<div class="col-lg-5">
												</div>
												<div class="col-lg-7" >
													<input class="form-control" placeholder="Initiate Phone Call" >
												</div>
											</div>
										</div>
										<div class="col-lg-12 col-lg-pull-2" style="margin-top: 10px;">
											<div class="col-lg-1" >
											</div>
											<div class="col-lg-10" >
												<div class="col-lg-5">
												</div>
												<div class="col-lg-7" >
													<input class="form-control" placeholder="Video Call" >
												</div>
											</div>
										</div> 
										<div class="col-lg-12 col-lg-pull-2" style="margin-top: 10px;">
											<div class="col-lg-1" >
											</div>
											<div class="col-lg-10" >
												<div class="col-lg-5">
												</div>
												<div class="col-lg-7" >
													<input class="form-control" placeholder="Personal Meeting with Candidate" >
												</div>
											</div>
										</div>
										<div class="col-lg-12 col-lg-pull-2" style="margin-top: 10px;">
											<div class="col-lg-1" >
											</div>
											<div class="col-lg-10" >
												<div class="col-lg-5">
												</div>
												<div class="col-lg-7" >
													<input class="form-control" placeholder="Qualification Test 1" >
												</div>
											</div>
										</div>
										<div class="col-lg-12 col-lg-pull-2" style="margin-top: 10px;">
											<div class="col-lg-1" >
											</div>
											<div class="col-lg-10" >
												<div class="col-lg-5">
												</div>
												<div class="col-lg-7" >
													<input class="form-control" placeholder="Qualification Test 2" >
												</div>
											</div>
										</div>
										<div class="col-lg-12 col-lg-pull-2" style="margin-top: 10px;">
											<div class="col-lg-1" >
											</div>
											<div class="col-lg-10" >
												<div class="col-lg-5">
												</div>
												<div class="col-lg-7" style="color:#999;" >
													Candidate's Video Added&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													<select  style="color:#999; border: 1px solid #ccc;">
													<option value="0"  style="color:#999;">Yes</option>
													<option value="0"  style="color:#999;">No</option>
													</select>
												</div>
											</div>
										</div>
										<div class="col-lg-12 col-lg-pull-2" style="margin-top: 10px;">
											<div class="col-lg-1" >
											</div>
											<div class="col-lg-10" >
											<div class="col-lg-5">
												</div>
												<div class="col-lg-7">
													<input class="form-control" placeholder="Candidate's Video Added" >
												</div>
											</div>
										</div>
										<div class="col-lg-12 col-lg-pull-2" style="margin-top: 10px;">
										<div class="col-lg-1" >
											</div>
											<div class="col-lg-10" >
												<div class="col-lg-5">
												</div>
												<div class="col-lg-7" style="color:#999; font-weight:bold;" >
												Contact History&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												</div>
											</div>
										</div>
										<div class="col-lg-12 col-lg-pull-2" style="margin-top: 10px;">
											<div class="col-lg-1" >
											</div>
											<div class="col-lg-10" >
												<div class="col-lg-5">
												</div>
												<div class="col-lg-7" >
													<input class="form-control" placeholder="Date" >
												</div>
											</div>
										</div>
										<div class="col-lg-12 col-lg-pull-2" style="margin-top: 10px;">
											<div class="col-lg-1" >
											</div>
											<div class="col-lg-10" >
												<div class="col-lg-5">
												</div>
												<div class="col-lg-7" >
													<input class="form-control" placeholder="Type of Contact" >
												</div>
											</div>
										</div>
										<div class="col-lg-12 col-lg-pull-2" style="margin-top: 10px;">
											<div class="col-lg-1" >
											</div>
											<div class="col-lg-10" >
												<div class="col-lg-5">
												</div>
												<div class="col-lg-7" >
													<input class="form-control" placeholder="Message" >
												</div>
											</div>
											<div class="btn-group col-lg-2 col-lg-push-6" style="margin-top:30px;">
												<button type="button" class="btn btn-primary btn-sm dropdown-toggle col-lg-12 col-lg-push-6" data-toggle="dropdown" style="background-color:#000;">
												Submit
												</button>
											</div>
										</div>
									</div>
								</div>
								<div class="panel panel-default" style="margin-top:6px;">
									<div class="panel-heading">
										<div class="row">
											<div class="col-lg-12">
												<div class="col-lg-12 ">
													<h4 class="panel-title">
														<a data-toggle="collapse" data-parent="#accordion6" href="#collapseSix" style="text-decoration:none;"><div class="col-lg-2"><i class="fa fa-sort-down"></i></div><div class="col-lg-8 col-lg-pull-2" style="margin-left:20px; font-size:18px; font-weight:bold;">Candidate's Actual Project</div></a>
													</h4>
												</div>
											</div>
										</div>
									</div>
									<div id="collapseSix" class="panel-collapse collapse">
										<div class="panel-body">
											<div class="row" >
												<div class="col-lg-12">
													<div class="panel-group" id="accordion8">
														<div class="panel panel-default">
															<div class="panel-heading">
																<div class="row">
																	<div class="col-lg-12">
																		<div class="col-lg-12 ">
																			<h4 class="panel-title">
																				<a data-toggle="collapse" data-parent="#accordion22" href="#collapseTwentythree" style="text-decoration:none;"><div class="col-lg-2"><i class="fa fa-sort-down"></i></div><div class="col-lg-8 col-lg-pull-2" style="margin-left:20px; font-size:18px; font-weight:bold;">Employment and Contract Information</div></a>
																			</h4>
																		</div>
																	</div>
																</div>
															</div>
															<div id="collapseTwentythree" class="panel-collapse collapse">
																<div class="panel-body">
																	<div class="col-lg-12" >
																		<div class="col-lg-1" >
																		</div>
																		<div class="col-lg-5" >
																			<div class="col-lg-10">
																			<input class="form-control" placeholder="Name of Company(Client)" >
																			</div>
																		</div>
																		<div class="col-lg-5" >
																			<div class="col-lg-10">
																				<input class="form-control" placeholder="Start of Contract" >
																			</div>
																		</div>
																	</div>
																	<div class="col-lg-12" style="    margin-top: 10px;">
																		<div class="col-lg-1" >
																		</div>
																		<div class="col-lg-5" >
																			<div class="col-lg-10">
																				<input class="form-control" placeholder="Street" >
																			</div>
																		</div>
																		<div class="col-lg-5" >
																			<div class="col-lg-10">
																				<input class="form-control" placeholder="End of Contract" >
																			</div>
																		</div>
																	</div>
																	<div class="col-lg-12" style="    margin-top: 10px;">
																		<div class="col-lg-1" >
																		</div>
																		<div class="col-lg-5" >
																			<div class="col-lg-10">
																				<input class="form-control" placeholder="City" >
																			</div>
																		</div>
																		<div class="col-lg-5" >
																			<div class="col-lg-10">
																				<input class="form-control" placeholder="Work Pattern" >
																			</div>
																		</div>
																	</div>
																	<div class="col-lg-12" style="   margin-top: 10px;">
																		<div class="col-lg-1" >
																		</div>
																		<div class="col-lg-5" >
																			<div class="col-lg-10">
																				<input class="form-control" placeholder="Zip" >
																			</div>
																		</div>
																		<div class="col-lg-5" >
																			<div class="col-lg-10">
																				<input class="form-control" placeholder="Salary/Rates" >
																			</div>
																		</div>
																	</div>
																	<div class="col-lg-12" style="   margin-top: 10px;">
																		<div class="col-lg-1" >
																		</div>
																		<div class="col-lg-5" >
																			<div class="col-lg-10">
																				<input class="form-control" placeholder="Country" >
																			</div>
																		</div>
																		<div class="col-lg-5" >
																			<div class="col-lg-10">
																				<input class="form-control" placeholder="Accommodation" >
																			</div>
																		</div>
																	</div>
																	<div class="col-lg-12" style="   margin-top: 10px;">
																		<div class="col-lg-1" >
																		</div>
																		<div class="col-lg-5" >
																			<div class="col-lg-10">
																				<input class="form-control" placeholder="Additional address" >
																			</div>
																		</div>
																		<div class="col-lg-5" >
																			<div class="col-lg-10">
																				<input class="form-control" placeholder="Meals" >
																			</div>
																		</div>
																	</div>
																	<div class="col-lg-12" style="    margin-top: 50px;">
																		<div class="col-lg-1" >
																		</div>
																		<div class="col-lg-5" >
																			<div class="col-lg-10">
																				<input class="form-control" placeholder="Title" >
																			</div>
																		</div>
																		<div class="col-lg-5" >
																			<div class="col-lg-10">
																				<input class="form-control" placeholder="Transportation" >
																			</div>
																		</div>
																	</div>
																	<div class="col-lg-12" style="    margin-top: 10px;">
																		<div class="col-lg-1" >
																		</div>
																		<div class="col-lg-5" >
																			<div class="col-lg-10">
																				<input class="form-control" placeholder="First Name" >
																			</div>
																		</div>
																		<div class="col-lg-5" >
																			<div class="col-lg-10">
																				<input class="form-control" placeholder="Health Insurance" >
																			</div>
																		</div>
																	</div>
																	<div class="col-lg-12" style="    margin-top: 10px;">
																		<div class="col-lg-1" >
																		</div>
																		<div class="col-lg-5" >
																			<div class="col-lg-10">
																				<input class="form-control" placeholder="Last Name" >
																			</div>
																		</div>
																		<div class="col-lg-5" >
																			<div class="col-lg-10">
																				<input class="form-control" placeholder="Candidate's Contract" >
																			</div>
																		</div>
																	</div>
																	<div class="col-lg-12" style="    margin-top: 50px;">
																		<div class="col-lg-1" >
																		</div>
																		<div class="col-lg-5" >
																			<div class="col-lg-10">
																			<input class="form-control" placeholder="Phone Number" >
																			</div>
																		</div>
																		<div class="col-lg-5" >
																			<div class="col-lg-10">
																				<input class="form-control" placeholder="Client's Contract" >
																			</div>
																		</div>
																	</div>
																	<div class="col-lg-12" style="    margin-top: 10px;">
																		<div class="col-lg-1" >
																		</div>
																		<div class="col-lg-5" >
																			<div class="col-lg-10">
																				<input class="form-control" placeholder="Mobile Number" >
																			</div>
																		</div>
																		<div class="col-lg-5" >
																			<div class="col-lg-10">
																				<input class="form-control" placeholder="General Notes" >
																			</div>
																		</div>
																	</div>
																	<div class="col-lg-12" style="   margin-top: 10px;">
																		<div class="col-lg-1" >
																		</div>
																		<div class="col-lg-5" >
																			<div class="col-lg-10">
																				<input class="form-control" placeholder="Fax No" >
																			</div>
																		</div>
																	</div>
																	<div class="col-lg-12" style="   margin-top: 10px;">
																		<div class="col-lg-1" >
																		</div>
																		<div class="col-lg-5" >
																			<div class="col-lg-10">
																				<input class="form-control" placeholder="Email" >
																			</div>
																		</div>
																		<div class="btn-group col-lg-2 col-lg-pull-1 " style="margin-top:60px;">
																			<button type="button" class="btn btn-primary btn-sm dropdown-toggle col-lg-12 " data-toggle="dropdown" style="background-color:#000;">
																			Submit
																			</button>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row" >
												<div class="col-lg-12">
													<div class="panel-group" id="accordion8">
														<div class="panel panel-default">
															<div class="panel-heading">
																<div class="row">
																	<div class="col-lg-12">
																		<div class="col-lg-12 ">
																			<h4 class="panel-title">
																				<a data-toggle="collapse" data-parent="#accordion23" href="#collapseTwentyFour" style="text-decoration:none;"><div class="col-lg-2"><i class="fa fa-sort-down"></i></div><div class="col-lg-8 col-lg-pull-2" style="margin-left:20px; font-size:18px; font-weight:bold;">Work Schedule</div></a>
																			</h4>
																		</div>
																	</div>
																</div>
															</div>
															<div id="collapseTwentyFour" class="panel-collapse collapse">
																<div id="collapseOne" class="panel-collapse collapse in">
																	<div class="panel-body">
																		<div class="col-lg-12" >
																			<div class="col-lg-1" >
																			</div>
																			<div class="col-lg-5" >
																				<div class="col-lg-5">
																				</div>
																				<div class="col-lg-7">
																					<input class="form-control" placeholder="From" >
																				</div>
																			</div>
																			<div class="col-lg-5" >
																				<div class="col-lg-1">
																				</div>
																				<div class="col-lg-7" style="margin-left:15px;">
																					<input class="form-control" placeholder="To" >
																				</div>
																			</div>
																		</div>
																		<div class="col-lg-12" style=" margin-top: 10px;">
																			<div class="col-lg-1" >
																			</div>
																			<div class="col-lg-10" >
																				<div class="col-lg-2">
																				</div>
																				<div class="col-lg-8" style="margin-left:23px;">
																					<input class="form-control" placeholder="Position" >
																				</div>
																			</div>
																		</div>
																		<div class="col-lg-12" style="  margin-top: 10px;">
																			<div class="col-lg-1" >
																			</div>
																			<div class="col-lg-10" >
																				<div class="col-lg-2">
																				</div>
																				<div class="col-lg-8" style="margin-left:23px;">
																					<input class="form-control" placeholder="Country" >
																				</div>
																			</div>
																		</div>
																		<div class="col-lg-12" style="   margin-top: 10px;">
																			<div class="col-lg-1" >
																			</div>
																			<div class="col-lg-10" >
																				<div class="col-lg-2">
																				</div>
																				<div class="col-lg-8" style="margin-left:23px;">
																					<input class="form-control" placeholder="City" >
																				</div>
																			</div>
																			<div class="btn-group col-lg-2 col-lg-push-4" style="margin-top:30px;">
																					<button type="button" class="btn btn-primary btn-sm dropdown-toggle col-lg-12 col-lg-push-9" data-toggle="dropdown" style="background-color:#000;">Submit
																					</button>
																			</div>
																		</div> 
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row" >
												<div class="col-lg-12">
													<div class="panel-group" id="accordion8">
														<div class="panel panel-default">
															<div class="panel-heading">
																<div class="row">
																	<div class="col-lg-12">
																		<div class="col-lg-12 ">
																			<h4 class="panel-title">
																				<a data-toggle="collapse" data-parent="#accordion24" href="#collapseTwentyFive" style="text-decoration:none;"><div class="col-lg-2"><i class="fa fa-sort-down"></i></div><div class="col-lg-8 col-lg-pull-2" style="margin-left:20px; font-size:18px; font-weight:bold;">Document</div></a>
																			</h4>
																		</div>
																	</div>
																</div>
															</div>
															<div id="collapseTwentyFive" class="panel-collapse collapse">
																<div id="collapseOne" class="panel-collapse collapse in">
																	<div class="panel-body">
																		<div class="row" >
																			<div class="col-lg-12">
																				<div class="panel-group" id="accordion8">
																					<div class="panel panel-default">
																						<div class="panel-heading">
																							<div class="row">
																								<div class="col-lg-12">
																									<div class="col-lg-12 ">
																										<h4 class="panel-title">
																											<a href="#collapseTwentySix" style="text-decoration:none;"><div class="col-lg-2"><i class="fa fa-sort-down"></i></div><div class="col-lg-8 col-lg-pull-2" style="margin-left:20px; font-size:18px; font-weight:bold;">Visa / Residencies / Work Allowance</div></a>
																										</h4>
																									</div>
																								</div>
																							</div>
																						</div>
																						<div id="collapseTwentySix" class="panel-collapse collapse">
																							<div id="collapseOne" class="panel-collapse collapse in">
																								<div class="panel-body">
																									<div class="col-lg-12" style="   margin-top: 10px;">
																										<div class="col-lg-1" >
																										</div>
																										<div class="col-lg-5" >
																											<div class="col-lg-10">
																												<input class="form-control" placeholder="Type Of Document" >
																											</div>
																										</div>
																										<div class="col-lg-5" >
																											<div class="col-lg-10">
																												<input class="form-control" placeholder="Country" >
																											</div>
																										</div>
																									</div>
																									<div class="col-lg-12" style="   margin-top: 10px;">
																										<div class="col-lg-1" >
																										</div>
																										<div class="col-lg-5" >
																											<div class="col-lg-10">
																												<input class="form-control" placeholder="Document No" >
																											</div>
																										</div>
																										<div class="col-lg-5" >
																											<div class="col-lg-10">
																												<input class="form-control" placeholder="Valid Through" >
																											</div>
																										</div>
																									</div>
																									<div class="col-lg-12" style="border-right:1px solid #ccc;    margin-top: 10px;">
																										<div class="col-lg-1" >
																										</div>
																										<div class="col-lg-10" >
																											<div class="col-lg-2">
																											</div>
																										</div>
																										<div class="btn-group col-lg-2 col-lg-push-4" style="margin-top:30px;">
																											<button type="button" class="btn btn-primary btn-sm dropdown-toggle col-lg-12 col-lg-push-5" data-toggle="dropdown" style="background-color:#000;">
																											Submit
																											</button>
																										</div>
																									</div>
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class="row" >
																			<div class="col-lg-12">
																				<div class="panel-group" id="accordion8">
																					<div class="panel panel-default">
																						<div class="panel-heading">
																							<div class="row">
																								<div class="col-lg-12">
																									<div class="col-lg-12 ">
																										<h4 class="panel-title">
																											<a data-toggle="collapse" data-parent="#accordion26" href="#collapseTwentySeven" style="text-decoration:none;"><div class="col-lg-2"><i class="fa fa-sort-down"></i></div><div class="col-lg-8 col-lg-pull-2" style="margin-left:20px; font-size:18px; font-weight:bold;">Insurance</div></a>
																										</h4>
																									</div>
																								</div>
																							</div>
																						</div>
																						<div id="collapseTwentySeven" class="panel-collapse collapse">
																							<div id="collapseOne" class="panel-collapse collapse in">
																								<div class="panel-body">
																										<div class="col-lg-12" style="   margin-top: 10px;">
																											<div class="col-lg-1" >
																											</div>
																											<div class="col-lg-5" >
																												<div class="col-lg-10">
																													<input class="form-control" placeholder="Type Of Document" >
																												</div>
																											</div>
																											<div class="col-lg-5" >
																												<div class="col-lg-10">
																													<input class="form-control" placeholder="Country" >
																												</div>
																											</div>
																										</div>
																										<div class="col-lg-12" style="   margin-top: 10px;">
																											<div class="col-lg-1" >
																											</div>
																											<div class="col-lg-5" >
																												<div class="col-lg-10">
																													<input class="form-control" placeholder="Document No" >
																												</div>
																											</div>
																											<div class="col-lg-5" >
																												<div class="col-lg-10">
																													<input class="form-control" placeholder="Valid Through" >
																												</div>
																											</div>
																										</div>
																										<div class="col-lg-12" style="border-right:1px solid #ccc;    margin-top: 10px;">
																											<div class="col-lg-1" >
																											</div>
																											<div class="col-lg-10" >
																												<div class="col-lg-2">
																												</div>
																											</div>
																											<div class="btn-group col-lg-2 col-lg-push-4" style="margin-top:30px;">
																												<button type="button" class="btn btn-primary btn-sm dropdown-toggle col-lg-12 col-lg-push-5" data-toggle="dropdown" style="background-color:#000;">Submit
																												</button>
																											</div>
																										</div>
																									</div>
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="row" >
													<div class="col-lg-12">
														<div class="panel-group" id="accordion8">
															<div class="panel panel-default">
																<div class="panel-heading">
																	<div class="row">
																		<div class="col-lg-12">
																			<div class="col-lg-12 ">
																				<h4 class="panel-title">
																					<a data-toggle="collapse" data-parent="#accordion30" href="#collapseThirtyOne" style="text-decoration:none;"><div class="col-lg-2"><i class="fa fa-sort-down"></i></div><div class="col-lg-8 col-lg-pull-2" style="margin-left:20px; font-size:18px; font-weight:bold;">Flights and Travel Arrangements</div></a>
																				</h4>
																			</div>
																		</div>
																	</div>
																</div>
																<div id="collapseThirtyOne" class="panel-collapse collapse">
																	<div id="collapseOne" class="panel-collapse collapse in">
																		<div class="panel-body">
																			<div class="row" >
																				<div class="col-lg-12">
																					<div class="panel-group" id="accordion8">
																						<div class="panel panel-default">
																							<div class="panel-heading">
																								<div class="row">
																									<div class="col-lg-12">
																										<div class="col-lg-12 ">
																											<h4 class="panel-title">
																												<a data-toggle="collapse" data-parent="#accordion27" href="#collapseTwentyEight" style="text-decoration:none;"><div class="col-lg-2"><i class="fa fa-sort-down"></i></div><div class="col-lg-8 col-lg-pull-2" style="margin-left:20px; font-size:18px; font-weight:bold;">Travel Day - From To</div></a>
																											</h4>
																										</div>
																									</div>
																								</div>
																							</div>
																							<div id="collapseTwentyEight" class="panel-collapse collapse">
																								<div id="collapseOne" class="panel-collapse collapse in">
																									<div class="panel-body">
																										<div class="col-lg-12" style="   margin-top: 10px;">
																											<div class="col-lg-1" >
																											</div>
																											<div class="col-lg-5" >
																												<div class="col-lg-10">
																													<input class="form-control" placeholder="Itinary" >
																												</div>
																											</div>
																											<div class="col-lg-5" >
																												<div class="col-lg-10">
																													<input class="form-control" placeholder="Hotel Details" >
																												</div>
																											</div>
																										</div>
																										<div class="col-lg-12" style="   margin-top: 10px;">
																											<div class="col-lg-1" >
																											</div>
																											<div class="col-lg-5" >
																												<div class="col-lg-10">
																													<input class="form-control" placeholder="Rental Car Details" >
																												</div>
																											</div>
																											<div class="col-lg-5" >
																												<div class="col-lg-10">
																													<input class="form-control" placeholder="General Notes" >
																												</div>
																											</div>
																										</div>
																										<div class="col-lg-12" style="border-right:1px solid #ccc;    margin-top: 10px;">
																											<div class="col-lg-1" >
																											</div>
																											<div class="col-lg-10" >
																												<div class="col-lg-2">
																												</div>
																											</div>
																											<div class="btn-group col-lg-2 col-lg-push-4" style="margin-top:30px;">
																												<button type="button" class="btn btn-primary btn-sm dropdown-toggle col-lg-12 col-lg-push-5" data-toggle="dropdown" style="background-color:#000;">Submit
																												</button>
																											</div>
																										</div>
																									</div>
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
																			<div class="row" >
																				<div class="col-lg-12">
																					<div class="panel-group" id="accordion8">
																						<div class="panel panel-default">
																							<div class="panel-heading">
																								<div class="row">
																									<div class="col-lg-12">
																										<div class="col-lg-12 ">
																											<h4 class="panel-title">
																												<a data-toggle="collapse" data-parent="#accordion28" href="#collapseTwentyNine" style="text-decoration:none;"><div class="col-lg-2"><i class="fa fa-sort-down"></i></div><div class="col-lg-8 col-lg-pull-2" style="margin-left:20px; font-size:18px; font-weight:bold;">Travel Day - From To</div></a>
																											</h4>
																										</div>
																									</div>
																								</div>
																							</div>
																							<div id="collapseTwentyNine" class="panel-collapse collapse">
																								<div id="collapseOne" class="panel-collapse collapse in">
																									<div class="panel-body">
																										<div class="col-lg-12" style="   margin-top: 10px;">
																											<div class="col-lg-1" >
																											</div>
																											<div class="col-lg-5" >
																												<div class="col-lg-10">
																													<input class="form-control" placeholder="Itinary" >
																												</div>
																											</div>
																											<div class="col-lg-5" >
																												<div class="col-lg-10">
																													<input class="form-control" placeholder="Hotel Details" >
																												</div>
																											</div>
																										</div>
																										<div class="col-lg-12" style="   margin-top: 10px;">
																											<div class="col-lg-1" >
																											</div>
																											<div class="col-lg-5" >
																												<div class="col-lg-10">
																													<input class="form-control" placeholder="Rental Car Details" >
																												</div>
																											</div>
																											<div class="col-lg-5" >
																												<div class="col-lg-10">
																													<input class="form-control" placeholder="General Notes" >
																												</div>
																											</div>
																										</div>
																										<div class="col-lg-12" style="border-right:1px solid #ccc;    margin-top: 10px;">
																											<div class="col-lg-1" >
																											</div>
																											<div class="col-lg-10" >
																												<div class="col-lg-2">
																												</div>
																											</div>
																											<div class="btn-group col-lg-2 col-lg-push-4" style="margin-top:30px;">
																												<button type="button" class="btn btn-primary btn-sm dropdown-toggle col-lg-12 col-lg-push-5" data-toggle="dropdown" style="background-color:#000;">
																												Submit
																												</button>
																											</div>
																										</div>
																									</div>
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="panel panel-default">
										<div class="panel-heading">
											<div class="row">
												<div class="col-lg-12">
													<div class="col-lg-12 ">
														<h4 class="panel-title">
															<a data-toggle="collapse" data-parent="#accordion7" href="#collapseSeven" style="text-decoration:none;"><div class="col-lg-2"><i class="fa fa-sort-down "></i></div><div class="col-lg-8 col-lg-pull-2" style="margin-left:20px; font-size:18px; font-weight:bold;">General Notes</div></a>
														</h4>
													</div>
												</div>
											</div>
										</div>
										<div id="collapseSeven" class="panel-collapse collapse">
											<div class="panel-body">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- end page-wrapper -->
			</div>
		</div>
    <!-- end wrapper -->
	
<script>
//$('#check_id').click(function(){
//$('#collapseEight').show();
//});
   var allowd_max = 100; //maximum input boxes allowed
        var wrapper_med = $(".input_fields_wrap_medicine_form"); //Fields wrapper
        var add_button_med = $(".add_field_button_medicine"); //Add button ID
        var x = 1; //initlal text box count
        $(add_button_med).click(function () {
		
            if (x < allowd_max) { 
                x++; 
$('#add_div').append('<div id="remove_'+x+'" class="col-lg-12"><div class="panel-group ADD_COMPANY" id="accordion8"><div class="panel panel-default"><div class="panel-heading"><div class="row"><div class="col-lg-12"><div class="col-lg-12"><h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion8" href="#collapse_'+x+'" style="text-decoration:none;"><div class="col-lg-2"><i class="fa fa-sort-down"></i></div><div class="col-lg-8 col-lg-pull-2" style="margin-left:20px; font-size:18px; font-weight:bold;">Company</div></a><a id="'+x+'" class="glyphicons col-md-2 " style=" width:30px; cursor: pointer; cursor: hand;float:right;" onclick="removeeDiv('+x+');">X</a></h4></div></div></div></div><div id="collapse_'+x+'" class="panel-collapse collapse"><div id="collapseOne" class="panel-collapse collapse in"><div class="panel-body">   <div class="col-lg-12" style="margin-top: 10px;"><div class="col-lg-1" ></div><div class="col-lg-5" ><div class="col-lg-10"><input class="form-control" placeholder="Company Name" ></div></div><div class="col-lg-5" ><div class="col-lg-6" style="padding-left:0px;"><div class="col-lg-10"><input class="form-control" placeholder="From" ></div></div><div class="col-lg-6"><div class="col-lg-10 col-lg-pull-2" style="margin-left:5px;"><input class="form-control" placeholder="To" ></div></div></div></div> <div class="col-lg-12" style="margin-top: 10px;" ><div class="col-lg-1" ></div><div class="col-lg-5" ><div class="col-lg-10"><input class="form-control" placeholder="Position" ></div></div><div class="col-lg-5" ><div class="col-lg-10"><input class="form-control" placeholder="Country" ></div></div></div>  <div class="col-lg-12" style="    margin-top: 10px;"><div class="col-lg-1" ></div><div class="col-lg-5" ><div class="col-lg-10"><input class="form-control" placeholder="City" ></div></div><div class="col-lg-5" ><div class="col-lg-10"><input class="form-control" placeholder="Street" ></div></div></div><div class="col-lg-12" style="   margin-top: 10px;"><div class="col-lg-1" ></div><div class="col-lg-10" ><div class="col-lg-2"></div></div><div class="btn-group col-lg-2 col-lg-push-3" style="margin-top:30px;"><button type="button" class="btn btn-primary btn-sm dropdown-toggle col-lg-12 col-lg-push-12" data-toggle="dropdown" style="background-color:#000;">Submit</button></div>  </div></div></div></div></div></div></div>');
               
            }
        });
		
		function removeeDiv(divId)
		{
		
			$("#remove_"+divId).remove();
		}
		
		
		
		
		 var allowd_max = 100; //maximum input boxes allowed
        var add_button_rec = $(".add_field_button_recruiter"); //Add button ID
        var x = 1; //initlal text box count

        $(add_button_rec).click(function () {
		
            if (x < allowd_max) { 
                x++; 
$('#add_education_div').append(' <div id="remove_'+x+'" class="col-lg-12"><div class="panel-group ADD_COMPANY" id="accordion8"><div class="panel panel-default"><div class="panel-heading"><div class="row"><div class="col-lg-12"><div class="col-lg-12 "><h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion11" href="#collapse_'+x+'" " style="text-decoration:none;"><div class="col-lg-2"><i class="fa fa-sort-down"></i></div><div class="col-lg-8 col-lg-pull-2" style="margin-left:20px;font-size:18px; font-weight:bold;">Education</div></a><a id='+x+' class="glyphicons col-md-2" style=" width:30px; cursor: pointer; cursor: hand;float:right; margin-left:-50px;" onclick="removeDiv('+x+');">X</a></h4></div></div></div></div><div id="collapse_'+x+'" class="panel-collapse collapse"><div id="collapseOne" class="panel-collapse collapse in"><div class="panel-body"><div class="col-lg-12" style="   margin-top: 10px;"><div class="col-lg-1" ></div><div class="col-lg-5" ><div class="col-lg-10"><input class="form-control" placeholder="Passing Year" ></div></div><div class="col-lg-5" ><div class="col-lg-10"><input class="form-control" placeholder="Institute" ></div></div></div>   <div class="col-lg-12" style="   margin-top: 10px;"><div class="col-lg-1" ></div><div class="col-lg-5" ><div class="col-lg-10"><input class="form-control" placeholder="Qualification" ></div></div><div class="col-lg-5" ><div class="col-lg-10"><input class="form-control" placeholder="Achievements" ></div></div></div><div class="col-lg-12" style="margin-top: 10px;"><div class="col-lg-1" ></div><div class="col-lg-10" ><div class="col-lg-2"></div></div><div class="btn-group col-lg-2 col-lg-push-4" style="margin-top:30px;"><button type="button" class="btn btn-primary btn-sm dropdown-toggle col-lg-12 col-lg-push-5" data-toggle="dropdown" style="background-color:#000;">Submit</button></div></div></div></div></div></div></div></div>													');
               
            }
        });
		function removeDiv(divId)
		{
		
			$("#remove_"+divId).remove();
		}
</script>
	<script>
			$("#remove_"+divId).remove();
		}
</script>

 <script>
            $(document).ready(function() {
                // create DatePicker from input HTML element
                $("#datepicker").kendoDatePicker();

                $("#monthpicker").kendoDatePicker({
                    // defines the start view
                    start: "year",

                    // defines when the calendar should return date
                    depth: "year",

                    // display month and year in the input
                    format: "MMMM yyyy"
                });
            });
        </script>
		
<script>
$(document).ready(function(){
    $("#personalinformation").click(function() {	
		$("span").remove();
		var personalinfo = $("#candidate_personal_info_form").serialize();
		$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>" + "martrick/candidateInfo",
				 cache: false,
				 async: false,
				dataType: 'json',
				data:personalinfo,
				success: function(response) {
					//console.log(response.Error['newpassword']); //return false;
					if(response.Error){
					$.each(response.Error, function (i, v) {
						$('input[name="' + i +'"]').after(v);
						$('#mismatch').css('display','none');
					});
						//$('#candidate_personal_info_form')[0].reset(); 
				}
					if(response.status=='success'){
						alert(response.status);
						 // $('#div_password_success').html(response.message);
						   //$("#successfull_personal_info").modal("show");
						    //$("#resetpassword").modal("hide");
							$('#personal_data').hide();
						    $('#candidate_personal_info_form')[0].reset(); 
					   } 
					}
			});
		});
		
	
});
</script>

<script>
$(document).ready(function(){
	
		$('.date_of_birth').focusout(function(){
		     var birth  = $('#datepicker').val();
			 var dob = new Date(birth);
			 var today = new Date();
			 var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
			 $('#age').val(age);
		});
});
</script>		