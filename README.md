Welcome ProPay!

Thank you for the opportunity to present my code for your technical test.
I know it has taken longer than expected or given; but I was not satisfied until I had something to be proud of; and I had very limited time during the day, so I was constrained to work in the nights.
I assume you are familiar with Laravel; well, this is the most Laravel code I've ever written.
So I had of things to learn in the process.
This was probably not the best idea to achieve the results within the given timeframe; but I learnt a lot completing this project, so it wasn't a total waste of time for me.
Considering I virtually wrote all this code from scratch, including all the table models, validations, seeds, migration scripts, bootstrap 5 views etc.
And having learnt virtually everything here with no prior experience in Laravel (except a few hello worlds); I'm very proud to present this code, regardless of what happens.

Thank you for your time. Enjoy!


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
