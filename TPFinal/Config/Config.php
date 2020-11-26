<?php namespace Config;

define("ROOT", dirname(__DIR__) . "/");
//Path to your project's root folder
define("FRONT_ROOT", "/Proyectos/TPFinal/");
define("VIEWS_PATH", "Views/");
define("CSS_PATH", FRONT_ROOT. VIEWS_PATH . "css/");
define("JS_PATH", FRONT_ROOT.VIEWS_PATH . "js/");
define("IMG_PATH", VIEWS_PATH . "img/");
define("ADMIN_VIEWS", VIEWS_PATH . "admin/");
define("USER_VIEWS", VIEWS_PATH . "user/");
define("CINEMA_VIEWS", VIEWS_PATH . "cinema/");
define("ROOM_VIEWS", VIEWS_PATH . "room/");
define("PURCHASE_VIEWS", VIEWS_PATH . "purcharse/");
define("DISCOUNT_VIEWS", VIEWS_PATH . "discount/");
define("FUNCTION_VIEWS", VIEWS_PATH . "function/");
define("API_KEY", "aa337b46aed830028b32fc244f2ba666");
define("URL_NOWPLAYING", "https://api.themoviedb.org/3/movie/now_playing?api_key=" . API_KEY ."&language=en-US&page=1");
define("URL_GENRES", "https://api.themoviedb.org/3/genre/movie/list?api_key=" . API_KEY . "&language=en-US");
define("URL_UPCOMING", "https://api.themoviedb.org/3/movie/upcoming?api_key=" .API_KEY."&language=en-US&page=1");
define ("ENCRYPT_KEY","llave");
define("DB_HOST", "localhost");
define("DB_NAME", "moviePass");
define("DB_USER", "root");
define("DB_PASS", "");
?>

