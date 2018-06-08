# Localboard

![screen shot 2018-06-07 at 20 22 50](https://user-images.githubusercontent.com/6575921/41119596-7863eca4-6a93-11e8-9c0a-e634890d07f7.png)

> This application will read all files from your `Code` folder. (To be honest, it will exit out this project and read all directories there. and generate blocks/urls for them)

## NOTE 
Do not forget to set your `APP_TLD` in your `.env` file to let the application know what .TLD to use when generating links.


## Installation
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

## Define folders to read / ignore

In your `config/folders.php` file you can define which folders should be read and ignored.

### Pin code protection

Set a pin.
`php artisan code:set 1234`

If you don't want this. Add `UNDER_CONSTRUCTION_ENABLED=false` to your `.env` file.





