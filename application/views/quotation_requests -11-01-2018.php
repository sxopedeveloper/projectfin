<?php include 'admin/template/head.php'; ?>
	<style type="text/css">
		.del_file {
			cursor: pointer; 
			cursor: hand;
		}
	</style>
	<body>
		<section class="body">
			<!-- start: header -->
			<?php include 'admin/template/header.php'; ?>
			<!-- end: header -->
			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<?php include 'admin/template/left_sidebar.php'; ?>
				<!-- end: sidebar -->
				<section role="main" class="content-body has-toolbar">
					<?php include 'admin/template/header_2.php'; ?>
					<div class="inner-toolbar clearfix">
						<ul>
							<li class="right">
								<ul class="nav nav-pills nav-pills-primary">
									<?php 
									$active_active = " ";
									$finished_active = " ";
									$won_active = " ";
									$label_text = "";
									if ($status == 0)
									{
										$active_active = ' class="active"'; 
										$label_text = "active tenders";
									}
									else if ($status == 2)
									{
										$won_active = ' class="active"'; 
										$label_text = "won tenders";
									}
									?>
									<li <?php echo $active_active; ?>>
										<a href="<?php echo site_url('user/quotation_requests/0'); ?>">Active</a>
									</li>
									<li <?php echo $won_active; ?>>
										<a href="<?php echo site_url('user/quotation_requests/2'); ?>">Won</a>
									</li>									
								</ul>
							</li>
						</ul>
					</div>
					<!-- start: page -->
					<section class="panel">
						<header class="panel-heading">
							<h2 class="panel-title">Quote Requests</h2>
						</header>
						<div class="panel-body">
							<table class="table table-bordered table-striped mb-none" id="datatable-tabletools" style="white-space: nowrap;" data-swf-path="<?php echo base_url('assets/vendor/jquery-datatables/extras/TableTools/swf/copy_csv_xls_pdf.swf'); ?>">
								<thead>
									<tr>
										<th></th>
										<th></th>
										<!--<th></th>-->
										<th>Tender</th>
										<th>Postcode</th>
										<th>Registration</th>
										<th>Vehicle</th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach ($quote_requests as $quote_request)
									{					
										?>
										<tr>
											<td>
												<center>
													<a href="#" class="quote_modal_button" data-id_lead="<?php echo $quote_request['id_lead']; ?>" data-id_quote_request="<?php echo $quote_request['id_quote_request']; ?>" data-id_quote="<?php echo $quote_request['id_quote_new']; ?>" data-demo="New">
														<i class="fa fa-pencil-square-o" data-toggle="tooltip" data-placement="top" title="Quote for a new vehicle"></i>
													</a>
												</center>
											</td>
											<td>
												<center>
													<a href="#" class="quote_modal_button" data-id_lead="<?php echo $quote_request['id_lead']; ?>" data-id_quote_request="<?php echo $quote_request['id_quote_request']; ?>" data-id_quote="<?php echo $quote_request['id_quote_demo']; ?>" data-demo="Demo">
														<i class="fa fa-pencil-square-o" data-toggle="tooltip" data-placement="top" title="Quote for a demonstrator vehicle"></i>
													</a>
												</center>
											</td>
											<!--
											<td>
												<center>
													<a href="#" title="Upload PDF">
														<i class="fa fa-file-image-o up_img_modal" data-toggle="tooltip" data-placement="top" title="Upload PDF" data-idquote="<?= $quote_request['id_quote_request']; ?>"></i>
													</a>
												</center>
											</td>
											-->
											<td><?php echo $quote_request['cq_number']; ?></td>	
											<td><?php echo $quote_request['postcode']; ?></td>
											<td><?php echo $quote_request['registration_type']; ?></td>
											<td><?php echo $quote_request['build_date']." ".$quote_request['make']." ".$quote_request['model']." ".$quote_request['variant']." (".$quote_request['colour'].")"; ?></td>
										</tr>
										<?php
									}
									?>
								</tbody>
							</table>
						</div>
					</section>
					<div class="modal fade" id="upload_pdf_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> <!-- Upload PDF Modal -->
						<div class="modal-dialog modal-sm" role="document" id="modal-dialog-menu">
							<div class="modal-content">
								<div class="modal-header">
									<input type="hidden" id="hidden_quote_id">
									<h4 class="modal-title">Upload PDF</h4>
								</div>
								<div class="modal-body">
									<div class="row">
										<div class="col-md-12" id="file_table_id">
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-md-12">
											<div class="dropzone upload_pdf"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="audit_trail" class="modal fade"> <!-- Audit Trail Modal -->
						<div class="modal-dialog" style="width: 70%;">
							<section class="panel">
								<header class="panel-heading">
									<h2 class="panel-title">Quote Audit Trail</h2>
								</header>
								<div class="panel-body">
									<div class="modal-wrapper">
										<div class="modal-text" id="audit_body">
											
										</div>
									</div>
								</div>
								<footer class="panel-footer">
									<div class="row">
										<div class="col-md-12 text-right">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										</div>
									</div>
								</footer>
							</section>
						</div>
					</div>
				</section>
				<?php include 'admin/template/modals.php'; ?>
			</div>
			<?php include 'admin/template/right_sidebar.php'; ?>
		</section>
		<?php include 'admin/template/scripts.php'; ?>
		<script>
			$(document).ready(function(){

				(function($){
					"use strict";
					var datatableInit = function() {
						var $table = $("#datatable-tabletools");
						$table.dataTable({
							sDom: "<'text-right mb-md'T>" + $.fn.dataTable.defaults.sDom,
							oTableTools: {
								sSwfPath: $table.data("swf-path"),
								aButtons: [
									{
										sExtends: "pdf",
										sButtonText: "PDF"
									},
									{
										sExtends: "csv",
										sButtonText: "CSV"
									},
									{
										sExtends: "print",
										sButtonText: "Print",
										sInfo: "Please press CTR+P to print or ESC to quit"
									}
								]
							}
						});
					};

					$(function() {
						datatableInit();
					});
					
				}).apply(this, [jQuery]);		
			});
		</script>
	</body>
</html>