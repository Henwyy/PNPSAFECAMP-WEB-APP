<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PNP QR Code System | Login</title>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/layouts.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/standard.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/custom.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/category.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.2/b-colvis-1.5.2/b-flash-1.5.2/b-html5-1.5.2/b-print-1.5.2/r-2.2.2/datatables.min.css">

	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
	<script src="<?=base_url()?>assets/js/validate.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.2/b-colvis-1.5.2/b-flash-1.5.2/b-html5-1.5.2/b-print-1.5.2/r-2.2.2/datatables.min.js"></script>


	<style>


	</style>
</head>

<body>
	<div class="nav-top container-fluid">
		<div class="row" >
			<img class="nav-logo mx-3" src="<?=base_url()?>assets/img/logos/pnp_logo.png">
			<div class="col col-md-8 ">
				<div class="div-nav-heading" >
					<span class="nav-heading-top">
						PNP CAMP CRAME
					</span>
				</div>
				<div class="div-nav-heading" >
					<span class="nav-title">
						<b>QR CODE SYSTEM</b>
					</span>
				</div>

			</div>
		</div>

		<div class="row" >
			<div class="col col-md-8"> 

			</div>	
		</div>

	</div>
	<nav class="navbar navbar-expand-sm navbar-dark bg-custom">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarsExample03">
			<ul class="navbar-nav mr-auto">

			</ul>


<!-- 		<ul class="navbar-nav">	
			<li class="nav-item dropdown">
				<a class="nav-link nav-color dropdown-toggle nav-user" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<?= $this->session->userdata('username'); ?>
				</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="<?=base_url()?>change-password">Change Password</a>
					<a class="dropdown-item" href="<?=base_url()?>logout">Sign Out</a>
				</div>
			</li>
		</ul> -->
	</div>
</nav>

<div class="page-body">
	<div class="container">
		<div class="section-title">
			<center><h3>Purpose</h3></center>
			<center><h4>Reason for Entering Camp Crame (Please check all that applies)</h4></center>

			<form name="myForm" enctype="multipart/form-data" method="POST" class="mt-4" action="submit_purpose">
				<font color='red'><span id="error_message"></span></font>  
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-6">
						<div class="form-check">
						    <input type="checkbox" class="form-check-input" id="app_clearance" name="app_clearance">
						    <label class="form-check-label" for="app_clearance_onestop">Application for Clearance or License (One-Stop-Shop)</label>
						</div>

						<div class="form-check">
						    <input type="checkbox" class="form-check-input" id="app_ptcfor" name="app_ptcfor">
						    <label class="form-check-label" for="app_ptcfor">Application for PTCFOR</label>
						</div>

						<div class="form-check">
						    <input type="checkbox" class="form-check-input" id="drug_test" name="drug_test">
						    <label class="form-check-label" for="drug_test">Macro-etching/Drug Test Examination (Crime Lab)</label>
						</div>

						<div class="form-check">
						    <input type="checkbox" class="form-check-input" id="app_clearance_csg" name="app_clearance_csg">
						    <label class="form-check-label" for="app_clearance_csg">Application for Clearance or License (CSG/SOSIA/FEO Building)</label>
						</div>

						<div class="form-check">
						    <input type="checkbox" class="form-check-input" id="app_motor" name="app_motor">
						    <label class="form-check-label" for="app_motor">Application for Motor Vehicle Clearance (HPG)</label>
						</div>

						<div class="form-check">
						    <input type="checkbox" class="form-check-input" id="prbs" name="prbs">
						    <label class="form-check-label" for="prbs">Processing of Retirement Claims and Benefits (PRBS)</label>
						</div>

						<div class="form-check">
						    <input type="checkbox" class="form-check-input" id="medical" name="medical">
						    <label class="form-check-label" for="medical">Availing Medical Services or Visiting Patients in PNPGH and/or Dental Treatment at DOSC</label>
						</div>

						<div class="form-check">
						    <input type="checkbox" class="form-check-input" id="facilities" name="facilities">
						    <label class="form-check-label" for="facilities">Availing of PNP Facilities (Sport Center, Multi-purpose Center, Chapel, Transformation Oval, etc)</label>
						</div>

						<div class="form-check">
						    <input type="checkbox" class="form-check-input" id="complaint" name="complaint">
						    <label class="form-check-label" for="complaint">Filing of Complaint (PNP Operating units such as CIDG, ACG, WCPC, IAS, PCADG, etc)</label>
						</div>


						<div class="form-check">
						    <input type="checkbox" class="form-check-input" id="off_bus" name="off_bus">
						    <label class="form-check-label" for="off_bus">Official Business Meeting with PNP Personnel</label>
						</div>


						<div class="form-check">
						    <input type="checkbox" class="form-check-input" id="visit" name="visit">
						    <label class="form-check-label" for="visit">Visiting PNP Personnel on personal purpose</label>
						</div>

						<div class="form-check">
						    <input type="checkbox" class="form-check-input" id="seminar" name="seminar">
						    <label class="form-check-label" for="seminar">Attending training or seminar</label>
						</div>

						<div class="form-check">
						    <input type="checkbox" class="form-check-input" id="selling" name="selling">
						    <label class="form-check-label" for="selling">Selling Food and other Stuff</label>
						</div>

						<div class="form-group">
							<label for="others">Others: Please specify</label>
							<textarea class="form-control" formControlName="others" id="others" name="others"  ></textarea> 
						</div>						


	                  <div class="row">
	                  	<div class=" form-group col-md-6">
	                  		<button type="submit" id="btn-submit-add-product" class="btn btn-success col-md-12" >
	                  			Submit
	                  		</button>
	                  	</div>
	                  	<div class="form-group  col-md-6">
	                  		<button type="cancel" id="" class="btn btn-secondary col-md-12" >
	                  			Cancel
	                  		</button>
	                  	</div>
	                  </div>
	              </div>

	              <div class="col-md-3"></div>

	          </div>
	      </form>
	  </div>
	</div>
</div>


<footer class="footer">
	<div class="container text-center">
		<span class="footer-copyright">Copyright &copy; <?= date('Y') ?> PNP Camp Crame. All Rights Reserved.</span>
	</div>
</footer>

<script type="text/javascript">

	$(document).on('click', 'form button[type=submit]', function(e) {
	    var isValid = false;

	    var checkboxIds = [ 'app_clearance', 'app_ptcfor', 'drug_test', 'app_clearance_csg', 'app_motor', 'prbs', 'medical', 'facilities', 'complaint', 'off_bus', 'visit', 'seminar', 'selling' ];

	    checkboxIds.forEach(function checkIfChecked(id) {
	    	if( $('#' + id).prop('checked') ) {
	    		isValid = true;
	    	}
	    });

	    if( !isValid && $("#others").val().trim().length >= 1 ) {
	    	isValid = true;
	    }
   
	   if(!isValid) {
	      e.preventDefault(); //prevent the default action
	      alert('You have to choose atleast one reason/purpose for entering PNP Camp Crame.');
	    }
	});
</script>



</body>
</html>