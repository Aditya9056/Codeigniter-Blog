<?php 
        if($this->session->userdata('logged_in')){
            redirect('posts');
        }
?>
<?= validation_errors(); ?>
<?= form_open('users/login') ?>
    <div class="row">
        <div class="col-md-12 col-md-offset-4 text-center">
            <h1 class="text-center"><?= $title; ?></h1>
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Name" required autofocus>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required autofocus>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </div>
    </div>
<?= form_close(); ?>