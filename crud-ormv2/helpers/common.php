<?php



function random_string($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}



function bread_crumb()
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

    $calledClass = strtolower($calledClass);

    if (!$calledClass) return;


    echo "<div class='my-3 text-black-50'>Path : ";

    $countVar = count($pageParam) - 1;

    foreach ($pageParam as $key =>  $page) {
        if ($page == 'index.php')
            continue;

        if ($countVar != $key) {
            echo "<a href='" . site_url() . $page . "'>" . $page . "</a> / ";
        } else {
            //second parameter, remove the ? character
            if (strpos($page, '?')) {
                $page = explode('?', $page);
                $page = $page[0];
            }
            echo $page;
        }
    }

    echo "</div>";
}


function app_path()
{
    $completePath = explode('/', $_SERVER['PHP_SELF']);
    $noIndexPath = str_replace('index.php', '', $_SERVER['PHP_SELF']);
    $base = 'http://' . $_SERVER['HTTP_HOST'] .  $noIndexPath;
    return rtrim($base, '/');
}

function app_dir()
{
    $root = $_SERVER['DOCUMENT_ROOT'];
    $completePath = explode('/', $_SERVER['PHP_SELF']);
    $noIndexPath = str_replace('index.php', '', $_SERVER['PHP_SELF']);
    return   $root . '/' . $noIndexPath;
}


function redirect($url)
{
    echo '<script language="javascript">window.location.href ="' . $url . '"</script>';
    exit;
}

function render($file, $data = [])
{
    extract($data);

    //load header
    include_once(dirname(__DIR__) . '/templates/header.php');


    $is_file_exist = file_exists(dirname(__DIR__) . '/app/views/' . $file . '.php');

    if ($is_file_exist)
        include_once(dirname(__DIR__) . '/app/views/' . $file . '.php');
    else
        //echo dirname(__DIR__);
        include_once(dirname(__DIR__) . '/app/views/' . $file . '/index.php');


    include_once(dirname(__DIR__) . '/templates/footer.php');
}


function view($file, $data = [])
{
    if ($data)
        extract($data);


    $is_file_exist = file_exists(dirname(__DIR__) . '/app/views/' . $file . '.php');

    if ($is_file_exist)
        include_once(dirname(__DIR__) . '/app/views/' . $file . '.php');
    else
        //echo dirname(__DIR__);
        include_once(dirname(__DIR__) . '/app/views/' . $file . '/index.php');
}




if (!function_exists('base_url')) {
    function base_url($atRoot = FALSE, $atCore = FALSE, $parse = FALSE)
    {
        if (isset($_SERVER['HTTP_HOST'])) {
            $http = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
            $hostname = $_SERVER['HTTP_HOST'];
            $dir =  str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);

            $core = preg_split('@/@', str_replace($_SERVER['DOCUMENT_ROOT'], '', realpath(dirname(__FILE__))), 0, PREG_SPLIT_NO_EMPTY);
            $core = $core[0];

            $tmplt = $atRoot ? ($atCore ? "%s://%s/%s/" : "%s://%s/") : ($atCore ? "%s://%s/%s/" : "%s://%s%s");
            $end = $atRoot ? ($atCore ? $core : $hostname) : ($atCore ? $core : $dir);
            $base_url = sprintf($tmplt, $http, $hostname, $end);
        } else $base_url = 'http://localhost/';

        if ($parse) {
            $base_url = parse_url($base_url);
            if (isset($base_url['path'])) if ($base_url['path'] == '/') $base_url['path'] = '';
        }

        return $base_url;
    }
}


if (!function_exists('site_url')) {
    function site_url($atRoot = FALSE, $atCore = FALSE, $parse = FALSE)
    {
        return base_url() . 'index.php/';
    }
}



function get_template_path()
{
    return base_url() . 'templates/';
}
