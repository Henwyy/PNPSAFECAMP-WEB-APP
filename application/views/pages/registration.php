<div class="page-body">
	<div class="container">
		<div class="section-title">
			<h3>User Registrations</h3>
		</div>
		<div class="section-body">
			<table id="accounts" class="table table-hover dt-responsive" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Account ID #</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Middle Name</th>
						<th>Qualifier</th>
						<th>Birthdate</th>
						<th>Complete Address</th>
						<th>Vehicle Type</th>
						<th>Plate #</th>
						<th>IC</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Account ID #</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Middle Name</th>
						<th>Qualifier</th>
						<th>Birthdate</th>
						<th>Complete Address</th>
						<th>Vehicle Type</th>
						<th>Plate #</th>
						<th>IC</th>
					</tr>
				</tfoot>
			</table>

		</div>
	</div>
</div>


<script>
	var accounts;
	$(document).ready(function() {
		$('#user-registration a').removeClass('nav-color');
		$('#user-registration a').addClass('nav-active');
			accounts = $("#accounts").DataTable({
				ajax: {
					url: "<?=base_url()?>ajax/get-all-accounts",
					dataSrc: ''
				},
				responsive:true,
				// "order": [[ 5, "desc" ]],
				columns: [
				{ data: 'account_id'},
				{ data: 'first_name' },
				{ data: 'last_name' },
				{ data: 'middle_name' },
				{ data: 'qualifier' },
				{ data: 'birth_date' },
				{ data: 'complete_address' },
				{ data: 'vehicle_type'},
				{ data: 'vehicle_plate_number'},
				{ data: 'identification_card'}

				],
				columnDefs: [
					// { className: "hidden", "targets": [0]},
					// { className: "acct-name", "targets": [1]},
				]
		});

	});
</script>