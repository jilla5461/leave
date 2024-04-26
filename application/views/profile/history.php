<!DOCTYPE html>
<html>
<head>
    <title>User Leave History</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<h1 class="mt-4 mb-4">Your Leave History</h1>

<!-- Bootstrap Table -->
<div class="table-responsive">
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Employee ID</th>
            <th>Employee Name</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Reason</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($leave_history as $index => $record): ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td><?= $record['employee_id'] ?></td>
                <td><?= $record['employee_name'] ?></td>
                <td><?= $record['start_date'] ?></td>
                <td><?= $record['end_date'] ?></td>
                <td><?= $record['reason'] ?></td>
                <td><?= $record['status'] ?></td>
                <td>
                    <?php if ($record['status'] == 'Pending'): ?>
                        <a href="<?= base_url('leave/approve_leave/' . $record['id']) ?>" class="btn btn-success">Approve</a>
                        <a href="<?= base_url('leave/reject_leave/' . $record['id']) ?>" class="btn btn-danger">Reject</a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
