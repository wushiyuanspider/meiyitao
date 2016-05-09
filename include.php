<?php
session_start();
header("content-type:text/html;charset=utf-8");
date_default_timezone_set("RPC");
//define("ROOT", dirname(__FILE__));
require_once('configs/config.php');
require_once('libs/mysql.func.php');
require_once('libs/common.func.php');
require_once('libs/verify.func.php');
require_once('libs/splitPage.func.php');
require_once('libs/category.func.php');
require_once('libs/uploadfunc.php');
connect();


