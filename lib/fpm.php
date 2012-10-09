<?php
require_once("config.php");
require_once("lib/tools.php");

define("FPM_POOL_DIR", "/etc/php5/fpm/pool.d");
define("FPM_POOL_CONFIG", FPM_POOL_DIR . "/" . HOST_NAME . ".conf");


/**
 * Set up the FPM app pool config and restart it.
 */
function configure_fpm() {
    render_to("templates/fpm-pool.conf", FPM_POOL_CONFIG);
    restart_fpm();
}

function restart_fpm() {
    run("service php5-fpm restart");
}

?>
