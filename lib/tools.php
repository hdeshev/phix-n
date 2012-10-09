<?php

/**
 * Renders a template and saves it to the specified destination path.
 */
function render_to($template, $destination) {
    ob_start();
    include($template);
    $output = ob_get_contents();
    ob_end_clean();

    file_put_contents($destination, $output);
}

/**
 * Runs a command and throw an exception if it returns a nonzero exit code.
 */
function run($cmd) {
    $exit_code = 0;
    system($cmd, $exit_code);
    if ($exit_code != 0) {
        throw new Exception("Could not run command: $cmd\nExit code: $exit_code");
    }
}

?>
