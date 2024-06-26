<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
include 'functions.php';
?>

<?=template_header('Tickets')?>

<div class="content home">
<?php
if (!isset($_SESSION['loggedin'])) {
?>

		<div class="login">
			<h1>Login</h1>
			<form action="authenticate.php" method="post">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Username" id="username" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required>
				<input type="submit" value="Login">
			</form>
		</div>
	

<?php
}
?>

</div>

<?=template_footer()?>