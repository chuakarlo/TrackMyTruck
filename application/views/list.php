<!DOCTYPE html>
<html lang="ja">
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
					<a class="navbar-brand" href="#"><span class="glyphicon glyphicon-user"></span>Track My Truck</a>
				</div>
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

		<?php echo form_open('index.php/trucklist/create', array('class' => 'form-inline', 'id' => 'searchForm')); ?>
			<div class="row">
				<div class="col-md-12">
					<table class="table table-bordered table-hover table-striped">
						<tr>
							<th id="lbl-search-truckNum" class="success text-center col-md-3">Truck Plate No</th>
							<td>
								<input id="search-truckNum" tabindex="1" name="search-truckNum" class="form-control input-sm" title="Truck Plate No." type="text" maxlength="10" size="60" />
							</td>
						</tr>
						<tr>
							<th id="lbl-search-commodity" class="success text-center">Load / Commodity</th>
							<td>
								<select id="search-commodity" tabindex="2" name="search-commodity" class="form-control input-sm" title="Load / Commodity">
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
							<th id="lbl-search-soldTo" class="success text-center">Sold To</th>
							<td>
								<input id="search-soldTo" tabindex="3" name="search-soldTo" class="form-control input-sm" title="Sold To" type="text" size="60" />
							</td>
						</tr>
						<tr>
							<th id="lbl-search-driver" class="success text-center">Driver</th>
							<td>
								<input id="search-driver" tabindex="4" name="search-driver" class="form-control input-sm" title="Driver" type="text" size="60" />
							</td>
						</tr>
						<tr>
							<th id="lbl-search-drNum" class="success text-center">DR No.</th>
							<td>
								<input id="search-drNum" tabindex="5" name="search-drNum" class="form-control input-sm" title="DR No." type="text" size="60" />
							</td>
						</tr>
					</table>

					<div class="row">
						<div class="col-md-12 text-right">
							<button id="btn-search" type="button" class="btn btn-primary" tabindex="6" name="search" onclick="displaySearchDetails();">Search</button>
							<a id="btn-register" class="btn btn-primary" tabindex="7" name="register" href="<?php echo base_url(); ?>index.php/register">New Entry</a>
						</div><!-- col-md-4 -->
					</div><!-- class="row" -->
				</div>
			</div><!-- class="row" -->
		</form>

			<div class="row">
				<div class="col-md-12 searchDetails hidden text-center">
					 <ul class="pagination">
					  <li id="lbl-page-1_1" class="active" tabindex="10"><a>1</a></li>
					  <li id="lbl-page-2_1"><a href="#">2</a></li>
					  <li id="lbl-page-3_1"><a href="#">3</a></li>
					  <li id="lbl-page-4_1"><a href="#">4</a></li>
					  <li id="lbl-page-..._1"><a href="#">...</a></li>
					  <li id="lbl-page-32_1"><a href="#">32</a></li>
					  <li id="lbl-page-33_1"><a href="#">33</a></li>
					  <li id="lbl-page-Next_1"><a href="#">Next</a></li>
					 </ul>
				</div><!-- col-md-12 -->
			</div><!-- class="row" -->

			<div class="row searchDetails hidden">
				<div class="col-md-12 form-inline">
					<table class="table table-bordered table-striped table-hover">
						<thead>
							<tr class="success">
								<th id="lbl-drNum" class="text-center">DR No</th>
								<th id="lbl-truckNum" class="text-center">Truck No / Plate No</th>
								<th id="lbl-commodity" class="text-center">Load/Commodity</th>
								<th id="lbl-destination" class="text-center">Destination</th>
								<th id="lbl-soldTo" class="text-center">Sold to</th>
								<th id="lbl-volume" class="text-center">Volume</th>
								<th id="lbl-driver" class="text-center">Driver</th>
								<th id="lbl-remarks" class="text-center">Remarks</th>
							</tr>
						</thead>
						<tbody>
							<tr  class="text-center">
								<td id="itemNum_1">123456</td>
								<td id="edit_1">GPR 675</td>
								<td id="delete_1">Washed Sands</td>
								<td id="stockCode_1">Cebu City</td>
								<td id="custCode_1">John Doe</td>
								<td id="startDate_1">300 m<sup>3</sup></td>
								<td id="endDate_1">John Doe</td>
								<td id="lendingRate_1">Delivered</td>
							</tr>
							<tr  class="text-center">
								<td id="itemNum_1">123456</td>
								<td id="edit_1">GPR 675</td>
								<td id="delete_1">Washed Sands</td>
								<td id="stockCode_1">Cebu City</td>
								<td id="custCode_1">John Doe</td>
								<td id="startDate_1">300 m<sup>3</sup></td>
								<td id="endDate_1">John Doe</td>
								<td id="lendingRate_1">Delivered</td>
							</tr>
							<tr  class="text-center">
								<td id="itemNum_1">123456</td>
								<td id="edit_1">GPR 675</td>
								<td id="delete_1">Washed Sands</td>
								<td id="stockCode_1">Cebu City</td>
								<td id="custCode_1">John Doe</td>
								<td id="startDate_1">300 m<sup>3</sup></td>
								<td id="endDate_1">John Doe</td>
								<td id="lendingRate_1">Delivered</td>
							</tr>
							<tr  class="text-center">
								<td id="itemNum_1">123456</td>
								<td id="edit_1">GPR 675</td>
								<td id="delete_1">Washed Sands</td>
								<td id="stockCode_1">Cebu City</td>
								<td id="custCode_1">John Doe</td>
								<td id="startDate_1">300 m<sup>3</sup></td>
								<td id="endDate_1">John Doe</td>
								<td id="lendingRate_1">Delivered</td>
							</tr>
							<tr  class="text-center">
								<td id="itemNum_1">123456</td>
								<td id="edit_1">GPR 675</td>
								<td id="delete_1">Washed Sands</td>
								<td id="stockCode_1">Cebu City</td>
								<td id="custCode_1">John Doe</td>
								<td id="startDate_1">300 m<sup>3</sup></td>
								<td id="endDate_1">John Doe</td>
								<td id="lendingRate_1">Delivered</td>
							</tr>
							<tr  class="text-center">
								<td id="itemNum_1">123456</td>
								<td id="edit_1">GPR 675</td>
								<td id="delete_1">Washed Sands</td>
								<td id="stockCode_1">Cebu City</td>
								<td id="custCode_1">John Doe</td>
								<td id="startDate_1">300 m<sup>3</sup></td>
								<td id="endDate_1">John Doe</td>
								<td id="lendingRate_1">Delivered</td>
							</tr>
							<tr  class="text-center">
								<td id="itemNum_1">123456</td>
								<td id="edit_1">GPR 675</td>
								<td id="delete_1">Washed Sands</td>
								<td id="stockCode_1">Cebu City</td>
								<td id="custCode_1">John Doe</td>
								<td id="startDate_1">300 m<sup>3</sup></td>
								<td id="endDate_1">John Doe</td>
								<td id="lendingRate_1">Delivered</td>
							</tr>
							<tr  class="text-center">
								<td id="itemNum_1">123456</td>
								<td id="edit_1">GPR 675</td>
								<td id="delete_1">Washed Sands</td>
								<td id="stockCode_1">Cebu City</td>
								<td id="custCode_1">John Doe</td>
								<td id="startDate_1">300 m<sup>3</sup></td>
								<td id="endDate_1">John Doe</td>
								<td id="lendingRate_1">Delivered</td>
							</tr>
							<tr  class="text-center">
								<td id="itemNum_1">123456</td>
								<td id="edit_1">GPR 675</td>
								<td id="delete_1">Washed Sands</td>
								<td id="stockCode_1">Cebu City</td>
								<td id="custCode_1">John Doe</td>
								<td id="startDate_1">300 m<sup>3</sup></td>
								<td id="endDate_1">John Doe</td>
								<td id="lendingRate_1">Delivered</td>
							</tr>
							<tr  class="text-center">
								<td id="itemNum_1">123456</td>
								<td id="edit_1">GPR 675</td>
								<td id="delete_1">Washed Sands</td>
								<td id="stockCode_1">Cebu City</td>
								<td id="custCode_1">John Doe</td>
								<td id="startDate_1">300 m<sup>3</sup></td>
								<td id="endDate_1">John Doe</td>
								<td id="lendingRate_1">Delivered</td>
							</tr>
						</tbody>
					</table>
				</div><!-- col-md-12 -->
			</div><!-- class="row" -->
	
			<div class="row">
				<div class="col-md-12 text-center searchDetails hidden">
					 <ul class="pagination">
					  <li id="lbl-page-1_2" class="active" tabindex="10"><a>1</a></li>
					  <li id="lbl-page-2_2"><a href="#">2</a></li>
					  <li id="lbl-page-3_2"><a href="#">3</a></li>
					  <li id="lbl-page-4_2"><a href="#">4</a></li>
					  <li id="lbl-page-..._2"><a href="#">...</a></li>
					  <li id="lbl-page-32_2"><a href="#">32</a></li>
					  <li id="lbl-page-33_2"><a href="#">33</a></li>
					  <li id="lbl-page-Next_2"><a href="#">Next</a></li>
					 </ul>
				</div><!-- col-md-12 -->
			</div><!-- class="row" -->

		</div><!-- container -->

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<hr>
					<p>© KKKGKC</p>
				</div>
			</div>
		</div>
		<script>
			function displaySearchDetails(){
				$(".searchDetails").removeClass('hidden');
			}
		</script>
	</body>
</html>