<div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <div>
        <h1 style="text-align: center; margin-top: 20px;">Add task</h1>

        <form method="POST" action="/task/create" id="add-task-form">
            <div style="width: 400px; margin: 0 auto;">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select class="form-control" id="status" name="status">
                        <option value="TODO">TODO</option>
                        <option value="IN PROGRESS">IN PROGRESS</option>
                        <option value="FINISHED">FINISHED</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="start_date">Start Date:</label>
                    <input type="date" class="form-control" id="start_date" name="start_date">
                </div>
                <div class="form-group">
                    <label for="due_date">Due Date:</label>
                    <input type="date" class="form-control" id="due_date" name="due_date">
                </div>
                <div class="form-group">
                    <label for="category">Category:</label>
                    <input type="text" class="form-control" id="category" name="category">
                </div>
                <div style="display: flex; justify-content: space-between;">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <a href="/task" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('add-task-form').addEventListener('submit', function(event) {
        event.preventDefault();

        var name = document.getElementById('name').value;
        var description = document.getElementById('description').value;
        var startDate = document.getElementById('start_date').value;
        var dueDate = document.getElementById('due_date').value;
        var category = document.getElementById('category').value;

        // Kiểm tra số từ trong name và description
        if (name.trim().split(' ').length > 20) {
            alert('Name must not exceed 20 words.');
            return;
        }

        if (description.trim().split(' ').length > 50) {
            alert('Description must not exceed 50 words.');
            return;
        }

        // Kiểm tra start date không trễ hơn due date
        if (startDate > dueDate) {
            alert('Start date cannot be later than due date.');
            return;
        }

        // Kiểm tra category nằm trong danh sách id của category
        var validCategoryIds = ['id1', 'id2', 'id3']; // Thay bằng danh sách id category thực tế
        if (!validCategoryIds.includes(category)) {
            alert('Invalid category.');
            return;
        }

        // Nếu tất cả điều kiện đều thỏa mãn, submit form
        this.submit();
    });
</script>


