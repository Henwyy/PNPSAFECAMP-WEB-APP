<div class="page-body">
	<div class="container">
		<div class="section-title">
			<h3></h3>

			
				<font color='red'><span id="error_message"></span></font>  
	            <div class="row">
	            	<div class="col-md-3"></div>
	              <div class="col-md-6">
	                  <div class="form-group mb-3">
	                    <center>
	                      	<h1>REPORT SUBMITTED.</h1>
                  		</center>
	                      


	                  </div>
	                  
	          		 <center class="mt-5">
	          		 	<div class="mt-3 form-group col-md-6">
		          		 	<a href="<?=base_url()?>home">
		          		 	 	<button id="btn-submit-add-product" class="btn btn-primary col-md-12" >
					           		Back to Home
					          </button>
					      	</a>
	          			</div>
	          		 </center>
<!-- 				          <div class="form-group  col-md-6">
				          	<button id="" class="btn btn-secondary col-md-12" >
					            Cancel
					          </button>
				          </div> -->
	              </div>

	              <div class="col-md-3"></div>

	            </div>
			
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$('#home a').removeClass('nav-color');
		$('#home a').addClass('nav-active');
	});
</script>