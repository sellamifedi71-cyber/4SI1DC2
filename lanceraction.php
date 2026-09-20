<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<form action="valideraction.php" method="post">
		<fieldset>
			<legend>information du membre</legend>
			<label for="">adresse electronique</label>
			<input type="text">
			<label for=""> nom du mmebre</label>
			<input type="text">
			<label for="">lyceee</label>
			<input list="l">
			<datalist id="l">
			<?php
			require 'config.php';
			$req="select distinct lycee from membre";
			$res=mysqli_query($cnx,$req);
			while($t=mysqli_fetch_array($res))
			{
				echo("<option value='$t[0]'></option>");
			}
			?>
			
			</datalist>
		</fieldset>
		<fieldset>
			<legend>information sur laction</legend>
			<label for="">titre de laction</label>
			<input type="text">
			<label for="">type de laction</label>
			<select name="" id="">
				<option value="">choisir un type</option>
				<option value="n">nettoyage</option>
				<option value="p">plantation</option>
				<option value="s">sensibilation</option>
				<option value="r">recyclage</option>
				
			
			
			</select>
			<label for="">date de laction</label>
			<input type="text">
			<label for="">lieu de laction</label>
			<input type="text">
		</fieldset>
	</form>
</body>
</html>
