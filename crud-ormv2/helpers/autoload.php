<?php

//orm
spl_autoload_register(function ($className) {
    $file = app_dir() . '\\orm\\' . $className . '.php';
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $file);
    //echo $file;
    if (file_exists($file)) {
        include $file;
    }
});


//core
// spl_autoload_register(function ($className) {
//     $file = app_dir() . '\\core\\' . $className . '.php';
//     $file = str_replace('\\', DIRECTORY_SEPARATOR, $file);
//     //echo $file;
//     if (file_exists($file)) {
//         include $file;
//     }
// });
