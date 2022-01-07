<link rel="stylesheet" href="index1.css">


<?php if (isset($_SESSION['error'])){ ?>
	<div id = "status">
		<span id = "span"><?php echo $_SESSION['error']; ?></span>
		<?php unset($_SESSION['error']); ?>
	</div>
<?php } ?>

<?php if (isset($_SESSION['success'])){ ?>
	<div id = "status">
		<span id = "span"><?php echo $_SESSION['success']; ?></span>
		<?php unset($_SESSION['success']); ?>
	</div>
<?php } ?>
  

<script>
    setTimeout(() => {  
    var parent = document.getElementById("status");
    var child = document.getElementById("span");
    parent.removeChild(child); }, 3500);
</script>