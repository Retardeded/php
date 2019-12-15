
<?php
     $blog = $_POST['nazwaBloga'];
        echo "$blog ";
     $uzytkownik = $_POST['nazwaUzytkownika'];
        echo "$uzytkownik ";
     $haslo = $_POST['hasloUzytkownika'];
        echo "$haslo ";
     $opis = $_POST['opisBloga'];
        echo "$opis ";

        if(!is_dir($blog))
        {
         mkdir($blog, 0777,true);
         $p = fopen($blog."/info.txt",'w');
            
         fwrite($p,$uzytkownik."\n");
         fwrite($p,md5($haslo)."\n");
         fwrite($p,$opis."\n");
         fclose($p);
        }
        else
        { 
        echo"Taki katalog już istnieje"; 
        }  
fclose($plik);
?>
