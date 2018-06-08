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

## Define folders to read from

```bash
cp .folders.example .folders
```

Example: 
```
/
/folder
/folder/folder
```


## Ignore certain folders.

Below is an example for ignoring folders, You can change this array located in the `.ignore-folders` file. You can find this file in the root of the application.

Example:
```php
.DS_Store
CallMeBack
overview
```



