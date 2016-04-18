#/bin/bash


username=$1
password=$2

htpasswd -db -c /etc/httpd/webDAV/$username.password $username $password
chown $username:apache /home/$username/user

cp /etc/httpd/conf/httpd.conf /etc/httpd/conf/httpd.conf.copy
sed '$d' /etc/httpd/conf/httpd.conf.copy > /etc/httpd/conf/httpd.conf
echo  -e "# $username\nAlias /$username /home/$username/user\n<Directory /home/$username/user>\nOptions         Indexes FollowSymLinks\nDAV             On\nAllowOverRide   All\nAuthType        Basic\nAuthName        "Xfficient-$username"\nAuthUserFile    /etc/httpd/webDAV/$username.password\nRequire         valid-user\n</Directory>\n<Location /home/$username/user>\nRequire     user $username\n</Location>\n</virtualHost>" >> /etc/httpd/conf/httpd.conf;
killall -HUP httpd;

