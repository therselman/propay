```
composer install
```

Add an `ADMIN_PASSWORD` value to your `.env` file before seeding.

Use the password you set for `ADMIN_PASSWORD` and `admin` to login to the app.

eg. In your `.env` file:
```
ADMIN_PASSWORD=MyP@55w0rd
```

Then run:

```
php artisan migrate
php artisan db:seed
```

Please also remember to configure the MAIL options in .env file!
