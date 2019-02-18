Last login: Mon Feb 18 10:19:55 on console
SueyoshinoMac-mini:~ t_sueyoshi$ cd Vagrant
SueyoshinoMac-mini:Vagrant t_sueyoshi$ ls
CentOS7   CentOS72
SueyoshinoMac-mini:Vagrant t_sueyoshi$ cd CentOS7
SueyoshinoMac-mini:CentOS7 t_sueyoshi$ vagrant up
Bringing machine 'default' up with 'virtualbox' provider...
==> default: Clearing any previously set forwarded ports...
==> default: Clearing any previously set network interfaces...
==> default: Preparing network interfaces based on configuration...
    default: Adapter 1: nat
    default: Adapter 2: hostonly
==> default: Forwarding ports...
    default: 3307 (guest) => 3307 (host) (adapter 1)
    default: 22 (guest) => 2222 (host) (adapter 1)
==> default: Booting VM...
==> default: Waiting for machine to boot. This may take a few minutes...
    default: SSH address: 127.0.0.1:2222
    default: SSH username: vagrant
    default: SSH auth method: private key
    default: Warning: Connection reset. Retrying...
    default: Warning: Remote connection disconnect. Retrying...
==> default: Machine booted and ready!
==> default: Checking for guest additions in VM...
    default: The guest additions on this VM do not match the installed version of
    default: VirtualBox! In most cases this is fine, but in rare cases it can
    default: prevent things such as shared folders from working properly. If you see
    default: shared folder errors, please make sure the guest additions within the
    default: virtual machine match the version of VirtualBox you have installed on
    default: your host and reload your VM.
    default: 
    default: Guest Additions Version: 4.3.30
    default: VirtualBox Version: 6.0
==> default: [vagrant-hostsupdater] Checking for host entries
==> default: [vagrant-hostsupdater] Writing the following entries to (/etc/hosts)
==> default: [vagrant-hostsupdater]   192.168.33.10  localhost  # VAGRANT: b7f742ad368357c8fe5de4ecd92fe62b (default) / 81e73e2f-537d-4429-ab9c-cd08051e01e0
==> default: [vagrant-hostsupdater]   192.168.33.10  blog.dv  # VAGRANT: b7f742ad368357c8fe5de4ecd92fe62b (default) / 81e73e2f-537d-4429-ab9c-cd08051e01e0
==> default: [vagrant-hostsupdater] This operation requires administrative access. You may skip it by manually adding equivalent entries to the hosts file.
Password:
==> default: Setting hostname...
==> default: Configuring and enabling network interfaces...
==> default: Mounting shared folders...
    default: /vagrant => /Users/t_sueyoshi/Vagrant/CentOS7
==> default: Machine already provisioned. Run `vagrant provision` or use the `--provision`
==> default: flag to force provisioning. Provisioners marked to run always will still run.
SueyoshinoMac-mini:CentOS7 t_sueyoshi$ vagrant ssh
Last login: Fri Feb 15 10:14:57 2019 from 10.0.2.2
[vagrant@localhost ~]$ mysql -u root
Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 82
Server version: 5.7.25 MySQL Community Server (GPL)

Copyright (c) 2000, 2019, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> show databases
    -> ;
+--------------------+
| Database           |
+--------------------+
| information_schema |
| blog_cakephp       |
| mysql              |
| performance_schema |
| sys                |
+--------------------+
5 rows in set (0.01 sec)

mysql> use blog_cakephp
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Database changed
mysql> /*****************************
   /*> postsとtagsの中間テーブル
   /*> ******************************/
mysql> --テーブル作成
    -> CREATE TABLE posts_tags (
    ->     post_id INT(11);
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '--テーブル作成
CREATE TABLE posts_tags (
    post_id INT(11)' at line 1
mysql>     tag_id  INT(11);
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'tag_id  INT(11)' at line 1
mysql> );
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')' at line 1
mysql> 
mysql> --あらかじめ一部値を挿入
    -> INSERT posts_tags (
    -> post_id,
    -> tag_id
    -> )
    -> VALUES
    -> (   1,
    -> 1
    -> );
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '--あらかじめ一部値を挿入
INSERT posts_tags (
post_id,
tag_id
)
VALUES' at line 1
mysql> select * from posts_tags
    -> ;
ERROR 1146 (42S02): Table 'blog_cakephp.posts_tags' doesn't exist
mysql> show tables
    -> ;
+------------------------+
| Tables_in_blog_cakephp |
+------------------------+
| categories             |
| posts                  |
| users                  |
+------------------------+
3 rows in set (0.00 sec)

mysql> CREATE TABLE posts_tags (
    ->     post_id INT(11);
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 2
mysql>     tag_id  INT(11);
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'tag_id  INT(11)' at line 1
mysql> );
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')' at line 1
mysql> /*****************************
   /*> postsとtagsの中間テーブル
   /*> ******************************/
mysql> --テーブル作成
    -> CREATE TABLE posts_tags (
    ->     post_id INT(11),
    ->     tag_id  INT(11),
    -> );
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '--テーブル作成
CREATE TABLE posts_tags (
    post_id INT(11),
    tag_id  ' at line 1
mysql> 
mysql> --あらかじめ一部値を挿入
    -> INSERT posts_tags (
    -> post_id,
    -> tag_id
    -> )
    -> VALUES
    -> (   1,
    -> 1
    -> );
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '--あらかじめ一部値を挿入
INSERT posts_tags (
post_id,
tag_id
)
VALUES' at line 1
mysql> show tables
    -> ;
+------------------------+
| Tables_in_blog_cakephp |
+------------------------+
| categories             |
| posts                  |
| users                  |
+------------------------+
3 rows in set (0.00 sec)

mysql> CREATE TABLE posts_tags (
    ->     post_id INT(11),
    ->     tag_id  INT(11)
    -> );
Query OK, 0 rows affected (0.01 sec)

mysql> --あらかじめ一部値を挿入
    -> INSERT posts_tags (
    -> post_id,
    -> tag_id
    -> )
    -> VALUES
    -> (   1,
    -> 1
    -> );
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '--あらかじめ一部値を挿入
INSERT posts_tags (
post_id,
tag_id
)
VALUES' at line 1
mysql> SELECT * from posts_tags;
Empty set (0.00 sec)

mysql> INSERT posts_tags (
    -> post_id,
    -> tag_id
    -> )
    -> VALUES
    -> (   1,
    -> 1
    -> );
Query OK, 1 row affected (0.01 sec)

mysql> SELECT * from posts_tags;
+---------+--------+
| post_id | tag_id |
+---------+--------+
|       1 |      1 |
+---------+--------+
1 row in set (0.00 sec)

mysql> status
--------------
mysql  Ver 14.14 Distrib 5.7.25, for Linux (x86_64) using  EditLine wrapper

Connection id:    82
Current database: blog_cakephp
Current user:   root@
SSL:      Not in use
Current pager:    stdout
Using outfile:    ''
Using delimiter:  ;
Server version:   5.7.25 MySQL Community Server (GPL)
Protocol version: 10
Connection:   Localhost via UNIX socket
Server characterset:  latin1
Db     characterset:  latin1
Client characterset:  utf8
Conn.  characterset:  utf8
UNIX socket:    /var/lib/mysql/mysql.sock
Uptime:     2 hours 49 min 47 sec

Threads: 1  Questions: 533  Slow queries: 0  Opens: 145  Flush tables: 1  Open tables: 140  Queries per second avg: 0.052
--------------

mysql> cd /etc/httpd/
    -> ^C
mysql> exit;
Bye
[vagrant@localhost ~]$ cd /etc/httpd/
[vagrant@localhost httpd]$ ls
conf  conf.d  conf.modules.d  logs  modules  run
[vagrant@localhost httpd]$ cd conf.d
[vagrant@localhost conf.d]$ ls
README  autoindex.conf  httpd-vhosts.conf  php.conf  userdir.conf  welcome.conf
[vagrant@localhost conf.d]$ cd ../ conf/
[vagrant@localhost httpd]$ ls
conf  conf.d  conf.modules.d  logs  modules  run
[vagrant@localhost httpd]$ cd /usr/local/mysql/
-bash: cd: /usr/local/mysql/: そのようなファイルやディレクトリはありません
[vagrant@localhost httpd]$ touch my.conf
touch: `my.conf' に touch できません: 許可がありません
[vagrant@localhost httpd]$ sudo touch my.conf
[vagrant@localhost httpd]$ ls
conf  conf.d  conf.modules.d  logs  modules  my.conf  run
[vagrant@localhost httpd]$ rm -f my.conf
rm: `my.conf' を削除できません: 許可がありません
[vagrant@localhost httpd]$ sudo rm -f my.conf
[vagrant@localhost httpd]$ cd conf.d
[vagrant@localhost conf.d]$ ls
README  autoindex.conf  httpd-vhosts.conf  php.conf  userdir.conf  welcome.conf
[vagrant@localhost conf.d]$ sudo touch my.conf
[vagrant@localhost conf.d]$ ls
README          httpd-vhosts.conf  php.conf      welcome.conf
autoindex.conf  my.conf            userdir.conf
[vagrant@localhost conf.d]$ sudo vi my.conf
[vagrant@localhost conf.d]$ service httpd restart
Redirecting to /bin/systemctl restart  httpd.service
==== AUTHENTICATING FOR org.freedesktop.systemd1.manage-units ===
Authentication is required to manage system services or units.
Authenticating as: root
Password: 
==== AUTHENTICATION COMPLETE ===
Job for httpd.service failed because the control process exited with error code. See "systemctl status httpd.service" and "journalctl -xe" for details.
[vagrant@localhost conf.d]$ mysql -u root
Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 83
Server version: 5.7.25 MySQL Community Server (GPL)

Copyright (c) 2000, 2019, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> status
--------------
mysql  Ver 14.14 Distrib 5.7.25, for Linux (x86_64) using  EditLine wrapper

Connection id:    83
Current database: 
Current user:   root@
SSL:      Not in use
Current pager:    stdout
Using outfile:    ''
Using delimiter:  ;
Server version:   5.7.25 MySQL Community Server (GPL)
Protocol version: 10
Connection:   Localhost via UNIX socket
Server characterset:  latin1
Db     characterset:  latin1
Client characterset:  utf8
Conn.  characterset:  utf8
UNIX socket:    /var/lib/mysql/mysql.sock
Uptime:     2 hours 54 min 34 sec

Threads: 1  Questions: 538  Slow queries: 0  Opens: 145  Flush tables: 1  Open tables: 140  Queries per second avg: 0.051
--------------

mysql> exit
Bye
[vagrant@localhost conf.d]$ cd /etc/
[vagrant@localhost etc]$ sudo vi my.cnf
[vagrant@localhost etc]$ service httpd restart
Redirecting to /bin/systemctl restart  httpd.service
==== AUTHENTICATING FOR org.freedesktop.systemd1.manage-units ===
Authentication is required to manage system services or units.
Authenticating as: root
Password: 
==== AUTHENTICATION COMPLETE ===
Job for httpd.service failed because the control process exited with error code. See "systemctl status httpd.service" and "journalctl -xe" for details.
[vagrant@localhost etc]$ mysql -u root
mysql: [ERROR] unknown variable 'symbolic-links=0'
[vagrant@localhost etc]$ mysql -u root
mysql: [ERROR] unknown variable 'symbolic-links=0'
[vagrant@localhost etc]$ sudo vi my.cnf
[vagrant@localhost etc]$ service httpd restart
Redirecting to /bin/systemctl restart  httpd.service
==== AUTHENTICATING FOR org.freedesktop.systemd1.manage-units ===
Authentication is required to manage system services or units.
Authenticating as: root
Password: 
==== AUTHENTICATION COMPLETE ===
Job for httpd.service failed because the control process exited with error code. See "systemctl status httpd.service" and "journalctl -xe" for details.
[vagrant@localhost etc]$ systemctl status httpd.service
● httpd.service - The Apache HTTP Server
   Loaded: loaded (/usr/lib/systemd/system/httpd.service; enabled; vendor preset: disabled)
   Active: failed (Result: exit-code) since 月 2019-02-18 13:32:41 JST; 21s ago
     Docs: man:httpd(8)
           man:apachectl(8)
  Process: 5947 ExecStop=/bin/kill -WINCH ${MAINPID} (code=exited, status=1/FAILURE)
  Process: 5739 ExecReload=/usr/sbin/httpd $OPTIONS -k graceful (code=exited, status=0/SUCCESS)
  Process: 5945 ExecStart=/usr/sbin/httpd $OPTIONS -DFOREGROUND (code=exited, status=1/FAILURE)
 Main PID: 5945 (code=exited, status=1/FAILURE)
[vagrant@localhost etc]$ cd /etc/httpd/
[vagrant@localhost httpd]$ ls
conf  conf.d  conf.modules.d  logs  modules  run
[vagrant@localhost httpd]$ cd conf.d
[vagrant@localhost conf.d]$ ls
README          httpd-vhosts.conf  php.conf      welcome.conf
autoindex.conf  my.conf            userdir.conf
[vagrant@localhost conf.d]$ sudo rm -f my.conf
[vagrant@localhost conf.d]$ service httpd restart
Redirecting to /bin/systemctl restart  httpd.service
==== AUTHENTICATING FOR org.freedesktop.systemd1.manage-units ===
Authentication is required to manage system services or units.
Authenticating as: root
Password: 
==== AUTHENTICATION COMPLETE ===
[vagrant@localhost conf.d]$ mysql -u root
mysql: [ERROR] unknown variable 'symbolic-links=0'
[vagrant@localhost conf.d]$ systemctl status httpd.service
● httpd.service - The Apache HTTP Server
   Loaded: loaded (/usr/lib/systemd/system/httpd.service; enabled; vendor preset: disabled)
   Active: active (running) since 月 2019-02-18 13:34:04 JST; 24s ago
     Docs: man:httpd(8)
           man:apachectl(8)
  Process: 5947 ExecStop=/bin/kill -WINCH ${MAINPID} (code=exited, status=1/FAILURE)
  Process: 5739 ExecReload=/usr/sbin/httpd $OPTIONS -k graceful (code=exited, status=0/SUCCESS)
 Main PID: 5977 (httpd)
   Status: "Total requests: 0; Current requests/sec: 0; Current traffic:   0 B/sec"
   CGroup: /system.slice/httpd.service
           ├─5977 /usr/sbin/httpd -DFOREGROUND
           ├─5978 /usr/sbin/httpd -DFOREGROUND
           ├─5979 /usr/sbin/httpd -DFOREGROUND
           ├─5980 /usr/sbin/httpd -DFOREGROUND
           ├─5981 /usr/sbin/httpd -DFOREGROUND
           └─5982 /usr/sbin/httpd -DFOREGROUND
[vagrant@localhost conf.d]$ mysql -u root
mysql: [ERROR] unknown variable 'symbolic-links=0'
[vagrant@localhost conf.d]$ sudo vi /etc/my.cnf
[vagrant@localhost conf.d]$ service httpd restart
Redirecting to /bin/systemctl restart  httpd.service
==== AUTHENTICATING FOR org.freedesktop.systemd1.manage-units ===
Authentication is required to manage system services or units.
Authenticating as: root
Password: 
==== AUTHENTICATION COMPLETE ===
[vagrant@localhost conf.d]$ mysql -u root
Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 84
Server version: 5.7.25 MySQL Community Server (GPL)

Copyright (c) 2000, 2019, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> exit
Bye
[vagrant@localhost conf.d]$ mysql -u root
Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 85
Server version: 5.7.25 MySQL Community Server (GPL)

Copyright (c) 2000, 2019, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> show databases
    -> ;
+--------------------+
| Database           |
+--------------------+
| information_schema |
| blog_cakephp       |
| mysql              |
| performance_schema |
| sys                |
+--------------------+
5 rows in set (0.00 sec)

mysql> use blog_cakephp
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Database changed
mysql> show tables;
+------------------------+
| Tables_in_blog_cakephp |
+------------------------+
| categories             |
| posts                  |
| posts_tags             |
| users                  |
+------------------------+
4 rows in set (0.00 sec)

mysql> status
--------------
mysql  Ver 14.14 Distrib 5.7.25, for Linux (x86_64) using  EditLine wrapper

Connection id:    85
Current database: blog_cakephp
Current user:   root@
SSL:      Not in use
Current pager:    stdout
Using outfile:    ''
Using delimiter:  ;
Server version:   5.7.25 MySQL Community Server (GPL)
Protocol version: 10
Connection:   Localhost via UNIX socket
Server characterset:  latin1
Db     characterset:  latin1
Client characterset:  utf8
Conn.  characterset:  utf8
UNIX socket:    /var/lib/mysql/mysql.sock
Uptime:     3 hours 11 min 55 sec

Threads: 1  Questions: 555  Slow queries: 0  Opens: 146  Flush tables: 1  Open tables: 141  Queries per second avg: 0.048
--------------

mysql> exit
Bye
[vagrant@localhost conf.d]$ mysqldump
Usage: mysqldump [OPTIONS] database [tables]
OR     mysqldump [OPTIONS] --databases [OPTIONS] DB1 [DB2 DB3...]
OR     mysqldump [OPTIONS] --all-databases [OPTIONS]
For more options, use mysqldump --help
[vagrant@localhost conf.d]$ mysqldump -u root -p -h localhost -A -d -n > ~/dump.sql
Enter password: 
[vagrant@localhost conf.d]$ sudo vi ~/dump.sql
[vagrant@localhost conf.d]$ mysqldump -u root -p -h localhost -A  -n > ~/dump.sql
Enter password: 
[vagrant@localhost conf.d]$ sudo vi ~/dump.sql
[vagrant@localhost conf.d]$ mysql -u root
Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 88
Server version: 5.7.25 MySQL Community Server (GPL)

Copyright (c) 2000, 2019, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> create database blog_cakephp_backup ;
Query OK, 1 row affected (0.00 sec)

mysql> show databases
    -> ;
+---------------------+
| Database            |
+---------------------+
| information_schema  |
| blog_cakephp        |
| blog_cakephp_backup |
| mysql               |
| performance_schema  |
| sys                 |
+---------------------+
6 rows in set (0.00 sec)

mysql> exit
Bye
[vagrant@localhost conf.d]$ sudo vi ~/dump.sql
[vagrant@localhost conf.d]$ mysql -u root -p -h localhost blog_cakephp_backup < ~/dump.sql
Enter password: 
[vagrant@localhost conf.d]$ mysql -u root
Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 90
Server version: 5.7.25 MySQL Community Server (GPL)

Copyright (c) 2000, 2019, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> show databases;
+---------------------+
| Database            |
+---------------------+
| information_schema  |
| blog_cakephp        |
| blog_cakephp_backup |
| mysql               |
| performance_schema  |
| sys                 |
+---------------------+
6 rows in set (0.00 sec)

mysql> use blog_cakephp_backup;
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Database changed
mysql> show tables;
+-------------------------------+
| Tables_in_blog_cakephp_backup |
+-------------------------------+
| categories                    |
| posts                         |
| posts_tags                    |
| users                         |
+-------------------------------+
4 rows in set (0.00 sec)

mysql> select * from posts;
+----+---------+---------+---------------------+---------------------+---------+-------------+
| id | title   | body    | created             | modified            | user_id | category_id |
+----+---------+---------+---------------------+---------------------+---------+-------------+
|  1 | title 1 | body 1  | 2019-02-14 10:21:41 | 2019-02-18 11:59:24 |    NULL |           3 |
|  2 | title 2 | body 2  | 2019-02-14 10:21:41 | NULL                |    NULL |           2 |
|  3 | title 3 | body 3  | 2019-02-14 10:21:41 | 2019-02-18 11:53:44 |    NULL |           2 |
|  5 | title 4 | body 4  | 2019-02-15 10:47:27 | 2019-02-15 10:47:27 |    NULL |           1 |
|  6 | author1 | author1 | 2019-02-15 11:37:18 | 2019-02-15 11:37:18 |       2 |           1 |
+----+---------+---------+---------------------+---------------------+---------+-------------+
5 rows in set (0.00 sec)

mysql> status
--------------
mysql  Ver 14.14 Distrib 5.7.25, for Linux (x86_64) using  EditLine wrapper

Connection id:    90
Current database: blog_cakephp_backup
Current user:   root@
SSL:      Not in use
Current pager:    stdout
Using outfile:    ''
Using delimiter:  ;
Server version:   5.7.25 MySQL Community Server (GPL)
Protocol version: 10
Connection:   Localhost via UNIX socket
Server characterset:  latin1
Db     characterset:  latin1
Client characterset:  utf8
Conn.  characterset:  utf8
UNIX socket:    /var/lib/mysql/mysql.sock
Uptime:     3 hours 39 min 20 sec

Threads: 1  Questions: 1794  Slow queries: 0  Opens: 317  Flush tables: 1  Open tables: 175  Queries per second avg: 0.136
--------------

mysql> show variables like 'character%';
+--------------------------+----------------------------+
| Variable_name            | Value                      |
+--------------------------+----------------------------+
| character_set_client     | utf8                       |
| character_set_connection | utf8                       |
| character_set_database   | latin1                     |
| character_set_filesystem | binary                     |
| character_set_results    | utf8                       |
| character_set_server     | latin1                     |
| character_set_system     | utf8                       |
| character_sets_dir       | /usr/share/mysql/charsets/ |
+--------------------------+----------------------------+
8 rows in set (0.00 sec)

mysql> exit
Bye
[vagrant@localhost conf.d]$ sudo vi /etc/my.cnf
[vagrant@localhost conf.d]$ service mysqld restart
Redirecting to /bin/systemctl restart  mysqld.service
==== AUTHENTICATING FOR org.freedesktop.systemd1.manage-units ===
Authentication is required to manage system services or units.
Authenticating as: root
Password: 
==== AUTHENTICATION COMPLETE ===
[vagrant@localhost conf.d]$ mysql -u root
Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 2
Server version: 5.7.25 MySQL Community Server (GPL)

Copyright (c) 2000, 2019, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> show databases;
+---------------------+
| Database            |
+---------------------+
| information_schema  |
| blog_cakephp        |
| blog_cakephp_backup |
| mysql               |
| performance_schema  |
| sys                 |
+---------------------+
6 rows in set (0.00 sec)

mysql> use blog_cakephp_backup;
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Database changed
mysql> show variables like 'character%'
    -> ;
+--------------------------+----------------------------+
| Variable_name            | Value                      |
+--------------------------+----------------------------+
| character_set_client     | utf8                       |
| character_set_connection | utf8                       |
| character_set_database   | latin1                     |
| character_set_filesystem | binary                     |
| character_set_results    | utf8                       |
| character_set_server     | utf8                       |
| character_set_system     | utf8                       |
| character_sets_dir       | /usr/share/mysql/charsets/ |
+--------------------------+----------------------------+
8 rows in set (0.00 sec)

mysql> exit
Bye
[vagrant@localhost conf.d]$ sudo vi ~/dump.sql
[vagrant@localhost conf.d]$ mysql -u root -p -h localhost blog_cakephp_backup < ~/dump.sql
Enter password: 
[vagrant@localhost conf.d]$ mysql -u root
Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 4
Server version: 5.7.25 MySQL Community Server (GPL)

Copyright (c) 2000, 2019, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> show variables like 'character%';
+--------------------------+----------------------------+
| Variable_name            | Value                      |
+--------------------------+----------------------------+
| character_set_client     | utf8                       |
| character_set_connection | utf8                       |
| character_set_database   | utf8                       |
| character_set_filesystem | binary                     |
| character_set_results    | utf8                       |
| character_set_server     | utf8                       |
| character_set_system     | utf8                       |
| character_sets_dir       | /usr/share/mysql/charsets/ |
+--------------------------+----------------------------+
8 rows in set (0.00 sec)

mysql> use blog_cakephp
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Database changed
mysql> show variables like 'character%';
+--------------------------+----------------------------+
| Variable_name            | Value                      |
+--------------------------+----------------------------+
| character_set_client     | utf8                       |
| character_set_connection | utf8                       |
| character_set_database   | latin1                     |
| character_set_filesystem | binary                     |
| character_set_results    | utf8                       |
| character_set_server     | utf8                       |
| character_set_system     | utf8                       |
| character_sets_dir       | /usr/share/mysql/charsets/ |
+--------------------------+----------------------------+
8 rows in set (0.00 sec)

mysql> mysql -u root -p -h localhost blog_cakephp_backup < ~/dump.sql
    -> ;
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'mysql -u root -p -h localhost blog_cakephp_backup < ~/dump.sql' at line 1
mysql> mysql -u root -p -h localhost blog_cakephp < ~/dump.sql;
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'mysql -u root -p -h localhost blog_cakephp < ~/dump.sql' at line 1
mysql> mysql -u root -p -h localhost blog_cakephp < ~/dump.sql;
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'mysql -u root -p -h localhost blog_cakephp < ~/dump.sql' at line 1
mysql> mysql -u root -p -h localhost blog_cakephp < ~/dump.sql
    -> ;
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'mysql -u root -p -h localhost blog_cakephp < ~/dump.sql' at line 1
mysql> mysql -u root -p -h localhost blog_cakephp < ~/dump.sql
    -> ^C
mysql> exit
Bye
[vagrant@localhost conf.d]$ mysql -u root -p -h localhost blog_cakephp < ~/dump.sql
Enter password: 
[vagrant@localhost conf.d]$ mysql -u root
Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 9
Server version: 5.7.25 MySQL Community Server (GPL)

Copyright (c) 2000, 2019, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> use blog_cakephp
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Database changed
mysql> show variables like 'character%';
+--------------------------+----------------------------+
| Variable_name            | Value                      |
+--------------------------+----------------------------+
| character_set_client     | utf8                       |
| character_set_connection | utf8                       |
| character_set_database   | latin1                     |
| character_set_filesystem | binary                     |
| character_set_results    | utf8                       |
| character_set_server     | utf8                       |
| character_set_system     | utf8                       |
| character_sets_dir       | /usr/share/mysql/charsets/ |
+--------------------------+----------------------------+
8 rows in set (0.00 sec)

mysql> mysql -u root -p -h localhost blog_cakephp^C ~/dump.sql
mysql> exit
Bye
[vagrant@localhost conf.d]$ mysql -u root -p -h localhost blog_cakephp < ~/dump.sql
Enter password: 
[vagrant@localhost conf.d]$ service mysqld restart
Redirecting to /bin/systemctl restart  mysqld.service
==== AUTHENTICATING FOR org.freedesktop.systemd1.manage-units ===
Authentication is required to manage system services or units.
Authenticating as: root
Password: 
==== AUTHENTICATION COMPLETE ===
[vagrant@localhost conf.d]$ mysql -u root
Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 2
Server version: 5.7.25 MySQL Community Server (GPL)

Copyright (c) 2000, 2019, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> show databases
    -> ;
+---------------------+
| Database            |
+---------------------+
| information_schema  |
| blog_cakephp        |
| blog_cakephp_backup |
| mysql               |
| performance_schema  |
| sys                 |
+---------------------+
6 rows in set (0.00 sec)

mysql> use blog_cakephp
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Database changed
mysql> status
--------------
mysql  Ver 14.14 Distrib 5.7.25, for Linux (x86_64) using  EditLine wrapper

Connection id:    2
Current database: blog_cakephp
Current user:   root@
SSL:      Not in use
Current pager:    stdout
Using outfile:    ''
Using delimiter:  ;
Server version:   5.7.25 MySQL Community Server (GPL)
Protocol version: 10
Connection:   Localhost via UNIX socket
Server characterset:  utf8
Db     characterset:  latin1
Client characterset:  utf8
Conn.  characterset:  utf8
UNIX socket:    /var/lib/mysql/mysql.sock
Uptime:     36 sec

Threads: 1  Questions: 14  Slow queries: 0  Opens: 100  Flush tables: 1  Open tables: 95  Queries per second avg: 0.388
--------------

mysql> show variables like 'character%';
+--------------------------+----------------------------+
| Variable_name            | Value                      |
+--------------------------+----------------------------+
| character_set_client     | utf8                       |
| character_set_connection | utf8                       |
| character_set_database   | latin1                     |
| character_set_filesystem | binary                     |
| character_set_results    | utf8                       |
| character_set_server     | utf8                       |
| character_set_system     | utf8                       |
| character_sets_dir       | /usr/share/mysql/charsets/ |
+--------------------------+----------------------------+
8 rows in set (0.00 sec)

mysql> mysql -u root -p -h localhost blog_cakephp_backup < ~^Cump.sql
mysql> exit;
Bye
[vagrant@localhost conf.d]$ mysql -u root -p -h localhost blog_cakephp < ~/dump.sql
Enter password: 
[vagrant@localhost conf.d]$ mysql -u root
Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 6
Server version: 5.7.25 MySQL Community Server (GPL)

Copyright (c) 2000, 2019, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> status
--------------
mysql  Ver 14.14 Distrib 5.7.25, for Linux (x86_64) using  EditLine wrapper

Connection id:    6
Current database: 
Current user:   root@
SSL:      Not in use
Current pager:    stdout
Using outfile:    ''
Using delimiter:  ;
Server version:   5.7.25 MySQL Community Server (GPL)
Protocol version: 10
Connection:   Localhost via UNIX socket
Server characterset:  utf8
Db     characterset:  utf8
Client characterset:  utf8
Conn.  characterset:  utf8
UNIX socket:    /var/lib/mysql/mysql.sock
Uptime:     5 min 20 sec

Threads: 1  Questions: 369  Slow queries: 0  Opens: 143  Flush tables: 1  Open tables: 105  Queries per second avg: 1.153
--------------

mysql> use blog_cakephp
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Database changed
mysql> status
--------------
mysql  Ver 14.14 Distrib 5.7.25, for Linux (x86_64) using  EditLine wrapper

Connection id:    6
Current database: blog_cakephp
Current user:   root@
SSL:      Not in use
Current pager:    stdout
Using outfile:    ''
Using delimiter:  ;
Server version:   5.7.25 MySQL Community Server (GPL)
Protocol version: 10
Connection:   Localhost via UNIX socket
Server characterset:  utf8
Db     characterset:  latin1
Client characterset:  utf8
Conn.  characterset:  utf8
UNIX socket:    /var/lib/mysql/mysql.sock
Uptime:     5 min 41 sec

Threads: 1  Questions: 380  Slow queries: 0  Opens: 147  Flush tables: 1  Open tables: 109  Queries per second avg: 1.114
--------------

mysql> rename blog_cakephp to blog_cakephp_before
    -> ;
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'blog_cakephp to blog_cakephp_before' at line 1
mysql> rename blog_cakephp to test;
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'blog_cakephp to test' at line 1
mysql> show databases;
+---------------------+
| Database            |
+---------------------+
| information_schema  |
| blog_cakephp        |
| blog_cakephp_backup |
| mysql               |
| performance_schema  |
| sys                 |
+---------------------+
6 rows in set (0.00 sec)

mysql> rename blog_cakephp_backup to blog_cakephp_back;
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'blog_cakephp_backup to blog_cakephp_back' at line 1
mysql> create database;
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 1
mysql> create database backup;
Query OK, 1 row affected (0.00 sec)

mysql> use database;
ERROR 1049 (42000): Unknown database 'database'
mysql> use backup;
Database changed
mysql> status;
--------------
mysql  Ver 14.14 Distrib 5.7.25, for Linux (x86_64) using  EditLine wrapper

Connection id:    6
Current database: backup
Current user:   root@
SSL:      Not in use
Current pager:    stdout
Using outfile:    ''
Using delimiter:  ;
Server version:   5.7.25 MySQL Community Server (GPL)
Protocol version: 10
Connection:   Localhost via UNIX socket
Server characterset:  utf8
Db     characterset:  utf8
Client characterset:  utf8
Conn.  characterset:  utf8
UNIX socket:    /var/lib/mysql/mysql.sock
Uptime:     14 min 18 sec

Threads: 1  Questions: 395  Slow queries: 0  Opens: 147  Flush tables: 1  Open tables: 109  Queries per second avg: 0.460
--------------

mysql> show databases;
+---------------------+
| Database            |
+---------------------+
| information_schema  |
| backup              |
| blog_cakephp        |
| blog_cakephp_backup |
| mysql               |
| performance_schema  |
| sys                 |
+---------------------+
7 rows in set (0.00 sec)

mysql> use mysql
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Database changed
mysql> show tables;
+---------------------------+
| Tables_in_mysql           |
+---------------------------+
| columns_priv              |
| db                        |
| engine_cost               |
| event                     |
| func                      |
| general_log               |
| gtid_executed             |
| help_category             |
| help_keyword              |
| help_relation             |
| help_topic                |
| innodb_index_stats        |
| innodb_table_stats        |
| ndb_binlog_index          |
| plugin                    |
| proc                      |
| procs_priv                |
| proxies_priv              |
| server_cost               |
| servers                   |
| slave_master_info         |
| slave_relay_log_info      |
| slave_worker_info         |
| slow_log                  |
| tables_priv               |
| time_zone                 |
| time_zone_leap_second     |
| time_zone_name            |
| time_zone_transition      |
| time_zone_transition_type |
| user                      |
+---------------------------+
31 rows in set (0.00 sec)

mysql> exit
Bye
[vagrant@localhost conf.d]$ mysql -u root -p -h localhost blog_cakephp < ~/dump.sql
Enter password: 
[vagrant@localhost conf.d]$ mysql -u root 
Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 8
Server version: 5.7.25 MySQL Community Server (GPL)

Copyright (c) 2000, 2019, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> status
--------------
mysql  Ver 14.14 Distrib 5.7.25, for Linux (x86_64) using  EditLine wrapper

Connection id:    8
Current database: 
Current user:   root@
SSL:      Not in use
Current pager:    stdout
Using outfile:    ''
Using delimiter:  ;
Server version:   5.7.25 MySQL Community Server (GPL)
Protocol version: 10
Connection:   Localhost via UNIX socket
Server characterset:  utf8
Db     characterset:  utf8
Client characterset:  utf8
Conn.  characterset:  utf8
UNIX socket:    /var/lib/mysql/mysql.sock
Uptime:     21 min 52 sec

Threads: 1  Questions: 774  Slow queries: 0  Opens: 213  Flush tables: 1  Open tables: 119  Queries per second avg: 0.589
--------------

mysql> use blog_cakephp
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Database changed
mysql> status
--------------
mysql  Ver 14.14 Distrib 5.7.25, for Linux (x86_64) using  EditLine wrapper

Connection id:    8
Current database: blog_cakephp
Current user:   root@
SSL:      Not in use
Current pager:    stdout
Using outfile:    ''
Using delimiter:  ;
Server version:   5.7.25 MySQL Community Server (GPL)
Protocol version: 10
Connection:   Localhost via UNIX socket
Server characterset:  utf8
Db     characterset:  latin1
Client characterset:  utf8
Conn.  characterset:  utf8
UNIX socket:    /var/lib/mysql/mysql.sock
Uptime:     22 min 12 sec

Threads: 1  Questions: 785  Slow queries: 0  Opens: 217  Flush tables: 1  Open tables: 123  Queries per second avg: 0.589
--------------

mysql> show databases;
+---------------------+
| Database            |
+---------------------+
| information_schema  |
| backup              |
| blog_cakephp        |
| blog_cakephp_backup |
| mysql               |
| performance_schema  |
| sys                 |
+---------------------+
7 rows in set (0.00 sec)

mysql> exit ssh-config
    -> ;
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'exit ssh-config' at line 1
mysql> exit
Bye
[vagrant@localhost conf.d]$ ssh-config
-bash: ssh-config: コマンドが見つかりません
[vagrant@localhost conf.d]$ exit
ログアウト
Connection to 127.0.0.1 closed.
SueyoshinoMac-mini:CentOS7 t_sueyoshi$ vagrant halt
==> default: Attempting graceful shutdown of VM...
==> default: [vagrant-hostsupdater] Removing hosts
Password:
SueyoshinoMac-mini:CentOS7 t_sueyoshi$ vagrant up
Bringing machine 'default' up with 'virtualbox' provider...
==> default: Clearing any previously set forwarded ports...
==> default: Clearing any previously set network interfaces...
==> default: Preparing network interfaces based on configuration...
    default: Adapter 1: nat
    default: Adapter 2: hostonly
==> default: Forwarding ports...
    default: 3307 (guest) => 3307 (host) (adapter 1)
    default: 22 (guest) => 2222 (host) (adapter 1)
==> default: Booting VM...
==> default: Waiting for machine to boot. This may take a few minutes...
    default: SSH address: 127.0.0.1:2222
    default: SSH username: vagrant
    default: SSH auth method: private key
    default: Warning: Connection reset. Retrying...
    default: Warning: Remote connection disconnect. Retrying...
==> default: Machine booted and ready!
==> default: Checking for guest additions in VM...
    default: The guest additions on this VM do not match the installed version of
    default: VirtualBox! In most cases this is fine, but in rare cases it can
    default: prevent things such as shared folders from working properly. If you see
    default: shared folder errors, please make sure the guest additions within the
    default: virtual machine match the version of VirtualBox you have installed on
    default: your host and reload your VM.
    default: 
    default: Guest Additions Version: 4.3.30
    default: VirtualBox Version: 6.0
==> default: [vagrant-hostsupdater] Checking for host entries
==> default: [vagrant-hostsupdater] Writing the following entries to (/etc/hosts)
==> default: [vagrant-hostsupdater]   192.168.33.10  localhost  # VAGRANT: b7f742ad368357c8fe5de4ecd92fe62b (default) / 81e73e2f-537d-4429-ab9c-cd08051e01e0
==> default: [vagrant-hostsupdater]   192.168.33.10  blog.dv  # VAGRANT: b7f742ad368357c8fe5de4ecd92fe62b (default) / 81e73e2f-537d-4429-ab9c-cd08051e01e0
==> default: [vagrant-hostsupdater] This operation requires administrative access. You may skip it by manually adding equivalent entries to the hosts file.
==> default: Setting hostname...
==> default: Configuring and enabling network interfaces...
==> default: Mounting shared folders...
    default: /vagrant => /Users/t_sueyoshi/Vagrant/CentOS7
==> default: Machine already provisioned. Run `vagrant provision` or use the `--provision`
==> default: flag to force provisioning. Provisioners marked to run always will still run.
SueyoshinoMac-mini:CentOS7 t_sueyoshi$ vagrant ssh
Last login: Mon Feb 18 13:13:04 2019 from 10.0.2.2
[vagrant@localhost ~]$ mysql -u root;
Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 2
Server version: 5.7.25 MySQL Community Server (GPL)

Copyright (c) 2000, 2019, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> create database dotinstall_blog_cakephp;
Query OK, 1 row affected (0.00 sec)

mysql> grant all on dotinstall_blog_cakephp.* to dbuser@localhost identified by '28fa8Iuy';
ERROR 1290 (HY000): The MySQL server is running with the --skip-grant-tables option so it cannot execute this statement
mysql> service mysqld stop
    -> ;
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'service mysqld stop' at line 1
mysql> exit;
Bye
[vagrant@localhost ~]$ service mysqld stop
Redirecting to /bin/systemctl stop  mysqld.service
==== AUTHENTICATING FOR org.freedesktop.systemd1.manage-units ===
Authentication is required to manage system services or units.
Authenticating as: root
Password: 
==== AUTHENTICATION COMPLETE ===
[vagrant@localhost ~]$ mysql -u root
ERROR 2002 (HY000): Can't connect to local MySQL server through socket '/var/lib/mysql/mysql.sock' (2)
[vagrant@localhost ~]$ service mysqld start
Redirecting to /bin/systemctl start  mysqld.service
==== AUTHENTICATING FOR org.freedesktop.systemd1.manage-units ===
Authentication is required to manage system services or units.
Authenticating as: root
Password: 
==== AUTHENTICATION COMPLETE ===
[vagrant@localhost ~]$ mysql -u root
Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 2
Server version: 5.7.25 MySQL Community Server (GPL)

Copyright (c) 2000, 2019, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> grant all on dotinstall_blog_cakephp.* to dbuser@localhost identified by '28fa8Iuy';
ERROR 1290 (HY000): The MySQL server is running with the --skip-grant-tables option so it cannot execute this statement
mysql> show databases
    -> ;
+-------------------------+
| Database                |
+-------------------------+
| information_schema      |
| backup                  |
| blog_cakephp            |
| blog_cakephp_backup     |
| dotinstall_blog_cakephp |
| mysql                   |
| performance_schema      |
| sys                     |
+-------------------------+
8 rows in set (0.00 sec)

mysql> drop database dotinstall_blog_cakephp
    -> ;
Query OK, 0 rows affected (0.01 sec)

mysql> show databases
    -> ;
+---------------------+
| Database            |
+---------------------+
| information_schema  |
| backup              |
| blog_cakephp        |
| blog_cakephp_backup |
| mysql               |
| performance_schema  |
| sys                 |
+---------------------+
7 rows in set (0.00 sec)

mysql> use blog_cakephp 
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Database changed
mysql> CREATE TABLE tags (
    ->     id INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    ->     lft INTEGER(10) DEFAULT NULL,
    ->     rght INTEGER(10) DEFAULT NULL,
    ->     name VARCHAR(255) DEFAULT '',
    ->     PRIMARY KEY  (id)
    -> );
Query OK, 0 rows affected (0.01 sec)

mysql> INSERT tags (
    -> id,
    -> name
    -> )
    -> VALUES
    -> (   1,
    -> 'html'
    -> );
Query OK, 1 row affected (0.00 sec)

mysql> SELECT * from posts_tags;
+---------+--------+
| post_id | tag_id |
+---------+--------+
|       1 |      1 |
+---------+--------+
1 row in set (0.00 sec)

mysql> show tables
    -> ;
+------------------------+
| Tables_in_blog_cakephp |
+------------------------+
| categories             |
| posts                  |
| posts_tags             |
| tags                   |
| users                  |
+------------------------+
5 rows in set (0.00 sec)

mysql> INSERT tags (
    -> id,
    -> name
    -> )
    -> VALUES
    -> (   2,
    -> 'スピードアップ'
    -> );
ERROR 1366 (HY000): Incorrect string value: '\xE3\x82\xB9\xE3\x83\x94...' for column 'name' at row 1
mysql> exit;
Bye
[vagrant@localhost ~]$ sudo /etc/my.cnf
sudo: /etc/my.cnf: コマンドが見つかりません
[vagrant@localhost ~]$ sudo vi /etc/my.cnf
[vagrant@localhost ~]$ sudo service mysqld restart
Redirecting to /bin/systemctl restart  mysqld.service
[vagrant@localhost ~]$ mysql -u root
mysql: [ERROR] unknown variable 'difault-character-set=utf8'
[vagrant@localhost ~]$ sudo vi /etc/my.cnf
[vagrant@localhost ~]$ sudo service mysqld restart
Redirecting to /bin/systemctl restart  mysqld.service
[vagrant@localhost ~]$ myssql -u root
-bash: myssql: コマンドが見つかりません
[vagrant@localhost ~]$ mysql -u root
Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 2
Server version: 5.7.25 MySQL Community Server (GPL)

Copyright (c) 2000, 2019, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> use blog_cakephp
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Database changed
mysql> status
--------------
mysql  Ver 14.14 Distrib 5.7.25, for Linux (x86_64) using  EditLine wrapper

Connection id:    2
Current database: blog_cakephp
Current user:   root@
SSL:      Not in use
Current pager:    stdout
Using outfile:    ''
Using delimiter:  ;
Server version:   5.7.25 MySQL Community Server (GPL)
Protocol version: 10
Connection:   Localhost via UNIX socket
Server characterset:  utf8
Db     characterset:  latin1
Client characterset:  utf8
Conn.  characterset:  utf8
UNIX socket:    /var/lib/mysql/mysql.sock
Uptime:     24 sec

Threads: 1  Questions: 14  Slow queries: 0  Opens: 101  Flush tables: 1  Open tables: 96  Queries per second avg: 0.583
--------------

mysql> show variables like "chara%;
    "> ^C
mysql> show variables like "chara%";
+--------------------------+----------------------------+
| Variable_name            | Value                      |
+--------------------------+----------------------------+
| character_set_client     | utf8                       |
| character_set_connection | utf8                       |
| character_set_database   | latin1                     |
| character_set_filesystem | binary                     |
| character_set_results    | utf8                       |
| character_set_server     | utf8                       |
| character_set_system     | utf8                       |
| character_sets_dir       | /usr/share/mysql/charsets/ |
+--------------------------+----------------------------+
8 rows in set (0.01 sec)

mysql> use blog_cakephp_backup
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Database changed
mysql> show tables
    -> ;
+-------------------------------+
| Tables_in_blog_cakephp_backup |
+-------------------------------+
| categories                    |
| posts                         |
| posts_tags                    |
| users                         |
+-------------------------------+
4 rows in set (0.00 sec)

mysql> CREATE TABLE tags (
    ->     id INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    ->     lft INTEGER(10) DEFAULT NULL,
    ->     rght INTEGER(10) DEFAULT NULL,
    ->     name VARCHAR(255) DEFAULT '',
    ->     PRIMARY KEY  (id)
    -> );
Query OK, 0 rows affected (0.02 sec)

mysql> VALUES
    -> (   1,
    -> 'スピードアップ'
    -> );
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'VALUES
(   1,
'スピードアップ'
)' at line 1
mysql> 
mysql> INSERT tags (
    -> id,
    -> name
    -> )
    -> VALUES
    -> (   1,
    -> 'スピードアップ'
    -> );
ERROR 1366 (HY000): Incorrect string value: '\xE3\x82\xB9\xE3\x83\x94...' for column 'name' at row 1
mysql> 
mysql> INSERT tags (
    -> id,
    -> name
    -> )
    -> VALUES
    -> (   1,
    -> 'spead up'
    -> );
Query OK, 1 row affected (0.01 sec)

mysql> 
mysql> INSERT tags (
    -> id,
    -> name
    -> )
    -> VALUES
    -> (   2,
    -> 'css'
    -> );
Query OK, 1 row affected (0.00 sec)

mysql> use blog_cakephp;
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Database changed
mysql> INSERT tags (
    -> id,
    -> name
    -> )
    -> VALUES
    -> (   2,
    -> 'css'
    -> );
Query OK, 1 row affected (0.00 sec)

mysql> INSERT posts_tags (
    -> post_id,
    -> tag_id
    -> )
    -> VALUES
    -> (   1,
    -> 2
    -> );
Query OK, 1 row affected (0.00 sec)

mysql> INSERT tags (
    -> id,
    -> name
    -> )
    -> VALUES
    -> (   3,
    -> 'php'
    -> );
Query OK, 1 row affected (0.01 sec)

mysql> INSERT posts_tags (
    -> post_id,
    -> tag_id
    -> )
    -> VALUES
    -> (   2,
    -> 3
    -> );
Query OK, 1 row affected (0.00 sec)

mysql> exit;
Bye
[vagrant@localhost ~]$ mysql -u root
Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 64
Server version: 5.7.25 MySQL Community Server (GPL)

Copyright (c) 2000, 2019, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> use blog_cakephp_backup;
Reading table information for completion of table and column names
You can turn off this feature to get a quicker startup with -A

Database changed
mysql> INSERT tags (
    -> id,
    -> name
    -> )
    -> VALUES
    -> (   4,
    -> '日本語'
    -> );
ERROR 1366 (HY000): Incorrect string value: '\xE6\x97\xA5\xE6\x9C\xAC...' for column 'name' at row 1
mysql> INSERT tags (
    -> id,
    -> name
    -> )
    -> VALUES
    -> (   5,
    -> 'じゃばすくりぷと'
    -> );
Query OK, 1 row affected (0.00 sec)

mysql> exit
Bye
[vagrant@localhost ~]$ sudo vi ~/dump.sql

  `event_time` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `user_host` mediumtext NOT NULL,
  `thread_id` bigint(21) unsigned NOT NULL,
  `server_id` int(10) unsigned NOT NULL,
  `command_type` varchar(64) NOT NULL,
  `argument` mediumblob NOT NULL
) ENGINE=CSV DEFAULT CHARSET=utf8 COMMENT='General log';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `slow_log`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE IF NOT EXISTS `slow_log` (
  `start_time` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `user_host` mediumtext NOT NULL,
  `query_time` time(6) NOT NULL,
  `lock_time` time(6) NOT NULL,
  `rows_sent` int(11) NOT NULL,
  `rows_examined` int(11) NOT NULL,
  `db` varchar(512) NOT NULL,
  `last_insert_id` int(11) NOT NULL,
  `insert_id` int(11) NOT NULL,
  `server_id` int(10) unsigned NOT NULL,
  `sql_text` mediumblob NOT NULL,
  `thread_id` bigint(21) unsigned NOT NULL
) ENGINE=CSV DEFAULT CHARSET=utf8 COMMENT='Slow log';
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-02-18 14:00:51

