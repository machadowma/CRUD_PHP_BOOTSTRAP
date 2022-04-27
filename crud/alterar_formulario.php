<!DOCTYPE html>
<html lang="en">
<head>
<title>CRUD</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>


<style>
	/* Custom style */
    .navbar{
        margin-bottom: 1rem;
    }



</style>
</head>
<body>

<?php include("menu.php"); ?>

<div class="container">

	<?php
		include("banco_dados_conexao.php");	
	?>


	<h1>Alterar</h1>
	<form method="post" action="alterar_update.php">
	
		<?php
			try {
				$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $dbh->prepare('SELECT id,nome,sobrenome,sexo from pessoa where id = ?');
				$stmt->bindParam(1, $id);
				$id = $_GET["id"];
				$stmt->execute();
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				$dbh = null;

				?>
				<div class="form-group">
				<label for="id">Id:</label>
				<input type='text' id="id" name='id' class="form-control" value='<?php echo $result[0]["id"];?>' readonly>
    			</div>

				<div class="form-group">
				<label for="id">Nome:</label>
				<input type='text' id="nome" name='nome' class="form-control" value='<?php echo $result[0]["nome"];?>'>
    			</div>

				<div class="form-group">
				<label for="sobrenome">Sobrenome:</label>
				<input type="text" class="form-control" id="sobrenome" name="sobrenome" value='<?php echo $result[0]["sobrenome"];?>'>
    			</div>

				<div>
				<br>Sexo:
				<?php if($result[0]["sexo"]=='F') {?>
					<label class="radio-inline"><input type="radio" name="sexo" value='M' >Masculino</label>
					&nbsp;
					<label class="radio-inline"><input type="radio" name="sexo" value='F' checked>Feminino</label>		
				<?php } ?>
				<?php if($result[0]["sexo"]=='M') { ?>
					<label class="radio-inline"><input type="radio" name="sexo" value='M' checked>Masculino</label>
					&nbsp;
					<label class="radio-inline"><input type="radio" name="sexo" value='F' >Feminino</label>		
				<?php } ?>
				
				</div>

				<?php

			} catch (PDOException $e) {
				print "Error!: " . $e->getMessage() . "<br/><br><a href='index.php'>voltar</a>";
				die();
			}
		?>

	
	<br><input type="submit" name="alterar" value="Alterar" class="btn btn-primary">
	</form>

	<br><br><a href="index.php" class="btn btn-secondary">voltar</a>

</div> 

<?php include("footer.php"); ?>
</body>
</html>
