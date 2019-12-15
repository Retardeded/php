<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Wpis formularz</title>
    
    <script type="text/javascript" src="skrypt.js">
	</script>
    
</head>
<body>
    
    <?php include 'menu.php';?>
    
	<form action="wpis.php" method="post" enctype="multipart/form-data">

  <div>

  Nazwa użytkownika:<br />

  <input name="nazwaUzytkownika" value="" /><br />

  Hasło użytkownika:<br />

  <input type="password" name="hasloUzytkownika"  value="" /><br />

  Wpis:<br />

  <textarea name="wpis" rows="15" cols="40"></textarea><br />

  <input type="date" name="dateValue" >

  <input type="time" name="timeValue" >

  Załącz pliki: <br />
			<div id="dodawanie_zalacznikow">
	        <input type="file" name="zalacznik1" onclick="CreateButton()"><br />
			 
		  </div>
		  	  <br />


  <input type="reset" value="Wyczyść" name="wyczysc" />
  <input type="submit" value="Wyślij" name="submit" />

  </div>

  </form>
</body>
</html>

