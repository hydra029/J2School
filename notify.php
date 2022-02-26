<?php if (isset($_SESSION["notify"])) { ?>
	<script type="text/javascript">
		if ("<?php echo $_SESSION['notify'] ?>" != "") {
			$.notify("<?php echo $_SESSION['notify'] ?>", "success");
			<?php unset($_SESSION['notify']) ?>
		}
	</script>
<?php } ?>
<?php if (isset($_SESSION["error"])) { ?>
	<script type="text/javascript">
		if ("<?php echo $_SESSION['error'] ?>" != "") {
			$.error("<?php echo $_SESSION['error'] ?>", "error");
			<?php unset($_SESSION['error']) ?>
		}
	</script>
	<?php } ?>