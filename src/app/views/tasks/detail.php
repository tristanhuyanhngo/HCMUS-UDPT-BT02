<h1 style="text-align: center; margin-top: 20px"><?php echo $task_title; ?></h1>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <p class="card-text"><strong>ID:</strong> <?php echo $task_detail[0]['id']; ?></p>
                    <p class="card-text"><strong>Name:</strong> <?php echo $task_detail[0]['name']; ?></p>
                    <p class="card-text"><strong>Description:</strong> <?php echo $task_detail[0]['description']; ?></p>
                    <p class="card-text"><strong>Status:</strong> <?php echo $task_detail[0]['status']; ?></p>
                    <p class="card-text"><strong>Start Date:</strong> <?php echo $task_detail[0]['start_date']; ?></p>
                    <p class="card-text"><strong>Due Date:</strong> <?php echo $task_detail[0]['due_date']; ?></p>
                    <p class="card-text"><strong>Finished Date:</strong> <?php echo $task_detail[0]['finished_date']; ?></p>
                    <p class="card-text"><strong>Category:</strong> <?php echo $task_detail[0]['category_id']; ?></p>
                    <a href="/task" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
