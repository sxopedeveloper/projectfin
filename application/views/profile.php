<?php include 'admin/template/head.php'; ?>
	<body>
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
					<section class="panel">
						<header class="panel-heading">
							<div class="panel-actions">
								<a href="#" class="fa fa-caret-down"></a>
							</div>
							<h2 class="panel-title">Profile</h2>
						</header>
						<div class="panel-body">
							<?php
							if ($login_type==1)
							{
								?>
								<form action="<?php echo site_url('user/update_dealer_profile'); ?>" method="post" accept-charset="utf-8">
									<div class="row">
										<div class="form-group">
											<div class="col-md-6 text-left">
												<label>* Name Of Dealership:</label>
												<input value="<?php echo $user['dealership_name']; ?>" class="form-control input-md" id="dealership_name" name="dealership_name" type="text" required><br />
											</div>
											<div class="col-md-6 text-left">
												<label>* ABN:</label>
												<input value="<?php echo $user['abn']; ?>" class="form-control input-md" id="abn" name="abn" type="text" required><br />
											</div>
											<div class="col-md-4 text-left">
												<label>* State:</label>
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
												<br />
											</div>
											<div class="col-md-4 text-left">
												<label>* Postcode:</label>
												<input value="<?php echo $user['postcode']; ?>" class="form-control input-md" id="postcode" name="postcode" type="text" required><br />
											</div>																						
											<div class="col-md-4 text-left">
												<label>* Address:</label>
												<input value="<?php echo $user['dealership_address']; ?>" class="form-control input-md" id="address" name="address" type="text" required><br />
											</div>
											<div class="col-md-12 text-left">
												<label>* Brand Of Dealership:</label>
												<input value="<?php echo $user['dealership_brand']; ?>" class="form-control input-md" id="dealership_brand" name="dealership_brand" type="text" required><br />
											</div>
											<div class="col-md-4 text-left">
												<label>* Name Of Manager:</label>
												<input value="<?php echo $user['manager_name']; ?>" class="form-control input-md" id="name" name="name" type="text" required><br />
											</div>
											<div class="col-md-4 text-left">
												<label>* Work Phone Of Manager:</label>
												<input value="<?php echo $user['manager_phone']; ?>" class="form-control input-md" id="phone" name="phone" type="text" required><br />
											</div>											
											<div class="col-md-4 text-left">
												<label>* Mobile Of Manager:</label>
												<input value="<?php echo $user['manager_mobile']; ?>" class="form-control input-md" id="mobile" name="mobile" type="text" required><br />
											</div>
											<div class="col-md-12 text-left">
												<label>Other Info:</label>
												<textarea id="description" name="description" class="form-control" rows="3" id="textareaDefault"><?php echo $user['description']; ?></textarea><br />
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<input value="Update" name="submit" class="btn btn-primary pull-right push-bottom" data-loading-text="Loading..." type="submit">
										</div>
									</div>
								</form>								
								<?php
							}
							else if ($login_type==3)
							{
								?>
								<form action="<?php echo site_url('user/update_wholesaler_profile'); ?>" method="post" accept-charset="utf-8">
									<div class="row">
										<div class="form-group">
											<div class="col-md-6 text-left">
												<label>Name:</label>
												<input value="<?php echo $user['name']; ?>" class="form-control input-md" id="name" name="name" type="text"><br />
											</div>
											<div class="col-md-6 text-left">
												<label>ABN:</label>
												<input value="<?php echo $user['abn']; ?>" class="form-control input-md" id="abn" name="abn" type="text"><br />
											</div>
											<div class="col-md-6 text-left">
												<label>Phone:</label>
												<input value="<?php echo $user['phone']; ?>" class="form-control input-md" id="phone" name="phone" type="text"><br />
											</div>											
											<div class="col-md-6 text-left">
												<label>Mobile:</label>
												<input value="<?php echo $user['mobile']; ?>" class="form-control input-md" id="mobile" name="mobile" type="text"><br />
											</div>											
											<div class="col-md-6 text-left">
												<label>State:</label>
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
												<select class="form-control input-md" name="state" id="state" type="text">
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
												<br />
											</div>											
											<div class="col-md-6 text-left">
												<label>Postcode:</label>
												<input value="<?php echo $user['postcode']; ?>" class="form-control input-md" id="postcode" name="postcode" type="text"><br />
											</div>
											<div class="col-md-12 text-left">
												<label>Address:</label>
												<input value="<?php echo $user['address']; ?>" class="form-control input-md" id="address" name="address" type="text"><br />
											</div>
											<div class="col-md-12 text-left">
												<label>Other Info:</label>
												<textarea id="description" name="description" class="form-control" rows="3" id="textareaDefault"><?php echo $user['description']; ?></textarea><br />
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<input value="Update" name="submit" class="btn btn-primary pull-right push-bottom" data-loading-text="Loading..." type="submit">
										</div>
									</div>
								</form>								
								<?php							
							}
							?>
							<?php echo $this->session->flashdata("message"); echo validation_errors("<div style='font-size: 0.8em; margin-bottom: 10px; padding: 10px; color: #E85454; border-radius: 3px; border: 1px solid #E45D5D; background-color: #F9D9D9;'>", "</div>"); ?>
						</div>
					</section>
					<!-- end: page -->
				</section>
			</div>
			<?php include 'admin/template/right_sidebar.php'; ?>
		</section>		
		<?php include 'admin/template/scripts.php'; ?>
	</body>
</html>