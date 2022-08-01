# Get México postal Code

This endpoint is created to obtain by zip code information from different areas of México, for example street name, settlement name, city name, etc...

Change the numner **01210** for another zip code of Mexico.
```
https://api.mireino.com/api/zip-codes/01210
```


Zip code were obtained from Mexico postal service and exported by state, see [here](https://www.correosdemexico.gob.mx/SSLServicios/ConsultaCP/CodigoPostal_Exportar.aspx)

To save the zip codes in database was necessary create an endpoint and import an excel file for each one states, currently the zip codes are already stored and you can use the endpoint whenever you want.
```
https://api.mireino.com/zip-codes/import
```

> Requirements

- php8.0
- composer
- Node js

> install

```
git clone git@github.com:Deluxer/zip-code-laravel.git
cd zip-code-laravel
```

Install composer dependencies
```
composer install
```

Use database access credentials

```
cp .env.example .env    
```
Generate key
```
php artisan key:generate
```

```
Create database name as zipcode
```

import database 
```
php artisan db:seed --class=ImportTableSeeder
```

Run in you local server
```
php artisan serve
```

> Recommendation
- You can use Postman to test the endpoint, install [Postman](https://www.postman.com/)
- To manage database can use Dbeaver, install [Dbeaver](https://dbeaver.io/)
- To test from Google chrome you could install extension [JSON viewer Pro](https://chrome.google.com/webstore/detail/json-viewer-pro/eifflpmocdbdmepbjaopkkhbfmdgijcc)