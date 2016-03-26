#Lumen + MongoDB 

- Lumen (5.2.6) (Laravel Components 5.2.*)
- https://github.com/jenssegers/laravel-mongodb
- https://github.com/sohelamin/lumen-route-list
- https://secure.php.net/manual/en/mongodb.installation.php


#Configure VirtualHost Apache:

```html
<VirtualHost *:80>
  ServerName lumen.localhost.app
  DocumentRoot "your_path/public"
  <Directory "your_path/public">
    AllowOverride all
  </Directory>
  ErrorLog "/var/log/apache2/lumen-error_log"
  CustomLog "/var/log/apache2/lumen-access_log" common
</VirtualHost>
```

#.ENV

- APP_DEBUG:

* TRUE: Error and Exception return in HTML with trace
* FALSE: Error and Exception return in JSON

#Example:
- Lumen version:
```sh
http://lument.localhost.app/
```
- Create dummy user: 
```sh
php artisan db:seed 
```

- Show new user created: 
```sh
http://lument.localhost.app/user
```
- JSON response:
```json

	{
		"success":true,
		"code":200,
		"message":"All is ok :)",
		"data":[{
			"_id":"56f6edc525a53beb656ef9f1",
			"name":"David Burgos M",
			"email":"dburgosm@test.com"
		}]
	}
```
