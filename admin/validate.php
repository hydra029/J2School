
<?php if (isset($_GET['error'])){ ?>
	<span style="color: red; font-size: 20px"><?php echo $_GET['error']; ?></span>
<?php } ?>

<?php if (isset($_GET['success'])){ ?>
	<span style="color: green; font-size: 20px"><?php echo $_GET['success']; ?></span>
<?php } ?>
  