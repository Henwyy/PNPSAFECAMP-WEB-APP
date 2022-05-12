<div class="page-body">
	<div class="container">
		<div class="container-fluid mt-4">

			<div class="row">
				<div class="col-lg-9 col-6">
				</div>

				<div class="col-lg-3 col-6">
					<div class="form-group">
						<label for="filter_date">Date</label>
						<input type="date" id="filter_date" name="filter_date" class="form-control" value="" />
					</div>
				</div>
			</div>

			<!-- Small boxes (Stat box) -->
			<div class="row">
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-info">
						<div class="inner">
							<h3 id="entry_walk_in">0</h3>

							<p>Entry Walk-In</p>
						</div>
						<div class="icon">
							<i class="fas fa-door-open"></i>
						</div>
						<p class="small-box-footer">&nbsp;</p>
						<!-- <a href="<?=base_url()?>order-management" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-success">
						<div class="inner">
							<h3 id="entry_vehicle">0</h3>

							<p>Entry with vehicle</p>
						</div>
						<div class="icon">
							<i class="fas fa-car"></i>
						</div>
						<p class="small-box-footer">&nbsp;</p>
						<!-- <a href="<?=base_url()?>admin-products" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-warning">
						<div class="inner">
							<h3 id="exit_walk_in">0</h3>

							<p>Exit Walk-In</p>
						</div>
						<div class="icon">
							<i class="fas fa-door-open"></i>
						</div>
						<p class="small-box-footer">&nbsp;</p>
					</div>
				</div>

				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-danger">
						<div class="inner">
							<h3 id="exit_vehicle">0</h3>

							<p>Exit with Vehicle</p>
						</div>
						<div class="icon">
							<i class="fas fa-car"></i>
						</div>
						<p class="small-box-footer">&nbsp;</p>
					</div>
				</div>
				<!-- ./col -->
				
			</div>
			<!-- /.row -->

			<!-- Second row --> 
			<div class="row">

				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-primary">
						<div class="inner">
							<h3 id="active_reports">0</h3>

							<p>Active Reports</p>
						</div>
						<div class="icon">
							<i class="fas fa-clipboard-list"></i>
						</div>
						<p class="small-box-footer">&nbsp;</p>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-default">
						<div class="inner">
							<h3 id="resolved_reports">0</h3>

							<p>Resolved Reports</p>
						</div>
						<div class="icon">
							<i class="fas fa-clipboard-check"></i>
						</div>
						<p class="small-box-footer">&nbsp;</p>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-secondary">
						<div class="inner">
							<h3 id="registered_users">0</h3>

							<p>Registered Users</p>
						</div>
						<div class="icon">
							<i class="fas fa-users"></i>
						</div>
						<p class="small-box-footer">&nbsp;</p>
					</div>
				</div>

				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-orange">
						<div class="inner">
							<h3 id="officers">0</h3>

							<p>Officer Accounts</p>
						</div>
						<div class="icon">
							<i class="fas fa-user-secret"></i>
						</div>
						<p class="small-box-footer">&nbsp;</p>
					</div>
				</div>
				<!-- ./col -->

			</div>

			<div class="card ">
	            <div class="card-header">
	              <h3 class="card-title">
	                <i class="fas fa-chart-pie mr-1"></i>
	                Purposes
	              </h3>
	              <div class="card-tools">
	              </div>
	            </div><!-- /.card-header -->
	            <div class="card-body">
	              <div class="tab-content p-0">
	                <!-- Morris chart - Sales -->
	                <div class="chart tab-pane active" id="revenue-chart"
	                     style="position: relative; height: auto;">
	                    <canvas id="myChart" style="max-height: 300px;" ></canvas>
	                 </div>
	              </div>
	            </div><!-- /.card-body -->
        	</div>

        	<div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                        	<h2><i class="fas fa-list-ol mr-1"></i>
                            Most Frequent Visited Building by Ranking</h2>
                            <ul class="header-dropdown m-r--5">
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>Building ID</th>
                                            <th>Building</th>
                                            <th>Visits</th>
                                        </tr>
                                    </thead>
                                    <tbody id="most_frequent_buildings">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->

            </div>

        <div class="row mb-5"></div>
        <div class="row mb-5"></div>
	</div>
</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
	$(document).ready(function() {
		$('#admin-home a').removeClass('nav-color');
		$('#admin-home a').addClass('nav-active');

		var d = new Date();
		var month = d.getMonth()+1;
		var day = d.getDate();

		var output = d.getFullYear() + '-' +
	    (month<10 ? '0' : '') + month + '-' +
	    (day<10 ? '0' : '') + day;

		$('#filter_date').val(output);

		setDashboard( $('#filter_date').val() ); 
		rankPurposes( $('#filter_date').val() );
		setMostFrequentBuildingsVisited( $('#filter_date').val() );


		$('#filter_date').on('change', function(e) {
			setDashboard( $('#filter_date').val() ); 
			rankPurposes($('#filter_date').val());
			setMostFrequentBuildingsVisited($('#filter_date').val());
		});

		const ctx = document.getElementById('myChart');
          const labels = [];
          const myChart = new Chart(ctx, {
            type: 'bar',
            data : {
                labels: labels,
                datasets: [{
                  label: '',
                  data: [],
                  backgroundColor: [
                    'rgb(0,191,255,1)',
                  ],
                  borderColor: [
                    'rgb(0,191,255)',
                  ],
                  borderWidth: 1
                }]
            }
          });


          

          function changeChart( color, label, data, labels ) {
              $('document').ready(function(){
                  myChart.data.datasets[0].backgroundColor = color;
                  myChart.data.datasets[0].borderColor = color;
                  myChart.data.datasets[0].label = label;
                  myChart.data.datasets[0].data = data;
                  myChart.data.labels = labels;
                  myChart.update();
              });
          }

          function rankPurposes(date) {
          	$.ajax({
                url: "<?=base_url()?>ajax/rank-purposes",
                type: 'GET',
                 data: { date: date },
                success: function (data) {
                  var result = JSON.parse(data);
                  console.log(result);
                  var data = [];
                  var labels = [];

                  for( var i = 0; i < result.length; i++ ) {
                      labels.push( result[i].purpose );
                      data.push( parseInt(result[i].total) );
                  }

                  console.log(data);
                  changeChart('rgb(0,191,255)', "Purposes", data, labels);
                }
             });
          }

          
	});



	function setDashboard( filter_date ) {
		$.ajax({
		    url: "<?=base_url()?>ajax/get-totals",
		    type: 'GET',
		    data: { date: filter_date },
		    success: function (data) {
		      var entry_walk_in = $('#entry_walk_in');
		      var entry_vehicle = $('#entry_vehicle');
		      var exit_walk_in = $('#exit_walk_in');
		      var exit_vehicle = $('#exit_vehicle');
		      var active_reports = $('#active_reports');
		      var resolved_reports = $('#resolved_reports');
		      var registered_users = $('#registered_users');
		      var officers = $('#officers');

		      var text = JSON.parse(data);
		      console.log(text);

		    entry_walk_in.text(text.entry_walk_in);
	        entry_vehicle.text(text.entry_vehicle);
	        exit_walk_in.text(text.exit_walk_in);
	        exit_vehicle.text(text.exit_vehicle);
	        active_reports.text(text.active_reports);
	        resolved_reports.text(text.resolved_reports);
	        registered_users.text(text.registered_users);
	        officers.text(text.officers);
		    }
		  });
	}

	function setMostFrequentBuildingsVisited( filter_date ) {
		$.ajax({
		    url: "<?=base_url()?>ajax/get-most-visited-buildings",
		    type: 'GET',
		    data: { date: filter_date },
		    success: function (data) {
		    	var most_frequent_buildings = $('#most_frequent_buildings');
		    	most_frequent_buildings.empty();
		      	if( data ) {
		      		var result = JSON.parse(data);
			      	console.log(result);
			      	$.each(result, function (val, text) {
			        	most_frequent_buildings.append('<tr><td>'+text.building_id+'</td><td>'+text.building_name+'</td><td>'+text.total+'</td></tr>');
			      	});

			      	if( result.length == 0 ) {
			      		most_frequent_buildings.append('<tr><td>&nbsp;</td><td>No data found for date</td><td>&nbsp;</td></tr>');
			      	}
		      	}
		    }
		  });
	}
</script>