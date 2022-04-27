<!DOCTYPE html>
<html lang="en">
<head>
<title>CRUD</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>


</head>
<body>

<?php include("menu.php"); ?>

<div class="container" >

<?php
	include("banco_dados_conexao.php");	
	
	try {
	
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$stmt = $dbh->prepare("update pessoa set nome=?,sobrenome=?,sexo=? where id=?");
		$stmt->bindParam(1, $nome);
		$stmt->bindParam(2, $sobrenome);
		$stmt->bindParam(3, $sexo);
		$stmt->bindParam(4, $id);

		$nome = $_POST["nome"];
		$sobrenome = $_POST["sobrenome"];
		$sexo = $_POST["sexo"];
		$id = $_POST["id"];

		if($stmt->execute())
		echo "
		<br>
		<div class='alert alert-success' role='alert'>
		Alteração realizada com sucesso!
		</div>
		";

	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/><br><a href='index.php'>voltar</a>";
		die();
	}
?>

<br><br><a href="index.php" class="btn btn-secondary">voltar</a>

</div>

<?php include("footer.php"); ?>
</body>
</html>
