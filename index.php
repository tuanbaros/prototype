<?php
session_start();
require_once 'app/library/config.php';
require_once 'app/library/route.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
$route = new Route;
