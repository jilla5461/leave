<!-- Begin Page Content -->
<!--  -->

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<div class="container-fluid">
  <div class="card rounded-0 shadow">
    <div class="card-header">
      <h3 class="card-title font-weight-bolder text-dark h3 mb-0"><?= $account['name'] ?></h3>
      <button type="button" class="btn btn-danger" onclick="location.href='<?php echo base_url('leave/leave_history'); ?>'">
    user leave history
</button>

      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#alertModal">
        APPLY LEAVE
      </button>

      <div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="alertModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="alertModalLabel">Leave Application Form</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="post" action="<?php echo base_url('leave/submit_leave'); ?>">
                <div class="form-group">
                  <input type="hidden" class="form-control" name="id" value="<?= $account['id'] ?>">
                  <input type="hidden" class="form-control" name="employee_name" value="<?= $account['name'] ?>">
                </div>
                <div class="form-group">
                  <label for="start_date">Start Date:</label>
                  <input type="date" class="form-control" id="start_date" name="start_date" required>
                </div>
                <div class="form-group">
                  <label for="end_date">End Date:</label>
                  <input type="date" class="form-control" id="end_date" name="end_date" required>
                </div>
                <div class="form-group">
                  <label for="reason">Reason:</label>
                  <textarea class="form-control" id="reason" name="reason" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="card-body">
      <div class="container-fluid">
        <div class="row">

          <!-- left -->
          <div class="col-sm-10 col-md-5 col-lg-4 col-xl-3 offset-sm-1 offset-md-0 offset-lg-0 offset-xl-0 text-center">
            <img src="/leave/images/pp/<?= $account['image'] ?>" class="rounded-circle img-thumbnail">

          </div>

          <!-- right -->
          <div class="col-sm-10 col-md-6 offset-sm-1">
            <h1 class="h3 text-white bg-gradient-dark p-1 rounded-0 mt-1 mb-3">Information</h1>
            <table class="table">
              <tbody>
                <tr>
                  <th scope="row">Employee ID</th>
                  <td>: <?= $account['id']; ?></td>
                </tr>
                <tr>
                  <th scope="row">Gender</th>
                  <td>: <?php if ($account['gender'] == 'M') {
                    echo 'Male';
                  } else {
                    echo 'Female';
                  }
                  ; ?></td>
                </tr>
                <tr>
                  <th scope="row">Department</th>
                  <td>: <?= $account['department'] ?></td>
                </tr>
                <tr>
                  <th scope="row">Birthday</th>
                  <td>: <?= $account['birth_date']; ?></td>
                </tr>
                <tr>
                  <th scope="row">Joined On</th>
                  <td>: <?= $account['hire_date'] ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+M5WMVgqFw6B19F8gDSIUZ3g4+pz8yT5fPCI5Sz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+M5WMVgqFw6B19F8gDSIUZ3g4+pz8yT5fPCI5Sz" crossorigin="anonymous"></script>