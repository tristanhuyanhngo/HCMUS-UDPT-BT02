<h1 style="text-align: center; margin-top: 20px"><?php echo $task_title; ?></h1>
<div class="text-right" style="margin-right: 20px">
    <a href="/task/add" class="btn btn-outline-success" style="margin-right: 10px">Add Task</a>
    <button onclick="deleteAllTasks()" class="btn btn-outline-danger" style="margin-right: 10px">Delete All</button>
</div>
<div class="text-center">
    <table class="table center-table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Status</th>
            <th scope="col">Start Date</th>
            <th scope="col">Due Date</th>
            <th scope="col">Finished Date</th>
            <th scope="col">Category</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $limit = 4; // Số lượng bản ghi trên mỗi trang
        $totalTasks = count($task_list);
        $totalPages = ceil($totalTasks / $limit);

        $currentPage = $_GET['page'] ?? 1;
        $currentPage = max(1, min($currentPage, $totalPages));

        $start = ($currentPage - 1) * $limit;
        $end = min($start + $limit, $totalTasks);

        for ($i = $start; $i < $end; $i++) {
            $task = $task_list[$i];
            ?>
            <tr>
                <th scope="row"><?php echo $task['id']; ?></th>
                <td><?php echo $task['name']; ?></td>
                <td><?php echo $task['description']; ?></td>
                <td><?php echo $task['status']; ?></td>
                <td><?php echo $task['start_date']; ?></td>
                <td><?php echo $task['due_date']; ?></td>
                <td><?php echo $task['finished_date']; ?></td>
                <td><?php echo $task['categoryName']; ?></td>
                <td>
                    <a href="/task/detail/<?php echo $task['id']; ?>" class="btn btn-info">Detail</a>
                    <a href="/task/edit/<?php echo $task['id']; ?>" class="btn btn-primary">Edit</a>
                    <form method="POST" action="/task/delete">
                        <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>

    <div class="text-center">
        <?php if ($currentPage > 1): ?>
            <a href="?page=<?php echo ($currentPage - 1); ?>">Previous</a>
        <?php endif; ?>

        <?php for ($page = 1; $page <= $totalPages; $page++): ?>
            <a href="?page=<?php echo $page; ?>" <?php if ($page === $currentPage) echo 'class="active"'; ?>><?php echo $page; ?></a>
        <?php endfor; ?>

        <?php if ($currentPage < $totalPages): ?>
            <a href="?page=<?php echo ($currentPage + 1); ?>">Next</a>
        <?php endif; ?>
    </div>

    <!-- JavaScript để xử lý sự kiện click nút Delete All -->
    <script>
        function deleteAllTasks() {
            if (confirm('Are you sure you want to delete all tasks?')) {
                // Gửi request tới URL xóa tất cả các task
                fetch('/task/deleteAll', {
                    method: 'DELETE'
                })
                    .then(response => {
                        if (response.ok) {
                            // Xóa thành công, làm mới trang
                            location.reload();
                        } else {
                            // Xóa thất bại, hiển thị thông báo lỗi
                            alert('Failed to delete tasks.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('An error occurred while deleting tasks.');
                    });
            }
        }
    </script>
</div>
