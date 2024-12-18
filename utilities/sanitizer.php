<?php
 function sanitizer($evil_string){
      $purify = strip_tags($evil_string);
      $purify = htmlspecialchars($purify);
      $purify = ucfirst($purify);
      
      $purify = trim($purify);

      return $purify;

 }
?>