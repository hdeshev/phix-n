<?php
require_once("config.php");
require_once("lib/tools.php");

define("NGINX_SITES_DIR", "/etc/nginx/sites-available");
define("NGINX_ENABLED_SITES_DIR", "/etc/nginx/sites-enabled");


/**
 * Set up the site config files and restart nginx.
 */
function configure_nginx() {
    $nginx_config = NGINX_SITES_DIR . "/" . HOST_NAME;
    $nginx_enabled_config = NGINX_ENABLED_SITES_DIR . "/" . HOST_NAME;

    render_to("templates/nginx.conf", $nginx_config);

    unlink($nginx_enabled_config);
    symlink($nginx_config, $nginx_enabled_config);

    fix_nginx_server_names();
    restart_nginx();
}

/**
 * Increases the server_names_hash_bucket_size to 64 as it sometimes causes a stupid config parse error
 */
function fix_nginx_server_names() {
    $config_path = "/etc/nginx/nginx.conf";
    $nginx_config = file_get_contents($config_path);
    $nginx_config = preg_replace("/(#\\s+)?(server_names_hash_bucket_size[^;]+;)/", "server_names_hash_bucket_size 64;", $nginx_config);
    file_put_contents($config_path, $nginx_config);
}

/**
 * Restart nginx via the init.d script.
 */
function restart_nginx() {
    run("service nginx restart");
}

?>
