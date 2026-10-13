<?php

spl_autoload_register(function ($classPath) {
  $path = str_replace("\\", DIRECTORY_SEPARATOR, $classPath);
  $file = __DIR__ . DIRECTORY_SEPARATOR . $path . ".php";

  if (file_exists($file)) {
    require_once $file;
  }
});

// spl_autoload_register(function ($classPath) {
//   require $clasPath . ".php";
// });
