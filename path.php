<?php 

// const SITE_ROOT = __DIR__;

// const BASE_URL = "http://localhost/MyBlog/";

if (!defined('BASE_URL')) {
    define('BASE_URL', 'http://MyBlog/');
}

if (!defined('ROOT_PATH')) {
    define('ROOT_PATH', realpath(dirname(__FILE__)));
}
// define("ROOT_PATH", realpath(dirname(__FILE__)));

?>