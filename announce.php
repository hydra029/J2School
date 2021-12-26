
<?php 
if (isset($_SESSION['error'])) {
	?>
	<span class="error">
		<?php echo $_SESSION['error'] ?>
	</span>
	<?php 
	unset($_SESSION['error']);	
}

if (isset($_SESSION['success'])) {
	?>
	<span class="success">
		<?php echo $_SESSION['success'] ?>
	</span>
	<?php 
	unset($_SESSION['success'])	
	?>
	<?php
}
?>