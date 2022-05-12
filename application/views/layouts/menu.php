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
    <?php
    $res = $this->Custom_model->get_user_report_counter($this->session->userdata('user_id'));
    $report_counter = count($res);
    ?>
    <div class="collapse navbar-collapse" id="navbarsExample03">
      <ul class="navbar-nav mr-auto">
        <?php $position_id = $this->session->userdata('position_id');
        if ($position_id == 1) { ?>
          <li id="admin-home" class="nav-item">
            <a class="nav-link nav-color" href="<?= base_url() ?>admin-home">Home <span class="sr-only">(current)</span></a>
          </li>
          <li id="visitor-counts" class="nav-item">
            <a class="nav-link nav-color" href="<?= base_url() ?>visitor-counts">Visitor Counts </a>
          </li>
          <li id="time-logs" class="nav-item">
            <a class="nav-link nav-color" href="<?= base_url() ?>time-logs">Time Logs</a>
          </li>
          <li id="user-registration" class="nav-item">
            <a class="nav-link nav-color" href="<?= base_url() ?>registration">User Registrations</a>
          </li>
          <li id="account-management" class="nav-item">
            <a class="nav-link nav-color" href="<?= base_url() ?>account-management">Account Management</a>
          </li>
          <li id="view-reports" class="nav-item">
            <a class="nav-link nav-color" href="<?= base_url() ?>view-reports">
              Reports <span id="counter"> </span>
            </a>
          </li>
        <?php } elseif ($position_id == 2) { ?>
          <li id="submitted-reports" class="nav-item">
            <a class="nav-link nav-active" href="<?= base_url() ?>home">Home <span class="sr-only">(current)</span></a>
          </li>
        <?php } ?>
      </ul>


      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link nav-color dropdown-toggle nav-user" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?= $this->session->userdata('username'); ?>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <!-- <a class="dropdown-item" href="<?= base_url() ?>change-password">Change Password</a> -->
            <a class="dropdown-item" href="<?= base_url() ?>logout">Sign Out</a>
            <!-- <div class="dropdown-divider"></div> -->
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <script>
    $(document).ready(function() {
      setInterval(function() {
        $.ajax({
          url: "<?= base_url() ?>ajax/reports-counter",
          type: "GET",
          dataType: "json",
          success: function(data) {
            $("#counter").text(data.count).addClass("badge badge-light");
          },
          error: function(data) {
            console.log(data);
          }
        });
      }, 100000);
    });
  </script>