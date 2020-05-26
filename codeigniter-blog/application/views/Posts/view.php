<h2><?= $posts['title']; ?> </h2>
<div class="post-body">
    <small class="timestamp"><b>Posted On: <?php echo $posts['created_at']; ?></b></small><br>
    <img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $posts['post_image']; ?>" class="img-fluid" alt="No Image">
    <?= '<hr>'; ?>
    <?= $posts['body']; ?>
</div>

<?php if($this->session->userdata('user_id') === $posts['user_id']): ?>
    <?= '<hr>'; ?>
    <?= anchor('posts/edit/'.$posts['slug'], 'Edit', 'class= "btn btn-info float-left"'); ?>
    <?= form_open('posts/delete/'.$posts['id'].'/'.$posts['slug']); ?>
    <input type="submit" value="Delete"class="btn btn-danger"/>
    </form>
<?php endif; ?>
<hr>

<link href='https://fonts.googleapis.com/css?family=Noto+Sans' rel='stylesheet' type='text/css'>

<div class="panel-header">
  <span id="panel-title">Comments</span>
</div>

<div class="panel-collapse">

<?php if($comments):?>
 <?php foreach($comments as $comment): ?>
  <?php echo'<div class="comment">'; ?>
    <?php echo '<div class="comment-header">'; ?>
      <?php echo '<img class="icon" src="https://i.imgur.com/JIt0euT.png"/>'?>
            <?php echo "<span>".$comment['name']."</span>";?>
            <?php echo "<small>". $comment['created_at']."</small>";?>
            <?php echo'</div>'; ?>
            <?php echo'<div class="comment-text">'; ?>
            <?php echo $comment['body'] ?>
            <?php echo '</div>'; ?>
            <?php echo'</div>';?>
 <?php endforeach;?>
<?php else: ?>
  <?php echo'<div class="comment">'; ?>
  <?php echo '<div class="comment-header">'; ?>
  <?php echo'<p>No Comments!</p>'; ?>
  <?php echo'</div>';?>
  <?php echo'</div>';?>
  
 <?php endif; ?>  
 
<hr>

<h3>Add Comment</h3>
<?= validation_errors(); ?>
<?= form_open('Comments/create/'.$posts['id'])?>
    <div class="form-group">
        <label for="Name">Your Name</label>
        <input name="name" type="text" class="form-control"></input>
    </div>
    <div class="form-group">
        <label for="Comment">Comment</label>
        <textarea name="body" class="form-control"></textarea>
    </div>
    <input type="hidden" name="slug" value="<?= $posts['slug']; ?>">
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

 
