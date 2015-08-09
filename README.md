# UITracker
Web Service for user interactions tracking

### Usage example:

###### URL example:
[http://localhost/uitracker/webservices/trackevent.php?category=HOMEPAGE&action=BANNER_CLICK](http://localhost/uitracker/webservices/trackevent.php?category=HOMEPAGE&action=BANNER_CLICK)

###### In web page (see into "examples" folder):
```html
<!DOCTYPE html>
<html>
<head>
    <!-- ADD jquery library and uitracker.js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../js/uitracker.js"></script>
</head>
<body>
<a id="clickMe" href="#">Click me!</a>
<script type="text/javascript">
    // Construct the instace of the tracker passing the webservice URL
    // you can override the default UITracker variable like in the example below:
    // uitracker = new UITracker('http://www.otherURL.com/webservice.php', 'GET');

    $('#clickMe').click(function () {
        // Call on the uitracker object the method trackEvent()
        UITracker.trackEvent('WEB_EVENT', 'A_CLICK');

        // Do other stuffs...
    });
</script>
</body>
</html>
```


In your MySQL console:
```sql
    use uitracker;
    select * from UserEvent;
```

You will see into UserEvent table:

| id | category | action       | label | value | userId | userToken | ipAddress | dateTime            |
|----|----------|--------------|-------|-------|--------|-----------|-----------|---------------------|
| 1  | HOMEPAGE | BANNER_CLICK |       |       |        |           | 127.0.0.1 | 2015-08-09 13:22:50 |



### Notes:
This project uses PDO and MySQL extensions, so you need to add some lines in your php.ini

on Linux:
```
extension=mysqli.so
extension=pdo.so
extension=pdo_mysql.so
```

on Windows:
```
extension=php_mysqli.dll
extension=php_pdo.dll
extension=php_pdo_mysql.dll
```
