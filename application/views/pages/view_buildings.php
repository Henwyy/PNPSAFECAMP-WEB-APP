<div class="page-body">
  <div class="container">
    <div class="section-title">
      <h3 id="print_title">Time Logs for <?= $result[0]->building_name ?></h3>
    </div>
    <a href="<?= base_url() ?>admin-home" class="mb-3">Back to Home</a>
    <input type="hidden" id="building_id" value="<?= $result[0]->building_id ?>" />
    <div class="section-body">
      <div class="mb-3">
        <h5>Visitor Count Today: <b id="visitor_count"></b></h5>
      </div>
      <div class="row justify-content-end">
        <div class="col-md-5">
          <div class="float-right">
            <div class="input-group mb-3">
              <label class="mr-2" for=""><small>Start time:</small></label>
              <input style="max-width: 10em;" type="text" class="form-control form-control-sm" id="datepicker_from">
              <div class="input-group-append">
                <span class="input-group-text"><i class='fa fa-calendar'></i></span>
              </div>
            </div>
          </div>
          <div class="float-right">
            <div class="input-group mb-3">
              <label class="mr-2" for=""><small>End time :</small></label>
              <input style="max-width: 10em;" type="text" class="form-control form-control-sm" id="datepicker_to">
              <div class="input-group-append">
                <span class="input-group-text"><i class='fa fa-calendar'></i></span>
              </div>
            </div>
          </div>

        </div>
      </div>
      <table id="time_logs" class="table table-hover dt-responsive" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Account ID #</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Vehicle</th>
            <th>Plate #</th>
            <th>Entry Time</th>
            <th>Exit Time</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Account ID #</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Vehicle</th>
            <th>Plate #</th>
            <th>Entry Time</th>
            <th>Exit Time</th>
          </tr>
        </tfoot>
      </table>

    </div>
  </div>
</div>


<script>
  var time_logs;
  $(document).ready(function() {
    var building_id = $('#building_id').val();
    time_logs = $("#time_logs").DataTable({
        ajax: {
          url: "<?= base_url() ?>ajax/get-view-building-time-logs",
          dataSrc: '',
          data: {
            building_id: building_id
          },
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
              let df = (document.getElementById("datepicker_from").value).replaceAll('/', '-');
              let dt = (document.getElementById("datepicker_to").value).replaceAll('/', '-');

              return $('#print_title').text().trim() + '_' + df + ' to ' + dt;
            },
            filename: function() {
              let df = (document.getElementById("datepicker_from").value).replaceAll('/', '-');
              let dt = (document.getElementById("datepicker_to").value).replaceAll('/', '-');

              return $('#print_title').text().trim() + '_' + df + ' to ' + dt;
            },
          },
          {
            extend: 'pdf',
            text: '<i class="fas fa-file-pdf fa-1x" aria-hidden="true"></i> PDF',
            messageTop: function() {
              let df = (document.getElementById("datepicker_from").value).replaceAll('/', '-');
              let dt = (document.getElementById("datepicker_to").value).replaceAll('/', '-');

              return $('#print_title').text().trim() + '_' + df + ' to ' + dt;
            },
            filename: function() {
              let df = (document.getElementById("datepicker_from").value).replaceAll('/', '-');
              let dt = (document.getElementById("datepicker_to").value).replaceAll('/', '-');

              return $('#print_title').text().trim() + '_' + df + ' to ' + dt;
            },

          },
          {
            extend: 'excel',
            text: '<i class="fas fa-file-excel" aria-hidden="true"></i> Excel',
            messageTop: function() {
              let df = (document.getElementById("datepicker_from").value).replaceAll('/', '-');
              let dt = (document.getElementById("datepicker_to").value).replaceAll('/', '-');

              return $('#print_title').text().trim() + '_' + df + ' to ' + dt;
            },
            filename: function() {
              let df = (document.getElementById("datepicker_from").value).replaceAll('/', '-');
              let dt = (document.getElementById("datepicker_to").value).replaceAll('/', '-');

              return $('#print_title').text().trim() + '_' + df + ' to ' + dt;
            },
          },
          'pageLength'
        ],
        responsive: true,
        // "order": [[ 5, "desc" ]],
        columns: [{
            data: 'account_id'
          },
          {
            data: 'first_name'
          },
          {
            data: 'last_name'
          },
          {
            data: 'vehicle_type'
          },
          {
            data: 'vehicle_plate_number'
          },
          {
            data: 'entry_time'
          },
          {
            data: 'exit_time'
          }

        ],
        columnDefs: [
          // { className: "hidden", "targets": [0]},
          // { className: "acct-name", "targets": [1]},
        ]
      }

    );

    // 
    $("#datepicker_from").datepicker({
      "onSelect": function(date) {
        minDateFilter = new Date(date).getTime();
        time_logs.draw();
      }
    }).keyup(function() {
      minDateFilter = new Date(this.value).getTime();
      time_logs.draw();
    });

    $("#datepicker_to").datepicker({
      "onSelect": function(date) {
        maxDateFilter = new Date(date).getTime();
        time_logs.draw();
      }
    }).keyup(function() {
      maxDateFilter = new Date(this.value).getTime();
      time_logs.draw();
    });


    $.ajax({
      url: '<?= base_url() ?>ajax/get-visitor-counts-for-building',
      type: 'GET',
      data: {
        building_id: building_id
      },
      success: function(data) {
        var result = JSON.parse(data);
        $('#visitor_count').text(result[0].visitor_count ? result[0].visitor_count : 0);
      },
      error: function(data) {
        console.log(data);
      }
    });

  });

  // Date range filter
  minDateFilter = "";
  maxDateFilter = "";

  $.fn.dataTableExt.afnFiltering.push(
    function(oSettings, aData, iDataIndex) {
      if (typeof aData._date == 'undefined') {
        aData._date = new Date(aData[6]).getTime();
      }

      if (minDateFilter && !isNaN(minDateFilter)) {
        if (aData._date < minDateFilter) {
          return false;
        }
      }

      if (maxDateFilter && !isNaN(maxDateFilter)) {
        if (aData._date > maxDateFilter) {
          return false;
        }
      }

      return true;
    }
  );
</script>