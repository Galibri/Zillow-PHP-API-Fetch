<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title>API Service</title>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/style.css">
	</head>

	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="/apitest">API Service</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
			 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="/apitest">Home</a>
					</li>
				</ul>
			</div>
		</nav>
		<div class="container mt-5 form-show">
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<div class="card">
						<div class="card-body">
							<div class="form-group">
								<input type="text" name="address" id="address" class="form-control" placeholder="Address">
								<span class="address-error"></span>
							</div>
							<div class="form-group">
								<input type="text" name="city" id="city" class="form-control" placeholder="City">
								<span class="city-error"></span>
							</div>
							<div class="form-group">
								<input type="text" name="state" id="state" class="form-control" placeholder="State">
							</div>
							<div class="form-group">
								<input type="text" name="zip" id="zip" class="form-control" placeholder="Zip">
							</div>
							<button class="btn btn-block btn-info" id="submitBtn">Find</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container loading mt-5">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h3>Please wait...</h3>
					<h3>Processing your data...</h3>
				</div>
			</div>
		</div>
		<div class="container my-5 data-show">
			<div class="row mt-3">
				<div class="col-lg-12 text-center">
					<a href="/apitest" class="btn btn-info"> <i class="fa fa-arrow-left"></i> Back to Search</a>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
				<h1 class="text-center prop-id">Property ID: <span class="property-id"></span></h1>
					<h2>Details</h2>
					<table class="table table-striped table-sm">
						<tbody>
							<tr><td>Full Address of Property <span class="full-address"></span></td></tr>
							<tr><td>Street Address <span class="street-address"></span></td></tr></tr>
							<tr><td>City <span class="city"></span></td></tr>
							<tr><td>State <span class="state"></span></td></tr>
							<tr><td>Zip Code <span class="zip"></span></td></tr>
							<tr><td>Latitude <span class="latitude"></span></td></tr>
							<tr><td>Longitude <span class="longitude"></span></td></tr>
							<tr><td>Estimated market value (USD) <span class="zestimate"></span></td></tr>
							<tr><td>Monthly Rent (USD) <span class="rent-zestimate"></span></td></tr>
						</tbody>
					</table>
					<h2>Facts and Features</h2>
					<table class="table table-striped table-sm">
						<tbody>
							<tr><td>Type <span class="type"></span></td></tr>
							<tr><td>Year Built <span class="year-built"></span></td></tr>
							<tr><td>Lot (sqft) <span class="lot-sqft"></span></td></tr>
						</tbody>
					</table>
					<h2>Interior Features</h2>
					<table class="table table-striped table-sm">
						<tbody>
							<tr><td>Bedrooms <span class="bedrooms"></span></td></tr>
							<tr><td>Bathrooms <span class="bathrooms"></span></td></tr>
							<tr><td>Flooring (sqft) <span class="flooring"></span></td></tr>
						</tbody>
					</table>
					<h2>TAX Info</h2>
					<table class="table table-striped table-sm">
						<tbody>
							<tr><td>Tax Assessment Value <span class="tax-val"></span></td></tr>
							<tr><td>Tax Assessment Year <span class="tax-year"></span></td></tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="row mt-3">
				<div class="col-lg-12 text-center">
					<a href="/apitest" class="btn btn-info"> <i class="fa fa-arrow-left"></i> Back to Search</a>
				</div>
			</div>
		</div>

		<script src="assets/js/jquery-1.12.4.min.js"></script>
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/custom.js"></script>
	</body>

</html>