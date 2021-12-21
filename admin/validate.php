<link rel="stylesheet" href="indexxx.css">


<?php if (isset($_GET['error'])){ ?>
	<div id = "status">
		<span id = "span"><?php echo $_GET['error']; ?></span>
	</div>
<?php } ?>

<?php if (isset($_GET['success'])){ ?>
	<div id = "status">
		<span id = "span"><?php echo $_GET['success']; ?></span>
	</div>
<?php } ?>
  

<script>
    setTimeout(() => {  
    var parent = document.getElementById("status");
    var child = document.getElementById("span");
    parent.removeChild(child); }, 3500);
</script>