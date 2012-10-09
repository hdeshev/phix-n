#!/usr/bin/php
<?php
require_once("config.php");
require_once("lib/fpm.php");
require_once("lib/nginx.php");

run("mkdir -p \"". WEB_ROOT . "\"");
run("chown " . PHP_USER . ":" . PHP_GROUP . " -R \"" . WEB_ROOT . "\"");
configure_fpm();
configure_nginx();
?>
