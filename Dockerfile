FROM ubuntu:latest

RUN apt-get update && apt-get install -y openssh-server dialog zip unzip bzip2 curl wget net-tools vim git \
    php php-common php-cgi php-cli php-bcmath php-bz2 php-curl php-json php-imap \
    php-intl php-mbstring php-mcrypt php-readline php-recode php-pear php-phpdbg \
    php-xdebug php-xml php-xmlrpc

RUN echo 'root:root' | chpasswd
RUN sed -i 's/PermitRootLogin prohibit-password/PermitRootLogin yes/' /etc/ssh/sshd_config

# SSH login fix. Otherwise user is kicked off after login
RUN sed 's@session\s*required\s*pam_loginuid.so@session optional pam_loginuid.so@g' -i /etc/pam.d/sshd

ENV NOTVISIBLE "in users profile"
RUN echo "export VISIBLE=now" >> /etc/profile

EXPOSE 22

RUN systemctl enable ssh
