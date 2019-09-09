FROM nimmis/ubuntu:14.04

MAINTAINER nimmis <kjell.havneskold@gmail.com>

# disable interactive functions
#ENV DEBIAN_FRONTEND noninteractive
ADD supervisor/conf.d/apache2.conf /etc/supervisor/conf.d/
RUN apt-get -y update
CMD apt-get -y install apache2 mysql-server php5-mysql php5 libapache2-mod-php5 php5-mcrypt && /etc/init.d/mysql start && mysql_install_db && mysql_secure_installation && printf "<IfModule mod_dir.c> \n    DirectoryIndex index.php index.cgi index.pl index.html index.xhtml index.htm \n </IfModule>" > /etc/apache2/mods-enabled/dir.conf && service supervisor restart && tail -f /dev/null

 	
#CMD service apache2 restart
# add apache2 service to supervisor
#ADD supervisor/conf.d/apache2.conf /etc/supervisor/conf.d/
