<div class="page-body">
	<div class="container">
		<div class="section-title">
			<h3></h3>

			
				<font color='red'><span id="error_message"></span></font>  
	            <div class="row">
	            	<div class="col-md-3"></div>
	              	<div class="col-md-6">
	              		<div class="">
	              			<center><h2>CIVILIAN REPORT</h2></center>
	              		</div>
	              		<form name="myForm" enctype="multipart/form-data" method="POST" action="submit-report">
			                  <div class="form-group">
			                      <label for="fname">Subject</label>
			                      <input type="text" class="form-control" formControlName="subject" id="subject" name="subject"  placeholder="-n/a-" required />
			                  </div>
			                  <div class="form-group">
			                      <label for="mname">Description</label>
			                      <textarea class="form-control" formControlName="description" id="description" name="description" rows="7"  required ></textarea> 
			                  </div>

			                  <div class="row">
			                  	<div class="form-group  col-md-4"></div>
						          <div class="form-group  col-md-4">
						          	<a href="<?=base_url()?>home" class="btn btn-secondary col-md-12">
				          		 	 	Back
							      	</a>
						          </div>
						          <div class=" form-group col-md-4">
				          		 	<button id="btn-submit-report" class="btn btn-success col-md-12" >
							            Submit
							          </button>
				          		 </div>
					          </div>
			            </form>
	            	</div>
	            	<div class="col-md-3"></div>
			
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$('#home a').removeClass('nav-color');
		$('#home a').addClass('nav-active');
	});
</script>