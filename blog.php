<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
   <?php

        include 'menu.php';
        
		$blogName = "";
		if (isset($_GET['name'])) {
			$blogName = $_GET['name'];
		}


      if ($blogName == "") {
			$catalog = new DirectoryIterator(".");
         foreach ($catalog as $fileInfo) {
             if ($fileInfo->isDir() && !$fileInfo->isDot() ) {
                 
                $blog = $fileInfo->getFilename();
                echo sprintf("<a href=\"blog.php?name=%s\">%s</a><br />", $blog, $blog);
             }
         }

      } else {
			$is = false;
			$catalog = "./" . $blogName . "/";
			if (file_exists($catalog)) {
				$is = true;
				$info = fopen($catalog . "/info.txt", 'r');
				$lineNumber = 1;
				while (($line = fgets($info)) !== false) {
					if ($lineNumber == 1) {
						echo "<h1>Tytuł bloga: </strong>" . $line . "</h1>";
					} else if ($lineNumber == 3) {
						echo "<h3>Opis bloga: </strong>" . $line . "</h3>";
					}
					if ($lineNumber >= 4) {
						echo $line . "<br />";
					}
					$lineNumber = $lineNumber + 1;
				}
				fclose($info);


				// Menu dodaj wpis
				echo "Dodaj nowy wpis";

				// Wyświetl wpisy i komentarze
				$filePattern = '/\\d{16}$/';
				$iterator = new DirectoryIterator($catalog);
				foreach ($iterator as $currentFile) {
					if (!$currentFile->isDir() && preg_match($filePattern, $currentFile)){
						$content = file_get_contents($iterator->getPathName());
						echo "<h2>Wpis: " . $currentFile . "</h2>";
						echo $content . "<br /></br >";

						// Wyświetl załączniki
						$annexPattern = '/' . $currentFile . '[1-3]/';
						foreach (new DirectoryIterator($catalog) as $file) {
							if (preg_match($annexPattern, $file)) {
								$annnexPath = $catalog;
						    	echo sprintf('Dołączony plik: <a href="./%s/%s">%s</a><br />', $blogName, $file, $file);
						 	}
						}
						echo "<br />";

						// Wyświetl komentarze
						if (file_exists($catalog . $currentFile . ".k")) {
							foreach (new DirectoryIterator($catalog . $currentFile . ".k") as $file2) {
								if(!$file2->isDot() && !$file2->isDir()){
									//echo $plk->getPathName() . "<br />";

									$commentFile = fopen($file2->getPathName(), 'r');
									$lineNumber = 1;
									while (($line = fgets($commentFile)) !== false) {
										if ($lineNumber == 1) {
											echo "<strong>Typ komentarza: </strong>" . $line . "<br />";
										} else if ($lineNumber == 2) {
											echo "<strong>Data komentarza: </strong>" . $line . "<br />";
										} else if ($lineNumber == 3) {
											echo "<strong>Autor komentarza: </strong>" . $line . "<br />";
										} else if ($lineNumber >= 4) {
											echo $line . "<br />";
										}
										$lineNumber = $lineNumber + 1;
									}
									fclose($commentFile);
									echo "<br />";

								}
							}
						}
					}
				}
      }

		if (!$is) {
			echo "Nie znaleziono blogu ! <br />";
		}
	}

   ?>
</body>
</html>
