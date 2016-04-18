#/bin/bash

username=$1
password=$2

useradd  -g apache -s /bin/bash -p $(echo $password |openssl passwd -1 -stdin) $username; > /dev/null;
chsh -s /sbin/nologin $username > /dev/null;
mkdir /home/$username/user;

# passwd -l $username; > /dev/null;
chown $username:apache /home/$username/user; > /dev/null;


chmod -R g+rwxs /home/$username;
chmod -R g+rwxs /home/$username/user;


(echo $password;echo $password)|smbpasswd -s -a $username; > /dev/null
echo  -e "[$username]\ncomment = $username\nwritable = YES\nbrowseable = NO\nvalid user = $username\npath = /home/$username/user\n\n" >> /etc/samba/smb.conf;
killall -HUP smbd nmbd;
sh quota.sh 9765625 $username;
sh webdav_add.sh $username $password;

