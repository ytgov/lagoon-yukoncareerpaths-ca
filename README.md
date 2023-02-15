# Government of Yukon - Recruitment Marketing Drupal

### INTRODUCTION
------------

### REQUIREMENTS
------------
- Lagoon CLI installed and configured.
- Lando installed.

### INSTALLATION
------------

### CONFIGURATION
-------------
#### Lando Tooling
- Run `lando code-standards`.
  - Checks custom modules/themes for code violations.
- Theme Tooling:
  - Go into the CLI: `lando ssh`
  - Base Theme:
    - Compile: `cd /app/web/themes/custom/govt_yukon && npm i && npm run compile`
    - Watch: `cd /app/web/themes/custom/govt_yukon && npm i && npm run watch`
  - Claro Admin Theme:
    - Compile: `cd /app/web/themes/custom/govt_yukon_claro && npm i && npm run compile`
    - Watch: `cd /app/web/themes/custom/govt_yukon_claro && npm i && npm run watch`
  - Project Theme:
    - Compile: `cd /app/web/themes/custom/govt_yukon_ocf && npm i && npm run compile`
    - Watch: `cd /app/web/themes/custom/govt_yukon_ocf && npm i && npm run watch`

### Developer Notes
-------------

#### Composer Cache Issue
There are cases when Composer complains about not having access to the cache folder in Lando.

To fix the issue: In `.lagoon/cli.dockerfile` add the following line and run (This is a temporary
solution and should not be committed):

`RUN chmod 777 -R /home/.composer/cache`
