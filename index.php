<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
include 'functions.php';
// Connect to MySQL using the below function
$pdo = pdo_connect_mysql();
// MySQL query that retrieves all the tickets from the database
$stmt = $pdo->prepare('SELECT * FROM tickets ORDER BY created DESC');
$stmt->execute();
$tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?=template_header('Tickets')?>

<div class="content home">

	<h2>Tickets</h2>

	<p>Welcome to the index page. You can view the list of tickets below.</p>

	<div class="btns">
		<a href="create.php" class="btn">Create Ticket</a>
	</div>

	<div class="tickets-list">
		<?php foreach ($tickets as $ticket): ?>
		<a href="view.php?id=<?=$ticket['id']?>" class="ticket">
			<span class="con">
				<?php if ($ticket['status'] == 'open'): ?>
				<i class="far fa-clock fa-2x"></i>
				<?php elseif ($ticket['status'] == 'resolved'): ?>
				<i class="fas fa-check fa-2x"></i>
				<?php elseif ($ticket['status'] == 'closed'): ?>
				<i class="fas fa-times fa-2x"></i>
				<?php endif; ?>
			</span>
			<span class="con">
				<span class="title"><?=htmlspecialchars($ticket['title'], ENT_QUOTES)?></span>
				<span class="msg"><?=htmlspecialchars($ticket['msg'], ENT_QUOTES)?></span>
			</span>
			<span class="con created"><?=date('F dS, G:ia', strtotime($ticket['created']))?></span>
		</a>
		<?php endforeach; ?>
	</div>

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