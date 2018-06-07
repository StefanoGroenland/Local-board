# Localboard

This application will read all files from your `Code` folder.

Do not forget to set your `APP_TLD` in your `.env` file to let the application know what .TLD to use when generating links.

Install composer dependancies

```bash
composer install
```

Create environment file from example

```bash
cp .env.example .env
```

Generate application key

```bash
php artisan key:generate
```

Install yarn dependancies
```bash
yarn && yarn dev
```

## Ignore certain folders.

Below is an example for ignoring folders, You can change this array located in `routes/web.php`, when cloning you will see this example.

```php
$ignore = collect([
        '.DS_Store',
        'CallMeBack',
        'overview'
    ]);
```



