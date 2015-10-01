<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title><?php echo $title; ?></title>
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
					<a class="navbar-brand" href="#"><span class="glyphicon glyphicon-user"></span>Track My Truck</a>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h3>Register Truck Information</h3>
				</div><!-- col-md-6 -->
				<div class="col-md-6 text-right">
				</div><!-- col-md-6 -->
			</div><!-- class="row" -->

			<?php echo form_open('index.php/trucklist/create', array('class' => 'form-inline', 'id' => 'inputForm')); ?>
				<div class="row">
					<div class="col-md-12">
						<table class="table table-bordered table-striped table-hover">
							<tr>
								<th id="lbl-truckNum" class="success text-center col-md-3">Truck Plate No</th>
								<td>
									<input id="truckNum" tabindex="1" name="truckNum" class="form-control input-sm" title="Truck Plate No" type="text" maxlength="10" size="60" />
								</td>
							</tr>
							<tr>
								<th id="lbl-commodity" class="success text-center">Load / Commodity</th>
								<td>
									<select id="commodity" tabindex="2" name="commodity" class="form-control input-sm" title="Load / Commodity">
										<option value="">Select</option>
										<option>Sand and Gravel (Processed)</option>
										<option>Sand and Gravel (Unprocessed)</option>
										<option>Dolamite</option>
										<option>Guano</option>
										<option>Limestone</option>
										<option>Phosphate</option>
										<option>Silica</option>
									</select>
								</td>
							</tr>
							<tr>
								<th id="lbl-soldTo" class="success text-center">Sold To</th>
								<td>
									<input id="soldTo" tabindex="3" name="soldTo" class="form-control input-sm" title="Sold To" type="text" maxlength="50" size="60" />
								</td>
							</tr>
							<tr>
								<th id="lbl-destination" class="success text-center">Destination</th>
								<td>
									<span id="lbl-startDest" for="startDest">FROM</span>
									<input id="startDest" tabindex="4" name="startDest" class="form-control input-sm" title="Starting Point" type="text" value="" maxlength="25" size="15"/>
									<span style="padding:20px">~</span>
									<span id="lbl-endDest" for="endDest">TO</span>
									<input id="endDest" tabindex="5" name="endDest" class="form-control input-sm" title="End Point" type="text" value="" maxlength="25" size="15"/>
								</td>
							</tr>
							<tr>
								<th id="lbl-volume" class="success text-center">Volume (Cubic Meter)</th>
								<td>
									<input id="volume" tabindex="6" name="volume" class="form-control input-sm" title="Volume (in Cubic Meter)" type="text" size="60" />
								</td>
							</tr>
							<tr>
								<th id="lbl-driver" class="success text-center">Driver</th>
								<td>
									<input id="driver" tabindex="7" name="driver" class="form-control input-sm" title="Driver" type="text" size="60" />
								</td>
							</tr>
							<tr>
								<th id="lbl-drNum" class="success text-center">DR No</th>
								<td>
									<input id="drNum" tabindex="8" name="drNum" class="form-control input-sm" title="DR No" type="text" size="60" />
								</td>
							</tr>
							<tr>
								<th id="lbl-remarks" class="success text-center">Remarks</th>
								<td>
									<textarea id="remarks" tabindex="9" name="remarks" class="form-control input-sm" title="Remarks" type="text" size="100" rows="3"></textarea>
								</td>
							</tr>
						</table>
					</div>
				</div><!-- class="row" -->

				<div class="row text-right">
					<div class="col-md-12">
						<button id="btn-confirm" type="submit" class="btn btn-primary" name="confirm">Create</button>
						<a id="btn-cancel" class="btn btn-primary" name="cancel" href="<?php echo base_url(); ?>">Cancel</a>
					</div>
				</div><!-- class="row" -->
			</form>

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<hr>
					<p><?php echo $copyright; ?></p>
				</div>
			</div>
		</div>
		<script>
			$(function() {
				for(i = 1; i <= 10; i++) {
					var startDate = "#startDate_" + i;
					var endDate = "#endDate_" + i;

					$(startDate).datepicker();
					$(endDate).datepicker();
				}
			});
		</script>
	</body>
</html>