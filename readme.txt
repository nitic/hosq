﻿ติดตั้งระบบใหม่ต้องดำเนินการดังนี้

1.ติดตั้ง extension  
-php_pdo_sqlsrv_55_ts.dll สำหรับ php 5.5 (ใช้งานได้ดี)
-php_sqlsrv_55_ts.dll

php_pdo_sqlsrv_56_ts.dll สำหรับ php 5.6 (มี waring)

* ts = Thread Safety / nts = No Thread Safety

2.แก้ไขค่า date.timezone ใน php.ini
date.timezone=Asia/Bangkok
