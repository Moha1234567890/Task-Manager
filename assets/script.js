$(document).ready(function() {
    loadTasks();

    function loadTasks(filter = 'all') {
        $.get(`api/get_tasks.php?status=${filter}`, function(data) {
            let tasks = JSON.parse(data);
            let html = '';
            tasks.forEach(task => {
                html += `
                    <tr data-id="${task.id}">
                        <td><input type="checkbox" class="toggle-status" ${task.status === 'completed' ? 'checked' : ''}></td>
                        <td>${task.title}</td>
                        <td>${task.description}</td>
                        <td>${task.created_at}</td>
                        <td>
                            <button class="btn btn-sm btn-warning edit-btn">Edit</button>
                            <button class="btn btn-sm btn-danger delete-btn">Delete</button>
                        </td>
                    </tr>
                `;
            });
            $('#taskTable tbody').html(html);
        });
    }

    $('#addTaskForm').on('submit', function(e) {
        e.preventDefault();
        $.post('api/create_task.php', $(this).serialize(), function(res) {
            let response = JSON.parse(res);
            alert(response.message);
            if (response.status === 'success') {
                $('#addTaskForm')[0].reset();
                loadTasks();
            }
        });
    });

    $('#taskTable').on('click', '.edit-btn', function() {
        let row = $(this).closest('tr');
        let id = row.data('id');
        let title = row.find('td:nth-child(2)').text();
        let description = row.find('td:nth-child(3)').text();

        $('#editId').val(id);
        $('#editTitle').val(title);
        $('#editDescription').val(description);
        $('#editModal').modal('show');
    });

    $('#editTaskForm').on('submit', function(e) {
        e.preventDefault();
        $.post('api/update_task.php', $(this).serialize(), function(res) {
            let response = JSON.parse(res);
            alert(response.message);
            if (response.status === 'success') {
                $('#editModal').modal('hide');
                loadTasks();
            }
        });
    });

    $('#taskTable').on('click', '.delete-btn', function() {
        let id = $(this).closest('tr').data('id');
        if (confirm('Are you sure?')) {
            $.post('api/delete_task.php', { id }, function(res) {
                let response = JSON.parse(res);
                alert(response.message);
                loadTasks();
            });
        }
    });

    $('#taskTable').on('change', '.toggle-status', function() {
        let row = $(this).closest('tr');
        let id = row.data('id');
        let status = this.checked ? 'completed' : 'pending';
        $.post('api/update_task.php', {
            id,
            title: row.find('td:nth-child(2)').text(),
            description: row.find('td:nth-child(3)').text(),
            status
        }, function(res) {
            let response = JSON.parse(res);
            alert(response.message);
        });
    });

    $('.filter-btn').click(function() {
        loadTasks($(this).data('filter'));
    });
});
