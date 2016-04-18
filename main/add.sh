#/bin/bash


username=$1
password=$2


mkdir /home/client/$username;
htpasswd -db -c /etc/httpd/webDAV/$username.password $username $password;
chown apache:apache /home/client/$username;

cp /etc/httpd/conf/httpd.conf /etc/httpd/conf/httpd.conf.copy;
sed '$d' /etc/httpd/conf/httpd.conf.copy > /etc/httpd/conf/httpd.conf;
echo  -e "# $username\nAlias /$username /home/client/$username\n<Directory /home/client/$username>\nOptions         Indexes FollowSymLinks\nDAV             On\nAllowOverRide   All\nAuthType        Basic\nAuthName        "Xfficient-$username"\nAuthUserFile    /etc/httpd/webDAV/$username.password\nRequire         valid-user\n</Directory>\n<Location /home/client/$username>\nRequire     user $username\n</Location>\n</virtualHost>" >> /etc/httpd/conf/httpd.conf;

#sh quota.sh 9765625 $username;

killall -HUP httpd;
chown apache:apache /home/client/$username;

