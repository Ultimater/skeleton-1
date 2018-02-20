# Directory Structure for Web Single-Environment Perch App

Single Enviroment uses the `std` environment.  Webpack is not available in the single environment mode.


```
├── application.yml
├── README.md
├── docs/
├── setup/
├── app/
│   ├── assets/
│   │   └── public/
│   ├── common/
│   │   ├── commands/
│   │   ├── controllers/ (such as controllerBase and errorController)
│   │   ├── models/ (there are models we want to share with all modules)
│   │   ├── plugins/
│   │   └── views/
│   ├── config/
│   │   ├── commands.yml
│   │   ├── config.php
│   │   └── web.yml
│   ├── library/ (only generic libraries)
│   ├── services/
│   └── webmodules/
│       └── main/
│           ├── controllers/
│           ├── models/ (these are models we don't want to share with other modules)
│           ├── Module.php
│           └── views/ (these are views specific to this module, not all views should be shared)
├── tests/
│   ├── composer.json
│   └── vendor/
├── composer.json
├── composer.lock
├── vendor/
├── public/
│   ├── assets/ (symlink to /app/assets/public/)
│   └── index.php (web entry)
└───var/
    ├── cache/
    └── logs/

# Entry points

* `/public/index.php` for **web** access to the application

