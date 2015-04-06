<h2>Post Details 
    <p class="pull-right"><a href="<?php echo base_url("index.php/posts/edit/" . $post['post_id']); ?>" class="btn btn-warning btn-sm">Edit Post</a></p>
</h2>

<dl class="dl-horizontal">
    <dt>#ID</dt>
    <dd><?php echo $post['post_id'] ?></dd>
    <dt>Author</dt>
    <dd><?php echo $post['name'] ?></dd>
    <dt>Post Title</dt>
    <dd><?php echo $post['title'] ?></dd>
    <dt>Post Body</dt>
    <dd><?php echo $post['body'] ?></dd>   
</dl>
