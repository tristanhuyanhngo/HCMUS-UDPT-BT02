<h1 style="text-align: center; margin-top: 20px"><?php echo $category_title; ?></h1>
<div class="text-right" style="margin-right: 20px">
    <a href="/category/add" class="btn btn-outline-success" style="margin-right: 10px">Add Category</a>
</div>
<div class="text-center">
    <table class="table center-table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Date Created</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($category_list as $category) : ?>
            <tr>
                <th scope="row"><?php echo $category['id']; ?></th>
                <td><?php echo $category['name']; ?></td>
                <td><?php echo $category['date_created']; ?></td>
                <td>
                    <a href="/category/edit/<?php echo $category['id']; ?>" class="btn btn-primary">Edit</a>
                    <form method="POST" action="/category/delete/<?php echo $category['id']; ?>">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
