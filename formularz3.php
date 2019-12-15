<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Komentarz formularz</title>
    
    <script type="text/javascript" src="skrypt.js">
	</script>
    
</head>
<body>
    
    <?php include 'menu.php';?>
	<form action="komentarz.php" method="POST" enctype="multipart/form-data">

         Wybierz wpis:
           <select name="postToComment"><br />
              <?php
					  if (isset($_GET['comment'])) {
						  $comment = $_GET['comment'];
					  } else {
						  $comment = "";
					  }

	              $catalog = new RecursiveDirectoryIterator('.');
	              foreach (new RecursiveIteratorIterator($catalog) as $filePath => $file) {
	                 if (! ($file->isDir())) {
	                   if (preg_match("/\d{16}$/", $file)) {
								 if (rtrim($comment) == rtrim($file)) {
									 echo "<option selected>" . basename($file) . "</option>";
								 } else {
	                      	echo "<option>" . basename($file) . "</option>";
							 	 }
	                   }
	                }
	             }
             ?>
          </select><br />

        Nazwa użytkownika:
            <input type="text" name="Komentujesz jako"><br />
        Treść komentarza:<br />
            <textarea name="trescKomentarza" rows="10" cols="40"></textarea><br />
        Typ komentarza:
            <select name="typKomentarza">
              <option>Pozytywny</option>
              <option>Neutralny</option>
              <option>Negatywny</option>
            </select><br />
        <input type="reset" value="Wyczyść" name="wyczysc" />
        <input type="submit" value="Dodaj komentarz">
	</form>
</body>
</html>

