<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
echo '<h2>Add Post</h2>';
echo form_open('posts/add', array('class' => 'form-horizontal')); //

echo '<div class="form-group">';
echo form_label('Author :', null, 'control-label');
$attributs = 'class="form-control" id="PostUserId"';
echo form_dropdown('user_id', $user, set_value('user'),$attributs);
echo form_error('user_id', '<div class="error">', '</div>');
echo '</div>';

echo '<div class="form-group">';
echo form_label('Post Title :', null, 'control-label');
echo form_input(array('id' => 'PostTitle', 'name' => 'title','class'=>'form-control'));
echo form_error('title', '<div class="error">', '</div>');
echo '</div>';

echo '<div class="form-group">';
echo form_label('Post Body :', null, 'control-label');
echo form_textarea(array('id' => 'PostBody', 'name' => 'body','class'=>'form-control'));
echo form_error('body', '<div class="error">', '</div>');
echo '</div>';

echo '<div class="form-group">';
echo form_submit(array('name' => 'submit', 'value' => 'Submit','class' => 'btn btn-success'));
echo '</div>';

echo form_close();
