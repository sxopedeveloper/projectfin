<?php include 'admin/template/head.php'; ?>
	<body>
		<style type="text/css">
			#add-cc{
				cursor: pointer; 
				cursor: hand;
			}
			#insert_cc{
				cursor: pointer; 
				cursor: hand;	
			}
			.row-input{
				margin-bottom: 10px;
			}
			.panel-cc{
				margin-bottom: 10px;
			}
			.panel-body-cc{
				background-color: #e5e5e5;
			}
			.del_token { 
				cursor: pointer; 
				cursor: hand;
			}
		</style>
		<section class="body">
			<!-- start: header -->
			<?php include 'admin/template/header.php'; ?>
			<!-- end: header -->
			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<?php include 'admin/template/left_sidebar.php'; ?>
				<!-- end: sidebar -->
				<section role="main" class="content-body">
					<?php include 'admin/template/header_2.php'; ?>
					<!-- start: page -->					
					<div class="row">
						<div class="col-md-4 col-lg-3">
							<section class="panel">
								<div class="panel-body">
									<div class="thumb-info mb-md">
										<img src="<?php echo $user_image; ?>" class="rounded img-responsive" alt="Profile Image" style="width: 100%;" />
										<div class="thumb-info-title">
											<span class="thumb-info-inner">CAR DEALER</span>
											<span class="thumb-info-type"><?php echo $name; ?></span>
										</div>
									</div>
									<div class="widget-toggle-expand mb-md">
										<div class="widget-header">
											<h6>Delivery Status</h6>
											<div class="widget-toggle">+</div>
										</div>
										<div class="widget-content-collapsed">
											<div class="progress progress-xs light">
												<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $delivery_percentage; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $delivery_percentage; ?>%;">
													<?php echo $delivery_percentage; ?>%
												</div>
											</div>
										</div>
										<div class="widget-content-expanded">
											<p><span class="badge" style="background: #d64b4b"><?php echo $new_orders_count; ?></span> <a href="<?php echo site_url("user/orders?status=0"); ?>">New Orders</a></p>
											<p><span class="badge" style="background: #d64b4b"><?php echo $deliveries_pending_count; ?></span> <a href="<?php echo site_url("user/orders?status=1"); ?>">Deliveries Pending</a></p>
											<p><span class="badge" style="background: #d64b4b"><?php echo $quote_requests_count; ?></span> <a href="<?php echo site_url("user/quotation_requests/0"); ?>">Quote Requests</a></p>
										</div>
									</div>
									<hr class="dotted short">
									<h6 class="text-muted"><?php echo $user['dealership_name']; ?></h6>
									<p id="dealer_about"><?php echo $user['description']; ?></p>
								</div>
							</section>
							<section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
									</div>
									<h2 class="panel-title">
										<span class="va-middle">Incoming Deliveries</span>
									</h2>
								</header>
								<div class="panel-body">
									<div class="content">
										<ul class="simple-user-list">
											<?php
											if (count($incoming_deliveries)==0)
											{
												echo 'There are no incoming deliveries at the moment';
											}
											else
											{
												foreach ($incoming_deliveries AS $incoming_delivery)
												{
													echo '
													<li>
														<span class="title">
															<b><font color="#0088cc">'.$incoming_delivery['cq_number'].'</font></b>
															 '.$incoming_delivery['make'].' '.$incoming_delivery['model'].'
														</span>
														<span class="message truncate">
															To be delivered in '.$incoming_delivery['delivery_date'].'<br />
															'.$incoming_delivery['name'].'<br />
															'.$incoming_delivery['postcode'].' '.$incoming_delivery['state'].'
														</span>
													</li>';
												}												
											}
											?>
										</ul>
										<hr class="dotted short">
										<div class="text-right">
											<a class="text-uppercase text-muted" href="<?php echo site_url("user/orders?status=1"); ?>">(View All)</a>
										</div>
									</div>
								</div>
							</section>
						</div>
						<div class="col-md-8 col-lg-6">
							<div class="tabs">
								<ul class="nav nav-tabs tabs-primary">
									<li class="active">
										<a href="#bulletin_tab" data-toggle="tab">Bulletin</a>
									</li>
									<li>
										<a href="#edit_profile_tab" data-toggle="tab">Profile</a>
									</li>
									<li>
										<a href="#change_password_tab" data-toggle="tab">Change Password</a>
									</li>
								</ul>
								<div class="tab-content">
									<div id="bulletin_tab" class="tab-pane active">
										<section class="simple-compose-box mb-xlg" style="margin-top: 10px;">
											<form method="post" id="leave_message_form" name="leave_message_form" action="">
												<textarea data-plugin-textarea-autosize placeholder="Leave us a message.." rows="1" id="user_message" name="message"></textarea>
												<div class="compose-box-footer">
													<ul class="compose-btn">
														<li>
															<a class="btn btn-primary btn-xs" onClick="leave_message()">Send</a>
														</li>
													</ul>
												</div>
											</form>
										</section>
										<h4 class="mb-xlg">News &amp; Updates</h4>
										<div class="timeline timeline-simple mt-xlg mb-md">
											<div class="tm-body">
												<div class="tm-title">
													<h3 class="h5 text-uppercase">August 2016</h3>
												</div>
												<ol class="tm-items">
													<li>
														<div class="tm-box">
															<p>
																We are very pleased to announce that the Leads Store is now open. You have customers waiting. Claim your Leads <a href="<?php echo site_url("user/available_leads"); ?>">here</a>!
															</p>
														</div>
													</li>
													<li>
														<div class="tm-box">
															<p>
																The Orders Module is now available! Download your PDF and always make sure to update the Delivery Dates.
															</p>
														</div>
													</li>
												</ol>
											</div>
										</div>
									</div>
									<div id="edit_profile_tab" class="tab-pane">
										<form class="form-horizontal" method="post" id="edit_profile_form" name="edit_profile_form" action="">
											<h4 class="mb-xlg">Dealership Information</h4>
											<fieldset>
												<div class="form-group">
													<label class="col-md-4 control-label" for="dealership_name"><span style="color: #d2322d">*</span> Dealership Name: </label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="dealership_name" name="dealership_name" value="<?php echo $user['dealership_name']; ?>">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" for="dealership_name"><span style="color: #d2322d">*</span> Dealer License #: </label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="dealer_license" name="dealer_license" value="<?php echo $user['dealer_license']; ?>">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" for="abn"><span style="color: #d2322d">*</span> ABN: </label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="abn" name="abn" value="<?php echo $user['abn']; ?>">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" for="state"><span style="color: #d2322d">*</span> State: </label>
													<div class="col-md-8">
														<?php 
														$act = ''; if ($user['state']=='ACT') { $act = ' selected'; }
														$nsw = ''; if ($user['state']=='NSW') { $nsw = ' selected'; }
														$nt = ''; if ($user['state']=='NT') { $nt = ' selected'; }
														$qld = ''; if ($user['state']=='QLD') { $qld = ' selected'; }
														$sa = ''; if ($user['state']=='SA') { $sa = ' selected'; }
														$tas = ''; if ($user['state']=='TAS') { $tas = ' selected'; }
														$vic = ''; if ($user['state']=='VIC') { $vic = ' selected'; }
														$wa = ''; if ($user['state']=='WA') { $wa = ' selected'; }
														?>
														<select class="form-control input-md" name="state" id="state" type="text" required>
															<option name="state" value="">-Select State-</option>
															<option name="state" value="ACT" <?php echo $act; ?>>ACT - Australian Capital Territory</option>
															<option name="state" value="NSW" <?php echo $nsw; ?>>NSW - New South Wales</option>
															<option name="state" value="NT" <?php echo $nt; ?>>NT - Northern Territory</option>
															<option name="state" value="QLD" <?php echo $qld; ?>>QLD - Queensland</option>
															<option name="state" value="SA" <?php echo $sa; ?>>SA - South Australia</option>
															<option name="state" value="TAS" <?php echo $tas; ?>>TAS - Tasmania</option>
															<option name="state" value="VIC" <?php echo $vic; ?>>VIC - Victoria</option>
															<option name="state" value="WA" <?php echo $wa; ?>>WA - Western Australia</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" for="postcode"><span style="color: #d2322d">*</span> Postcode: </label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="postcode" name="postcode" value="<?php echo $user['postcode']; ?>">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" for="address">Address: </label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="address" name="address" value="<?php echo $user['dealership_address']; ?>">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" for="description">About: </label>
													<div class="col-md-8">
														<textarea class="form-control" rows="3" id="description" name="description"><?php echo $user['description']; ?></textarea>
													</div>
												</div>												
											</fieldset>
											<hr class="dotted">
											<h4 class="mb-xlg">Contact Person (Fleet Manager)</h4>
											<fieldset>
												<div class="form-group">
													<label class="col-md-4 control-label"><span style="color: #d2322d">*</span> Full Name: </label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="manager_name" name="manager_name" value="<?php echo $user['manager_name']; ?>">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label"><span style="color: #d2322d">*</span> Email Address: </label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="manager_email" name="manager_email" value="<?php echo $user['manager_email']; ?>">
													</div>
												</div>												
												<div class="form-group">
													<label class="col-md-4 control-label"><span style="color: #d2322d">*</span> Mobile #: </label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="manager_mobile" name="manager_mobile" value="<?php echo $user['manager_mobile']; ?>">
													</div>
												</div>												
												<div class="form-group">
													<label class="col-md-4 control-label">Landline #: </label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="manager_phone" name="manager_phone" value="<?php echo $user['manager_phone']; ?>">
													</div>
												</div>
											</fieldset>
											<hr class="dotted">
											<h4 class="mb-xlg">Contact Person (Accounts Payable)</h4>
											<fieldset>
												<div class="form-group">
													<label class="col-md-4 control-label"><span style="color: #d2322d">*</span> Full Name: </label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="account_name" name="account_name" value="<?php echo $user['account_name']; ?>">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label"><span style="color: #d2322d">*</span> Email Address: </label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="account_email" name="account_email" value="<?php echo $user['account_email']; ?>">
													</div>
												</div>												
												<div class="form-group">
													<label class="col-md-4 control-label"><span style="color: #d2322d">*</span> Mobile #: </label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="account_mobile" name="account_mobile" value="<?php echo $user['account_mobile']; ?>">
													</div>
												</div>												
												<div class="form-group">
													<label class="col-md-4 control-label">Landline #: </label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="account_phone" name="account_phone" value="<?php echo $user['account_phone']; ?>">
													</div>
												</div>
											</fieldset>
											<hr class="dotted">
											<h4 class="mb-xlg">Contact Person (Dealer Principal)</h4>
											<fieldset>
												<div class="form-group">
													<label class="col-md-4 control-label"><span style="color: #d2322d">*</span> Full Name: </label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="dealer_principal_name" name="dealer_principal_name" value="<?php echo $user['dealer_principal_name']; ?>">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label"><span style="color: #d2322d">*</span> Email Address: </label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="dealer_principal_email" name="dealer_principal_email" value="<?php echo $user['dealer_principal_email']; ?>">
													</div>
												</div>												
												<div class="form-group">
													<label class="col-md-4 control-label"><span style="color: #d2322d">*</span> Mobile #: </label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="dealer_principal_mobile" name="dealer_principal_mobile" value="<?php echo $user['dealer_principal_mobile']; ?>">
													</div>
												</div>												
												<div class="form-group">
													<label class="col-md-4 control-label">Landline #: </label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="dealer_principal_phone" name="dealer_principal_phone" value="<?php echo $user['dealer_principal_phone']; ?>">
													</div>
												</div>
											</fieldset>
											<hr class="dotted">											
											<h4 class="mb-xlg">Makes: </h4>
											<fieldset>
												<div class="form-group">
													<label class="col-md-4 control-label" for="dealership_brand"><span style="color: #d2322d">*</span> Makes: </label>
													<div class="col-md-8">
														<select class="form-control " id="dealership_brand" name="dealership_brand[]" type="text"  multiple="multiple" data-plugin-selectTwo>
															<?php
															$dealership_brand = str_replace('&', "", $user['dealership_brand']);
															$make_array = explode(",", $dealership_brand);
															foreach ($makes as $make_key => $make_val)
															{
																?>
																<option <?php echo (in_array(trim($make_val['name']), $make_array) ? "selected='selected'" : ""); ?> value="<?php echo $make_val['name']; ?>">
																	<?php echo $make_val['name']; ?>
																</option>
																<?php
															}
															?>
														</select>
													</div>
												</div>
											</fieldset>
											<hr class="dotted">
											<h4 class="mb-xlg">We cater clients from: </h4>
											<fieldset>												
												<div class="form-group">
													<label class="col-md-4 control-label" for="dealership_states"><span style="color: #d2322d">*</span> States: </label>
													<div class="col-md-8">
														<select class="form-control " id="dealership_states" name="dealership_states[]" type="text"  multiple="multiple" data-plugin-selectTwo>
															<?php
															$state_array = explode(",", $user['dealership_states']);
															foreach ($states as $state_key => $state_val)
															{
																?>
																<option <?php echo (in_array(trim($state_val), $state_array) ? "selected='selected'" : ""); ?> value="<?php echo $state_val; ?>">
																	<?php echo $state_val; ?>
																</option>
																<?php
															}
															?>
														</select>
													</div>
												</div>
											</fieldset>
											<hr class="dotted">
											<h4 class="mb-xlg">Bank Details</h4>
											<fieldset>
												<div class="form-group">
													<label class="col-md-4 control-label" for="bank_acct_name">Account Name: </label>
													<div class="col-md-8">
														<input value="<?php echo $user['bank_acct_name']; ?>" class="form-control" id="bank_acct_name" name="bank_acct_name" type="text" >
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" for="bank_acct_num">Account Number: </label>
													<div class="col-md-8">
														<input value="<?php echo $user['bank_acct_num']; ?>" class="form-control" id="bank_acct_num" name="bank_acct_num" type="text" >
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" for="bank_acct_bsb">BSB Number: </label>
													<div class="col-md-8">
														<input value="<?php echo $user['bank_acct_bsb']; ?>" class="form-control" id="bank_acct_bsbbank_acct_bsb" name="bank_acct_bsb" type="text" >
													</div>
												</div>
											</fieldset>
											<br />
											<div class="panel-footer">
												<div class="row">
													<div class="col-md-9 col-md-offset-3">
														<button type="button" class="btn btn-primary" onClick="update_profile()">Submit</button>
														<button type="reset" class="btn btn-default">Reset</button>
													</div>
												</div>
											</div>
										</form>
									</div>
									<div id="change_password_tab" class="tab-pane">
										<form class="form-horizontal" method="post" id="change_password_form" name="change_password_form" action="">
											<h4 class="mb-xlg">Change Password</h4>
											<fieldset class="mb-xl">
												<div class="form-group">
													<label class="col-md-4 control-label" for="current_password"><span style="color: #d2322d">*</span> Current Password</label>
													<div class="col-md-7">
														<input type="password" class="form-control" id="current_password" name="current_password">
													</div>
												</div>											
												<div class="form-group">
													<label class="col-md-4 control-label" for="password"><span style="color: #d2322d">*</span> New Password</label>
													<div class="col-md-7">
														<input type="password" class="form-control" id="password" name="password">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 control-label" for="confirm_password"><span style="color: #d2322d">*</span> Confirm Password</label>
													<div class="col-md-7">
														<input type="password" class="form-control" id="confirm_password" name="confirm_password">
													</div>
												</div>
											</fieldset>
											<div class="panel-footer">
												<div class="row">
													<div class="col-md-12 col-md-offset-4">
														<button type="button" class="btn btn-primary" onClick="update_password()">Submit</button>
														<button type="reset" class="btn btn-default">Reset</button>
													</div>
												</div>
											</div>
										</form>
									</div>							
								</div>
							</div>
						</div>
						<div class="col-md-12 col-lg-3">
							<h4 class="mb-md">Dealer Stats</h4>
							<ul class="simple-card-list mb-xlg">					
								<li class="danger">
									<h3>$ <?php echo number_format($user['balance'], 2); ?></h3>
									<p>Current Balance</p>
								</li>
								<li class="primary">
									<h3><?php echo $delivered_count; ?></h3>
									<p>Cars Delivered</p>
								</li>								
								<li class="primary">
									<h3><?php echo $tenders_won_count; ?></h3>
									<p>Tenders Won</p>
								</li>
							</ul>
							<section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
									</div>
									<h2 class="panel-title">
										<span class="va-middle">Newest Orders</span>
									</h2>
								</header>
								<div class="panel-body">
									<div class="content">
										<ul class="simple-user-list">
											<?php
											if (count($newest_orders)==0)
											{
												echo 'There are no new orders yet';
											}
											else
											{
												foreach ($newest_orders AS $newest_order)
												{
													echo '
													<li>
														<span class="title">
															<b><font color="#0088cc">'.$newest_order['cq_number'].'</font></b>
															 '.$newest_order['make'].' '.$newest_order['model'].'
														</span>
														<span class="message truncate">
															'.$newest_order['name'].'<br />'.$newest_order['postcode'].' '.$newest_order['state'].'
														</span>
													</li>';
												}												
											}
											?>
										</ul>
										<hr class="dotted short">
										<div class="text-right">
											<a class="text-uppercase text-muted" href="<?php echo site_url("user/orders?status=0"); ?>">(View All)</a>
										</div>
									</div>
								</div>
							</section>
						</div>
					</div>
				</section>	
			</div>
			<?php include 'admin/template/right_sidebar.php'; ?>
		</section>
		<?php include 'admin/template/scripts.php'; ?>
		<script type="text/javascript">
			function leave_message ()
			{
				var user_message = $("#user_message").val();
				if (user_message != "")
				{
					$.ajax({
						type: "POST",
						url: "<?php echo site_url('user/leave_message'); ?>",
						data: $("#leave_message_form").serialize(),
						cache: false,
						success: function(result){
							$("#user_message").val("");
							alert ("Your message has been sent to the Administrator");
						}
					});					
				}
				else
				{
					alert ("Your message cannot be blank!");
				}				
			}

			function update_profile ()
			{
				var name = $("#name").val();
				var mobile = $("#mobile").val();
				var phone = $("#phone").val();
				var dealership_name = $("#dealership_name").val();
				var dealership_brand = $("#dealership_brand").val();
				var abn = $("#abn").val();
				var state = $("#state").val();
				var postcode = $("#postcode").val();
				var description = $("#description").val();
				if (name != "" && mobile != "" && phone != "" && dealership_name != "" && dealership_brand != "" && abn != "" && state != "" && postcode != "")
				{
					$.ajax({
						type: "POST",
						url: "<?php echo site_url('user/update_dealer_profile_old'); ?>",
						data: $("#edit_profile_form").serialize(),
						cache: false,
						success: function(result){
							$("#user_message").val("");
							$("#dealer_about").html(description)
							alert ("Your profile has been successfully updated");
						}
					});				
				}
				else
				{
					alert ("Please fill up all the required fields!");
				}
			}

			function update_password ()
			{
				var current_password = $("#current_password").val();				
				var password = $("#password").val();
				var confirm_password = $("#confirm_password").val();
				if (current_password != "" && password != "" && confirm_password != "")
				{
					if (password != confirm_password)
					{
						alert ("Passwords do not match!");
					}
					else
					{
						$.ajax({
							type: "POST",
							url: "<?php echo site_url('user/update_user_password'); ?>",
							data: $("#change_password_form").serialize(),
							cache: false,
							success: function(result){
								if (result)
								{
									$("#current_password").val("");
									$("#password").val("");
									$("#confirm_password").val("");
									alert ("Your password has been successfully updated");
								}
								else
								{
									alert ("Please make sure the Current Password is correct!");
								}
							}
						});
					}
				}
				else
				{
					alert ("Please fill up all the required fields!");
				}
			}

			$(document).on('click', '.datepicker_login', function () {
				$(this).toggleClass('clicked').datepicker({format: 'yyyy-mm-dd'}).datepicker('show');
			});
		</script>		
	</body>
</html>