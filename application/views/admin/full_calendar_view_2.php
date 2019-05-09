<?php include 'template/head.php'; ?>
	<body>
		<?php
		$fq_page_flag = 1;
		$save_flag = 1;		
		
		if ($this->session->userdata('admin_type') == 3 || $this->session->userdata('user_id') == 259)
		{
			?>
			<style type="text/css">
				.fc-title {
					font-size: 1.1em !important;
				}
				
				.fc-event{
					color: #000;
					padding: 4px;
					border: 1px solid #808080;
				}
				
				.fc-event-time{
					display: none !important;
				}
				
				.fc-content .fc-time{
					display: none !important;	
				}
				
				.fc-agendaWeek-view .fc-content .fc-time{
				   display : none !important;
				}
				
				.fc-month-view .fc-content .fc-time{
				   display : none !important;
				}
			</style>
			<?php
			$default_view = 'agendaWeek';
		}
		else
		{
			$default_view = 'agendaDay';
		}	

		if (isset($_GET['action']))
		{
			$event		 = isset($_GET['event_filter']) ? "1" : "0";
			$order       = isset($_GET['order_filter']) ? "1" : "0";
			$tradein     = isset($_GET['tradein_filter']) ? "1" : "0";
			$ticket      = isset($_GET['ticket_filter']) ? "1" : "0";
			$tender      = isset($_GET['tender_filter']) ? "1" : "0";
			$unattempted = isset($_GET['unattempted_filter']) ? "1" : "0";
			$attempted   = isset($_GET['attempted_filter']) ? "1" : "0";
		}
		else
		{
			$event    	 = "1";
			$order       = "1";
			$tradein     = "1";
			$ticket      = "1";
			$tender      = "1";
			$unattempted = "1";
			$attempted   = "1";
		}

		$event_checked = ''; if ($event == "1") { $event_checked = 'checked="checked"'; }
		$order_checked = ''; if ($order == "1") { $order_checked = 'checked="checked"'; }
		$tradein_checked = ''; if ($tradein == "1") { $tradein_checked = 'checked="checked"'; }
		$ticket_checked = ''; if ($ticket == "1") { $ticket_checked = 'checked="checked"'; }
		$tender_checked = ''; if ($tender == "1") { $tender_checked = 'checked="checked"'; }
		$unattempted_checked = ''; if ($unattempted == "1") { $unattempted_checked = 'checked="checked"'; }
		$attempted_checked = ''; if ($attempted == "1") { $attempted_checked = 'checked="checked"'; }
		?>
		<style type="text/css">
			.fc-event{
				color: #000;
			}
			.checkbox{
				padding: 10px !important;
			}
			.fc-event-title {
			
			    line-height: 1 !important;
			}
			.fc-event .fc-event-inner {
			    padding: 1px 3px;
			}
			.fc-list-heading .fc-widget-header{
				background: #58c603 !important;
				border-color: #58c603 !important;
			}
		</style>
		<div class="full_loader"></div>
		<section class="body">
			<?php include 'template/header.php'; ?>
			<div class="inner-wrapper">
				<?php include 'template/left_sidebar.php'; ?>
				<section role="main" class="content-body">
					<?php include 'template/header_2.php'; ?>
					<!-- start: page -->
					<section class="panel">
						<div class="panel-body" style="padding-bottom: 12px !important;">
							<div class="row">
								<div class="col-md-9">
									<div id="calendar"></div>
								</div>
								<div class="col-md-3">
									<form id="view_options_form" action="<?php echo site_url('full_calendar'); ?>">
										<div class="row">
											<div class="col-md-12">
												<p class="h4 text-light">
													DISPLAY FILTERS
												</p>
												<div class="form-group">
													<div class="checkbox" style="background: #fff">
														<label>
															<input type="checkbox" name="unattempted_filter" value="1" class="unattempted_filter display_filter" data-filter="unattempted" <?php echo $unattempted_checked; ?>> Unattempted Leads
														</label>
													</div>
													<div class="checkbox" style="background: #f0ffff">
														<label>
															<input type="checkbox" name="attempted_filter" value="1" class="attempted_filter display_filter" data-filter="attempted" <?php echo $attempted_checked; ?>> Attempted Leads
														</label>
													</div>
													<div class="checkbox" style="background: #f8ffbf">
														<label>
															<input type="checkbox" name="event_filter" value="1" class="event_filter display_filter" data-filter="event" <?php echo $event_checked; ?>> Scheduled Events
														</label>
													</div>
													<div class="checkbox" style="background: #e9d1ff">
														<label>
															<input type="checkbox" name="tender_filter" value="1" class="tender_filter display_filter" data-filter="tender" <?php echo $tender_checked; ?>> Running Tenders
														</label>
													</div>
													<div class="checkbox" style="background: #d2ffbf">
														<label>
															<input type="checkbox" name="order_filter" value="1" class="order_filter display_filter" data-filter="order" <?php echo $order_checked; ?>> New Vehicle Deliveries
														</label>
													</div>
													<div class="checkbox" style="background: #ffd1d1">
														<label>
															<input type="checkbox" name="tradein_filter" value="1" class="tradein_filter display_filter" data-filter="tradein" <?php echo $tradein_checked; ?>> Tradein Deliveries
														</label>
													</div>
													<div class="checkbox" style="background: #e6e6e6">
														<label>
															<input type="checkbox" name="ticket_filter" value="1" class="ticket_filter display_filter" data-filter="ticket" <?php echo $ticket_checked; ?>> Tickets
														</label>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<center>
													<div class="btn-group">
														<input type="submit" class="btn btn-primary btn-sm" value="Apply Filter" name="action">
														<span class="btn btn-default btn-sm new-cal-item" >New FQ Item</span>
													</div>	
												</center>
											</div>
										</div>
									</form>										
								</div>
							</div>
						</div>
					</section>
					<!-- end: page -->
				</section>
				<div class="modal fade" id="samp_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> <!-- Modal -->
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title" id="myModalLabel">
									Modal title
								</h4>
							</div>
							<div class="modal-body">
								...
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="button" class="btn btn-primary">Save changes</button>
							</div>
						</div>
					</div>
				</div>
				<?php include 'modals/ticket_modals.php'; ?>
				<!-- FinQuote (Start) -->
				<?php include 'modals/fa_application_3.php'; ?>
				<?php include 'modals/fa_requirements.php'; ?>
				<?php include 'modals/all_req_modal.php'; ?>
				<?php include 'modals/new_cal_item.php'; ?>
				<?php include 'modals/fq_emailer.php'; ?>
				<!-- FinQuote (End) -->
			</div>
			<?php include 'template/right_sidebar.php'; ?>
		</section>
		<?php include 'template/scripts.php'; ?>
		<!-- FinQuote (Start) -->
		<?php include 'js/fapplication_scripts.php'; ?>
		<?php include 'js/fapplication_calendar.php'; ?>
		<!-- FinQuote (End) -->
		<script type="text/javascript">
			$(document).ready(function(){

				var all_day_height = 0;
				var day_total_count = 0;
				var date = new Date();
				var d = date.getDate();
				var m = date.getMonth();
				var y = date.getFullYear();

				var html = "";

				var user_id = "<?php echo $session_data['user_id']; ?>";

				var event_params = {
					user_id     : user_id,
					query_flag  : "event",
					display_flag: "<?php echo $event; ?>"
				};

				var order_params = {
					user_id     : user_id,
					query_flag  : "order",
					display_flag: "<?php echo $order; ?>"
				};

				var tradein_params = {
					user_id     : user_id,
					query_flag  : "tradein",
					display_flag: "<?php echo $tradein; ?>"
				};

				var ticket_params = {
					user_id     : user_id,
					query_flag  : "ticket",
					display_flag: "<?php echo $ticket; ?>"
				};

				var tender_params = {
					user_id     : user_id,
					query_flag  : "tender",
					display_flag: "<?php echo $tender; ?>"
				};

				var unattempted_params = {
					user_id     : user_id,
					query_flag  : "unattempted",
					display_flag: "<?php echo $unattempted; ?>"
				};

				var attempted_params = {
					user_id     : user_id,
					query_flag  : "attempted",
					display_flag: "<?php echo $attempted; ?>"
				};			
				
				$(document).on("click", ".fc-button-agendaDay", function(){
					$("#calendar").fullCalendar("refetchEvents");
				});

				$(document).on("click", ".fc-button-agendaWeek", function(){
					$("#calendar").fullCalendar("refetchEvents");
				});

				$(document).on("click", ".fc-button-month", function(){
					$("#calendar").fullCalendar("refetchEvents");
				});

				$("#calendar").fullCalendar({
					eventLimit: 5,
					views: 
					{
				        month: 
						{
				            title: "QM",
							url: "http://www.qteme.com.au",
							backgroundColor: "#ffffff",
							description: "Quote Me - New Car Discounts",
							start: "2010-01-01"
				        }
			        },
					header: 
					{
						left: "title",
						right: "prev,today,next,agendaDay,agendaWeek,month,listMonth"
					},
					themeButtonIcons: 
					{
						prev: "fa fa-caret-left",
						next: "fa fa-caret-right",
					},
					defaultDate: '<?php echo date("Y-m-d"); ?>',
					defaultView: '<?php echo $default_view; ?>',
					editable: true,
					droppable: true,
					draggable: true,
					resizable: true,
					dragScroll: true,
			        events: 
					[
						<?php
						foreach ($fapplications as $fapplication)
						{
							$curr_now_1 = date("Y-m-d") . " " . "09:00:00";
							$curr_now_2 = date("Y-m-d") . " " . "09:30:00";

							if (date("H:i:s", strtotime($fapplication['assignment_date'])) == "00:00:00" && date("H:i:s", strtotime($fapplication['assignment_date_end'])) == "00:00:00")
							{
								$assignment_date = $curr_now_1;
								$assignment_date_end = $curr_now_2;
							}
							else
							{
								$assignment_date = $fapplication['assignment_date'];
								
								if ($fapplication['assignment_date_end'] == "0000-00-00 00:00:00")
								{
									$temp_1 = date("Y-m-d", strtotime($fapplication['assignment_date']));
									$temp_2 = date("H:i:s", strtotime($fapplication['assignment_date']) + 60*30);
									
									$assignment_date_end = $temp_1 . " " . $temp_2;
								}
								elseif( date('Y', strtotime($fapplication['assignment_date_end'])) == "1970" )
								{
									$temp_1 = date("Y-m-d", strtotime($fapplication['assignment_date']));
									$temp_2 = date("H:i:s", strtotime($fapplication['assignment_date']) + 60*30);
									
									$assignment_date_end = $temp_1 . " " . $temp_2;
								}
								else
								{
									$assignment_date_end = $fapplication['assignment_date_end'];
								}
							}

							$color = "#3c94d6";
							
							if ($fapplication['lead_phone']=="")
							{
								$fapplication['lead_phone'] = "N/A";
							}
							
							if ($fapplication['lead_make']=="" AND $fapplication['lead_model']=="")
							{
								$car = "N/A";
							}
							else
							{
								$car = $fapplication['lead_make']." ".$fapplication['lead_model'];
							}
							?>
							{
								id: <?php echo $fapplication['id_fq_account']; ?>,
								title: '<?php echo addslashes($fapplication['lead_name']).' ('.$car.')' . ' - ' . $fapplication['lead_phone'] . ' - ' . $fapplication['lead_email'] . ' - ' . $fapplication['lead_state']; ?>',
								<?php $status_label = $fapplication['status_text']; ?>
								url: "fapplication",
								backgroundColor: '<?php echo $fapplication['color_status']; ?>',
								start: '<?php echo $assignment_date; ?>',
								end: '<?php echo $assignment_date_end ?>',
								className: "cal_item_" + <?php echo $fapplication['id_fq_account']; ?>
							},
							<?php
						}
						?>
			        ],
			        eventSources: 
					[
			        	{
							url: '<?php echo site_url("full_calendar/get_calendar_items"); ?>',
				            type: "POST",
				            data: event_params,
				            error: function(){
				                alert("There was an error while fetching events!");
				            }
						},
						{
							url: '<?php echo site_url("full_calendar/get_calendar_items"); ?>',
				            type: "POST",
				            data: order_params,
				            error: function(){
				                alert("There was an error while fetching orders!");
				            }
						},
						{
							url: '<?php echo site_url("full_calendar/get_calendar_items"); ?>',
				            type: "POST",
				            data: tradein_params,
				            error: function(){
				                alert("There was an error while fetching tradeins!");
				            }
						},
						{
							url: '<?php echo site_url("full_calendar/get_calendar_items"); ?>',
				            type: "POST",
				            data: ticket_params,
				            error: function(){
				                alert("There was an error while fetching tickets!");
				            }
						},
						{
							url: '<?php echo site_url("full_calendar/get_calendar_items"); ?>',
				            type: "POST",
				            data: tender_params,
				            error: function(){
				                alert("There was an error while fetching tenders!");
				            }
						},
						{
							url: '<?php echo site_url("full_calendar/get_calendar_items"); ?>',
				            type: "POST",
				            data: unattempted_params,
				            error: function(){
				                alert("There was an error while fetching unattempted leads!");
				            }
						},
						{
							url: '<?php echo site_url("full_calendar/get_calendar_items"); ?>',
				            type: "POST",
				            data: attempted_params,
				            error: function(){
				                alert("There was an error while fetching attempted leads!");
				            }
						},
			        ],		
				  	eventResize: function(event, delta, revertFunc, jsEvent, ui, view) 
					{
						var time_start = "start: " + event.start.format();
						var time_end = "end: " + event.end.format();
					},
					navLinkDayClick: function(date, jsEvent) 
					{
				        console.log("day", date.format());
				        console.log("coords", jsEvent.pageX, jsEvent.pageY);
				    },
					eventDrop: function(event, delta, revertFunc) 
					{
						var dataString = "&new_date="+event.start.format();
						var time_start = event.start.format();

						if (event.end != null && event.url == "fapplication")
						{
							var time_end   = event.end.format();
							
							var data = {
								time_start: time_start,
								time_end: time_end
							};
						}
						else
						{
							var data = {
								time_start: time_start
							}

							if (event.url == "fapplication")
							{
								revertFunc();
							}
						}

						if (event.className[0] == "tender" || event.className[0] == "attempted_lead" || event.className[0] == "unattempted_lead")
						{
							$.ajax({
								type: "POST",
								url: "<?php echo site_url('lead/update_assignment_date'); ?>/" + event.id,
								data: dataString,
								cache: false
							});
						}
						else if (event.className[0] == "event")
						{
							
						}						
						else if (event.url == "fapplication")
						{
							$.ajax({
								type: "POST",
								url: "<?php echo site_url('full_calendar/update_record_date'); ?>/" + event.id,
								data: data,
								cache: false
							});
						}
						else
						{
							revertFunc();	
						}
					},
					eventRender: function (event, element, view) 
					{
						$(element).find(".fc-event-time").remove();
						element.attr("href", "javascript:void(0);");

						if (element.hasClass("open-lead-details"))
						{
							element.attr("data-lead_id", event.id);
						}

						if (element.hasClass("open-tradeindetails"))
						{
							element.attr("data-tradein_id", event.id);
						}
						
						element.click(function(){
							if (event.url == "fapplication")
							{
								var modal_data = null;
								$.post("<?php echo site_url("fapplication/record"); ?>/" + event.id, function(data)
								{
									<?php include 'js/full_calendar.php'; ?>
									set_applicant_count_values();
								}, "json");
							}
						});
					},
					eventClick: function(event) 
					{
						if (event.className[0] == "attempted_lead" || event.className[0] == "unattempted_lead" || event.className[0] == "event" || event.className[0] == "tender" || event.className[0] == "order" || event.className[0] == "tradein")
						{
					        window.open(event.url, "_blank");
					        return false;
					    }
					}
				});
				$("#calendar").fullCalendar("option", "height", 1350);
			});
		</script>
	</body>
</html>