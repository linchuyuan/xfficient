#/bin/bash

space=$1;
name=$2;


dd if=/dev/zero of=/home/disk/$name.ext3 count=$space;
/sbin/mkfs -t ext3 -q /home/disk/$name.ext3 -F;
echo "/home/disk/$name.ext3 /home/client/$name ext3 rw,loop,usrquota,grpquota 0 0" >> /etc/fstab;
mount -o loop,rw,usrquota,grpquota /home/disk/$name.ext3 /home/client/$name;
echo 'done'
