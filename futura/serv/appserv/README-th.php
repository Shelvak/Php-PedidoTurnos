<?php
/************************************************************************/
/* AppServ Open Project                                          */
/* Copyright (c) 2001 by Phanupong Panyadee (http://www.appservnetwork.com)         */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

include("main.php");

print "
<pre>
�ô��ҹ 
-------------------
���������� "._APPVERSION." "._FOR." "._OS."

"._APPSERV." ������������Ǻ������蹫���ʫͿ����������� ���ҧ��Ҵ��¡ѹ ����Ѻ "._OS."
"._APPSERV." ���Ǻ������������ش�������ࡨ��������

   - "._APACHE." "._VERSION." "._VAPACHE."
   - "._PHP." "._VERSION." "._VPHP."
   - "._MYSQL." "._VERSION." "._VMYSQL."
   - "._PHPMYADMIN." "._VERSION." "._VPHPMYADMIN."
   - "._PERL." "._VERSION." "._VPERL."

��������´���� �������ǡѺ "._APPSERV." �Դ������� :
http://www.appservernetwork.com
���Ѵ�� : �ҳؾ��� �ѭ�Ҵ�
����� : ��

�Ըա����ҹ
-------------------
::: Starting Services :::
1. �ѹ Apache Web Server 价�� Start --> Programs --> AppServ --> Apache Control Server --> Start
2. �ѹ MySQL Database 价��  Start --> Programs --> AppServ --> WinMySQLAdmin
3. ���价�� http://yourhost.com (http://localhost) 
4. ���ྨ��ҧ� ��������� C:\AppServ\www\
5. ����Ѻ��������� PHPNuke Admin ���价��  http://yourhost.com/"._LPHPNUKE."/admin.php ��͹ Login : God Password: Password
6. ���������˹�� phpBB2 Admin ���价�� http://localhost/"._LPHPBB."/login.php Login : God Password: Password
7. ��� config �ͧ phpMyAdmin ������ C:\AppServ\www\\"._LPHPMYADMIN."\config.php
8. ����ͤس��ͧ������ҧ���������������� C:\AppServ\www
9. ����ͤس��ͧ����� CGI �����¹�ҡ Perl ���������� C:\AppServ\www\cgi-bin

::: Stop Services :::
1. �Դ��÷ӧҹ Apache Web Server 价�� Start --> Programs --> AppServ --> Apache Control Server --> Stop
2. �Դ��÷ӧҹ MySQL Database 价��  Start --> Programs --> AppServ --> WinMySQLAdmin 
	- �� \"Stop Extended Server Status\" �ç�ͺ��ҧ����
	- ��ԡ��� --> Stop Service
	- ��ԡ��� --> Shut down this tool
	- �ô�� 5 �Թҷ�

::: ź�͡ :::
1. �ô�� �ô�� ��سһԴ Services �ͧ Apache ��� MySQL ��͹��� uninstall �ء����
2. ������� Backup www directory �ͧ�س����
3. ź����� :-)

License
-------------------
AppServ is copyrighted by its authors and licensed under terms of the
GNU Lesser Public License (LGPL) - see file COPYING for details.
";
?>