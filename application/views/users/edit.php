<h2><?php echo 'Edit User'; ?></h2>
<?php echo form_open('users/edit/', array('class' => 'form-horizontal'), array('user_id' => $user['user_id'])); ?>
<div class="form-group">
    <label for="UserName" class="col-sm-2 control-label">User Name :</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="name" id="UserName" placeholder="Full Name" value="<?php echo $user['name'] ?>">
<?php echo form_error('name', '<div class="error">', '</div>'); ?>
    </div>
</div>
<div class="form-group">
    <label for="UserEmail" class="col-sm-2 control-label">User Email :</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="email" id="UserEmail" placeholder="user@example.com" value="<?php echo $user['email'] ?>">
<?php echo form_error('email', '<div class="error">', '</div>'); ?>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
<?php echo form_submit(array('name' => 'submit', 'value' => 'Submit', 'class' => 'btn btn-success')); ?>
    </div>

</div>
<?php echo form_close();

