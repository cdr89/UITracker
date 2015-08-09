# UITracker
Web Service for user interactions tracking

* Usage example:
http://localhost/uitracker/webservices/trackevent.php?category=HOMEPAGE&action=BANNER_CLICK

In your MySQL console:
```sql
    use uitracker;
    select * from UserEvent;
```

You will see into UserEvent table:

| id | category | action       | label | value | userId | userToken | ipAddress | dateTime            |
|----|----------|--------------|-------|-------|--------|-----------|-----------|---------------------|
| 1  | HOMEPAGE | BANNER_CLICK |       |       |        |           | 127.0.0.1 | 2015-08-09 13:22:50 |



* Notes:
This project uses PDO and MySQL extensions, so you need to add some lines in your php.ini

on Linux:
extension=mysqli.so
extension=pdo.so
extension=pdo_mysql.so

on Windows:
extension=php_mysqli.dll
extension=php_pdo.dll
extension=php_pdo_mysql.dll

