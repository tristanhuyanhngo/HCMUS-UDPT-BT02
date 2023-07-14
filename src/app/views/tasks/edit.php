<div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <div>
        <h1 style="text-align: center; margin-top: 20px;"><?php echo $task_title; ?></h1>

        <form method="POST" action="/task/update/<?php echo $task[0]['id']; ?>">
            <div style="width: 400px; margin: 0 auto;">
                <div class="text-group" style="margin-bottom: 10px;">
                    <label for="task_id">ID:</label>
                    <input type="text" class="form-control" id="task_id" name="id" value="<?php echo $task[0]['id']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $task[0]['name']; ?>">
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description"><?php echo $task[0]['description']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select class="form-control" id="status" name="status">
                        <option value="TODO" <?php if ($task[0]['status'] === 'TODO') echo 'selected'; ?>>TODO</option>
                        <option value="IN PROGRESS" <?php if ($task[0]['status'] === 'IN PROGRESS') echo 'selected'; ?>>IN PROGRESS</option>
                        <option value="FINISHED" <?php if ($task[0]['status'] === 'FINISHED') echo 'selected'; ?>>FINISHED</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="start_date">Start Date:</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" value="<?php echo $task[0]['start_date']; ?>">
                </div>
                <div class="form-group">
                    <label for="due_date">Due Date:</label>
                    <input type="date" class="form-control" id="due_date" name="due_date" value="<?php echo $task[0]['due_date']; ?>">
                </div>
                <div class="form-group">
                    <label for="finished_date">Finished Date:</label>
                    <input type="date" class="form-control" id="finished_date" name="finished_date" value="<?php echo $task[0]['finished_date']; ?>">
                </div>
                <div class="form-group">
                    <label for="category">Category:</label>
                    <input type="text" class="form-control" id="category" name="category" value="<?php echo $task[0]['category_id']; ?>">
                </div>
                <div style="display: flex; justify-content: space-between;">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="/task" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>