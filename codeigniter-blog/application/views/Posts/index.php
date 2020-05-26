<h2><?= $title;?> </h2>
<?php foreach($posts as $post): ?> 
    <br/>
    <h3><?php echo $post['title']; ?></h3>
    <div class="row">
        <div class="col-md-3">
            <img class="post-thumb img-thumbnail" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>" alt="No Image">
        </div>
        <div class="col-md-9">
            <small class="timestamp"><b>Posted On: <?php echo $post['created_at'];  echo" in ". $post['name'] ; ?></b></small>
            <h6><?php echo word_limiter($post['body'], 60); ?></h6>
            <p><?= anchor('/posts/'.$post['slug'], 'Read More...', ' class="btn btn-info text-light"'); ?></p>
        </div>
    </div>
<?php endforeach;?>

<div class="pagination-links">
    <?= $this->pagination->create_links(); ?>
</div>