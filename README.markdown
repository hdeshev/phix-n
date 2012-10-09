# PHIX-N

Today I realized I set up too many PHP web sites to do all that manually. My platform of choice is Nginx + PHP-FPM, so I wrote an installer to do the job for me.

# Supported OS's

* Ubuntu 12.04 LTS. It should probably work on older/later versions too, but you'd have to test it yourself.

Adding Debian support should be trivial and I'll do it when I get the time. We also need RHEL/CentOS support, which, if we are lucky, will only need modifying the `prerequisites.sh` script.

# Configuration

All configuration happens in the `config.php` file. You have to create that yourself by copying the `config.php.example` file as `config.php` and editing the settings inside. Here is how those look like:

    # The HTTP host name (your domain)
    define("HOST_NAME", "test-phix-n.deshev.com");

    # The place where you store your scripts
    define("WEB_ROOT", "/var/www/test-phix-n.deshev.com");

    # The FastCGI app listen address
    define("FASTCGI_APP", "127.0.0.1:9001");

    # Permissions
    define("PHP_USER", "www-data");
    define("PHP_GROUP", "www-data");


# Running it

Most of the installer is written in PHP, but you need the PHP interpreter in order to run it. That makes the installation a two-step process:

* Installing the prerequisite packages by running `prerequisites.sh`.
* Running the installer: `install.php`.

To run those in a single command execute:

    sudo ./prerequisites.sh && sudo ./install.php

# Adding extra packages

Every once in a while you'll need a package that the `prerequisites.sh` script doesn't install. Edit it manually to add that package. Then send me a pull request, if you feel others will likely need it too.

# Further development

In the future we need to cover some of the most wanted features:

* Debian support
* CentOS support
* SSL certificate configuration
* Admin area: isolate a `/admin` location and password-protect it.
