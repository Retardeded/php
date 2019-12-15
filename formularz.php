<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Blog forumularz</title>
</head>
<body>
  
    <?php	include 'menu.php'; ?>
  <form action="nowy.php" method="post">

  <div>

    Nazwa bloga:<br />

  <input name="nazwaBloga" value="" /><br />


  Nazwa użytkownika:<br />

  <input name="nazwaUzytkownika" value="" /><br />

  Hasło użytkownika:<br />

  <input name="hasloUzytkownika"  value="" /><br />

  Opis bloga:<br />

  <textarea name="opisBloga" rows="15" cols="40"></textarea><br />

  <input type="reset" value="Wyczyść" name="wyczysc" />
  <input type="submit" value="Wyślij" name="submit" />

  </div>

  </form>
</body>
</html>
