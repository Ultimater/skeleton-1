## New Project Questions

* {cli} = Do you need a CLI run mode?
* {web} = Do you need a web run mode?
* if (web) then
  * {webmodules-multi} = Will you need multiple webmodules for your application?
  * {env-multi} = Will you need a multiple environment setup for building your application?
* if (env-multi) then
  * {webpack} = Will you be using Webpack to build your frontend assets?
