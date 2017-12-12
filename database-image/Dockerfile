FROM debian:jessie
MAINTAINER rt@opencaching.pl

ENV DEBIAN_FRONTEND noninteractive

# usefull packages
RUN apt-get update && apt-get -y install lsb-release vim tmux wget git --no-install-recommends
RUN wget -qP /tmp/ --no-check-certificate https://dev.mysql.com/get/mysql-apt-config_0.8.9-1_all.deb
RUN dpkg -i /tmp/mysql-apt-config_0.8.9-1_all.deb

# instalation of MySQL Server
RUN echo 'mysql-server mysql-server/root_password password toor' | debconf-set-selections
RUN echo 'mysql-server mysql-server/root_password_again password toor' | debconf-set-selections
RUN apt-get -y install mysql-server --no-install-recommends
RUN sed -ie "s/^bind-address\s*=\s*127\.0\.0\.1$/bind-address = 0.0.0.0/" /etc/mysql/my.cnf

# instalation of PHPMyAdmin
RUN echo 'phpmyadmin phpmyadmin/dbconfig-install boolean true' | debconf-set-selections
RUN echo 'phpmyadmin phpmyadmin/app-password-confirm password toor ' | debconf-set-selections
RUN echo 'phpmyadmin phpmyadmin/mysql/admin-pass password toor' | debconf-set-selections
RUN echo 'phpmyadmin phpmyadmin/mysql/app-pass password toor' | debconf-set-selections
RUN echo 'phpmyadmin phpmyadmin/reconfigure-webserver multiselect apache2' | debconf-set-selections
RUN /etc/init.d/mysql start; apt-get -y install phpmyadmin --no-install-recommends
RUN sed -ie "s/80/8080/" /etc/apache2/ports.conf ; sed -ie "s/80/8080/" /etc/apache2/sites-available/000-default.conf

# instaling devel database dump

COPY import_db.sh /tmp
RUN wget -qP /tmp/ http://kesze.mzylowski.pl/oc_dev_dump.sql.gz && /tmp/import_db.sh && rm /tmp/*

EXPOSE 3306
EXPOSE 8080

CMD service apache2 start; mysqld_safe
