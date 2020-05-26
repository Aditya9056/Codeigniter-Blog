<h2><?= $title ?></h2>
<?= validation_errors();?>
<?= form_open_multipart('posts/create'); ?>
  <div class="form-group">
    <label for="exampleInputEmail1" >Name</label>
    <input class="form-control" placeholder="Enter Post Name" name="title">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Write Post</label>
    <textarea placeholder="Enter Post Data" class="form-control" name="body" id="editor1"></textarea>
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

  <div class="form-group">
    <label>Upload Image</label>
    <input type="file" name="userfile" size="20">
  </div>
  
  <button type="submit" class="btn btn-primary">Post</button>
</form>