<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PNP QR Code System | Login</title>
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/layouts.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/standard.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/custom.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/category.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.2/b-colvis-1.5.2/b-flash-1.5.2/b-html5-1.5.2/b-print-1.5.2/r-2.2.2/datatables.min.css">

  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>assets/js/validate.js"></script>
  <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.2/b-colvis-1.5.2/b-flash-1.5.2/b-html5-1.5.2/b-print-1.5.2/r-2.2.2/datatables.min.js"></script>

  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <style>


  </style>
</head>

<body>
  <div class="nav-top container-fluid">
    <div class="row">
      <img class="nav-logo mx-3" src="<?= base_url() ?>assets/img/logos/pnp_logo.png">
      <div class="col col-md-8 ">
        <div class="div-nav-heading">
          <span class="nav-heading-top">
            PNP CAMP CRAME
          </span>
        </div>
        <div class="div-nav-heading">
          <span class="nav-title">
            <b>QR CODE SYSTEM</b>
          </span>
        </div>

      </div>
    </div>

    <div class="row">
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
					<a class="dropdown-item" href="<?= base_url() ?>change-password">Change Password</a>
					<a class="dropdown-item" href="<?= base_url() ?>logout">Sign Out</a>
				</div>
			</li>
		</ul> -->
    </div>
  </nav>

  <div class="page-body">
    <div class="container">
      <div class="section-title">
        <h3>Sign Up</h3>

        <form name="regForm" id="regForm" enctype="multipart/form-data" method="POST" action="register">
          <font color='red'><span id="error_message"></span></font>
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="fname">First Name</label>
                <input type="text" class="form-control" formControlName="fname" id="fname" name="fname" />
              </div>

              <div class="form-group">
                <label for="mname">Middle Name</label>
                <input type="text" class="form-control" formControlName="mname" id="mname" name="mname" />
              </div>

              <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text" class="form-control" formControlName="lname" id="lname" name="lname" required />
              </div>

              <div class="form-group">
                <label for="qualifier">Qualifier / Suffix</label>
                <input type="text" class="form-control" formControlName="qualifier" id="qualifier" name="qualifier" />
              </div>

              <div class="form-group">
                <label for="gender">Gender</label><br>&nbsp;
                <input type="radio" id="male" name="gender" value="Male">
                  <label for="male">Male</label><br>
                  <input type="radio" id="female" name="gender" value="Female">
                  <label for="female">Female</label>
              </div>

              <div class="form-group">
                <label for="birth_date">Birth Date</label>
                <input type="date" class="form-control" formControlName="birth_date" id="birth_date" name="birth_date" required />
              </div>


              <div class="form-group">
                <label for="complete_address">Complete Address</label>
                <textarea class="form-control" formControlName="complete_address" id="complete_address" name="complete_address" required></textarea>
              </div>

              <div class="form-group">
                <label for="region">Region</label>
                <select id="region" class="form-control" formControlName="region" name="region" required></select>
              </div>

              <div class="form-group">
                <label for="province">Province/City</label>
                <select id="province" class="form-control" formControlName="province" name="province" required></select>
              </div>

              <div class="form-group">
                <label for="city">City/Municapility</label>
                <!-- <input type="text" class="form-control" formControlName="city" id="city" name="city" /> -->
                <select class="form-control" formControlName="city" id="city" name="city" required></select>
              </div>

              <div class="form-group">
                <label for="vehicle_type">Vehicle Type</label>
                <select class="form-control" formControlName="vehicle_type" id="vehicle_type" name="vehicle_type">
                  <option value="N/A">N/A</option>
                  <option value="Motorcycle">Motorcycle</option>
                  <option value="Micro">Micro</option>
                  <option value="Sedan">Sedan</option>
                  <option value="CUV">CUV</option>
                  <option value="SUV">SUV</option>
                  <option value="Hatchback">Hatchback</option>
                  <option value="Roadster">Roadster</option>
                  <option value="Pickup">Pickup</option>
                  <option value="Van">Van</option>
                  <option value="Coupe">Coupe</option>
                  <option value="Supercar">Supercar</option>
                  <option value="Campervan">Campervan</option>
                  <option value="Cabriolet">Cabriolet</option>
                  <option value="Minivan">Minivan</option>
                  <option value="Truck">Truck</option>
                  <option value="Big Truck">Big Truck</option>
                </select>
              </div>

              <div class="form-group">
                <label for="vehicle_plate_number">Vehicle Plate Number</label>
                <input type="text" class="form-control" formControlName="vehicle_plate_number" id="vehicle_plate_number" name="vehicle_plate_number" disabled />
              </div>

              <div class="form-group">
                <label for="image_path">Picture (Selfie)</label>
                <!--  <input type="file" 
	                      class="form-control"
	                      formControlName="image"  id="image" name="image" /> -->

                <input type="file" class="form-control" formControlName="image_path" id="image_path" name="image_path" accept="image/png, image/gif, image/jpeg" onchange="validateImageType(this)" required />
              </div>
              <div x-data="{ card: '' }">
                <div class="form-group">
                  <label for="identification_card">Identification Card</label>
                  <select x-model="card" class="form-control" formControlName="identification_card" id="identification_card" name="identification_card">
                    <option value="" disabled selected>Select Identification Card</option>
                    <option value="Driver's License">Driver's License</option>
                    <option value="Passport">Passport</option>
                    <option value="Company ID">Company ID</option>
                    <option value="Any valid form of Government ID">Any valid form of Government ID</option>
                  </select>
                </div>

                <div x-show="card === 'Company ID'" class="form-group">
                  <label for="company_name">Company Name</label>
                  <input type="text" class="form-control" formControlName="company_name" id="company_name" name="company_name" />
                </div>
                <div x-show="card !== ''" class="form-group">
                  <label for="identification_number" x-text="card === 'Any valid form of Government ID'? 'Government ID number' :  card + ' Number'"></label>
                  <input type="text" class="form-control" formControlName="identification_number" id="identification_number" name="identification_number" />
                </div>

              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" formControlName="email" id="email" name="email" required />
              </div>

              <div class="form-group">
                <label for="mobile_number">Mobile Number</label>
                <input type="text" class="form-control" formControlName="mobile_number" id="mobile_number" name="mobile_number" placeholder="Mobile Number" required />
              </div>

              <div class="form-group">
                <label for="username">User Name</label>
                <input type="text" class="form-control" formControlName="username" id="username" name="username" placeholder="Username" required />
              </div>

              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" formControlName="password" id="password" name="password" placeholder="Password" required />
              </div>

              <div class="form-group">
                <label for="cpassword">Confirm Password</label>
                <input type="password" class="form-control" formControlName="cpassword" id="cpassword" name="cpassword" placeholder="Confirm Password" required />
              </div>

              <div class="form-group">
                <ul>
                  <li>Minimum 8 characters, maximum 20 characters</li>
                  <li>Should have at least 1 number</li>
                  <li>Should have at least 1 lower case character</li>
                  <li>Should have at least upper case character</li>
                </ul>
              </div>

              <div class="custom-control custom-checkbox mb-4">
                <input type="checkbox" class="custom-control-input" id="agree" name="agree" checked="">
                <label class="custom-control-label" for="agree">I Agree with <a href="#" data-toggle="modal" data-target="#exampleModalLong">Data Privacy Statement</a> </label>
              </div>
              <!-- Modal -->
              <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">I Agree with Data Privacy Statement</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body" style="width: 100%;">
                      <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="<?= base_url() ?>/assets/docs/DATA-PRIVACY-STATEMENT.html" allowfullscreen></iframe>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class=" form-group col-md-6">
                  <button type="submit" id="btn-submit-add-product" class="btn btn-success col-md-12">
                    Submit
                  </button>
                </div>
                <div class="form-group  col-md-6">
                  <button type="cancel" id="" class="btn btn-secondary col-md-12">
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

  <script src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations-v1.0.0.js"></script>

  <script>
    $(document).ready(function() {
      $('#home a').removeClass('nav-color');
      $('#home a').addClass('nav-active');

      $('#vehicle_type').on('change', function() {
        if ("N/A" === this.value) {
          $("#vehicle_plate_number").prop("disabled", true);
          $("#vehicle_plate_number").val('');
        } else {
          $("#vehicle_plate_number").prop("disabled", false);
        }
      });
    });
  </script>

  <script type="text/javascript">
    // $(function() {
    //        $("#regform").validate({
    //            rules: {
    //                fname: {
    //                    required: true
    //                },
    //                lname: {
    //                    required: true
    //                },
    //                gender: {
    //                    required: true
    //                },
    //                complete_address: {
    //                    required: true
    //                },
    //                region: {
    //                    required: true
    //                },
    //                province: {
    //                    required: true
    //                },
    //                city: {
    //                    required: true
    //                },
    //                vehicle_type: {
    //                    required: true
    //                },
    //                image_path: {
    //                    required: true
    //                },
    //                mobile_number: {
    //                    required: true
    //                },
    //                username: {
    //                    required: true
    //                },
    //                password: {
    //                    required: true,
    //                    pwcheck: true,
    //                    minlength: 8,
    //                    maxlength: 20
    //                },
    //                cpassword: {
    //                    required: true,
    //                    equalTo: "#password"
    //                },
    //                email: {
    //                    required: true,
    //                    email: true
    //                }
    //            },
    //            messages: {
    //                forename: {
    //                    required: "First name required"
    //                },
    //                lname: {
    //                    required: "Last name required"
    //                },
    //                gender: {
    //                    required: "gender required"
    //                },
    //                complete_address: {
    //                    required: "complete address required"
    //                },
    //                region: {
    //                    required: "region required"
    //                },
    //                province: {
    //                    required: "province required"
    //                },
    //                city: {
    //                    required: "city required"
    //                },
    //                vehicle_type: {
    //                    required: "vehicle type required"
    //                },
    //                image_path: {
    //                    required: "image required"
    //                },
    //                mobile_number: {
    //                    required: "mobile number required"
    //                },
    //                username: {
    //                    required: "username required"
    //                },
    //                password: {
    //                    required: "Passwort required",
    //                    pwcheck: "Password check!",
    //                    minlength: "Password should be 8 characters!",
    //                    maxlength: "Password should be 20 characters!"
    //                },
    //                cpassword: {
    //                    required: "Confirm password is required",
    //                    equalTo: "Password and confirm password are not equal!"
    //                },
    //                email: {
    //                    required: "Email address is required",
    //                    email: "Email format not valid"
    //                }
    //            }
    //        });

    //        $.validator.addMethod("pwcheck",
    //            function(value, element) {
    //                return /^[A-Za-z0-9\d=!\-@._*]+$/.test(value);
    //        });
    //    });

    $(document).on('click', 'form button[type=submit]', function(e) {
      var password = $('#password').val();
      var confirmPassword = $('#cpassword').val();
      var valid = true;
      var fields = ['fname', 'lname', 'birth_date', 'complete_address', 'province', 'vehicle_type', 'identification_card', 'identification_number', 'email', 'mobile_number', 'username', 'password'];
      var fieldsValid = true;

      fields.forEach(function(field) {
        if (!$('#' + field).val()) {
          fieldsValid = false;
          alert(field + ' is required.');
        }
      });

      if (!$('input:radio[name=gender]').is(':checked')) {
        fieldsValid = false;
        alert('Gender is required.');
      }

      if ($('#image_path').get(0).files.length == 0) {
        fieldsValid = false;
        alert('Selfie image is required.');
      }

      if (!isPasswordValid(password)) {
        alert('Password is not valid! It should have atleast 1 number, 1 uppercase character and 1 lowercase character.');
        valid = false;
      }

      if (password.length < 8) {
        alert('Password is not valid! It should be 8 characters long at minimum.');
        valid = false;
      }

      if (password.length > 20) {
        alert('Password is not valid! It should be 20 characters long at max.');
        valid = false;
      }

      if (password !== confirmPassword) {
        alert('Password and confirm password should match!');
        valid = false;
      }



      if (!valid || !fieldsValid) {
        e.preventDefault(); //prevent the default action
      }


    });


    function isPasswordValid(value) {
      return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
        &&
        /[a-z]/.test(value) // has a lowercase letter
        &&
        /[A-Z]/.test(value) // has a lowercase letter
        &&
        /\d/.test(value) // has a digit
    }



    function validateImageType(file) {
      var fileName = file.value;
      var idxDot = fileName.lastIndexOf(".") + 1;
      var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
      if (extFile == "jpg" || extFile == "jpeg" || extFile == "png" || extFile == "gif") {

      } else {
        clearInputFile(file);
        alert("Only jpg/jpeg, png and gif files are allowed!");

      }
    }

    function clearInputFile(f) {
      if (f.value) {
        try {
          f.value = ''; //for IE11, latest Chrome/Firefox/Opera...
        } catch (err) {}
        if (f.value) { //for IE5 ~ IE10
          var form = document.createElement('form'),
            ref = f.nextSibling;
          form.appendChild(f);
          form.reset();
          ref.parentNode.insertBefore(f, ref);
        }
      }
    }

    var my_handlers = {

      fill_provinces: function() {

        var region_code = $(this).val();
        $('#province').ph_locations('fetch_list', [{
          "region_code": region_code
        }]);

      },

      fill_cities: function() {

        var province_code = $(this).val();
        $('#city').ph_locations('fetch_list', [{
          "province_code": province_code
        }]);
      },

    };

    $(function() {
      $('#region').on('change', my_handlers.fill_provinces);
      $('#province').on('change', my_handlers.fill_cities);
      $('#city').on('change', my_handlers.fill_barangays);

      $('#province').on('change', function() {
        if ($('#province option:selected').text() === 'CITY OF MANILA') {
          $('#city').empty();
        }

        // $('#province').val( $('#province option:selected').text() );
      });

      $('#region').ph_locations({
        'location_type': 'regions'
      });
      $('#province').ph_locations({
        'location_type': 'provinces'
      });
      $('#city').ph_locations({
        'location_type': 'cities'
      });

      $('#region').ph_locations('fetch_list');
    });
  </script>




  <footer class="footer">
    <div class="container text-center">
      <span class="footer-copyright">Copyright &copy; <?= date('Y') ?> PNP Camp Crame. All Rights Reserved.</span>
    </div>
  </footer>

  <?php if ($this->session->userdata('position_Id') == 1) {  ?>
    <script>
    </script>
  <?php } ?>


</body>

</html>