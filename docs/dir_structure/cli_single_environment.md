# Directory Structure for CLI Single-Environment Perch App

Single Enviroment uses the `std` environment.

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
│   │   ├── cli.yml
│   │   ├── commands.yml
│   │   └── config.php
│   ├── library/ (only generic libraries)
│   └── services/
├── tests/
│   ├── composer.json
│   └── vendor/
├── composer.json
├── composer.lock
├── vendor/
├── run (general CLI entry)
├── cmd/ (commands extracted from command aliases for direct access)
│   ├── scheduledTasks
│   └── useradd
└───var/
    └── cache/
```

# Entry points

* `/run` for general **CLI** to run commands
* `/cmd/scheduledTasks` for **cronjob** maintenance access
* `/cmd/useradd` for CLI access to run the "useradd" **command** directly
