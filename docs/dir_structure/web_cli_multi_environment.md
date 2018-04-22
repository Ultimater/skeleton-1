# Directory Structure for Web and Cli Multi-Environment Perch App

```
├── application.json
├── composer.json
├── composer.lock
├── package.json
├── package-lock.json
├── README.md
├── docs/
├── app/
│   ├── assets/
│   │   ├── res/
│   │   ├── theme/
│   │   └── public/ (for direct old-school access)
│   │       ├── fonts/
│   │       ├── js/
│   │       ├── res/
│   │       └── style/
│   ├── common/
│   │   ├── commands/
│   │   ├── controllers/ (such as controllerBase and errorController)
│   │   ├── models/ (there are models we want to share with all modules)
│   │   ├── plugins/
│   │   └── views/
│   ├── config/
│   │   ├── cli.json
│   │   ├── commands.json
│   │   ├── config.php
│   │   ├── web.json
│   │   └── webpack.js
│   ├── library/ (only generic libraries)
│   ├── services/
│   ├── webpack/
│   │   ├── entries/
│   │   ├── commons/
│   │   └── modules/
│   └── webmodules/
│       └── main/
│           ├── controllers/
│           ├── models/ (these are models we don't want to share with other modules)
│           ├── Module.php
│           └── views/ (these are views specific to this module, not all views should be shared)
├── setup/
├── tests/
│   ├── composer.json
│   └── vendor/
├── vendor/
├── node_modules/
└── env/
    ├── dev/
    │   ├── run (general CLI entry as "development" environment using full command names or aliases)
    │   ├── cmd/ (commands extracted from command aliases for direct access)
    │   │   ├── scheduledTasks (ex; cronjob CLI access to run maintenance and send newsletters)
    │   │   └── useradd (ex; add a user using a Command supplied by a Composer package)
    │   ├── public/
    │   │   ├── assets/ (symlink to /app/assets/public/)
    │   │   └── index.php (web entry as "development" environment)
    │   └───var/
    │       ├── cache/
    │       ├── logs/
    │       └── webpack-cache/
    └── build
        ├── run (general CLI entry as "build" environment using full command names or aliases)
        ├── cmd/ (commands extracted from command aliases for direct access)
        │   ├── scheduledTasks (ex; cronjob CLI access to run maintenance and send newsletters)
        │   └── useradd (ex; add a user using a Command supplied by a Composer package)
        ├── public/
        │   ├── index.php (entry as "build" environment)
        │   ├── assets/ (symlink to /app/assets/public/)
        │   ├── /css/
        │   ├── /images/
        │   ├── /js/
        │   └── /fonts/
        └── var/
            ├── cache/
            └── logs/
```

# Entry points

**Development access**
`/env/dev/public/index.php` for **web** access to the application
`/env/dev/run` for general **CLI** to run commands
`/env/dev/cmd/scheduledTasks` for **cronjob** maintenance access
`/env/dev/cmd/useradd` for CLI access to run the "useradd" **command** directly

**Staging or Production access**
`/env/build/public/index.php` for **web** access to the application
`/env/build/run` for general **CLI** to run commands
`/env/build/cmd/scheduledTasks` for **cronjob** maintenance access
`/env/build/cmd/useradd` for CLI access to run the "useradd" **command** directly

# Environment `run` and `cmd/`

If a project has a CLI mode then it will have a `./run` PHP executable script that can print out a listing of commands, give help on a specific command or run all commands using its long name or a short name defined as an alias in the projects `application.json`.  The environments `cmd/` directory will have entries which run specific commands and the `perch` tool will populate this directory from the command aliases and also notifying if a hard wired command no longer exists as an alias.  The names of the files will be the command alias.  The `.php` extension will not be used by default.
