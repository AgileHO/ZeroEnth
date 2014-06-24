
1) YouTube tutorials to create simpel REST api

http://www.youtube.com/watch?v=5eWC-lf1FxM&index=2&list=UUMzq9xglGPXXZY41dm9lr6A

http://www.youtube.com/watch?v=UciopWMTdUM&list=UUMzq9xglGPXXZY41dm9lr6A


2) Uncomment curl library in php.ini file (around line 990 - and remember to re-start php after)

# extension=php_curl.dll


3) Download FireFox rest client
http://restclient.net/


4) Code in root folder 

Array of 3 books(C, PHP, Java)
Append name of book to base url http://localhost/rest/
http://localhost/rest/php

Will return appropriate status message
.htaccess file used for friendlier urls (eg, http://localhost/rest/java - as opposed to http://localhost/rest/index.php?name=java)

5) Code in client folder

Type name of book into http://localhost/rest/client/form.php
client/process.php page takes form input and passes it to api call
Curl is used (see step 2 above) - check 2nd YouTube video for explanation why curl is needed


