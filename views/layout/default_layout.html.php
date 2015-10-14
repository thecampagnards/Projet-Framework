<!DOCTYPE html>
<html>
<head>
<title><?php echo $title; ?></title>
<LINK rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>

<div id="headerdd">
<h1><?php echo $title; ?></h1>
</div>

<div id="nav">
London<br>
Paris<br>
Tokyo<br>
</div>

<div id="section">
<?php if (isset($content)){ 
	echo $content;
}
else{
	echo "Il y a une erreur avec la page";
}
?>
</div>

<div id="footer">
Copyright © W3Schools.com
</div>

</body>
</html>
