<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
       foreach($categories as $item):
            echo "<br/>";
            echo "<li>".anchor(base_url().'categories/posts/'.strtolower($item['id']),$item['name'])."</li>";
        endforeach;
    ?>
</body>
</html>