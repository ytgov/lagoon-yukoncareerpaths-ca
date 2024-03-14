# Government of Yukon - Recruitment Marketing Site

### INTRODUCTION
------------

UAT URL: https://yukoncareerpaths.cms-uat.yukon.ca

PROD URLs: https://yukoncareerpaths.ca, https://yukoncareerpaths.com, https://parcoursprofessionnelyukon.ca, https://parcoursprofessionnelyukon.com

### REQUIREMENTS
------------
- Lagoon CLI installed and configured.
- Lando installed.

### INSTALLATION
------------

Start the project
- `lando start`

Import the DB
- `lando drush sql-sync @lagoon.production @self`

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
    - Compile: `cd /app/web/themes/custom/govt_yukon_rms && npm i && npm run compile`
    - Watch: `cd /app/web/themes/custom/govt_yukon_rms && npm i && npm run watch`

### Developer Notes
-------------

#### Composer Cache Issue
There are cases when Composer complains about not having access to the cache folder in Lando.

To fix the issue: In `.lagoon/cli.dockerfile` add the following line and run (This is a temporary
solution and should not be committed):

`RUN chmod 777 -R /home/.composer/cache`
