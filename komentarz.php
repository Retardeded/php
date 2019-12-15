<?php
   $postToComment = $_POST['postToComment'];
   $nazwaUzytkownika = $_POST['nazwaUzytkownika'];
   $trescKomentarza = $_POST['trescKomentarza'];
   $typKomentarza = $_POST['typKomentarza'];


   $catalog = new RecursiveDirectoryIterator('.');
   $blogCatalog = NULL;
   $blogFile = NULL;
   foreach (new RecursiveIteratorIterator($catalog) as $filePath => $file) {
      if (! ($file->isDir())) {
       if (basename($file) == $postToComment) {
          $blogFile = $file;
          $blogCatalog = dirname($file);
         }
      }
   }


   if (!file_exists($blogFile . ".k")) {
      mkdir($blogFile . ".k", 0755, true);
   }

   $commentCatalog = $blogFile . ".k/";

   $commentIndex = 0;
   while (file_exists($commentCatalog . "/" . $commentIndex)) {
      $commentIndex = $commentIndex + 1;
   }

   $commentPath = $commentCatalog . "/" . $commentIndex;
   $commentFile = fopen($commentPath, "w");
   fputs($commentFile, $typKomentarza . "\n");
   $time = date("Y-m-d H:i:s");
   fputs($commentFile, $time . "\n");
   fputs($commentFile, $nazwaUzytkownika . "\n");
   fputs($commentFile, $trescKomentarza);
   fclose($commentFile);
?>
