<?php

namespace App\Core;

class Init
{

    public static function run()
    {

        $calledClass = '';
        $runFunction = 'index';


        $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"], 0, strpos($_SERVER["SERVER_PROTOCOL"], '/'))) . '://';

        $RequestURI = $protocol . "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        $page = str_replace(base_url(), "", $RequestURI);
        $pageParam = explode('/', $page);

        //index.php is removed due to htaccess or beautiful url in webserver setting
        $isIndexPhpExist = strtolower($pageParam[0]) == 'index.php';

        //default function is index
        $runFunction = isset($pageParam[2]) ? $pageParam[2] : 'index';

        if ($isIndexPhpExist) {
            $calledClass = (isset($pageParam[1])) ? ucfirst($pageParam[1]) : '';
        }

        // var_dump($isIndexPhpExist);

        //check if the parameter of class is not exist then redirect to home
        $calledClass = ($calledClass === '') ?  'home' : $calledClass;


        $calledClass = self::changeUnderscoreToUpper($calledClass);


        if ($isIndexPhpExist && $runFunction != 'index') {
            //check if the URL  have the $_GET parameter
            $runFunction = (strpos($runFunction, '?')) ? substr($runFunction, 0, strpos($runFunction, '?')) : $runFunction;
        }


        $loadClass = 'App\Controllers\\' . ucfirst($calledClass) . 'Controller';

        $prototypeClass = new $loadClass;

        //check if the method of class is public / protected
        if (method_exists($prototypeClass, $runFunction)) {
            $reflection = new \ReflectionMethod($prototypeClass, $runFunction);
            if (!$reflection->isPublic()) {
                throw new \RuntimeException("The called method is not public.");
            }
            /**
             * Run the command
             */
            return $prototypeClass->$runFunction();
        }
    }


    public static function changeUnderscoreToUpper($string)
    {
        $isUnderscoreExist = strpos($string, '_');

        if (!$isUnderscoreExist)
            return $string;


        // $ptn = "/_[a-z]?/";
        // $result = preg_replace_callback($ptn, "callbackhandler", $string);

        // return $result;
        // function callbackhandler($matches)
        // {
        //     return strtoupper(ltrim($matches[0], "_"));
        // }




        $string = preg_replace_callback(
            '/(?:^|_)([a-z])/',
            function ($m) {
                return strtoupper($m[1]);
            },
            $string
        );
        return $string; // HelloWorldAgain

    }
}
