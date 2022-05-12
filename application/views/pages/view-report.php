<div class="page-body">
  <div class="container">
    <div class="section-title">
      <h3 id="print_title">Reports</h3>
    </div>
    <div class="section-body">
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
      <table id="reports" class="table table-hover dt-responsive" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Report ID #</th>
            <th>Civilian ID #</th>
            <th>Subject</th>
            <th>Details</th>
            <th>Report Type</th>
            <th>Reported By</th>
            <th>Date Reported</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Report ID #</th>
            <th>Civilian ID #</th>
            <th>Subject</th>
            <th>Details</th>
            <th>Report Type</th>
            <th>Reported By</th>
            <th>Date Reported</th>
            <th>Action</th>
          </tr>
        </tfoot>
      </table>

    </div>
  </div>
</div>


<script>
  var time_logs;
  // Date range filter
  var minDateFilter = "";
  var maxDateFilter = "";
  var dateFrom = "";


  $(document).ready(function() {
    $('#view-reports a').removeClass('nav-color');
    $('#view-reports a').addClass('nav-active');

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



    time_logs = $("#reports").DataTable({
      ajax: {
        url: "<?= base_url() ?>ajax/get-view-reports",
        dataSrc: ''
      },
      dom: "<'row'<'col-md-6'B><'col-md-6'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",

      lengthMenu: [
        [10, 25, 50, -1],
        ['10', '25', '50', 'All']
      ],
      "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
        if (aData['is_done'] == "1") {
          $('td', nRow).css('background-color', '#f4f0ec');
        }
      },
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
      // columns: [
      // { data: 'Report ID'},
      // { data: 'Civilian ID' },
      // { data: 'Subject' },
      // { data: 'Detials'},
      // { data: 'Report'},
      // { data: 'entry_time'},
      // { data: 'exit_time'},
      // { data: 'building_name'}
      columnDefs: [{
          "targets": 0,
          "data": "report_id",
        },
        {
          "targets": 1,
          "render": function(data, type, row) {
            var html = row['civilian_id'] ? row['civilian_id'] : 'N/A';

            return html;
          }
        },

        {
          "targets": 2,
          "data": "subject"
        },
        {
          "targets": 3,
          "data": "description"
        },

        {
          "targets": 4,
          "data": "report_type"
        },
        {
          "targets": 5,
          "data": "name"
        },
        {
          "targets": 6,
          "data": "date_reported"
        },
        {
          "targets": 7,
          "render": function(data, type, row) {
            var data = row['is_done'] <= 0 ? "<button class='btn bg-custom btn-dark btn-sm btn-view'>Done</button>" : '<span class="badge badge-success">Resolved</span>';
            return data;
          }
        },
      ]
    });

    $('#reports').on('click', 'button', function() {
      var data = time_logs.row($(this).parents('tr')).data();
      id = data['report_id'];
      window.location.href = "<?php echo base_url() ?>reports/done/" + id;
    });
  });



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