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
                <h2 class="m-0 font-weight-bold text-dark">History</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-bordered table-striped" style="width:100%">
                        <thead class="bg-gradient-success text-white">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Employee ID</th>
                                <th>Employee Name</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Reason</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($leave_history)): ?>
                                <?php $count = 1; ?> <!-- Initialize a counter -->
                                <?php foreach ($leave_history as $leave): ?>
                                    <tr>
                                        <td><?php echo $count; ?></td> <!-- Display serial number -->
                                        <td><?php echo $leave['employee_id']; ?></td>
                                        <td><?php echo $leave['employee_name']; ?></td>
                                        <td><?php echo $leave['start_date']; ?></td>
                                        <td><?php echo $leave['end_date']; ?></td>
                                        <td><?php echo $leave['reason']; ?></td>
                                        <td><span class="badge <?php echo getStatusClass($leave['status']); ?>"><?php echo getStatusText($leave['status']); ?></span></td>
                                    </tr>
                                    <?php $count++; ?> <!-- Increment the counter -->
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7">No leave applications found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Helper Function to Assign Badge Colors Based on Status -->
<?php
function getStatusClass($status) {
    switch ($status) {
        case 0:
            return 'badge-info';
        case 1:
            return 'badge-success';
        case 2:
            return 'badge-danger';
        default:
            return 'badge-secondary';
    }
}

function getStatusText($status) {
    switch ($status) {
        case 0:
            return 'Pending';
        case 1:
            return 'Approved';
        case 2:
            return 'Rejected';
        default:
            return 'Unknown';
    }
}
?>
