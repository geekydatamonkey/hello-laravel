#sudo npm -g install gulp

#Setup Apache
sudo curl -L -o '/etc/apache2/sites-available/hello-laravel.conf' https://gist.githubusercontent.com/johnsojr/60ebc48fd87ebebedec2/raw/5d60e7e230c4a6d8986f04cfb9313820e158948f/gistfile1.apacheconf

# Turn off any default sites
sudo a2dissite 000-default
sudo a2dissite 192.168.22.10.xip.io
sudo a2disssite default-ssl

# Turn on new hello-laravel site
sudo a2ensite hello-laravel
sudo service apache2 reload

# Support for ruby-sass
sudo gem install sass
