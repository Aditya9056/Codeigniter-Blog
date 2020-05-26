<?php 
        if($this->session->userdata('logged_in')){
            redirect('posts');
        }
?>
    <?= validation_errors(); ?>

    <?= form_open('users/register'); ?>
    
        <div class="row">
            <div class="col-md-12 col-md-offset-4 ">
                <h1 class="text-center"><?= $title; ?></h1>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Name" required autofocus>
                </div>

                <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email" required autofocus>
                </div>

                <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password" required autofocus>
                </div>
                
                <div class="form-group">
                    <label for="Password2">Confirm Password</label>
                    <input type="password" class="form-control" name="password2" placeholder="Confirm Password" required autofocus>
                </div>

                <div class="col text-center">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>      
                </div>
            </div>
        </div>

    <?= form_close(); ?>

</body>
</html>