

<?php
include('readAllUserTask.php');
session_start();
	$iduser=$_SESSION['iduser'];
?>
<html>
	<head>
		<title>Ready to add task?</title>
	</head>
	<body>
		<a href='logout.php'>Click here to log out</a>
		<b id="welcome">Welcome : <i><?php echo $iduser; ?></i></b>
		<h1>Start adding task!</h1>

		<?php getTasks($iduser)?>
	</body>
</html>