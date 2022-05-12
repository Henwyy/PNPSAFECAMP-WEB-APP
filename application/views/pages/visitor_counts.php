<div class="page-body">
  <div class="container">
    <div class="section-title">
      <h3 id="print_title">Visitor Counts</h3>
    </div>
    <div class="section-body">
      <table id="visitors" class="table table-hover dt-responsive" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Building ID</th>
            <th>Building Name</th>
            <th>Officer Assigned</th>
            <th>Visitors Today</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Building ID</th>
            <th>Building Name</th>
            <th>Officer Assigned</th>
            <th>Visitors Today</th>
          </tr>
        </tfoot>
      </table>

    </div>
  </div>
</div>


<script>
  var visitors;
  $(document).ready(function() {
    $('#visitor-counts a').removeClass('nav-color');
    $('#visitor-counts a').addClass('nav-active');
    visitors = $("#visitors").DataTable({
      ajax: {
        url: "<?= base_url() ?>ajax/get-visitor-counts",
        dataSrc: ''
      },
      dom: "<'row'<'col-md-6'B><'col-md-6'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
      lengthMenu: [
        [10, 25, 50, -1],
        ['10', '25', '50', 'All']
      ],
      buttons: [{
          extend: 'print',
          text: '<i class="fas fa-print fa-1x"></i> Print',
          messageTop: function() {
            let today = new Date();
            d = today.getDate().toString() + '-' + (today.getMonth() + 1) + '-' + today.getFullYear()

            return $('#print_title').text().trim() + '_' + d;
          },
          filename: function() {
            let today = new Date();
            d = today.getDate().toString() + '-' + (today.getMonth() + 1) + '-' + today.getFullYear()

            return $('#print_title').text().trim() + '_' + d;
          },
        },
        {
          extend: 'pdf',
          text: '<i class="fas fa-file-pdf fa-1x" aria-hidden="true"></i> PDF',
          messageTop: function() {
            let today = new Date();
            d = today.getDate().toString() + '-' + (today.getMonth() + 1) + '-' + today.getFullYear()

            return $('#print_title').text().trim() + '_' + d;
          },
          filename: function() {
            let today = new Date();
            d = today.getDate().toString() + '-' + (today.getMonth() + 1) + '-' + today.getFullYear()

            return $('#print_title').text().trim() + '_' + d;
          },

        },
        {
          extend: 'excel',
          text: '<i class="fas fa-file-excel" aria-hidden="true"></i> Excel',
          messageTop: function() {
            let today = new Date();
            d = today.getDate().toString() + '-' + (today.getMonth() + 1) + '-' + today.getFullYear()

            return $('#print_title').text().trim() + '_' + d;
          },
          filename: function() {
            let today = new Date();
            d = today.getDate().toString() + '-' + (today.getMonth() + 1) + '-' + today.getFullYear()

            return $('#print_title').text().trim() + '_' + d;
          },
        },
        'pageLength'
      ],
      responsive: true,
      // "order": [[ 5, "desc" ]],
      // columns: [
      // { data: 'building_id'},
      // { data: 'building_name' },
      // { data: 'username' },
      // { data: 'visitor_count' }
      // ],
      columnDefs: [

        {
          "targets": 0,
          "data": "building_id"
        },
        {
          "targets": 1,
          "render": function(data, type, row) {
            var html = "";
            html += '<a href="view_buildings/' + row['building_id'] + '">' + row['building_name'] + '</a>';

            return html;
          }
        },

        {
          "targets": 2,
          "data": "username"
        },
        {
          "targets": 3,
          "render": function(data, type, row) {
            var html = "";
            html += row['visitor_count'] ? row['visitor_count'] : 0;

            return html;
          }
        }
      ]
    });


  });
</script>