<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title><?= $title ?></title>
		<!-- Bootstrap -->
		<?php
			echo link_tag('css/bootstrap.min.css');
			echo link_tag('css/jquery.datetimepicker.css');
			echo link_tag('css/ui-lightness/jquery-ui-1.10.4.custom.min.css');
		?>

		<script src="<?php echo base_url(); ?>js/jquery-1.10.2.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>js/jquery.datetimepicker.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>js/jquery.ui.datepicker-ja.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>js/bootstrap.min.js" type="text/javascript"></script>

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<style type="text/css">
			.pagination>.active>a, .pagination>.active>span, .pagination>.active>a:hover, .pagination>.active>span:hover, .pagination>.active>a:focus, .pagination>.active>span:focus {
			    z-index: -1;
			}
		</style>
	</head>
	<body>
		<div class="navbar navbar-inverse" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						  <span class="sr-only">Toggle navigation</span>
						  <span class="icon-bar"></span>
						  <span class="icon-bar"></span>
						  <span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#"><span class="glyphicon glyphicon-user"></span><?= $title ?></a>
				</div>					
				<div class="collapse navbar-collapse navbar-right">
					<ul class="nav navbar-nav">
						<li><a href="#" onclick="$('#drNumModal').modal('show');"><span class="glyphicon glyphicon-cog"></span></a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h3>Track My Truck</h3>
				</div><!-- col-md-6 -->
				<div class="col-md-6" align="right">
				</div><!-- col-md-6 -->
			</div><!-- class="row" -->

			<div class="row">
				<div class="col-md-6">
					<h4>Search</h4>
				</div><!-- col-md-4 -->
				<div class="col-md-6">
				</div><!-- col-md-4 -->
			</div><!-- class="row" -->

		<?php echo form_open('index.php/truck/search', array('class' => 'form-inline', 'id' => 'searchForm')); ?>
			<div class="row">
				<div class="col-md-12">
					<table class="table table-bordered table-hover table-striped">
						<tr>
							<th id="lbl-search-truckNum" class="success text-center col-md-3">Truck Plate No</th>
							<td>
								<input id="search-truckNum" tabindex="1" name="search-truckNum" class="form-control input-sm" title="Truck Plate No." type="text" maxlength="10" size="60" value="<?= $truckNum ?>" />
							</td>
						</tr>
						<tr>
							<th id="lbl-search-commodity" class="success text-center">Load / Commodity</th>
							<td>
								<select id="search-commodity" tabindex="2" name="search-commodity" class="form-control input-sm" title="Load / Commodity">
									<option value="">Select</option>
									<option <?php echo $commodity == "Sand and Gravel (Processed)" ? "selected" : "" ?> value="Sand and Gravel (Processed)">Sand and Gravel (Processed)</option>
									<option <?php echo $commodity == "Sand and Gravel (Unprocessed)" ? "selected" : "" ?> value="Sand and Gravel (Unprocessed)">Sand and Gravel (Unprocessed)</option>
									<option <?php echo $commodity == "Dolamite" ? "selected" : "" ?> value="Dolamite">Dolamite</option>
									<option <?php echo $commodity == "Guano" ? "selected" : "" ?>  value="Guano">Guano</option>
									<option <?php echo $commodity == "Limestone" ? "selected" : "" ?>  value="Limestone">Limestone</option>
									<option <?php echo $commodity == "Phosphate" ? "selected" : "" ?>  value="Phosphate">Phosphate</option>
									<option <?php echo $commodity == "Silica" ? "selected" : "" ?>  value="Silica">Silica</option>
								</select>
							</td>
						</tr>
						<tr>
							<th id="lbl-search-soldTo" class="success text-center">Sold To</th>
							<td>
								<input id="search-soldTo" tabindex="3" name="search-soldTo" class="form-control input-sm" title="Sold To" type="text" size="60" value="<?= $soldTo ?>" />
							</td>
						</tr>
						<tr>
							<th id="lbl-search-driver" class="success text-center">Driver</th>
							<td>
								<input id="search-driver" tabindex="4" name="search-driver" class="form-control input-sm" title="Driver" type="text" size="60" value="<?= $driver ?>" />
							</td>
						</tr>
						<tr>
							<th id="lbl-search-drNum" class="success text-center">DR No.</th>
							<td>
								<input id="search-drNum" tabindex="5" name="search-drNum" class="form-control input-sm" title="DR No." type="text" size="60" value="<?= $drNum ?>" />
							</td>
						</tr>
					</table>

					<div class="row">
						<div class="col-md-12 text-right">
							<input type="submit" id="btn-search" type="button" class="btn btn-primary" tabindex="6" name="search" value="Search" />
							<a id="btn-register" class="btn btn-primary" tabindex="7" name="register" href="<?php echo base_url(); ?>index.php/register">New Entry</a>
						</div><!-- col-md-4 -->
					</div><!-- class="row" -->
				</div>
			</div><!-- class="row" -->
		</form>
		
		<?php
			if (null != $message):
		?>
		<div class="row">
			<div class="col-md-12 alert <?= $alert ?>" style="margin-top:20px;">
				<p><?= $message ?></p>
			</div>
		</div>
		<?php
			endif;
		?>
			
			<div class="row">
				<div class="col-md-12 text-center">
					<?php echo $this->pagination->create_links(); ?>
				</div>
			</div>
			
			<?php
				if(is_array($truckData) && count($truckData) ):
			?>
			<div class="row">
				<div class="col-md-12 form-inline" style="margin-top:20px">
					<table class="table table-bordered table-striped table-hover">
						<thead>
							<tr class="success">
								<th id="lbl-drNum" class="text-center" rowspan="2" style="vertical-align:middle">DR No</th>
								<th id="lbl-truckNum" class="text-center" rowspan="2" style="vertical-align:middle">Truck Plate No</th>
								<th id="lbl-commodity" class="text-center" rowspan="2" style="vertical-align:middle">Load/Commodity</th>
								<th id="lbl-destination" class="text-center" colspan="2">Destination</th>
								<th id="lbl-soldTo" class="text-center" rowspan="2" style="vertical-align:middle">Sold to</th>
								<th id="lbl-volume" class="text-center" rowspan="2" style="vertical-align:middle">Volume</th>
								<th id="lbl-driver" class="text-center" rowspan="2" style="vertical-align:middle">Driver</th>
								<th id="lbl-remarks" class="text-center" rowspan="2" style="vertical-align:middle">Remarks</th>
								<th rowspan="2"></th>
								<th rowspan="2"></th>
							</tr>
							<tr class="success">
								<th id="lbl-from" class="text-center">From</th>
								<th id="lbl-to" class="text-center">To</th>
							</tr>
						</thead>
						<tbody>
						<?php
							foreach($truckData as $data):
						?>
							<tr class="text-center">
								<td><?= $data->DR_NUM; ?></td>
								<td><?= $data->TRUCK_NUM; ?></td>
								<td><?= $data->COMMODITY; ?></td>
								<td><?= $data->DEST_FROM; ?></td>
								<td><?= $data->DEST_TO; ?></td>
								<td><?= $data->SOLD_TO; ?></td>
								<td><?= $data->VOLUME; ?></td>
								<td><?= $data->DRIVER; ?></td>
								<td><?= $data->REMARKS; ?></td>
								<td><a href="<?php echo base_url(); ?>index.php/truck/edit/<?= $data->DR_NUM; ?>">Edit</td>
								<td><a href="#" onclick="confirmDelete(<?= $data->DR_NUM; ?>);">Delete</td>
							</tr>     
						<?php 
							endforeach;
						?> 
						</tbody>
					</table>
				</div><!-- col-md-12 -->
			</div><!-- class="row" -->
			<?php
				endif;
			?>
	
			<div class="row">
				<div class="col-md-12 text-center">
					<?php echo $this->pagination->create_links(); ?>
				</div>
			</div>

		</div><!-- container -->
		
		<div class="modal fade" id="drNumModal" role="dialog" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						<h4 class="modal-title">Delivery Receipt Number</h4>
					</div>
					<div class="modal-body">
						<?php echo form_open('index.php/truck/edit_DR', array('class' => 'form-inline', 'id' => 'updateForm', 'name' => 'updateForm')); ?>
							<div class="row">
								<div class="col-md-12">
									<table class="table table-bordered table-striped table-hover">
										<tr>
											<th id="lbl-drNum" class="success text-center col-md-3">DR No</th>
											<td>
												<div class="form-group" id="drNumDiv">
													<input id="drNum" name="drNum" class="form-control input-sm" title="DR No" type="text" maxlength="10" size="60" />
													<span id="drNumSpan" class="hidden glyphicon glyphicon-remove form-control-feedback" aria-hidden='true'></span>
												</div>
												<small class="text-muted" id="drNumSmall"></small>
											</td>
										</tr>
									</table>
								</div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary submit-button" onclick="handleUpdate();">Update</button>
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<hr>
					<p>© KKKGKC</p>
				</div>
			</div>
		</div>
		<script>
			function confirmDelete(drNum) {
				if (confirm("Are you sure you want to delete DR Number " + drNum + "?")) {
					window.location.href = "<?php echo base_url(); ?>index.php/truck/delete/"+drNum;
				}
			}
			
			function handleUpdate() {
				var drNum = document.updateForm.drNum.value;
				
				$(".submit-button").addClass("disabled");
				$.ajax({
					url: "<?php echo base_url(); ?>index.php/truck/edit_DR/"+drNum,
					type: "POST",
					data: {
						'drNum' : drNum
					},
					success: function(data) {
						console.log(data);
						
						if (data == "false") {
							$("#drNumDiv").addClass("has-error has-feedback");
							$("#drNum").val(drNum);
							$("#drNumSpan").removeClass("hidden");
							if (drNum == "") {
								$("#drNumSmall").text("The DR No field is required.");
							} else {
								$("#drNumSmall").text("The DR No field must contain only numbers.");
							}
						} else if (data == "exist") {
							$("#drNumDiv").addClass("has-error has-feedback");
							$("#drNum").val(drNum);
							$("#drNumSpan").removeClass("hidden");
							$("#drNumSmall").text("The DR No entered already exists in database.");
						} else if (data == "true") {
							alert("Successfully updated Delivery Receipt Number");
							$("#drNum").val("");
							$("#drNumDiv").removeClass("has-error has-feedback");
							$("#drNumSpan").addClass("hidden");
							$('#drNumModal').modal('hide');
						}
						
						$(".submit-button").removeClass("disabled");
					}
				});
			}
		</script>
	</body>
</html>