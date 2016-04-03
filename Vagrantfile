# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure(2) do |config|

  config.vm.box = "ubuntu/trusty64"

  config.vm.network "forwarded_port", guest: 80, host: 8080

  # config.vm.network "private_network", ip: "192.168.42.42"

  config.vm.synced_folder ".", "/var/www/site-starter"

  config.vm.provision "file", source: "application/server/nginx-vhost.conf", destination: "/tmp/nginx-vhost.conf"

  config.vm.provision "shell", inline: <<-SHELL
    sudo bash

    add-apt-repository -y ppa:ondrej/php
    apt-get update

    apt-get install -y php7.0 php7.0-fpm nginx git

    mv /tmp/nginx-vhost.conf /etc/nginx/sites-enabled/default

    service nginx restart

    curl -s https://getcomposer.org/installer | php

    mv composer.phar /usr/local/bin/composer

    cd /var/www/site-starter

    composer install
  SHELL

end
