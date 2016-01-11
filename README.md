Silex site starter project
--------------------------

A Silex site starter package with Vagrant Ubuntu 14.04 box configured with php 7, nginx, php-fpm.

Ongoing development.

To get started:

Install Vagrant and Virtualbox.

Git clone this project.

    cd <project directory>

    vagrant up
    
    vagrant ssh
    
    cd /var/www/site-starter
    
    php composer.phar install
    
    npm install
    
    browserify resources/assets/main.js > public/js/main.js

Once complete go to http://127.0.0.1:8080 in your browser...

... or uncomment the "private_network" line in the Vagrantfile and then add a hosts file entry to woteva IP you used...

e.g: 

    example.dev 192.168.42.42.

Any changes to the Vagrantfile won't be reflected until you have re-provisioned if the machine is already running...

    vagrant reload --provision
