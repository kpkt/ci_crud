<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
echo '<h2>Edit Post</h2>';
echo form_open('posts/edit/', array('class' => 'form-horizontal'), array('post_id' => $post['post_id']));
//print_r($post['post_id']);
echo '<div class="form-group">';
echo form_label('Author :', null, 'control-label');
echo form_dropdown('user_id', $user, $post['user_id'], 'class="form-control" id="PostUserId"');
echo form_error('user_id', '<div class="error">', '</div>');
echo '</div>';

echo '<div class="form-group">';
echo form_label('Post Title :', null, 'control-label');
echo form_input(array('id' => 'PostTitle', 'name' => 'title', 'class' => 'form-control', 'value' => $post['title']));
echo form_error('title', '<div class="error">', '</div>');
echo '</div>';

echo '<div class="form-group">';
echo form_label('Post Body :', null, 'control-label');
echo form_textarea(array('id' => 'PostBody', 'name' => 'body', 'class' => 'form-control', 'value' => $post['body']));
echo form_error('body', '<div class="error">', '</div>');
echo '</div>';

echo '<div class="form-group">';
echo form_submit(array('name' => 'submit', 'value' => 'Submit'));
echo '</div>';

echo form_close();
