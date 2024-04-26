<head>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<div class="row">
    <!-- DataTable Section -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h2 class="m-0 font-weight-bold text-dark">Leave request</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-bordered table-striped" style="width:100%">
                        <thead class="bg-gradient-warning text-white" style="text-align:center " >
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Employee ID</th>
                                <th>Employee Name</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Reason</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($leave_data)): ?>
                                <?php $count = 1; ?> <!-- Initialize a counter -->
                                <?php foreach ($leave_data as $leave): ?>
                                    <tr id="row_<?php echo $leave['id']; ?>">
                                        <td><?php echo $count; ?></td>
                                        <td><?php echo $leave['employee_id']; ?></td>
                                        <td><?php echo $leave['employee_name']; ?></td>
                                        <td><?php echo $leave['start_date']; ?></td>
                                        <td><?php echo $leave['end_date']; ?></td>
                                        <td><?php echo $leave['reason']; ?></td>
                                        <td style="text-align: center;">
                                            <?php if ($leave['status'] == 0): ?>
                                                <a href="<?php echo base_url('leave/approve_leave/' . $leave['id']); ?>"
                                                    class="btn btn-success approveBtn" data-id="<?php echo $leave['id']; ?>"
                                                    style="padding: 8px 15px; border-radius: 20px;">
                                                    <i class="fas fa-check-circle"></i> Approve
                                                </a>
                                                <a href="<?php echo base_url('leave/reject_leave/' . $leave['id']); ?>"
                                                    class="btn btn-danger rejectBtn" data-id="<?php echo $leave['id']; ?>"
                                                    style="padding: 8px 15px; border-radius: 20px; margin-left: 10px;">
                                                    <i class="fas fa-times-circle"></i> Reject
                                                </a>
                                            <?php else: ?>
                                                <!-- You can add some message or disable the buttons if status is not Pending -->
                                            <?php endif; ?>
                                        </td>

                                    </tr>
                                    <?php $count++; ?>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="8">No leave applications found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $(".approveBtn").click(function (e) {
            e.preventDefault();
            let leaveId = $(this).data("id");
            if (confirm("Are you sure you want to approve this leave request?")) {
                $.get($(this).attr("href"), function () {
                    $("#row_" + leaveId).hide();
                });
            }
        });

        $(".rejectBtn").click(function (e) {
            e.preventDefault();
            let leaveId = $(this).data("id");
            if (confirm("Are you sure you want to reject this leave request?")) {
                $.get($(this).attr("href"), function () {
                    $("#row_" + leaveId).hide();
                });
            }
        });
    });
</script>