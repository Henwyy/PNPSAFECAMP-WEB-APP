<div class="page-body">
	<div class="container">
		<div class="section-title">
			<h3>User Profile</h3>
		</div>
	</div>

	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-4"><a href="<?=base_url()?>account-management">Back to Accounts</a></div>
		<div class="col-md-3"></div>
		<div class="col-md-3"></div>
	</div>
	
	<div class="row">
        	<div class="col-md-3"></div>
          <div class="col-md-6">
          	<div class="form-group">
                <label for="image_path">Image Picture</label><br>
               <!--  <input type="file" 
                  class="form-control"
                  formControlName="image"  id="image" name="image" /> -->

                  <img src="<?php echo base_url() . 'assets/uploads/' . $result->image_path?>" width="200" height="200">
             </div>

              <div class="form-group">
                  <label for="fname">First Name</label>
                  <input type="text" class="form-control" formControlName="fname" id="fname" name="fname" value="<?= $result->first_name ?>" disabled />
              </div>

              <div class="form-group">
                  <label for="mname">Middle Name</label>
                  <input type="text" class="form-control" formControlName="mname" id="mname" name="mname" value="<?= $result->middle_name ?>" disabled />
              </div>

              <div class="form-group">
                  <label for="lname">Last Name</label>
                  <input type="text" class="form-control" formControlName="lname" id="lname" name="lname" value="<?= $result->last_name ?>" disabled />
              </div>

              <div class="form-group">
                  <label for="qualifier">Qualifier / Suffix</label>
                  <input type="text" class="form-control" formControlName="qualifier" id="qualifier" name="qualifier" value="<?= $result->qualifier ?>" disabled />
              </div>

              <div class="form-group">
                  <label for="gender">Gender</label>
                  <input type="text" class="form-control" formControlName="gender" id="gender" name="gender" value="<?= $result->gender ?>" disabled />
              </div>

              <div class="form-group">
                  <label for="birth_date">Birth Date</label>
                  <input type="date" class="form-control" formControlName="birth_date" id="birth_date" name="birth_date" value="<?= $result->birth_date ?>" disabled />
              </div>
  

              <div class="form-group">
                <label for="complete_address">Complete Address</label>
                <textarea class="form-control" formControlName="complete_address" id="complete_address" name="complete_address" disabled  ><?= $result->complete_address ?></textarea> 
              </div>

              <div class="form-group">
                  <label for="region">Region</label>
                  <input type="text" class="form-control" formControlName="region" id="region" name="region" value="<?= $result->region ?>" disabled />
              </div>

              <div class="form-group">
                  <label for="province">Province</label>
                  <input type="text" class="form-control" formControlName="province" id="province" name="province" value="<?= $result->province ?>" disabled />
              </div>

              <div class="form-group">
                  <label for="city">City</label>
                  <input type="text" class="form-control" formControlName="city" id="city" name="city" value="<?= $result->city ?>" disabled />
              </div>

              <div class="form-group">
                  <label for="vehicle_type">Vehicle Type</label>
                  <input type="text" class="form-control" formControlName="vehicle_type" id="vehicle_type" name="vehicle_type" value="<?= $result->vehicle_type ?>" disabled />
              </div>

              <div class="form-group">
                  <label for="vehicle_plate_number">Vehicle Plate Number</label>
                  <input type="text" class="form-control" formControlName="vehicle_plate_number" id="vehicle_plate_number" name="vehicle_plate_number" value="<?= $result->vehicle_plate_number ?>" disabled />
              </div>

              <div class="form-group">
                  <label for="identification_card">Identification Card</label>
                  <input type="text" class="form-control" formControlName="identification_card" id="identification_card" name="identification_card" placeholder="Drivers License #" value="<?= $result->identification_card ?>" disabled />
              </div>

              <div class="form-group">
                  <label for="identification_number">Identification Number</label>
                  <input type="text" class="form-control" formControlName="identification_number" id="identification_number" name="identification_number" value="<?= $result->identification_number ?>" disabled  />
              </div>

              <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" formControlName="email" id="email" name="email" value="<?= $result->email ?>" disabled />
              </div>

              <div class="form-group">
                  <label for="mobile_number">Mobile Number</label>
                  <input type="text" class="form-control" formControlName="mobile_number" id="mobile_number" name="mobile_number" placeholder="Mobile Number" value="<?= $result->mobile_number ?>" disabled />
              </div>

              <div class="form-group">
                  <label for="username">User Name</label>
                  <input type="text" class="form-control" formControlName="username" id="username" name="username" placeholder="Username" value="<?= $result->username ?>" disabled />
              </div>

              <div class="form-group">
                  <label for="username"></label>
                  <input type="text" class="form-control" formControlName="username" id="username" name="username" placeholder="Username" value="<?= $result->username ?>" disabled />
              </div>

          </div>

          <div class="col-md-3"></div>

        </div>
</div>


	

<script>
	var users;
	$(document).ready(function() {
		$('#account-management a').removeClass('nav-color');
		$('#account-management a').addClass('nav-active');
			users = $("#users").DataTable({
				ajax: {
					url: "<?=base_url()?>ajax/get-all-users",
					dataSrc: ''
				},
				responsive:true,
				// "order": [[ 5, "desc" ]],
				columns: [
				{ data: 'user_id'},
				{ data: 'username' },
				{ data: 'mobile_number' },
				{ data: 'email'},
				{ defaultContent: "<button class='btn btn-danger btn-sm btn-delete'>Delete</button>"
				
			}
				],
				columnDefs: [
					// { className: "hidden", "targets": [0]},
					// { className: "acct-name", "targets": [1]},
				]
		});



		$(document).on('click', '.btn-delete', function() {
			var id = $(this).closest('tr').find('td').eq(0).text();
			$.ajax({
                url: '<?=base_url()?>ajax/delete-account',
                type: 'POST',
                data: {
                	id: id,
                },
                success:function(data) {
                	$('#add-account-modal').modal('hide');
                	alert("Account Successfully Deleted!");
                	users.ajax.reload();
                }
            });
		});

	});
</script>