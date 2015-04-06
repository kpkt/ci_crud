<h2>Posts List 
    <p class="pull-right"><a href="" class="btn btn-primary btn-sm">Add Post</a></p>
</h2>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <td>#</td>
            <td>Author</td>
            <td>Name</td>
            <td>Email</td>
            <td style="width: 175px">Action</td>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($posts as $post) : ?>
            <tr>
                <td><?php echo $i++ ?></td>
                <td><?php echo $post['name']; ?></td>
                <td><?php echo $post['title']; ?></td>
                <td><?php echo $post['body']; ?></td>
                <td>
                    <a href="<?php echo base_url("index.php/posts/view/" . $post['post_id']); ?>" class="btn btn-default btn-sm">View</a>
                    <a href="<?php echo base_url("index.php/posts/edit/" . $post['post_id']); ?>" class="btn btn-default btn-sm">Edit</a>                    
                    <a href="<?php echo base_url("index.php/posts/delete/" . $post['post_id']); ?>"
                       onclick="return confirm('Are you sure you want to delete this item? <?php echo $post['title'] ?>');" 
                       class="btn btn-default btn-sm">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
