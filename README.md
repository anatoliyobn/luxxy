APACHE CONFIG
-------------------

```
<VirtualHost *:80>
    ServerAdmin webmaster@dummy-host.example.com
    DocumentRoot "d:/wamp64/www/luxxy"
    ServerName luxxy.local
    ServerAlias luxxy.local
    ErrorLog "logs/luxxy-error.log"
    CustomLog "logs/luxxy-access.log" common
	RewriteEngine on
	RewriteCond %{REQUEST_URI} !^/(backend/web|admin)
	RewriteRule !^/frontend/web /frontend/web%{REQUEST_URI} [L]
    	RewriteCond %{REQUEST_URI} ^/admin$
    	RewriteRule ^/admin /backend/web/index.php [L]
	RewriteCond %{REQUEST_URI} ^/admin
	RewriteRule ^/admin(.*) /backend/web$1 [L]


	<Directory />
        	Options FollowSymLinks
        	AllowOverride None
        	AddDefaultCharset utf-8
    	</Directory>
    	<Directory "d:/wamp64/www/luxxy/frontend/web/">
        	RewriteEngine on
        	# if a directory or a file exists, use the request directly
        	RewriteCond %{REQUEST_FILENAME} !-f
        	RewriteCond %{REQUEST_FILENAME} !-d
        	# otherwise forward the request to index.php
        	RewriteRule . index.php
        	Order Allow,Deny
        	Allow from all
    	</Directory>
	 <Directory "d:/wamp64/www/luxxy/backend/web/">
        	RewriteEngine on
        	# if a directory or a file exists, use the request directly
        	RewriteCond %{REQUEST_FILENAME} !-f
        	RewriteCond %{REQUEST_FILENAME} !-d
        	# otherwise forward the request to index.php
        	RewriteRule . index.php
        	Order Allow,Deny
        	Allow from all
    	</Directory>
	<FilesMatch \.(htaccess|htpasswd|svn|git)>
        	Deny from all
        	Satisfy All
    	</FilesMatch>

</VirtualHost>
```
