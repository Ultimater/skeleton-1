# Perch Skeleton

## Setup

* [Download Caddy](https://caddyserver.com/download) web server and place it into a system path
* In the project root run
  * `git clone https://github.com/perch-foundation/feather-extension.git`
  * `perch createEnvironment` (creates environment entries)
* In the project room run
  * `composer install`
  * `npm install` (optional)
* Add `perch-app` to your hosts file and point it to the VM.

## Now Start the Caddy Webserver.
* In the project root run `perch caddy`.  This reads the Caddyfile and serves at http://perch-app:8080.

## Usage

### MVC
* Visit http://perch-app:8080 for MVC

### CLI
  * `./env/dev/run` for general CLI access.
  * Run aliased commands at;
    * `./env/dev/cmd/addUser`
  * `perch caddy` to run Caddy Webserver through Perch tool
  * `perch webpack` to run webpack-dev-server through Perch tool.

## Services Documentation

Services are located in `./app/services/`.  AutoApp supports two methods for defining services; the more traditional bulk method using classes which implement `ServiceProviderInterface` and a service-per-file method based on a given directory.

1) The `ServiceProviderInterface` method is self-explanatory for anyone familiar with Phalcon.  Simply define all of the services in the register method.

2) The service-per-file method is a new concept in the Phalcon world.  Each service file can return an;
  * basic object
  * closure
  * `Phalcon\Di\Service` object.

Additionally a `.json` or `.ini` file can be used for services.  These formats follow the existing static service definition format.

* By using framework convention to set the name of the file to be postfixed with `_shared`.  This will force the service to be shared.  If it was already being returned as shared in code then this will have no effect.

### Service Presets

Phalcon 4 will improve upon the Factory Default DIs by offering DI Presets.  These are superior because they can be instantiated directly just like the current factory defaults in addition to starting with a vanilla DI and using multiple Presets to load their services into the DI using a static configure method.  Additionally, Composer packages will be able to provide their own DI presets to easily inject service functionality into an application.

### Putting it all together in the runmode file.

The services are included via the runmode files, ex; `./app/config/web.json` and `./app/config/cli.json`.  It should be self-explanatory.

Great!  So now we have something that our tooling will understand ;)

```json
{
  "service": {
    "preset": "Perch\\Di\\Preset\\Web",
    "register": [
      "WebServiceProvider"
      "common",
      "web"
    ]
  }
}
```

## Documentation

#### Project Skeleton

* [CLI Single-Environment](https://github.com/perch-foundation/skeleton/blob/master/docs/dir_structure/cli_single_environment.md)
* [Web and Cli Multi-Environment](https://github.com/perch-foundation/skeleton/blob/master/docs/dir_structure/web_cli_multi_environment.md)
* [Web Single-Environment](https://github.com/perch-foundation/skeleton/blob/master/docs/dir_structure/web_single_environment.md)
