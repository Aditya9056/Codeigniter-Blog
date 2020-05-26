<h2><?=$title?></h2>
<?=validation_errors();?>
<?=form_open_multipart('posts/update');?>
<input type="hidden" name="id" value="<?= $posts['id']; ?>">
  <div class="form-group">
    <label for="exampleInputEmail1" >Name</label>
    <input class="form-control" placeholder="Enter Post Name" name="title" value="<?=set_value('title', $posts['title'])?>">
  </div>
  
  <div class="form-group">
    <img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $posts['post_image']; ?>" alt="No Image">
    <label>Upload Image</label>
    <input type="file" name="userfile" size="20">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Write Post</label>
    <textarea id="editor1" placeholder="Enter Post Data" class="form-control" name="body"><?=set_value('body', $posts['body'])?></textarea>
    <label> Category </label>
    <select name="category_id" class="form-control">
      <?php foreach($category as $category): ?>
        <option value="<?= $category['id']; ?>"><?= $category['name']; ?></option>
      <?php endforeach; ?>
    </select>
    <script>

    CKEDITOR.replace('editor1');
    </script>
  </div>
  <button type="submit" class="btn btn-primary">Post</button>
</form>