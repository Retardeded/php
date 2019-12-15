<?php
     $uzytkownik = $_POST['nazwaUzytkownika'];
        echo "$uzytkownik ";
     $haslo = $_POST['hasloUzytkownika'];
        echo "$haslo ";
     $wpis = $_POST['wpis'];
        echo "$wpis ";
     $date = $_POST['dateValue'];
        echo "$date ";
      $time = $_POST['timeValue'];
        echo "$time ";
    
        
    $maxFiles = 3;
    $userFound = False;
	$catalog = new RecursiveDirectoryIterator('.');

	// Autentykacja
	$blogPath = NULL;
	foreach (new RecursiveIteratorIterator($catalog) as $filePath => $file) {
		if (! ($file->isDir())) {
			if ($file->getFileName() == 'info.txt') {
				$info = file($filePath);

				$name = $info[0];
				$name = rtrim($name, "\r\n");
				$password = $info[1];
				$password = rtrim($password, "\r\n");
                

				if ($uzytkownik == $name) {
                    
					if (md5($haslo) == $password) {
						$userFound = True;
						$blogPath = $file->getPath();
						break;
					}
				}
			}
		}
	}
	if (!$userFound) {
		echo "Nie znaleziono uzytkownika lub podano niepoprawne dane! <br/>";
	}

    $num = sizeof($_FILES);

    echo ":: " . $num . "  ";

	if ($userFound) {
		$fixedDate = str_replace("-", "", $date);
		$fixedTime = str_replace(":", "", $time);
		$seconds = date("s");
		$id = 0;

		do {
			$uniqueId = sprintf("%02d", $id);
			$fileName = $fixedDate . $fixedTime . $seconds . $uniqueId;
			$postPath = "./" . $blogPath . "/" . $fileName;
			$id = $id+ 1;
		} while (file_exists($postPath));

		$file = fopen($postPath, 'w');
		fputs($file, $wpis);
		fclose($file);

		$targetCatalog = "./" .$blogPath . "/";
        $currentNumber = 1;
        
		for ($i = 1 ; $i <= $maxFiles ; $i++) {
            
            
			if($_POST['zalacznik' . $i ] != null)
            {
                $currentAnnex = $_POST['zalacznik' . $i ];
			     $extension = pathinfo($currentAnnex, PATHINFO_EXTENSION);
                $targetPath = $targetCatalog . $fixedDate . $fixedTime . $seconds .
			     $uniqueId . $currentNumber . "." . $extension;
                
                echo $currentAnnex['filename']  ."<br/>";
                echo " ext: " . $extension .  "<br/>";
                echo " path: " . $targetPath .  "<br/>";
                
                 echo $currentAnnex . "<br/>";
            

			if (file_exists($targePath)) {
                
				echo "Plik " . $currentAnnex . "juz istnieje! <br />";
			} else {
                
				$file1 = fopen($targetPath, 'w');
		        fputs($file1, $annex);
		        fclose($file);
			}
			$currentNumber = $currentNumber + 1;
		 }
            
		}
        

		
	}
?>
