<?php include 'template/head.php'; ?>
	<body>
		<style type="text/css">
			th, td { 
				white-space: nowrap; 
			}
			
		    div.dataTables_wrapper {
		        margin: 0 auto;
		    }
			
			.text-line {
				background-color: transparent;
				color: #888;
				outline: none;
				outline-style: none;
				border-top: none;
				border-left: none;
				border-right: none;
				border-bottom: solid #ddd 1px;
				padding: 0px 0px;
				height: 22px;
				width: 100%;
			}				
				
			.ajax_button {
				cursor: pointer; 
				cursor: hand; 
				margin-bottom: 10px;
			}
			
			.ajax_button_primary {
				cursor: pointer; 
				cursor: hand; 
				margin-bottom: 10px;
				color: #58c603;
			}			
			
			.container_bordered_round {
				padding: 20px; 
				border: 1px solid #ccc;			
				border-radius: 5px;
			}		
		</style>	
		<section class="body">
			<?php include 'template/header.php'; ?>
			<div class="inner-wrapper">
				<?php include 'template/left_sidebar.php'; ?>
				<section role="main" class="content-body">
					<?php include 'template/header_2.php'; ?>
					<!-- start: page -->
					<section class="panel">
						<header class="panel-heading">
							<div class="panel-actions">
								<a href="#" class="fa fa-caret-down"></a>
							</div>
							<h2 class="panel-title">
								<span class="va-middle">Search Filters</span>
							</h2>
						</header>
						<form action="<?php echo site_url('deal/list_view'); ?>" method="get" accept-charset="utf-8">
							<div class="panel-body">
								<br />								
								<?php
								$cq_number = isset($_GET['cq_number']) ? $_GET['cq_number'] : '';
								$finance = isset($_GET['finance']) ? $_GET['finance'] : '';
								$interstate = isset($_GET['interstate']) ? $_GET['interstate'] : '';
								$tradein = isset($_GET['tradein']) ? $_GET['tradein'] : '';
								$tradein_buyer = isset($_GET['tradein_buyer']) ? $_GET['tradein_buyer'] : '';
								
								$current_status = isset($_GET['current_status']) ? $_GET['current_status'] : '';
								$dealer_status = isset($_GET['dealer_status']) ? $_GET['dealer_status'] : '';
								$lead_user_id = isset($_GET['user_id']) ? $_GET['user_id'] : '';

								$name = isset($_GET['name']) ? $_GET['name'] : '';
								$email = isset($_GET['email']) ? $_GET['email'] : '';
								$phone = isset($_GET['phone']) ? $_GET['phone'] : '';
									
								$state = isset($_GET['state']) ? $_GET['state'] : '';
								$postcode = isset($_GET['postcode']) ? $_GET['postcode'] : '';
								$address = isset($_GET['address']) ? $_GET['address'] : '';
									
								$make = isset($_GET['make']) ? $_GET['make'] : '';
								$model = isset($_GET['model']) ? $_GET['model'] : '';									
								$dealer_id = isset($_GET['dealer_id']) ? $_GET['dealer_id'] : '';
									
								$status = isset($_GET['status']) ? $_GET['status'] : '';
								$date_from = isset($_GET['date_from']) ? $_GET['date_from'] : '';
								$date_to = isset($_GET['date_to']) ? $_GET['date_to'] : '';								

								$sort_field = isset($_GET['sort_field']) ? $_GET['sort_field'] : '';
								$sort_type = isset($_GET['sort_type']) ? $_GET['sort_type'] : '';

								$selected_finance_0 = ""; if ($finance == "0") { $selected_finance_0 = ' selected="selected" '; }
								$selected_finance_1 = ""; if ($finance == "1") { $selected_finance_1 = ' selected="selected" '; }								
								
								$selected_interstate_0 = ""; if ($interstate == "0") { $selected_interstate_0 = ' selected="selected" '; }
								$selected_interstate_1 = ""; if ($interstate == "1") { $selected_interstate_0 = ' selected="selected" '; }
									
								$selected_tradein_0 = ""; if ($tradein == "0") { $selected_tradein_0 = ' selected="selected" '; }
								$selected_tradein_1 = ""; if ($tradein == "1") { $selected_tradein_1 = ' selected="selected" '; }

								$selected_tradein_buyer_1 = ""; if ($tradein_buyer == "1") { $selected_tradein_buyer_1 = ' selected="selected" '; }																	
								$selected_tradein_buyer_2 = ""; if ($tradein_buyer == "2") { $selected_tradein_buyer_2 = ' selected="selected" '; }
								$selected_tradein_buyer_3 = ""; if ($tradein_buyer == "3") { $selected_tradein_buyer_3 = ' selected="selected" '; }								

								$selected_current_status_4 = ""; if ($current_status == "4") { $selected_current_status_4 = " selected"; }
								$selected_current_status_5 = ""; if ($current_status == "5") { $selected_current_status_5 = " selected"; }
								$selected_current_status_6 = ""; if ($current_status == "6") { $selected_current_status_6 = " selected"; }
								$selected_current_status_7 = ""; if ($current_status == "7") { $selected_current_status_7 = " selected"; }
								$selected_current_status_8 = ""; if ($current_status == "8") { $selected_current_status_8 = " selected"; }
								$selected_current_status_9 = ""; if ($current_status == "9") { $selected_current_status_9 = " selected"; }
								
								$selected_dealer_status_0 = ""; if ($dealer_status == "0") { $selected_dealer_status_0 = " selected"; }
								$selected_dealer_status_1 = ""; if ($dealer_status == "1") { $selected_dealer_status_1 = " selected"; }
								$selected_dealer_status_2 = ""; if ($dealer_status == "2") { $selected_dealer_status_2 = " selected"; }

								$selected_status_4 = ""; if ($status == "4") { $selected_status_4 = " selected"; }
								$selected_status_5 = ""; if ($status == "5") { $selected_status_5 = " selected"; }
								$selected_status_6 = ""; if ($status == "6") { $selected_status_6 = " selected"; }
								$selected_status_7 = ""; if ($status == "7") { $selected_status_7 = " selected"; }

								$selected_state_ACT = ""; if ($state == 'ACT') { $selected_state_ACT = " selected"; }
								$selected_state_NSW = ""; if ($state == 'NSW') { $selected_state_NSW = " selected"; }
								$selected_state_NT = ""; if ($state == 'NT') { $selected_state_NT = " selected"; }
								$selected_state_QLD = ""; if ($state == 'QLD') { $selected_state_QLD = " selected"; }
								$selected_state_SA = ""; if ($state == 'SA') { $selected_state_SA = " selected"; }
								$selected_state_TAS = ""; if ($state == 'TAS') { $selected_state_TAS = " selected"; }
								$selected_state_VIC = ""; if ($state == 'VIC') { $selected_state_VIC = " selected"; }
								$selected_state_WA = ""; if ($state == 'WA') { $selected_state_WA = " selected"; }

								$selected_sort_field_order_date = ""; if ($sort_field == 'order_date') { $selected_sort_field_order_date = ' selected="selected" '; }
								$selected_sort_field_approved_date = ""; if ($sort_field == 'approved_date') { $selected_sort_field_approved_date = ' selected="selected" '; }
								$selected_sort_field_delivery_date = ""; if ($sort_field == 'delivery_date') { $selected_sort_field_delivery_date = ' selected="selected" '; }
								$selected_sort_field_settled_date = ""; if ($sort_field == 'settled_date') { $selected_sort_field_settled_date = ' selected="selected" '; }
								$selected_sort_field_remaining_balance = ""; if ($sort_field == 'remaining_balance') { $selected_sort_field_remaining_balance = ' selected="selected" '; }
								$selected_sort_field_revenue = ""; if ($sort_field == 'revenue') { $selected_sort_field_revenue = ' selected="selected" '; }
								$selected_sort_field_commissionable_gross = ""; if ($sort_field == 'commissionable_gross') { $selected_sort_field_commissionable_gross = ' selected="selected" '; }

								$selected_sort_type_asc = ""; if ($sort_type == 'ASC') { $selected_sort_type_asc = ' selected="selected" '; }
								$selected_sort_type_desc = ""; if ($sort_type == 'DESC') { $selected_sort_type_desc = ' selected="selected" '; }

								$filter_date_from = isset($_GET['filter_date_from']) ? $_GET['filter_date_from'] : "";
								$filter_date_to   = isset($_GET['filter_date_to']) ? $_GET['filter_date_to'] : "";
								?>
								<div class="form-group">
									<?php
									if ($admin_type==2 || $admin_type==4)
									{
										?>
										<div class="col-md-12">
											<div style="border: 1px solid #eeeeee; padding: 15px 15px 0px 15px; border-radius: 5px; background: #f5f5f5;">
												<div class="row">				
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label"><b>ID or CQ Number:</b></label>
															<input type="text" class="form-control mb-md" name="cq_number" title="CQ Number" placeholder="ID or CQ Number" value="<?php echo $cq_number;?>">
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label"><b>Finance:</b></label>
															<select class="form-control mb-md" name="finance">
																<option name="finance" value=""></option>
																<option name="finance" value="1" <?php echo $selected_finance_1; ?>>Yes</option>
																<option name="finance" value="0" <?php echo $selected_finance_0; ?>>No</option>
															</select>
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label"><b>Interstate:</b></label>
															<select class="form-control mb-md" name="interstate">
																<option name="interstate" value=""></option>
																<option name="interstate" value="1" <?php echo $selected_interstate_1; ?>>Yes</option>
																<option name="interstate" value="0" <?php echo $selected_interstate_0; ?>>No</option>
															</select>
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label"><b>Tradein:</b></label>										
															<select class="form-control mb-md" name="tradein" id="tradein_select">
																<option name="tradein" value=""></option>
																<option name="tradein" value="1" <?php echo $selected_tradein_1; ?>>With Tradein</option>
																<option name="tradein" value="0" <?php echo $selected_tradein_0; ?>>Without Tradein</option>
															</select>
														</div>
													</div>
													<?php
													$trade_buyer_div_class = "";
													if ($tradein<>1)
													{
														$trade_buyer_div_class = "hidden";
													}
													?>
													<div class="col-md-12 <?php echo $trade_buyer_div_class; ?>" id="trade_buyer_div">
														<div class="form-group">
															<label class="control-label"><b>Buyer of Tradein:</b></label>										
															<select class="form-control mb-md" name="tradein_buyer">
																<option name="tradein_buyer" value=""></option>
																<option name="tradein_buyer" value="1" <?php echo $selected_tradein_buyer_1; ?>>Dealer</option>
																<option name="tradein_buyer" value="2" <?php echo $selected_tradein_buyer_2; ?>>Wholesaler</option>
																<option name="tradein_buyer" value="3" <?php echo $selected_tradein_buyer_3; ?>>Quote Me</option>
															</select>
														</div>
													</div>
												</div>
											</div>
											<br />
										</div>
										<div class="col-md-4">
											<select class="form-control mb-md" name="current_status" title="Current Deal Status">
												<option name="current_status" value="">-Current Deal Status-</option>
												<option name="current_status" value="4" <?php echo $selected_current_status_4; ?>>Pending Auth</option>
												<option name="current_status" value="5" <?php echo $selected_current_status_5; ?>>Approved by Admin</option>
												<option name="current_status" value="6" <?php echo $selected_current_status_6; ?>>Delivered</option>
												<option name="current_status" value="7" <?php echo $selected_current_status_7; ?>>Settled</option>
												<option name="current_status" value="8" <?php echo $selected_current_status_8; ?>>Admin on Hold</option>
												<option name="current_status" value="9" <?php echo $selected_current_status_9; ?>>Deal Cancelled</option>
											</select>
										</div>
										<div class="col-md-4">
											<select class="form-control mb-md" name="dealer_status" title="Dealer Status">
												<option name="dealer_status" value="">-Dealer Status-</option>
												<option name="dealer_status" value="0" <?php echo $selected_dealer_status_0; ?>>Pending</option>
												<option name="dealer_status" value="1" <?php echo $selected_dealer_status_1; ?>>Approved</option>
												<option name="dealer_status" value="2" <?php echo $selected_dealer_status_2; ?>>Delivered</option>
											</select>
										</div>
										<div class="col-md-4">
											<select class="form-control mb-md" name="user_id" title="Quote Specialist">
												<option name="user_id" value="">-Quote Specialist-</option>
												<?php
												if ($admin_type==2 || $admin_type==4)
												{										
													foreach ($admins as $admin)
													{
														$selected_user_id = "";
														if ($admin->id_user == $lead_user_id)
														{
															$selected_user_id = " selected";
														}
														?>
														<option name="user_id" value="<?php echo $admin->id_user; ?>" <?php echo $selected_user_id; ?>>
															<?php echo $admin->name; ?>
														</option>
														<?php
													}
												}
												?>
											</select>
										</div>
										<?php
									}
									else
									{
										?>
										<div class="col-md-12">
											<div style="border: 1px solid #eeeeee; padding: 15px 15px 0px 15px; border-radius: 5px; background: #f5f5f5;">
												<div class="row">
													<div class="col-md-6">
														<input type="text" class="form-control mb-md" name="cq_number" title="CQ Number" placeholder="CQ Number" value="<?php echo $cq_number;?>">
													</div>
													<div class="col-md-6">
														<select class="form-control mb-md" name="current_status" title="Current Deal Status">
															<option name="current_status" value="">-Current Deal Status-</option>
															<option name="current_status" value="4" <?php echo $selected_current_status_4; ?>>Pending Auth</option>
															<option name="current_status" value="5" <?php echo $selected_current_status_5; ?>>Approved by Admin</option>
															<option name="current_status" value="6" <?php echo $selected_current_status_6; ?>>Delivered</option>
															<option name="current_status" value="7" <?php echo $selected_current_status_7; ?>>Settled</option>
															<option name="current_status" value="8" <?php echo $selected_current_status_8; ?>>Admin on Hold</option>
															<option name="current_status" value="9" <?php echo $selected_current_status_9; ?>>Deal Cancelled</option>
														</select>
													</div>
												</div>
											</div>
											<br />
										</div>
										<?php
									}
									?>
									<div class="col-md-4">
										<input type="text" class="form-control mb-md" name="name" title="Client Name" placeholder="Client Name" value="<?php echo $name;?>">
									</div>
									<div class="col-md-4">
										<input type="text" class="form-control mb-md" name="email" title="Client Email Address" placeholder="Client Email Address" value="<?php echo $email;?>">
									</div>
									<div class="col-md-4">
										<input type="text" class="form-control mb-md" name="phone" title="Client Phone" placeholder="Client Phone" value="<?php echo $phone;?>">
									</div>
									<div class="col-md-4">
										<select class="form-control mb-md" name="state" id="state_dropdown" title="Client State">
											<option name="state" value="">-State-</option>
											<option name="state" value="ACT" <?php echo $selected_state_ACT; ?>>ACT - Australian Capital Territory</option>
											<option name="state" value="NSW" <?php echo $selected_state_NSW; ?>>NSW - New South Wales</option>
											<option name="state" value="NT" <?php echo $selected_state_NT; ?>>NT - Northern Territory</option>
											<option name="state" value="QLD" <?php echo $selected_state_QLD; ?>>QLD - Queensland</option>
											<option name="state" value="SA" <?php echo $selected_state_SA; ?>>SA - South Australia</option>
											<option name="state" value="TAS" <?php echo $selected_state_TAS; ?>>TAS - Tasmania</option>
											<option name="state" value="VIC" <?php echo $selected_state_VIC; ?>>VIC - Victoria</option>
											<option name="state" value="WA" <?php echo $selected_state_WA; ?>>WA - Western Australia</option>
										</select>
									</div>
									<div class="col-md-4">
										<input type="text" class="form-control mb-md" name="postcode" title="Client Postcode" placeholder="Client Postcode" value="<?php echo $postcode;?>">
									</div>
									<div class="col-md-4">
										<input type="text" class="form-control mb-md" name="address" title="Client Address" placeholder="Client Address" value="<?php echo $address;?>">
									</div>										
									<div class="col-md-4">
										<input type="text" class="form-control mb-md" name="make" id="make" title="Make" placeholder="Make" value="<?php echo $make;?>">
									</div>
									<div class="col-md-4">
										<input type="text" class="form-control mb-md" name="model" id="model" title="Model" placeholder="Model" value="<?php echo $model;?>">
									</div>
									<div class="col-md-4">
										<select class="form-control mb-md" name="dealer_id" title="Dealer">
											<option name="dealer_id" value="">-Dealer-</option>
											<?php							
											foreach ($dealers as $dealer)
											{
												$selected_dealer_id = "";
												if ($dealer->id_user == $dealer_id)
												{
													$selected_dealer_id = " selected";
												}
												?>
												<option name="user_id" value="<?php echo $dealer->id_user; ?>" <?php echo $selected_dealer_id; ?>>
													<?php echo $dealer->name; ?>
												</option>
												<?php
											}
											?>
										</select>										
									</div>	
									<div class="col-md-12">
										<h5><b>Filter by Date:</b></h5>
										<div style="border: 1px solid #eeeeee; padding: 15px 15px 0px 15px; border-radius: 5px; background: #f5f5f5;">
											<div class="row">
												<div class="col-md-3">
													<select class="form-control mb-md date_filter_by" name="date_filter_by">
														<option value="0">--Please Select--</option>
														<option value="1" <?= (isset($_GET['date_filter_by']) && $_GET['date_filter_by'] == 1) ? "selected" : ""; ?> >This Week</option>
														<option value="2" <?= (isset($_GET['date_filter_by']) && $_GET['date_filter_by'] == 2) ? "selected" : ""; ?>>Last Week</option>
														<option value="3" <?= (isset($_GET['date_filter_by']) && $_GET['date_filter_by'] == 3) ? "selected" : ""; ?>>This Month</option>
														<option value="4" <?= (isset($_GET['date_filter_by']) && $_GET['date_filter_by'] == 4) ? "selected" : ""; ?>>Last Month</option>
														<option value="5" <?= (isset($_GET['date_filter_by']) && $_GET['date_filter_by'] == 5) ? "selected" : ""; ?>>Today</option>
														<option value="6" <?= (isset($_GET['date_filter_by']) && $_GET['date_filter_by'] == 6) ? "selected" : ""; ?>>Yesterday</option>
														<option value="7" <?= (isset($_GET['date_filter_by']) && $_GET['date_filter_by'] == 7) ? "selected" : ""; ?>>Select Date</option>
													</select>
												</div>
												<div class="col-md-3">
													<select class="form-control mb-md filter_column" name="filter_column">
														<option value="">--Please Select--</option>
														<option value="created_at" <?= (isset($_GET['filter_column']) && $_GET['filter_column'] == "created_at") ? "selected" : ""; ?> >Lead Received Date</option>
														<option value="purchase_date" <?= (isset($_GET['filter_column']) && $_GET['filter_column'] == "purchase_date") ? "selected" : ""; ?> >Purchase Date</option>
														<option value="allocated_date" <?= (isset($_GET['filter_column']) && $_GET['filter_column'] == "allocated_date") ? "selected" : ""; ?> >Allocated Date</option>
														<option value="attempted_date" <?= (isset($_GET['filter_column']) && $_GET['filter_column'] == "attempted_date") ? "selected" : ""; ?> >Attempted Date</option>
														<option value="tender_date" <?= (isset($_GET['filter_column']) && $_GET['filter_column'] == "tender_date") ? "selected" : ""; ?> >Tender Date</option>
														<option value="winner_date" <?= (isset($_GET['filter_column']) && $_GET['filter_column'] == "winner_date") ? "selected" : ""; ?> >Winner Date</option>
														<option value="decline_date" <?= (isset($_GET['filter_column']) && $_GET['filter_column'] == "decline_date") ? "selected" : ""; ?> >Decline Date</option>
														<option value="approved_date" <?= (isset($_GET['filter_column']) && $_GET['filter_column'] == "approved_date") ? "selected" : ""; ?> >Approved Date</option>
														<option value="settled_date" <?= (isset($_GET['filter_column']) && $_GET['filter_column'] == "settled_date") ? "selected" : ""; ?> >Settled Date</option>
														<option value="order_date" <?= (isset($_GET['filter_column']) && $_GET['filter_column'] == "order_date") ? "selected" : ""; ?> >Order Date</option>
														<option value="delivery_date" <?= (isset($_GET['filter_column']) && $_GET['filter_column'] == "delivery_date") ? "selected" : ""; ?> >Delivery Date</option>
														<option value="deleted_date" <?= (isset($_GET['filter_column']) && $_GET['filter_column'] == "deleted_date") ? "selected" : ""; ?> >Deleted Date</option>
														<option value="cancelled_date" <?= (isset($_GET['filter_column']) && $_GET['filter_column'] == "cancelled_date") ? "selected" : ""; ?> >Cancelled Date</option>
													</select>
												</div>
												<div class="col-md-3">
													<input type="text" class="form-control input-md datepicker filter_date_from filter_date_textbox" name="filter_date_from" placeholder="Date From" disabled="" value="<?=  $filter_date_from; ?>">
												</div>
												<div class="col-md-3">
													<input type="text" class="form-control input-md datepicker filter_date_to filter_date_textbox" name="filter_date_to" placeholder="Date To" disabled="" value="<?=  $filter_date_to; ?>">
												</div>
											</div>
										</div>
										<br />
									</div>								
									<div class="col-md-12">
										<br />
										<div style="border: 1px solid #eeeeee; padding: 15px 15px 0px 15px; border-radius: 5px; background: #f5f5f5;">
											<div class="row">
												<div class="col-md-4">
													<select class="form-control mb-md" name="status" title="Deal Status">
														<option name="status" value="4" <?php echo $selected_status_4; ?>>Order Date</option>
														<option name="status" value="5" <?php echo $selected_status_5; ?>>Approved Date</option>
														<option name="status" value="6" <?php echo $selected_status_6; ?>>Delivery Date</option>
														<option name="status" value="7" <?php echo $selected_status_7; ?>>Settled Date</option>
													</select>
												</div>
												<div class="col-md-4">
													<input class="datepicker form-control mb-md" name="date_from" data-date-format="yyyy-mm-dd" style="width: 100%" placeholder="Start Date" value="<?php echo $date_from; ?>">
												</div>
												<div class="col-md-4">
													<input class="datepicker form-control mb-md" name="date_to" data-date-format="yyyy-mm-dd" style="width: 100%" placeholder="End Date" value="<?php echo $date_to; ?>">
												</div>
											</div>
										</div>
										<br />
									</div>
									<div class="col-md-12">
										<div style="border: 1px solid #eeeeee; padding: 15px 15px 0px 15px; border-radius: 5px; background: #f5f5f5;">
											<div class="row">
												<div class="col-md-8">
													<select class="form-control mb-md" name="sort_field" title="Sort Field">
														<option name="sort_field" value="order_date" <?php echo $selected_sort_field_order_date; ?>>Order Date</option>
														<option name="sort_field" value="approved_date" <?php echo $selected_sort_field_approved_date; ?>>Approved Date</option>
														<option name="sort_field" value="delivery_date" <?php echo $selected_sort_field_delivery_date; ?>>Delivery Date</option>
														<option name="sort_field" value="settled_date" <?php echo $selected_sort_field_settled_date; ?>>Settled Date</option>
														<option name="sort_field" value="revenue" <?php echo $selected_sort_field_revenue; ?>>Revenue</option>
														<option name="sort_field" value="commissionable_gross" <?php echo $selected_sort_field_commissionable_gross; ?>>Commissionable Gross</option>
														<option name="sort_field" value="remaining_balance" <?php echo $selected_sort_field_remaining_balance; ?>>Remaining BalCQO</option>
													</select>
												</div>
												<div class="col-md-4">
													<select class="form-control mb-md" name="sort_type" title="Sort Type">
														<option name="sort_type" value="DESC" <?php echo $selected_sort_type_desc; ?>>Descending</option>
														<option name="sort_type" value="ASC" <?php echo $selected_sort_type_asc; ?>>Ascending</option>
													</select>
												</div>
											</div>
										</div>
										<br />
									</div>
									<?php
									if ($admin_type == 2)
									{
										$total_revenue = 0;
										$total_commissionable_gross = 0;
										$total_balcqo = 0;
										$total_payments = 0;
										$total_remaining_balance = 0;
										$total_deal_count = 0;
										$additional_label = "";
										foreach ($leads as $lead)
										{
											$additional_label = "";
											if ($lead->status <> 9 OR $current_status == 9)
											{
												$total_deal_count ++;
												$total_revenue += $lead->revenue;
												$total_commissionable_gross += $lead->commissionable_gross;
												$total_balcqo += $lead->balcqo;
												$total_payments += $lead->total_payments;
												$total_remaining_balance += $lead->remaining_balance;
											}
										}

										if ($current_status <> 9)
										{
											$additional_label = '<br /><br /><p style="font-size: 0.9em;"><i>* Cancelled deals are not included on the total figures</i></p>';
										}										
										?>
										<div class="col-md-12">
											<div style="font-size: 1.1em; border: 1px solid #eeeeee; padding: 15px 15px 15px 15px; border-radius: 5px; margin-bottom: 20px; background: #f5f5f5;">
												<div class="row">
													<div class="col-md-4">
														<b>DEALS COUNT:</b><br />
														<?php echo $total_deal_count; ?>
													</div>												
													<div class="col-md-4">
														<b>REVENUE:</b><br />
														$ <?php echo number_format($total_revenue, 2); ?>
													</div>
													<div class="col-md-4">
														<b>COMMISSIONABLE GROSS:</b><br />
														$ <?php echo number_format($total_commissionable_gross, 2); ?>
													</div>
													<div class="col-md-12">
														<hr />
													</div>
													<div class="col-md-4">
														<b>TOTAL BALCQO:</b><br />
														$ <?php echo number_format($total_balcqo, 2); ?>
													</div>
													<div class="col-md-4">
														<b>TOTAL PAYMENTS:</b><br />
														$ <?php echo number_format($total_payments, 2); ?>
													</div>													
													<div class="col-md-4">
														<b>TOTAL REMAINING:</b><br />
														$ <?php echo number_format($total_remaining_balance, 2); ?>
													</div>													
													<div class="col-md-12">
														<?php echo $additional_label; ?>
													</div>													
												</div>
											</div>
										</div>
										<?php
									}
									?>
								</div>
							</div>
							<footer class="panel-footer text-right">
								<input value="Apply Filters" name="submit" class="btn btn-primary" type="submit">
							</footer>
						</form>
					</section>
					
					<section class="panel">
						<div class="panel-body">
							<table class="table table-bordered table-striped table-condensed mb-none nowrap" width="100%" cellspacing="0" id="datatable" data-swf-path="<?php echo base_url('assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf'); ?>">
								<thead>
								
									<?php
									//echo json_encode($data); die();
									if ($session_data['user_id'] == 427)
									{
										?>
										<tr>
											<?php
											if ($session_data['admin_type'] == 2 || $session_data['admin_type']==4)
											{													
												?>
												<td><b><i class="fa fa-file-pdf-o"></i></b></td>
												<td><b><i class="fa fa-file-pdf-o"></i></b></td>
												<!--td><b><i class="fa fa-file-pdf-o"></i></b></td>
												<td><b><i class="fa fa-file-pdf-o"></i></b></td-->
												<?php
											}
											?>
											<td><b><i class="fa fa-dollar"></i></b></td>
											<td><b>CQ Number</b></td>
											<td><b>Client</b></td>
											<td><b>Lead Status</b></td>
											<td><b>Accounts Status</b></td>
											<td><b>Order Date</b></td>
											<td><b>Delivery Date</b></td>
											<td><b>Settlement Date</b></td>
											<td style="background: #d1d9ff;"><b>Tradein</b></td>	
											<td style="background: #d1d9ff;"><b>Buyer</b></td>											
											<td><b>Dealer Status</b></td>
											<td><b>Client Status</b></td>
											<?php
											if ($session_data['admin_type']==2 || $session_data['admin_type']==4)
											{
												?>
												<td><b>Admin Status</b></td>
												<?php
											}
											?>
											<td><b>Admin Remarks</b></td>
											<td><b>QS Remarks</b></td>
											<td><b>Finance</b></td>
											<td><b>Interstate</b></td>
											<td style="background: #d1d9ff;"><b>REG</b></td>
											<td style="background: #d1d9ff;"><b>P/O</b></td>
											<td style="background: #d1d9ff;"><b>DEC</b></td>
											<td style="background: #d1d9ff;"><b>PIC</b></td>
											<?php
											if ($session_data['admin_type'] == 2 || $session_data['admin_type'] == 4)
											{
												?>
												<td><b>Consultant</b></td>
												<?php
											}
											?>
											<td><b>Dealer</b></td>
											<td><b>Total BalCQO</b></td>
											<td><b>Total Payments</b></td>
											<td><b>Remaining BalCQO</b></td>
											<td><b>Client BalCQO</b></td>
											<td><b>Dealer Price</b></td>
											<td><b>Dealer Trade Value</b></td>
											<td><b>Dealer Changeover</b></td>
											<td><b>Sale Price</b></td>
											<td><b>Trade-In Value</b></td>
											<td><b>Trade-In Given</b></td>											
											<td><b>Trade-In Payout</b></td>											
											<td><b>Changeover</b></td>
											<td><b>Other Costs</b></td>
											<td><b>Other Revenue</b></td>
											<td><b>Total Deposit</b></td>
											<td><b>Total Refund</b></td>
											<?php
											
											if ($session_data['admin_type']==2 || $session_data['admin_type']==4)
											{
												?>
												<td><b>Revenue</b></td>
												<?php
											}
											?>
											<td><b>Commissionable Gross</b></td>
											<td><b>Dealer Balance</b></td>	
											<td><b>Email</b></td>
											<td><b>Phone</b></td>
											<td><b>Mobile</b></td>
											<td><b>State</b></td>
											<td><b>Postcode</b></td>
											<td><b>Make</b></td>
											<td><b>Model</b></td>
										</tr>										
										<?php
									}
									else
									{
										?>
										<tr>
											<?php
											if ($session_data['admin_type'] == 2 || $session_data['admin_type']==4)
											{													
												?>
												<td><b><i class="fa fa-file-pdf-o"></i></b></td>
												<td><b><i class="fa fa-file-pdf-o"></i></b></td>
												<!--td><b><i class="fa fa-file-pdf-o"></i></b></td>
												<td><b><i class="fa fa-file-pdf-o"></i></b></td-->
												<?php
											}
											?>
											<td><b><i class="fa fa-dollar"></i></b></td>
											<td><b>CQ Number</b></td>
											<td><b>Client</b></td>
											<td><b>Lead Status</b></td>
											<td><b>Accounts Status</b></td>
											<td><b>Dealer Status</b></td>
											<td><b>Client Status</b></td>
											<?php
											if ($session_data['admin_type']==2 || $session_data['admin_type']==4)
											{
												?>
												<td><b>Admin Status</b></td>
												<?php
											}
											?>
											<td><b>Admin Remarks</b></td>
											<td><b>QS Remarks</b></td>
											<td><b>Finance</b></td>
											<!--td><b>Interstate</b></td-->
											<td style="background: #d1d9ff;"><b>Tradein</b></td>
											<td style="background: #d1d9ff;"><b>Buyer</b></td>
											<td style="background: #d1d9ff;"><b>REG</b></td>
											<td style="background: #d1d9ff;"><b>P/O</b></td>
											<td style="background: #d1d9ff;"><b>DEC</b></td>
											<td style="background: #d1d9ff;"><b>PIC</b></td>
											<td><b>Order Date</b></td>
											<td><b>Delivery Date</b></td>
											<td><b>Settlement Date</b></td>
											<?php
											if ($session_data['admin_type'] == 2 || $session_data['admin_type'] == 4)
											{
												?>
												<td><b>Consultant</b></td>
												<?php
											}
											?>
											<td><b>Dealer</b></td>
											<td><b>Total BalCQO</b></td>
											<td><b>Total Payments</b></td>
											<td><b>Remaining BalCQO</b></td>
											<td><b>Client BalCQO</b></td>
											<td><b>Dealer Price</b></td>
											<td><b>Dealer Trade Value</b></td>
											<td><b>Dealer Changeover</b></td>
											<td><b>Sale Price</b></td>
											<td><b>Trade-In Value</b></td>
											<td><b>Trade-In Given</b></td>											
											<td><b>Trade-In Payout</b></td>											
											<td><b>Changeover</b></td>
											<td><b>Other Costs</b></td>
											<td><b>Other Revenue</b></td>
											<td><b>Total Deposit</b></td>
											<td><b>Total Refund</b></td>
											<?php
											
											if ($session_data['admin_type']==2 || $session_data['admin_type']==4)
											{
												?>
												<td><b>Revenue</b></td>
												<?php
											}
											?>
											<td><b>Commissionable Gross</b></td>
											<td><b>Dealer Balance</b></td>	
											<td><b>Email</b></td>
											<td><b>Phone</b></td>
											<td><b>Mobile</b></td>
											<td><b>State</b></td>
											<td><b>Postcode</b></td>
											<td><b>Make</b></td>
											<td><b>Model</b></td>
										</tr>										
										<?php										
									}
									?>
								</thead>
								<tbody>
									<?php
									if ($session_data['user_id'] == 427)
									{
										foreach ($leads as $lead)
										{
											if ($lead->status == 4){ $ls_css = 'style="color: #9933cc"'; }
											else if ($lead->status == 5){ $ls_css = 'style="color: #cc00cc"'; }
											else if ($lead->status == 6){ $ls_css = 'style="color: #ff6633"'; }
											else if ($lead->status == 7){ $ls_css = 'style="color: #009900"'; }
											else if ($lead->status == 8){ $ls_css = 'style="color: #2baab1"'; }		
											else if ($lead->status == 8){ $ls_css = 'style="color: #eeeeee"'; }	
											else { $ls_css = ''; }										
											?>
											<tr id="lead_main_row_<?php echo $lead->id_fq_account; ?>">
												<?php
												if ($session_data['admin_type'] == 2 || $session_data['admin_type']==4)
												{
													if ($lead->status == 5 OR $lead->status == 6 OR $lead->status == 7)
													{
														?>
														<td>
															<a href="<?php echo site_url("deal/pdf_export/".$lead->id_fq_account); ?>"  target="_blank">
																<i class="fa fa-file-pdf-o" data-toggle="tooltip" data-placement="top" title="Order PDF"></i>
															</a>
														</td>
														<td>
															<a href="<?php echo site_url("deal/dealer_invoice_pdf/".$lead->id_fq_account); ?>"  target="_blank">
																<i class="fa fa-file-pdf-o" data-toggle="tooltip" data-placement="top" title="Dealer Invoice PDF"></i>
															</a>
														</td>
														<!--td>
															<a href="<?php// echo site_url("deal/client_automated_invoice_pdf/".$lead->id_fq_account); ?>"  target="_blank">
																<i class="fa fa-file-pdf-o" data-toggle="tooltip" data-placement="top" title="Client Invoice PDF"></i>
															</a>
														</td>
														<td>
															<a href="<?php //echo site_url("deal/client_new_automated_invoice_pdf/".$lead->id_fq_account); ?>"  target="_blank">
																<i class="fa fa-file-pdf-o" data-toggle="tooltip" data-placement="top" title="NEW Client Invoice PDF"></i>
															</a>
														</td-->													
														<?php
													}
													else
													{
														?>
														<td>
															<i class="fa fa-file-pdf-o" data-toggle="tooltip" data-placement="top" title="Order PDF"></i>
														</td>
														<td>
															<i class="fa fa-file-pdf-o" data-toggle="tooltip" data-placement="top" title="Dealer Invoice PDF"></i>
														</td>
														<td>
															<i class="fa fa-file-pdf-o" data-toggle="tooltip" data-placement="top" title="Client Invoice PDF"></i>
														</td>
														<td>
															<i class="fa fa-file-pdf-o" data-toggle="tooltip" data-placement="top" title="NEW Client Invoice PDF"></i>
														</td>													
														<?php
													}
													?>
													<td>
														<span class="ajax_button_primary balcqo_modal_button" data-id_lead="<?php echo $lead->id_fq_account; ?>">
															<i class="fa fa-dollar" data-toggle="tooltip" data-placement="top" title="Balcqo"></i>
														</span>
													</td>																						
													<?php
												}
												?>
												<td>
													<a>
														<?php 
														echo $lead->cq_number . " "; 
														echo ($lead->attachment_flag > 0) ? '<i class="fa fa-paperclip" data-toggle="tooltip" data-placement="top" data-original-title="With Attachments" ></i>' : ''; 
														?>
													</a>
												</td>
												<td id="name_td_<?php echo $lead->id_fq_account; ?>"><?php echo $lead->name; ?></td>
												<td id="lead_status_main_td_<?php echo $lead->id_fq_account; ?>" <?php echo $ls_css; ?>><?php echo $lead->status_text; ?></td>
												<td id="accounts_status_main_td_<?php echo $lead->id_fq_account; ?>"><?php echo $lead->accounts_status_text; ?></td>
												<td id="order_date_td_<?php echo $lead->id_fq_account; ?>"><?php echo $lead->order_date; ?></td>
												<td id="delivery_date_td_<?php echo $lead->id_fq_account; ?>"><?php echo $lead->delivery_date; ?></td>
												<td id="settled_date_td_<?php echo $lead->id_fq_account; ?>"><?php echo $lead->settled_date; ?></td>
												
												<?php
												$tradein_id_arr = array();
												$tradein_td = '';
												if ($lead->tradein_ids <> "")
												{
													$tradein_id_arr = explode(',', $lead->tradein_ids);
													$tradein_td = '<i class="fa fa-check"></i>';
												}

												$tradein_documents_arr = explode(',', $lead->tradein_document_type_ids);
												$tradein_ids = "";
												if (count($tradein_id_arr) <> 0)
												{
													foreach ($tradein_id_arr AS $tradein_id)
													{
														$tradein_ids .= "TI" . str_pad($tradein_id, 5, "0");
													}
												}

												$tradein_doc_1 = '';
												$tradein_doc_2 = '';
												$tradein_doc_3 = '';
												$tradein_doc_4 = '';
												$tid_1 = '';
												$tid_2 = '';
												$tid_3 = '';
												$tid_4 = '';
												if (count($tradein_id_arr) <> 0)
												{
													if (in_array('1', $tradein_documents_arr)) { $tradein_doc_1 = ' style="background: #d7ffd1; color: #fff;"'; $tid_1 = '<i class="fa fa-check"></i>'; } else { $tradein_doc_1 = ' style="background: #ffd1d1; color: #fff;"'; $tid_1 = '<i class="fa fa-times"></i>'; }
													if (in_array('2', $tradein_documents_arr)) { $tradein_doc_2 = ' style="background: #d7ffd1; color: #fff;"'; $tid_2 = '<i class="fa fa-check"></i>'; } else { $tradein_doc_2 = ' style="background: #ffd1d1; color: #fff;"'; $tid_2 = '<i class="fa fa-times"></i>'; }
													if (in_array('3', $tradein_documents_arr)) { $tradein_doc_3 = ' style="background: #d7ffd1; color: #fff;"'; $tid_3 = '<i class="fa fa-check"></i>'; } else { $tradein_doc_3 = ' style="background: #ffd1d1; color: #fff;"'; $tid_3 = '<i class="fa fa-times"></i>'; }
													if (in_array('4', $tradein_documents_arr)) { $tradein_doc_4 = ' style="background: #d7ffd1; color: #fff;"'; $tid_4 = '<i class="fa fa-check"></i>'; } else { $tradein_doc_4 = ' style="background: #ffd1d1; color: #fff;"'; $tid_4 = '<i class="fa fa-times"></i>'; }
												}
												?>												
												<td><?php echo $tradein_td; ?></td>
												<td><?php echo $lead->tradein_buyer_user_type; ?></td>												
												
												<td><?php echo $lead->dealer_status_text; ?></td>
												<td><?php echo $lead->client_status_text; ?></td>
												<?php
												if ($session_data['admin_type']==2 || $session_data['admin_type']==4)
												{
													$admin_status_text = "";
													if ($lead->admin_status==1)
													{
														$admin_status_text = "Checked";
													}
													?>												
													<td id="lead_admin_status_main_td_<?php echo $lead->id_fq_account; ?>"><?php echo $admin_status_text; ?></td>
													<?php
												}
												?>
												<td>
													<?php
													$raw_admin_to_qs_details_text = str_replace('\n', ' ', $lead->admin_to_qs_details);
													if (strlen($raw_admin_to_qs_details_text) >= 20) { $admin_to_qs_details_text = substr($raw_admin_to_qs_details_text, 0, 20) . "..."; }
													else { $admin_to_qs_details_text = $lead->admin_to_qs_details; }
													echo $admin_to_qs_details_text;
													?>
												</td>										
												<td>
													<?php
													$raw_details_text = str_replace('\n', ' ', $lead->details);
													if (strlen($raw_details_text) >= 20) { $details_text = substr($raw_details_text, 0, 20) . "..."; }
													else { $details_text = $lead->details; }
													echo $details_text;
													?>
												</td>
												<td><?php echo $lead->finance; ?></td>
												<td><?php echo $lead->interstate; ?></td>
												<td <?php echo $tradein_doc_1; ?>><?php echo $tid_1; ?></td>
												<td <?php echo $tradein_doc_2; ?>><?php echo $tid_2; ?></td>
												<td <?php echo $tradein_doc_3; ?>><?php echo $tid_3; ?></td>
												<td <?php echo $tradein_doc_4; ?>><?php echo $tid_4; ?></td>
												<?php
												if ($session_data['admin_type'] == 2 || $session_data['admin_type'] == 4)
												{
													?>
													<td id="quote_specialist_main_td_<?php echo $lead->id_fq_account; ?>"><?php echo $lead->quote_specialist; ?></td>
													<?php
												}
												?>
												<td id="dealer_td_<?php echo $lead->id_fq_account; ?>"><?php echo $lead->dealer; ?></td>
												<?php
												$membership = $lead->gross_subtractor;
												
												$dqp = $lead->winning_price;
												$dealer_tradein_value = $lead->dealer_tradein_value;
												$dealer_changeover = $lead->dealer_changeover;
												
												$sales_price = $lead->sales_price;
												$tradein_value = $lead->tradein_value;
												$tradein_given = $lead->tradein_given;
												$tradein_payout = $lead->tradein_payout;
												$deposits_total = $lead->deposits_total;
												$refunds_total = $lead->refunds_total;
												$other_costs_amount = $lead->other_costs_amount;
												$other_revenue_amount = $lead->other_revenue_amount;
												
												$changeover = $lead->changeover;
												$commissionable_gross = $lead->commissionable_gross;													
												$revenue = $lead->revenue;

												$balcqo = $lead->balcqo;
												$total_payments = $lead->total_payments;
												$remaining_balance = $lead->remaining_balance;
												$client_balcqo = $lead->balcqo_client;
												
												$dealer_balance = $lead->dealer_balance;
												?>
												<td class="td-number" id="total_balcqo_td_<?php echo $lead->id_fq_account; ?>"><?php echo number_format($balcqo, 2); ?></td>
												<td class="td-number" id="total_payments_td_<?php echo $lead->id_fq_account; ?>"><?php echo number_format($total_payments, 2); ?></td>
												<td class="td-number" id="remaining_balance_td_<?php echo $lead->id_fq_account; ?>"><?php echo number_format($remaining_balance, 2); ?></td>
												<td class="td-number" id="client_balcqo_td_<?php echo $lead->id_fq_account; ?>"><?php echo number_format($client_balcqo, 2); ?></td>
												<td class="td-number" id="dqp_td_<?php echo $lead->id_fq_account; ?>"><?php echo number_format($dqp, 2); ?></td>
												<td class="td-number" id="dealer_tradein_value_td_<?php echo $lead->id_fq_account; ?>"><?php echo number_format($dealer_tradein_value, 2); ?></td>
												<td class="td-number" id="dealer_changeover_td_<?php echo $lead->id_fq_account; ?>"><?php echo number_format($dealer_changeover, 2); ?></td>
												<td class="td-number" id="sales_price_td_<?php echo $lead->id_fq_account; ?>"><?php echo number_format($sales_price, 2); ?></td>
												<td class="td-number" id="tradein_value_td_<?php echo $lead->id_fq_account; ?>"><?php echo number_format($tradein_value, 2); ?></td>
												<td class="td-number" id="tradein_given_td_<?php echo $lead->id_fq_account; ?>"><?php echo number_format($tradein_given, 2); ?></td>
												<td class="td-number" id="tradein_payout_td_<?php echo $lead->id_fq_account; ?>"><?php echo number_format($tradein_payout, 2); ?></td>
												<td class="td-number" id="changeover_td_<?php echo $lead->id_fq_account; ?>"><?php echo number_format($changeover, 2); ?></td>
												<td class="td-number" id="other_costs_amount_td_<?php echo $lead->id_fq_account; ?>"><?php echo number_format($other_costs_amount, 2); ?></td>
												<td class="td-number" id="other_revenue_amount_td_<?php echo $lead->id_fq_account; ?>"><?php echo number_format($other_revenue_amount, 2); ?></td>
												<td class="td-number" id="deposits_total_td_<?php echo $lead->id_fq_account; ?>"><?php echo number_format($deposits_total, 2); ?></td>
												<td class="td-number" id="refunds_total_td_<?php echo $lead->id_fq_account; ?>"><?php echo number_format($refunds_total, 2); ?></td>
												<?php
												if ($session_data['admin_type']==2 || $session_data['admin_type']==4)
												{
													?>
													<td class="td-number" id="revenue_td_<?php echo $lead->id_fq_account; ?>"><?php echo number_format($revenue, 2); ?></td>
													<?php	
												}
												?>
												<td class="td-number" id="commissionable_gross_td_<?php echo $lead->id_fq_account; ?>"><?php echo number_format($commissionable_gross, 2); ?></td>
												<td class="td-number" id="dealer_balance_td_<?php echo $lead->id_fq_account; ?>"><?php echo number_format($dealer_balance, 2); ?></td>

												<td id="email_td_<?php echo $lead->id_fq_account; ?>"><a href="mailto:<?php echo $lead->email; ?>" target="_top"><?php echo $lead->email; ?></a></td>
												<td id="phone_td_<?php echo $lead->id_fq_account; ?>"><?php echo $lead->lead_phone; ?></td>
												<td id="mobile_td_<?php echo $lead->id_fq_account; ?>"><?php echo $lead->lead_mobile; ?></td>
												<td id="state_td_<?php echo $lead->id_fq_account; ?>"><?php echo $lead->lead_state; ?></td>
												<td id="postcode_td_<?php echo $lead->id_fq_account; ?>"><?php echo $lead->lead_postcode; ?></td>
												<td id="make_td_<?php echo $lead->id_fq_account; ?>"><?php echo $lead->lead_make; ?></td>
												<td id="model_td_<?php echo $lead->id_fq_account; ?>"><?php echo $lead->lead_model; ?></td>
											</tr>
											<?php
										}
									}
									else
									{
										foreach ($leads as $lead)
										{
											//print_r($lead);
											if ($lead->status == 4){ $ls_css = 'style="color: #9933cc"'; }
											else if ($lead->status == 5){ $ls_css = 'style="color: #cc00cc"'; }
											else if ($lead->status == 6){ $ls_css = 'style="color: #ff6633"'; }
											else if ($lead->status == 7){ $ls_css = 'style="color: #009900"'; }
											else if ($lead->status == 8){ $ls_css = 'style="color: #2baab1"'; }		
											else if ($lead->status == 8){ $ls_css = 'style="color: #eeeeee"'; }	
											else { $ls_css = ''; }										
											?>
											<tr id="lead_main_row_<?php echo $lead->id_fq_account; ?>">
												<?php
												if ($session_data['admin_type'] == 2 || $session_data['admin_type']==4)
												{
													if ($lead->status == 5 OR $lead->status == 6 OR $lead->status == 7)
													{
														?>
														<td>
															<a href="<?php echo site_url("deal/pdf_export/".$lead->id_fq_account); ?>"  target="_blank">
																<i class="fa fa-file-pdf-o" data-toggle="tooltip" data-placement="top" title="Order PDF"></i>
															</a>
														</td>
														<td>
															<a href="<?php echo site_url("deal/dealer_invoice_pdf/".$lead->id_fq_account); ?>"  target="_blank">
																<i class="fa fa-file-pdf-o" data-toggle="tooltip" data-placement="top" title="Dealer Invoice PDF"></i>
															</a>
														</td>
														<!--td>
							<a href="<?php// echo site_url("deal/client_automated_invoice_pdf/".$lead->id_fq_account); ?>"  target="_blank">
																<i class="fa fa-file-pdf-o" data-toggle="tooltip" data-placement="top" title="Client Invoice PDF"></i>
															</a>
														</td>
														<td>
															<a href="<?php// echo site_url("deal/client_new_automated_invoice_pdf/".$lead->id_fq_account); ?>"  target="_blank">
																<i class="fa fa-file-pdf-o" data-toggle="tooltip" data-placement="top" title="NEW Client Invoice PDF"></i>
															</a>
														</td-->													
														<?php
													}
													else
													{
														?>
														<td>
															<i class="fa fa-file-pdf-o" data-toggle="tooltip" data-placement="top" title="Order PDF"></i>
														</td>
														<td>
															<i class="fa fa-file-pdf-o" data-toggle="tooltip" data-placement="top" title="Dealer Invoice PDF"></i>
														</td>
														<!--td>
															<i class="fa fa-file-pdf-o" data-toggle="tooltip" data-placement="top" title="Client Invoice PDF"></i>
														</td>
														<td>
															<i class="fa fa-file-pdf-o" data-toggle="tooltip" data-placement="top" title="NEW Client Invoice PDF"></i>
														</td-->													
														<?php
													}
													?>
													<td>
														<span class="ajax_button_primary balcqo_modal_button" data-id_lead="<?php echo $lead->id_fq_account; ?>">
															<i class="fa fa-dollar" data-toggle="tooltip" data-placement="top" title="Balcqo"></i>
														</span>
													</td>																						
													<?php
												}
												?>
												<td>
													<a >
														<?php 
														echo $lead->cq_number . " "; 
														echo ($lead->attachment_flag > 0) ? '<i class="fa fa-paperclip" data-toggle="tooltip" data-placement="top" data-original-title="With Attachments" ></i>' : ''; 
														?>
													</a>
												</td>
												<td id="name_td_<?php echo $lead->id_fq_account; ?>"><?php echo $lead->lead_name; ?></td>
												<td id="lead_status_main_td_<?php echo $lead->id_fq_account; ?>" <?php echo $ls_css; ?>><?php echo $lead->status_text; ?></td>
												<td id="accounts_status_main_td_<?php echo $lead->id_fq_account; ?>"><?php echo $lead->accounts_status_text; ?></td>
												<td><?php echo $lead->dealer_status_text; ?></td>
												<td><?php echo $lead->client_status_text; ?></td>
												<?php
												if ($session_data['admin_type']==2 || $session_data['admin_type']==4)
												{
													$admin_status_text = "";
													if ($lead->admin_status==1)
													{
														$admin_status_text = "Checked";
													}
													?>												
													<td id="lead_admin_status_main_td_<?php echo $lead->id_fq_account; ?>"><?php echo $admin_status_text; ?></td>
													<?php
												}
												?>
												<td>
													<?php
													$raw_admin_to_qs_details_text = str_replace('\n', ' ', $lead->admin_to_qs_details);
													if (strlen($raw_admin_to_qs_details_text) >= 20) { $admin_to_qs_details_text = substr($raw_admin_to_qs_details_text, 0, 20) . "..."; }
													else { $admin_to_qs_details_text = $lead->admin_to_qs_details; }
													echo $admin_to_qs_details_text;
													?>
												</td>										
												<td>
													<?php
													$raw_details_text = str_replace('\n', ' ', $lead->details);
													if (strlen($raw_details_text) >= 20) { $details_text = substr($raw_details_text, 0, 20) . "..."; }
													else { $details_text = $lead->details; }
													echo $details_text;
													?>
												</td>
												<td><?php echo $lead->finance; ?></td>
												<!--td><?php //echo $lead->interstate; ?></td-->
												<?php
												$tradein_id_arr = array();
												$tradein_td = '';
												if ($lead->tradein_ids <> "")
												{
													$tradein_id_arr = explode(',', $lead->tradein_ids);
													$tradein_td = '<i class="fa fa-check"></i>';
												}

												$tradein_documents_arr = explode(',', $lead->tradein_document_type_ids);
												$tradein_ids = "";
												if (count($tradein_id_arr) <> 0)
												{
													foreach ($tradein_id_arr AS $tradein_id)
													{
														$tradein_ids .= "TI" . str_pad($tradein_id, 5, "0");
													}
												}

												$tradein_doc_1 = '';
												$tradein_doc_2 = '';
												$tradein_doc_3 = '';
												$tradein_doc_4 = '';
												$tid_1 = '';
												$tid_2 = '';
												$tid_3 = '';
												$tid_4 = '';
												if (count($tradein_id_arr) <> 0)
												{
													if (in_array('1', $tradein_documents_arr)) { $tradein_doc_1 = ' style="background: #d7ffd1; color: #fff;"'; $tid_1 = '<i class="fa fa-check"></i>'; } else { $tradein_doc_1 = ' style="background: #ffd1d1; color: #fff;"'; $tid_1 = '<i class="fa fa-times"></i>'; }
													if (in_array('2', $tradein_documents_arr)) { $tradein_doc_2 = ' style="background: #d7ffd1; color: #fff;"'; $tid_2 = '<i class="fa fa-check"></i>'; } else { $tradein_doc_2 = ' style="background: #ffd1d1; color: #fff;"'; $tid_2 = '<i class="fa fa-times"></i>'; }
													if (in_array('3', $tradein_documents_arr)) { $tradein_doc_3 = ' style="background: #d7ffd1; color: #fff;"'; $tid_3 = '<i class="fa fa-check"></i>'; } else { $tradein_doc_3 = ' style="background: #ffd1d1; color: #fff;"'; $tid_3 = '<i class="fa fa-times"></i>'; }
													if (in_array('4', $tradein_documents_arr)) { $tradein_doc_4 = ' style="background: #d7ffd1; color: #fff;"'; $tid_4 = '<i class="fa fa-check"></i>'; } else { $tradein_doc_4 = ' style="background: #ffd1d1; color: #fff;"'; $tid_4 = '<i class="fa fa-times"></i>'; }
												}
												?>
												<td><?php echo $tradein_td; ?></td>
												<td><?php echo $lead->tradein_buyer_user_type; ?></td>
												<td <?php echo $tradein_doc_1; ?>><?php echo $tid_1; ?></td>
												<td <?php echo $tradein_doc_2; ?>><?php echo $tid_2; ?></td>
												<td <?php echo $tradein_doc_3; ?>><?php echo $tid_3; ?></td>
												<td <?php echo $tradein_doc_4; ?>><?php echo $tid_4; ?></td>
												<td id="order_date_td_<?php echo $lead->id_fq_account; ?>"><?php echo $lead->order_date; ?></td>
												<td id="delivery_date_td_<?php echo $lead->id_fq_account; ?>"><?php echo $lead->delivery_date; ?></td>
												<td id="settled_date_td_<?php echo $lead->id_fq_account; ?>"><?php echo $lead->settled_date; ?></td>
												<?php
												if ($session_data['admin_type'] == 2 || $session_data['admin_type'] == 4)
												{
													?>
													<td id="quote_specialist_main_td_<?php echo $lead->id_fq_account; ?>"><?php echo $lead->quote_specialist; ?></td>
													<?php
												}
												?>
												<td id="dealer_td_<?php echo $lead->id_fq_account; ?>"><?php echo $lead->dealer; ?></td>
												<?php
												$membership = $lead->gross_subtractor;
												
												$dqp = $lead->winning_price;
												$dealer_tradein_value = $lead->dealer_tradein_value;
												$dealer_changeover = $lead->dealer_changeover;
												
												$sales_price = $lead->sales_price;
												$tradein_value = $lead->tradein_value;
												$tradein_given = $lead->tradein_given;
												$tradein_payout = $lead->tradein_payout;
												$deposits_total = $lead->deposits_total;
												$refunds_total = $lead->refunds_total;
												$other_costs_amount = $lead->other_costs_amount;
												$other_revenue_amount = $lead->other_revenue_amount;
												
												$changeover = $lead->changeover;
												$commissionable_gross = $lead->commissionable_gross;													
												$revenue = $lead->revenue;

												$balcqo = $lead->balcqo;
												$total_payments = $lead->total_payments;
												$remaining_balance = $lead->remaining_balance;
												$client_balcqo = $lead->balcqo_client;
												
												$dealer_balance = $lead->dealer_balance;
												?>
												<td class="td-number" id="total_balcqo_td_<?php echo $lead->id_fq_account; ?>"><?php echo number_format($balcqo, 2); ?></td>
												<td class="td-number" id="total_payments_td_<?php echo $lead->id_fq_account; ?>"><?php echo number_format($total_payments, 2); ?></td>
												<td class="td-number" id="remaining_balance_td_<?php echo $lead->id_fq_account; ?>"><?php echo number_format($remaining_balance, 2); ?></td>
												<td class="td-number" id="client_balcqo_td_<?php echo $lead->id_fq_account; ?>"><?php echo number_format($client_balcqo, 2); ?></td>
												<td class="td-number" id="dqp_td_<?php echo $lead->id_fq_account; ?>"><?php echo number_format($dqp, 2); ?></td>
												<td class="td-number" id="dealer_tradein_value_td_<?php echo $lead->id_fq_account; ?>"><?php echo number_format($dealer_tradein_value, 2); ?></td>
												<td class="td-number" id="dealer_changeover_td_<?php echo $lead->id_fq_account; ?>"><?php echo number_format($dealer_changeover, 2); ?></td>
												<td class="td-number" id="sales_price_td_<?php echo $lead->id_fq_account; ?>"><?php echo number_format($sales_price, 2); ?></td>
												<td class="td-number" id="tradein_value_td_<?php echo $lead->id_fq_account; ?>"><?php echo number_format($tradein_value, 2); ?></td>
												<td class="td-number" id="tradein_given_td_<?php echo $lead->id_fq_account; ?>"><?php echo number_format($tradein_given, 2); ?></td>
												<td class="td-number" id="tradein_payout_td_<?php echo $lead->id_fq_account; ?>"><?php echo number_format($tradein_payout, 2); ?></td>
												<td class="td-number" id="changeover_td_<?php echo $lead->id_fq_account; ?>"><?php echo number_format($changeover, 2); ?></td>
												<td class="td-number" id="other_costs_amount_td_<?php echo $lead->id_fq_account; ?>"><?php echo number_format($other_costs_amount, 2); ?></td>
												<td class="td-number" id="other_revenue_amount_td_<?php echo $lead->id_fq_account; ?>"><?php echo number_format($other_revenue_amount, 2); ?></td>
												<td class="td-number" id="deposits_total_td_<?php echo $lead->id_fq_account; ?>"><?php echo number_format($deposits_total, 2); ?></td>
												<td class="td-number" id="refunds_total_td_<?php echo $lead->id_fq_account; ?>"><?php echo number_format($refunds_total, 2); ?></td>
												<?php
												if ($session_data['admin_type']==2 || $session_data['admin_type']==4)
												{
													?>
													<td class="td-number" id="revenue_td_<?php echo $lead->id_fq_account; ?>"><?php echo number_format($revenue, 2); ?></td>
													<?php	
												}
												?>
												<td class="td-number" id="commissionable_gross_td_<?php echo $lead->id_fq_account; ?>"><?php echo number_format($commissionable_gross, 2); ?></td>
												<td class="td-number" id="dealer_balance_td_<?php echo $lead->id_fq_account; ?>"><?php echo number_format($dealer_balance, 2); ?></td>

												<td id="email_td_<?php echo $lead->id_fq_account; ?>"><a href="mailto:<?php echo $lead->lead_email; ?>" target="_top"><?php echo $lead->lead_email; ?></a></td>
												<td id="phone_td_<?php echo $lead->id_fq_account; ?>"><?php echo $lead->lead_phone; ?></td>
												<td id="mobile_td_<?php echo $lead->id_fq_account; ?>"><?php echo $lead->lead_mobile; ?></td>
												<td id="state_td_<?php echo $lead->id_fq_account; ?>"><?php echo $lead->lead_state; ?></td>
												<td id="postcode_td_<?php echo $lead->id_fq_account; ?>"><?php echo $lead->lead_postcode; ?></td>
												<td id="make_td_<?php echo $lead->id_fq_account; ?>"><?php echo $lead->make; ?></td>
												<td id="model_td_<?php echo $lead->id_fq_account; ?>"><?php echo $lead->model; ?></td>
											</tr>
											<?php
										}						 				
									}
									?>
									<?php

									?>
								</tbody>
							</table>
							<br />
						</div>
					</section>
					<!-- end: page -->
					<?php include 'modals/ticket_modals.php'; ?>
					<div id="invoice-editor-modal" class="modal fade"> <!-- Invoice Editor Modal -->
						<div class="modal-dialog" style="width: 95%;">
							<header class="panel-heading">
								<h2 class="panel-title">Invoice Editor (<span id="cq_number"></span>)</h2>
							</header>						
							<div class="panel-body">
								<div class="modal-wrapper">
									<div class="modal-text">
										<form method="post" action="" class="main_form" name="main_form">
											<input type="hidden" name="lead_id" id="lead_id" value="">
											<table class="table table-condensed mb-none table-cont-mid" style="white-space: nowrap;">
												<tr>
													<td>Demo:</td>
													<td>
														<select class="form-control input-sm" id="i_demo" name="i_demo">
															<option value="New">New</option>
															<option value="Demo">Demo</option>
														</select>
													</td>
												</tr>
												<tr>
													<td>VIN:</td>
													<td>
														<input class="form-control input-sm" id="i_vin" name="i_vin"  style="width: 100%" placeholder="VIN" value="">
													</td>
												</tr>
												<tr>
													<td>Engine:</td>
													<td>
														<input class="form-control input-sm" id="i_engine" name="i_engine"  style="width: 100%" placeholder="Engine" value="">
													</td>
												</tr>
												<tr>
													<td>Registration Plate:</td>
													<td>
														<input class="form-control input-sm" id="i_registration_plate" name="i_registration_plate"  style="width: 100%" placeholder="Registration Plate" value="">
													</td>
												</tr>
												<tr>
													<td>Registration Expiry:</td>
													<td>
														<input class="form-control input-sm" id="i_registration_expiry" name="i_registration_expiry"  style="width: 100%" placeholder="Registration Expiry" value="">
													</td>
												</tr>
												<tr id="tr_kms" hidden>
													<td>KMS</td>
													<td>
														<input class="form-control input-sm" id="i_kms" name="i_kms"  style="width: 100%" placeholder="KMS" value="">
													</td>
												</tr>
												<tr>
													<td>Issued Date:</td>
													<td>
														<input class="datepicker form-control input-sm" id="i_issued_date" name="i_issued_date" data-date-format="yyyy-mm-dd" style="width: 100%" placeholder="Issued Date" value="">
													</td>
												</tr>
												<tr>
													<td>Payment Due Date:</td>
													<td>
														<input class="datepicker form-control input-sm" id="i_payment_due_date" name="i_payment_due_date" data-date-format="yyyy-mm-dd" style="width: 100%" placeholder="Payment Due Date" value="">
													</td>
												</tr>
												<tr>
													<td>List Price:</td>
													<td><input type="text" class="form-control input-sm text-right" id="i_list_price" name="i_list_price"></td>
												</tr>
												<tr>
													<td>Options:</td>
													<td><input type="text" class="form-control input-sm text-right" id="i_options" name="i_options"></td>
												</tr>
												<tr>
													<td>Accessories:</td>
													<td><input type="text" class="form-control input-sm text-right" id="i_accessories" name="i_accessories"></td>
												</tr>
												<tr>
													<td>Dealer Delivery:</td>
													<td><input type="text" class="form-control input-sm text-right" id="i_dealer_delivery" name="i_dealer_delivery"></td>
												</tr>
												<tr>
													<td><b>Price Plus Options &amp; Delivery:</b></td>
													<td><input type="text" class="form-control input-sm text-right" id="i_subtotal_1" name="i_subtotal_1"></td>
												</tr>
												<tr>
													<td>Discount:</td>
													<td><input type="text" class="form-control input-sm text-right" id="i_discount" name="i_discount"></td>
												</tr>
												<tr>
													<td><b>Sub Total:</b></td>
													<td><input type="text" class="form-control input-sm text-right" id="i_subtotal_2" name="i_subtotal_2"></td>
												</tr>
												<tr>
													<td>GST Included in Sub Total:</td>
													<td><input type="text" class="form-control input-sm text-right" id="i_gst" name="i_gst"></td>
												</tr>														
												<tr>
													<td>LCT:</td>
													<td><input type="text" class="form-control input-sm text-right" id="i_lct" name="i_lct"></td>
												</tr>
												<tr>
													<td>Stamp Duty:</td>
													<td><input type="text" class="form-control input-sm text-right" id="i_stamp_duty" name="i_stamp_duty"></td>
												</tr>
												<tr>
													<td>Registration:</td>
													<td><input type="text" class="form-control input-sm text-right" id="i_registration" name="i_registration"></td>
												</tr>
												<tr>
													<td>CTP:</td>
													<td><input type="text" class="form-control input-sm text-right" id="i_ctp" name="i_ctp"></td>
												</tr>
												<tr>
													<td><b>Total Price (inc GST)</b></td>
													<td><input type="text" class="form-control input-sm text-right" id="i_total_price" name="i_total_price"></td>
												</tr>
												<tr>
													<td>Deposits:</td>
													<td><input type="text" class="form-control input-sm text-right" id="i_deposit" name="i_deposit"></td>
												</tr>												
												<tr>
													<td>Allowance for Trade:</td>
													<td><input type="text" class="form-control input-sm text-right" id="i_tradein" name="i_tradein"></td>
												</tr>
												<tr>
													<td>Payout:</td>
													<td><input type="text" class="form-control input-sm text-right" id="i_payout" name="i_payout"></td>
												</tr>
												<tr>
													<td>Refunds:</td>
													<td><input type="text" class="form-control input-sm text-right" id="i_refunds" name="i_refunds"></td>
												</tr>														
												<tr>
													<td><b>BALANCE</b></td>
													<td><input type="text" class="form-control input-sm text-right" id="i_balance" name="i_balance"></td>
												</tr>
											</table>
										</form>
									</div>
								</div>
							</div>
							<footer class="panel-footer">
								<div class="row">
									<div class="col-md-12 text-right">
										<button type="button" class="btn btn-primary" onclick="update_manual_invoice_details()">
											Submit
										</button>
										<button type="button" class="btn btn-default" data-dismiss="modal">
											Close
										</button>
									</div>
								</div>
							</footer>							
						</div>
					</div>	
					<div id="invoice-generator-modal" class="modal fade"> <!-- Invoice Generator Modal -->
						<div class="modal-dialog" style="width: 95%;">
							<header class="panel-heading">
								<h2 class="panel-title">Invoice Generator (<span id="cq_number"></span>)</h2>
							</header>						
							<div class="panel-body">
								<div class="modal-wrapper">
									<div class="modal-text">
										<form method="post" action="" class="main_form" name="main_form">
											<input type="hidden" name="lead_id" id="lead_id" value="">
											<div id="invoice_html"></div>
										</form>
									</div>
								</div>
							</div>
							<footer class="panel-footer">
								<div class="row">
									<div class="col-md-12 text-right">
										<button type="button" class="btn btn-primary" onclick="update_invoice_details()">
											Submit
										</button>
										<button type="button" class="btn btn-default" data-dismiss="modal">
											Close
										</button>
									</div>
								</div>
							</footer>
						</div>
					</div>
					<div id="balcqo_modal" class="modal fade"> <!-- Balcqo Modal -->
						<div class="modal-dialog" style="width: 98%;">
							<section class="panel">
								<form method="post" id="balcqo_form" name="balcqo_form" action="">
									<input type="hidden" id="id_lead" name="id_lead" value="">
									<div class="panel-body">
										<div class="modal-wrapper">
											<div class="modal-text">
												<div class="row" style="margin-top: 10px;">
													<div class="col-md-3">
														<section class="panel panel-featured-left panel-featured-primary">
															<div class="panel-body">
																<div class="widget-summary widget-summary-sm">
																	<div class="widget-summary-col widget-summary-col-icon">
																		<div class="summary-icon bg-primary">
																			<i class="fa fa-life-ring"></i>
																		</div>
																	</div>
																	<div class="widget-summary-col">
																		<div class="summary">
																			<h4 class="title">Total Revenue</h4>
																			<div class="info">
																				<strong class="amount">$<span id="revenue"></span></strong>
																				<span class="text-primary"></span>
																			</div>
																		</div>
																		<div class="summary-footer">
																			<a class="text-muted text-uppercase"></a>
																		</div>
																	</div>
																</div>
															</div>
														</section>													
													</div>
													<div class="col-md-3">
														<section class="panel panel-featured-left panel-featured-primary">
															<div class="panel-body">
																<div class="widget-summary widget-summary-sm">
																	<div class="widget-summary-col widget-summary-col-icon">
																		<div class="summary-icon bg-primary">
																			<i class="fa fa-life-ring"></i>
																		</div>
																	</div>
																	<div class="widget-summary-col">
																		<div class="summary">
																			<h4 class="title">Total Balcqo</h4>
																			<div class="info">
																				<strong class="amount">$<span id="balcqo"></span></strong>
																				<span class="text-primary"></span>
																			</div>
																		</div>
																		<div class="summary-footer">
																			<a class="text-muted text-uppercase"></a>
																		</div>
																	</div>
																</div>
															</div>
														</section>													
													</div>	
													<div class="col-md-3">
														<section class="panel panel-featured-left panel-featured-primary">
															<div class="panel-body">
																<div class="widget-summary widget-summary-sm">
																	<div class="widget-summary-col widget-summary-col-icon">
																		<div class="summary-icon bg-primary">
																			<i class="fa fa-life-ring"></i>
																		</div>
																	</div>
																	<div class="widget-summary-col">
																		<div class="summary">
																			<h4 class="title">Total Received</h4>
																			<div class="info">
																				<strong class="amount">$<span id="total_received"></span></strong>
																				<span class="text-primary"></span>
																			</div>
																		</div>
																		<div class="summary-footer">
																			<a class="text-muted text-uppercase"></a>
																		</div>
																	</div>
																</div>
															</div>
														</section>													
													</div>
													<div class="col-md-3">
														<section class="panel panel-featured-left panel-featured-primary">
															<div class="panel-body">
																<div class="widget-summary widget-summary-sm">
																	<div class="widget-summary-col widget-summary-col-icon">
																		<div class="summary-icon bg-primary">
																			<i class="fa fa-life-ring"></i>
																		</div>
																	</div>
																	<div class="widget-summary-col">
																		<div class="summary">
																			<h4 class="title">Remaining Balance</h4>
																			<div class="info">
																				<strong class="amount">$<span id="remaining_balance"></span></strong>
																				<span class="text-primary"></span>
																			</div>
																		</div>
																		<div class="summary-footer">
																			<a class="text-muted text-uppercase"></a>
																		</div>
																	</div>
																</div>
															</div>
														</section>													
													</div>
												</div>						
												<div class="row" style="margin-top: 20px;">
													<div class="col-md-6">
														<b>Accounts Status:</b>
														<select class="form-control" id="accounts_status" name="accounts_status" style="margin-top: 10px;">
															<option value="0">Pending</option>
															<option value="1">Approved</option>
														</select>
													</div>
												</div>
												<div class="row" style="margin-top: 30px;">													
													<div class="col-md-12">
														<div id="invoices_container">
														</div>
														<br />
														<span class="btn btn-primary ajax_button add_invoice_modal_button" data-id_lead="">
															Add Invoice
														</span>
													</div>
												</div>												
												<div class="row" style="margin-top: 40px;">													
													<div class="col-md-12">
														<div id="payments_container">
														</div>
														<br />
														<span class="btn btn-primary ajax_button add_payment_modal_button" data-id_lead="">
															Add Payment
														</span>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="panel-footer text-right">
										<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">
											Close
										</button>
									</div>										
								</form>
							</section>
						</div>
					</div>		
					<div id="add_invoice_modal" class="modal fade"> <!-- Add Custom Invoice Modal -->
						<div class="modal-dialog" style="width: 95%;">
							<section class="panel">
								<form method="post" action="" id="add_invoice_form" name="add_invoice_form">
									<input type="hidden" id="id_lead" name="id_lead" value="">
									<div class="panel-body">
										<div class="modal-wrapper">
											<div class="modal-text">
												<div class="row">
													<div class="col-md-12 text-center">
														<h4 id="label_name" style="line-height: 1px;"></h4>
														<p id="label_email" style="color: #cccccc; font-size: 0.9em;"></p>
														<hr class="solid mt-sm mb-lg">							
													</div>
												</div>
												<div class="row">													
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Description:</label>							
															<textarea type="text" class="form-control" name="details"></textarea>
														</div>
													</div>
												</div>												
												<div class="row" style="margin-top: 10px;">													
													<div class="col-md-12">
														<div class="form-group">
															<label class="control-label">Remarks to the Recipient:</label>							
															<textarea type="text" class="form-control" name="remarks"></textarea>
														</div>
													</div>
												</div>			
												<div class="row" style="margin-top: 70px;">
													<div class="col-md-12">
														<h5><b>Invoice Items</b></h5>
													</div>
												</div>
												<div class="row" style="margin-top: 15px;">													
													<div class="col-md-12">
														<div id="invoice_items_container">
															<div style="padding: 15px; border: 1px solid #ddd;">
																<div class="row">													
																	<div class="col-md-6">
																		<div class="form-group">
																			<label class="control-label">Amount:</label>							
																			<input type="text" class="form-control" name="invoice_item_amount[]" onkeypress="return isNumberKey(event)">
																		</div>
																	</div>
																</div>
																<div class="row" style="margin-top: 10px;">													
																	<div class="col-md-12">
																		<div class="form-group">
																			<label class="control-label">Item Description:</label>
																			<textarea type="text" class="form-control" name="invoice_item_description[]"></textarea>
																		</div>
																	</div>
																</div>																
															</div>															
														</div>
													</div>
												</div>
												<div class="row">																
													<div class="col-md-12">
														<br />
														<span class="btn btn-default btn-sm add_invoice_item_button" style="cursor: pointer; cursor: hand;" data-container="add_invoice_form">
															Add Item
														</span>
													</div>
												</div>												
											</div>
										</div>
									</div>
									<div class="panel-footer text-right">
										<button type="submit" class="btn btn-primary">
											Submit
										</button>
										<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">
											Cancel
										</button>
									</div>									
								</form>
							</section>					
						</div>
					</div>		
					<div id="add_payment_modal" class="modal fade"> <!-- Add Payment Modal -->
						<div class="modal-dialog" style="width: 95%;">
							<section class="panel">
								<form method="post" action="" id="add_payment_form" name="add_payment_form">
									<input type="hidden" id="id_lead" name="id_lead" value="">
									<div class="panel-body">
										<div class="modal-wrapper">
											<div class="modal-text">
												<div class="row">
													<div class="col-md-12 text-center">
														<h4 id="label_name" style="line-height: 1px;"></h4>
														<p id="label_email" style="color: #cccccc; font-size: 0.9em;"></p>
														<hr class="solid mt-sm mb-lg">							
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<div style="padding: 20px; border: 1px solid #ddd;">
															<div class="row">
																<div class="col-md-4">
																	<div class="form-group">
																		<label class="control-label">Payment Type:</label>
																		<select class="form-control" name="fk_payment_type" type="text">
																			<option value=""></option>
																			<?php
																			foreach ($payment_types as $payment_type)
																			{
																				?>
																				<option data-sign="<?php echo $payment_type->sign; ?>" value="<?php echo $payment_type->id_payment_type; ?>">
																					<?php echo $payment_type->description; ?>
																				</option>
																				<?php
																			}
																			?>
																		</select>
																	</div>
																</div>																
																<div class="col-md-4">
																	<div class="form-group">
																		<label class="control-label">Reference Number:</label>
																		<input type="text" class="form-control" name="reference_number">
																	</div>
																</div>														
																<div class="col-md-4">
																	<div class="form-group">
																		<label class="control-label">Payment Date:</label>
																		<input type="text" class="form-control datepicker" data-date-format="yyyy-mm-dd" name="payment_date" value="<?php echo date("Y-m-d"); ?>">
																	</div>
																</div>																														
															</div>
														</div>
													</div>
												</div>												
												<div class="row" style="margin-top: 20px;">
													<div class="col-md-12">
														<div style="padding: 20px; border: 1px solid #ddd;">
															<div class="row">
																<div class="col-md-4">
																	<div class="form-group">
																		<label class="control-label">Amount:</label>
																		<input type="text" class="form-control" name="amount" onkeypress="return isNumberKey(event)">
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<label class="control-label">Admin Fee:</label>
																		<input type="text" class="form-control" name="admin_fee">
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<label class="control-label">Merchant Cost:</label>
																		<input type="text" class="form-control" name="merchant_cost">
																	</div>
																</div>																
															</div>
														</div>
													</div>
												</div>
												<div class="row" style="margin-top: 20px;">	
													<div class="col-md-12">
														<div style="padding: 20px; border: 1px solid #ddd;">
															<div class="row">
																<div class="col-md-4">
																	<div class="form-group">
																		<label class="control-label">Method:</label>							
																		<select class="form-control" name="method" type="text">
																			<option value=""></option>
																			<option value="Bendigo">Bendigo</option>
																			<option value="Square">Square</option>
																			<option value="EFT">EFT</option>
																			<option value="Other">Other</option>
																		</select>
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<label class="control-label">Credit Card:</label>							
																		<select class="form-control" name="credit_card" type="text">
																			<option value=""></option>
																			<option value="MasterCard">MasterCard</option>
																			<option value="Visa">Visa</option>
																			<option value="Amex">Amex</option>
																			<option value="Other">Other</option>
																		</select>
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<label class="control-label">Bank Account:</label>							
																		<select class="form-control" name="bank_account" type="text">
																			<option value=""></option>
																			<option value="Bendigo">Bendigo</option>
																			<option value="WestPac">Westpac</option>
																		</select>
																	</div>
																</div>	
															</div>
														</div>
													</div>
												</div>	
												<div class="row" style="margin-top: 20px;">
													<div class="col-md-12">
														<div style="padding: 20px; border: 1px solid #ddd;">
															<div class="row">
																<div class="col-md-12">
																	<div class="form-group">
																		<label class="control-label">Remarks:</label>
																		<textarea type="text" class="form-control" name="remarks"></textarea>
																	</div>
																</div>																					
															</div>
														</div>
													</div>
												</div>														
											</div>
										</div>
									</div>
									<div class="panel-footer text-right">
										<button type="submit" class="btn btn-primary">
											Submit
										</button>
										<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">
											Cancel
										</button>
									</div>									
								</form>
							</section>					
						</div>
					</div>
					<div id="edit_payment_modal" class="modal fade"> <!-- Edit Payment Modal -->
						<div class="modal-dialog" style="width: 95%;">
							<section class="panel">
								<form method="post" action="" id="edit_payment_form" name="edit_payment_form">
									<input type="hidden" id="id_lead" name="id_lead" value="">
									<input type="hidden" id="id_payment" name="id_payment" value="">
									<div class="panel-body">
										<div class="modal-wrapper">
											<div class="modal-text">
												<div class="row">
													<div class="col-md-12 text-center">
														<h4 id="label_name" style="line-height: 1px;"></h4>
														<p id="label_email" style="color: #cccccc; font-size: 0.9em;"></p>
														<hr class="solid mt-sm mb-lg">							
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<div style="padding: 20px; border: 1px solid #ddd;">
															<div class="row">
																<div class="col-md-4">
																	<div class="form-group">
																		<label class="control-label">Payment Type:</label>
																		<select class="form-control" id="fk_payment_type" name="fk_payment_type" type="text">
																			<option value=""></option>
																			<?php
																			foreach ($payment_types as $payment_type)
																			{
																				?>
																				<option data-sign="<?php echo $payment_type->sign; ?>" value="<?php echo $payment_type->id_payment_type; ?>">
																					<?php echo $payment_type->description; ?>
																				</option>
																				<?php
																			}
																			?>
																		</select>
																	</div>
																</div>																
																<div class="col-md-4">
																	<div class="form-group">
																		<label class="control-label">Reference Number:</label>
																		<input type="text" class="form-control" id="reference_number" name="reference_number">
																	</div>
																</div>														
																<div class="col-md-4">
																	<div class="form-group">
																		<label class="control-label">Payment Date:</label>
																		<input type="text" class="form-control datepicker" data-date-format="yyyy-mm-dd" id="payment_date" name="payment_date">
																	</div>
																</div>																														
															</div>
														</div>
													</div>
												</div>												
												<div class="row" style="margin-top: 20px;">
													<div class="col-md-12">
														<div style="padding: 20px; border: 1px solid #ddd;">
															<div class="row">
																<div class="col-md-4">
																	<div class="form-group">
																		<label class="control-label">Amount:</label>
																		<input type="text" class="form-control" id="amount" name="amount" onkeypress="return isNumberKey(event)">
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<label class="control-label">Admin Fee:</label>
																		<input type="text" class="form-control" id="admin_fee" name="admin_fee">
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<label class="control-label">Merchant Cost:</label>
																		<input type="text" class="form-control" id="merchant_cost" name="merchant_cost">
																	</div>
																</div>																
															</div>
														</div>
													</div>
												</div>
												<div class="row" style="margin-top: 20px;">	
													<div class="col-md-12">
														<div style="padding: 20px; border: 1px solid #ddd;">
															<div class="row">
																<div class="col-md-4">
																	<div class="form-group">
																		<label class="control-label">Method:</label>							
																		<select class="form-control" id="method" name="method" type="text">
																			<option value=""></option>
																			<option value="Bendigo">Bendigo</option>
																			<option value="Square">Square</option>
																			<option value="EFT">EFT</option>
																			<option value="Other">Other</option>
																		</select>
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<label class="control-label">Credit Card:</label>							
																		<select class="form-control" id="credit_card" name="credit_card" type="text">
																			<option value=""></option>
																			<option value="MasterCard">MasterCard</option>
																			<option value="Visa">Visa</option>
																			<option value="Amex">Amex</option>
																			<option value="Other">Other</option>
																		</select>
																	</div>
																</div>
																<div class="col-md-4">
																	<div class="form-group">
																		<label class="control-label">Bank Account:</label>							
																		<select class="form-control" id="bank_account" name="bank_account" type="text">
																			<option value=""></option>
																			<option value="Bendigo">Bendigo</option>
																			<option value="WestPac">Westpac</option>
																		</select>
																	</div>
																</div>	
															</div>
														</div>
													</div>
												</div>	
												<div class="row" style="margin-top: 20px;">
													<div class="col-md-12">
														<div style="padding: 20px; border: 1px solid #ddd;">
															<div class="row">
																<div class="col-md-12">
																	<div class="form-group">
																		<label class="control-label">Remarks:</label>
																		<textarea type="text" class="form-control" name="remarks"></textarea>
																	</div>
																</div>																					
															</div>
														</div>
													</div>
												</div>														
											</div>
										</div>
									</div>
									<div class="panel-footer text-right">
										<button type="submit" class="btn btn-primary">
											Submit
										</button>
										<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">
											Cancel
										</button>
									</div>									
								</form>
							</section>					
						</div>
					</div>					
				</section>	
			</div>
			<?php include 'template/right_sidebar.php'; ?>
		</section>
		<?php include 'template/scripts.php'; ?>
		<script>
			$(document).ready(function(){
				var col_num = "<?= ($admin_type==2 || $admin_type==4) ? 6 : 2 ?>";
				var datatables = null;
				datatables = $("#datatable");
				datatables.DataTable({
					sDom: "<'text-right mb-md'T>" + $.fn.dataTable.defaults.sDom,
					oTableTools: {
						sSwfPath: datatables.data("swf-path"),
						aButtons: [
							{
								sExtends: "xls",
								sButtonText: "Excel"
							},													
							{
								sExtends: "csv",
								sButtonText: "CSV"
							}
						]
					},
					lengthMenu: [ [20, 50, 100], [20, 50, 100] ],
					pageLength: 20,
					aaSorting: [],
					sScrollX: true,
					sScrollXInner: "150%",
					scrollCollapse: true,
					fixedColumns:   {
			            leftColumns: col_num,
			        }
				});
				
				$(document).on("click", ".balcqo_modal_button", function(data){
					var id_lead = $(this).data("id_lead");
					
					var data = {
						id_lead: id_lead
					};				
					
					$.ajax({
						type: "POST",
						url: "<?php echo site_url('lead/generate_balcqo_json'); ?>",
						data: data,
						dataType: "json",
						cache: false,
						success: function(response){
							$("#balcqo_modal").find(".add_invoice_modal_button").attr("data-id_lead", id_lead);
							$("#balcqo_modal").find(".add_payment_modal_button").attr("data-id_lead", id_lead);
							$("#balcqo_modal").find("#id_lead").val(response.id_lead);
							$("#balcqo_modal").find("#accounts_status").val(response.accounts_status);
							$("#balcqo_modal").find("#accounts_update_status").val(response.accounts_update_status);
							$("#balcqo_modal").find("#revenue").html(response.revenue);
							$("#balcqo_modal").find("#balcqo").html(response.balcqo);
							$("#balcqo_modal").find("#total_received").html(response.total_received);
							$("#balcqo_modal").find("#remaining_balance").html(response.remaining_balance);
							$("#balcqo_modal").find("#invoices_container").html(response.invoices_html);
							$("#balcqo_modal").find("#payments_container").html(response.payments_html);
							$("#balcqo_modal").modal();
						}
					});
				});
				
				$(document).on("click", ".update_payment_show_status_button", function(data){
					var id_lead = $(this).data("id_lead");
					var id_payment = $(this).data("id_payment");
					var show_status = $(this).data("show_status");
					
					var data = {
						id_lead: id_lead,
						id_payment: id_payment,
						show_status: show_status
					};
					
					$.ajax({
						type: "POST",
						url: "<?php echo site_url("payment/update_payment_show_status"); ?>",
						data: data,
						cache: false,
						success: function(response){
							if (response === "success")
							{
								swal("SUCCESS", "", "success");
								load_payments_html(id_lead);
							}						
							else
							{
								swal("ERROR", "An error occurred! Please try again", "error");
							}
						}
					});
				});				
				
				function load_payments_html (id_lead)
				{
					var data = {
						id_lead: id_lead
					};					
					
					$.ajax({
						type: "POST",
						url: "<?php echo site_url("lead/generate_payments_json"); ?>",
						data: data,
						dataType: "json",
						cache: false,
						success: function(response){
							$("#payments_container").html(response.payments_html);
						}
					});						
				}
				
				function load_invoices_html (id_lead)
				{
					var data = {
						id_lead: id_lead
					};					
					
					$.ajax({
						type: "POST",
						url: "<?php echo site_url("lead/generate_payments_json"); ?>",
						data: data,
						dataType: "json",
						cache: false,
						success: function(response){
							$("#payments_container").html(response.invoices_html);
						}
					});						
				}				
				
				$(".add_invoice_item_button").click(function(e){
					var container = $(this).data("container");
					var item = '\
					<div style="padding: 15px; border: 1px solid #ddd; margin-top: 15px;">\
						<div class="row">\
							<div class="col-md-6">\
								<div class="form-group">\
									<label class="control-label">Amount:</label>\
									<input type="text" class="form-control" name="invoice_item_amount[]" onkeypress="return isNumberKey(event)">\
								</div>\
							</div>\
						</div>\
						<div class="row" style="margin-top: 10px;">\
							<div class="col-md-12">\
								<div class="form-group">\
									<label class="control-label">Item Description:</label>\
									<textarea type="text" class="form-control" name="invoice_item_description[]"></textarea>\
								</div>\
							</div>\
						</div>\
					</div>';
					$("#"+container).find("#invoice_items_container").append(item);
				});	

				$(".add_invoice_modal_button").click(function(e){
					/*
					var name = $("#client_details_form").find("#name").val();
					var email = $("#client_details_form").find("#email").val();
					$("#add_invoice_modal").find("#label_name").html(name);
					$("#add_invoice_modal").find("#label_email").html(email);	
					*/
					var id_lead = $(this).data("id_lead");
					
					$("#add_invoice_modal").find("#id_lead").val(id_lead);	
					$("#add_invoice_modal").modal();
				});
				
				$(".add_payment_modal_button").click(function(e){
					/*
					var name = $("#client_details_form").find("#name").val();
					var email = $("#client_details_form").find("#email").val();
					$("#add_payment_modal").find("#label_name").html(name);
					$("#add_payment_modal").find("#label_email").html(email);	
					*/
					
					var id_lead = $(this).data("id_lead");
					
					$("#add_payment_modal").find("#id_lead").val(id_lead);				
					$("#add_payment_modal").modal();
				});

				$("#add_invoice_form").submit(function(e){ // Reload //
					$.ajax({
						type: "POST",
						url: "<?php echo site_url('invoice/add_invoice'); ?>",
						data: $("#add_invoice_form").serialize(),
						cache: false,
						success: function(response) {
							if (response === "success")
							{
								$("#add_invoice_form").find("input,textarea,select").val("");
								$("#add_invoice_modal").modal("hide");
								$("#balcqo_modal").modal("hide");
								
								swal("SUCCESS", "", "success");
								location.reload(true);
							}				
							else
							{
								swal("ERROR", "An error occurred! Please try again", "error");
							}
						}
					});
					e.preventDefault();
				});		

				$("#add_payment_form").submit(function(e){ // Reload //
					var id_lead = $("#add_payment_form").find("#id_lead").val();
				
					$.ajax({
						type: "POST",
						url: "<?php echo site_url('payment/add_payment'); ?>",
						data: $("#add_payment_form").serialize(),
						cache: false,
						success: function(response) {
							if (response === "success")
							{
								$("#add_payment_form").find("input,textarea,select").val("");
								$("#add_payment_modal").modal("hide");
								$("#balcqo_modal").modal("hide");
								
								// load_payments_html(id_lead);
								
								swal("SUCCESS", "", "success");
							}				
							else
							{
								swal("ERROR", "An error occurred! Please try again", "error");
							}
						}
					});
					e.preventDefault();
				});			

				$("#edit_payment_form").submit(function(e){ // Reload //
					var id_lead = $("#edit_payment_form").find("#id_lead").val();
				
					$.ajax({
						type: "POST",
						url: "<?php echo site_url('payment/update_payment'); ?>",
						data: $("#edit_payment_form").serialize(),
						cache: false,
						success: function(response) {
							if (response === "success")
							{
								$("#edit_payment_form").find("input,textarea,select").val("");
								$("#edit_payment_modal").modal("hide");
								$("#balcqo_modal").modal("hide");
								
								// load_payments_html(id_lead);

								swal("SUCCESS", "", "success");
							}				
							else
							{
								swal("ERROR", "An error occurred! Please try again", "error");
							}
						}
					});
					e.preventDefault();
				});				
			
				$(document).on("change", "#accounts_status", function(data){ // Remove record
					var id_lead = $("#balcqo_modal").find("#id_lead").val();
					var accounts_status = $(this).val();

					var data = {
						id_lead: id_lead,
						accounts_status: accounts_status
					};
					
					$.ajax({
						type: "POST",
						url: "<?php echo site_url("lead/update_record"); ?>",
						data: data,
						cache: false,
						success: function(response){
							if (response === "success")
							{

							}						
							else
							{
								swal("ERROR", "An error occurred! Please try again", "error");
							}
						}
					});
				});			
			
				$(document).on("click", ".delete_invoice_button", function(data){ // Remove record
					var id_lead = $(this).data("id_lead");
					var id_invoice = $(this).data("id_invoice");
					
					var data = {
						id_lead: id_lead,
						id_invoice: id_invoice
					};
					
					$.ajax({
						type: "POST",
						url: "<?php echo site_url("invoice/delete_invoice"); ?>",
						data: data,
						cache: false,
						success: function(response){
							if (response === "success")
							{
								swal("SUCCESS", "", "success");
								$("#invoices_container").find("#lead_invoice_"+id_invoice).remove();
							}						
							else
							{
								swal("ERROR", "An error occurred! Please try again", "error");
							}
						}
					});				
					e.preventDefault();
				});

				$(document).on("click", ".delete_payment_button", function(data){ // Remove record	
					var id_lead = $(this).data("id_lead");
					var id_payment = $(this).data("id_payment");
					
					var data = {
						id_lead: id_lead,
						id_payment: id_payment
					};
					
					$.ajax({
						type: "POST",
						url: "<?php echo site_url("payment/delete_payment"); ?>",
						data: data,
						cache: false,
						success: function(response){
							if (response === "success")
							{
								swal("SUCCESS", "", "success");
								$("#payments_container").find("#lead_payment_"+id_payment).remove();
							}						
							else
							{
								swal("ERROR", "An error occurred! Please try again", "error");
							}
						}
					});				
					e.preventDefault();
				});			

				$(document).on("click", ".edit_payment_modal_button", function(data){
					/*
					var name = $("#client_details_form").find("#name").val();
					var email = $("#client_details_form").find("#email").val();	
					$("#edit_payment_form").find("#label_name").html(name);
					$("#edit_payment_form").find("#label_email").html(email);				
					*/

					var id_lead = $(this).data("id_lead");
					var id_payment = $(this).data("id_payment");
					
					$("#edit_payment_form").find("#id_payment").val(id_payment);
					
					var data = {
						id_lead: id_lead,
						id_payment: id_payment
					};

					$.ajax({
						type: "POST",
						url: "<?php echo site_url('payment/get_payment'); ?>",
						data: data,
						dataType: "json",
						cache: false,
						success: function(response){
							$("#edit_payment_modal").find("#fk_payment_type").val(response.fk_payment_type);
							$("#edit_payment_modal").find("#reference_number").val(response.reference_number);
							$("#edit_payment_modal").find("#payment_date").val(response.payment_date);
							$("#edit_payment_modal").find("#amount").val(response.amount);
							$("#edit_payment_modal").find("#admin_fee").val(response.admin_fee);
							$("#edit_payment_modal").find("#merchant_cost").val(response.merchant_cost);
							$("#edit_payment_modal").find("#method").val(response.method);
							$("#edit_payment_modal").find("#credit_card").val(response.credit_card);
							$("#edit_payment_modal").find("#bank_account").val(response.bank_account);
							$("#edit_payment_modal").find("#remarks").val(response.remarks);
							$("#edit_payment_modal").modal();	
						}
					});
				});
			});
		</script>
	</body>
</html>