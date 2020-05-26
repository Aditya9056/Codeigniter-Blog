<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <body>
        <?= form_open('categories/create'); ?>
<h1><?= $title; ?></h1>
        <div class="form-group">
            <label for="Category" >Category Name</label>
            <input class="form-control" placeholder="Enter Category Name" name="name">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>

        </form>
    </body>
</html>