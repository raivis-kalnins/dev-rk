<a href="https://roots.io/bedrock/" target="_blank"><img alt="Bedrock" src="https://cdn.roots.io/app/uploads/logo-bedrock.svg" height="100"></a>

- Yarn packages https://yarnpkg.com
- Working with TFA plugin https://github.com/The-Fuel-Agency/tfa-wp-blocks


1. Before run this theme for new project:
    1.1 First need to add & run plugin ACF Pro: https://www.advancedcustomfields.com/pro/ & later use https://github.com/StoutLogic/acf-builder
    1.2 Clone https://github.com/The-Fuel-Agency/tfa-base-react
    1.3 For Gutenberg Block customization TFA plugin https://github.com/The-Fuel-Agency/tfa-wp-blocks-react

3. Run "composer install" - if Win then https://getcomposer.org/download/ - Download and run Composer-Setup.exe (all default setting only need to check any localhost php.ini) 
    - after success instalation and run will be composer.lock & new dir "vendor"

3. Run "yarn install" - you can add more needed packages https://yarnpkg.com
   Run "yarn run start" and all will be built and ready (package-lock.json and new dir "dist" npm & Laravel Mix https://laravel-mix.com)
    => now you can run wp-admin new Theme and to start development

![Screenshot](./web/app/themes/base_vaks/screenshot.jpg)
