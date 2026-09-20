<?php
$cnx=mysqli_connect("localhost","root","","eco.sql");
$ae=$_POST["ae"];
$l=$_POST["ly"];
$req="select * from membre where '$ae'=mail";
$res=mysqli_query($cnx,$req);
if(mysqli_num_rows($res)>0)
{
	echo("un autre mmebre existe deja");
}
$req2="select * from membre where '$ae'=mail and '$l'=lycee and '$n'=nom";
$res2=mysqli_query($cnx,$req2);
	if(mysqli_num_rows($res)>0)
	{
		$req3="INSERT INTO action VALUES ('','$titre','$ta','$da','$lieu','$ae')";
		$res3=mysqli_query($cnx,$req3);
		if(mysql_affected_rows($cnx)>0)
		{echo("action ajoutee avec suucees");}
	}
else{
	$req4="INSERT INTO membre VALUES ('$ae', '$n', '$l')";
	$res4=mysqli_multi_query($cnx,$req4);
	if(mysql_affected_rows($cnx)>0)
		{echo("membre avec suucees");}
	
	}
		
	
}