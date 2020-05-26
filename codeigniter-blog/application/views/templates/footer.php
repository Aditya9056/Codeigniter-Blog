        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"> </script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
	<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
</html>

<?php

$this->benchmark->mark('code_end');
echo $this->benchmark->elapsed_time('code_start', 'code_end').'ms'.'<br/>';

?>
 <?php echo $this->benchmark->elapsed_time().'ms'.'<br/>';?>

<?php echo $this->benchmark->memory_usage().'<br/>';?>
<?php


if ($this->agent->is_browser())
{
        $agent = $this->agent->browser().' '.$this->agent->version();
}
elseif ($this->agent->is_robot())
{
        $agent = $this->agent->robot();
}
elseif ($this->agent->is_mobile())
{
        $agent = $this->agent->mobile();
}
else
{
        $agent = 'Unidentified User Agent';
}

echo $agent.'<br/>';

echo $this->agent->platform(); // Platform info (Windows, Linux, Mac, etc.)
?>

<?php 
$query = $this->db->get('users');


?>