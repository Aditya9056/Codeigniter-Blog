<!DOCTYPE html>
<html lang="en">
	<?php $this->benchmark->mark('code_start');?>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Codeigniter</title>
		<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/lux/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/style.css');?>"/>
	</head>
	<body>
		
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
			<a class="navbar-brand" href="<?=base_url('home');?>">Navbar</a>
			<button
				class="navbar-toggler"
				type="button"
				data-toggle="collapse"
				data-target="#navbarColor01"
				aria-controls="navbarColor01"
				aria-expanded="false"
				aria-label="Toggle navigation"
			>
			<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarColor01">
				<ul class="navbar-nav mr-auto">
					<li
						class="nav-item <?php if ($this->uri->segment(1) == 'home') {echo ' active';}?> "
					>
						<a class="nav-link" href="<?=base_url();?>home"
							>Home <span class="sr-only">(current)</span></a
						>
					</li>

					<li
						class="nav-item <?php if ($this->uri->segment(1) == 'about') {echo ' active';}?> "
					>
						<a class="nav-link" href="<?php echo base_url('about'); ?>">About</a>
					</li>

					<li class="nav-item dropdown <?php if ($this->uri->segment(1) == 'posts' && $this->uri->segment(2) != 'category') {echo ' active';}?>">
						<a class="nav-link dropdown-toggle" href="<?php echo base_url('posts'); ?>" id="navbarDropdownMenuLink"  aria-haspopup="true" aria-expanded="false">
						Posts
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="<?php echo base_url('posts/create'); ?>">New Post</a>
						</div>
					</li>

					<li class="nav-item dropdown <?php if ($this->uri->segment(1) == 'categories') {echo ' active';}?>">
						<a class="nav-link dropdown-toggle" href="<?php echo base_url('categories'); ?>" id="navbarDropdownMenuLink" aria-haspopup="true" aria-expanded="false">
						Categories
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="<?php echo base_url('categories/create'); ?>">Create Categories</a>
						</div>
					</li>
					
				</ul>
					<ul class="navbar-nav ml-auto">
						<?php if(!$this->session->userdata('logged_in')): ?>

							<li class="nav-item <?php if ($this->uri->segment(1) == 'login') {echo ' active';}?> ">
								<a class="nav-link" href="<?=base_url('users/');?>login"> Login <span class="sr-only">(current)</span></a>
							</li>
							<li	class="nav-item <?php if ($this->uri->segment(1) == 'Register') {echo ' active';}?> ">
								<a class="nav-link" href="<?=base_url('users/');?>register"> Register <span class="sr-only">(current)</span></a>
							</li>
						<?php endif; ?>

						<?php if($this->session->userdata('logged_in')): ?>
							<li	class="nav-item <?php if ($this->uri->segment(1) == 'Logout') {echo ' active';}?> ">
								<a class="nav-link" href="<?=base_url('users/');?>logout"> Logout <span class="sr-only">(current)</span></a>
							</li>
							<li	class="nav-item <?php if ($this->uri->segment(1) == 'Logout') {echo ' active';}?> ">
								<div class="nav-link"><?= $this->session->userdata('name'); ?></div>
							</li>
						<?php endif; ?>
					</ul>
			</div>
		</nav>
<div class="container">
	<!-- Flash Messages -->

	<?php if($this->session->flashdata('user_registered')):?>
		<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('post_created')):?>
		<?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>'; ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('post_updated')):?>
		<?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>'; ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('category_created')):?>
		<?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_created').'</p>'; ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('post_deleted')):?>
		<?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_deleted').'</p>'; ?>
	<?php endif; ?>
	
	<?php if($this->session->flashdata('user_logged_in')):?>
		<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_logged_in').'</p>'; ?>
	<?php endif; ?>

	<?php if($this->session->flashdata('user_login_failed')):?>
		<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('user_login_failed').'</p>'; ?>
	<?php endif; ?>
	
	<?php if($this->session->flashdata('user_logged_out')):?>
		<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_logged_out').'</p>'; ?>
	<?php endif; ?>