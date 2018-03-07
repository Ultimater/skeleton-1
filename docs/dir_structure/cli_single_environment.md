# Directory Structure for CLI Single-Environment Perch App

Single Enviroment uses the `std` environment.

```
├── application.json
├── composer.json
├── composer.lock
├── README.md
├── run (CLI entry)
├── docs/
├── app/
│   ├── common/
│   │   ├── commands/
│   │   ├── controllers/ (such as controllerBase and errorController)
│   │   ├── models/ (there are models we want to share with all modules)
│   │   ├── plugins/
│   │   └── views/
│   ├── config/
│   │   ├── cli.json
│   │   ├── commands.json
│   │   └── config.php
│   ├── library/ (only generic libraries)
│   └── services/
├── tests/
│   ├── composer.json
│   └── vendor/
├── vendor/
├── cmd/ (commands extracted from command aliases for direct access)
│   ├── scheduledTasks
│   └── useradd
├── setup/
└───var/
    └── cache/
```

# Entry points

* `/run` for general **CLI** to run commands
* `/cmd/scheduledTasks` for **cronjob** maintenance access
* `/cmd/useradd` for CLI access to run the "useradd" **command** directly
