# Welcome ProPay!

Thank you for the opportunity to present my code for your technical test.

I know it has taken longer than expected or allowed; but I was not entirely satisfied until I had something to be proud of; and I also had very limited time during the day, so I was constrained to work in the nights.

I assume you are familiar with Laravel; well, this is the most Laravel code I've ever written. So I had a lot of things to learn in the process.

This was probably not the best idea to achieve the results within the given timeframe; but I learnt a lot while completing this project, so it wasn't a total waste of time for me.

Considering I virtually wrote all this code from scratch, including all the table models, validations, seeds, migration scripts, bootstrap 5 views, controllers etc.

While having to learn virtually everything in the process; I'm very proud to present this code, regardless of what happens.

So thank you for your time. Enjoy!


## Install instructions

```
composer install
```

Add an `ADMIN_PASSWORD` value to your `.env` file before seeding.

Use the password you set for `ADMIN_PASSWORD` and `admin` to login to the app.

eg. In your `.env` file:
```
ADMIN_PASSWORD=MyP@55w0rd
```

Also remember to setup your `DB_*` and `MAIL_*` config in `.env`

Then run:

```
php artisan migrate
php artisan db:seed
```

then

```
php artisan serve
```
