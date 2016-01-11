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

    add-apt-repository -y ppa:ondrej/php-7.0
    apt-get update

    apt-get install -y php7.0 php7.0-fpm nginx git nodejs npm

    mv /tmp/nginx-vhost.conf /etc/nginx/sites-enabled/default

    service nginx restart

    ln -s /usr/bin/nodejs /usr/bin/node

    rm -fr node_modules vendor public/js/main.js

    npm install - g browserify

    php composer.phar install

    browserify resources/assets/main.js > public/js/main.js
  SHELL

end
