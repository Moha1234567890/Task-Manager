<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/style.css" rel="stylesheet">
</head>
<body>
<div class="container py-4">
    <h1 class="mb-4 text-center">Task Manager</h1>

    <!-- Add Task Form -->
    <form id="addTaskForm" class="row g-3 mb-4">
        <div class="col-12 col-md-4">
            <input type="text" name="title" class="form-control" placeholder="Task title" required>
        </div>
        <div class="col-12 col-md-5">
            <input type="text" name="description" class="form-control" placeholder="Description">
        </div>
        <div class="col-12 col-md-3">
            <button type="submit" class="btn btn-primary w-100">Add Task</button>
        </div>
    </form>

    <!-- Filter Buttons -->
    <div class="mb-3 text-center">
        <button class="btn btn-outline-secondary filter-btn" data-filter="all">All</button>
        <button class="btn btn-outline-warning filter-btn" data-filter="pending">Pending</button>
        <button class="btn btn-outline-success filter-btn" data-filter="completed">Completed</button>
    </div>

    <!-- Tasks Table (Responsive) -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover" id="taskTable">
            <thead class="table-light">
                <tr>
                    <th>Status</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="editTaskForm">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Task</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" id="editId">
          <div class="mb-3">
            <label for="editTitle" class="form-label">Title</label>
            <input type="text" name="title" id="editTitle" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="editDescription" class="form-label">Description</label>
            <textarea name="description" id="editDescription" class="form-control" rows="3"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/script.js"></script>
</body>
</html>
