# Contribution Information

### Contribution to NCompPOSv2

Every help is welcome, you don't have to be a professional PHP developer or SQL database engineer.
We appreciate any support with helping other users, translating the software or simply spreading
the word

If you have any questions regarding contribution please ask! Nothing is more frustrating for you
and us than misunderstandings which may lead to large amounts of time required to solve the resulting
problems.  

---

### Contents

  * Versioning and Git Branches
  * Getting Started with Development
  * Contributing Code

---

### Versioning and Git Branches

  * Bugfixes or smaller improvements go into minor versions like `v1.3.2` or `v1.5.6`.
  * New features or larger improvements go into feature versions like `v1.4.0` or `v1.6.0`.


The NCompPOSv2 branch structure consists of four different branch types

  * `master`  This branch contains the current stable version of the application.
              There will never be any development activity on this branch so please refrain
              from using it for pull requests.

  * `1.5`     Branches that contain only a feature version of NCompPOSv2, like `1.3`
              or `1.5` are archive branches that contain the last stable release of that
              specific version.

  * `v1.6.0`  Branches that contain a specific version number like `v1.6.0` or `v1.5.4`
              are the development branches. All new code is added to these branches ONLY.
              If you contribute any code make sure to select the correct branch.
              Remember: bugfixes and small improvements go into minor branches like `v1.5.4`
              and new features or large improvements go into feature branches like `v1.6.0`.

  * `issue`   Other named branches are used to keep code for very specific tasks that do
              not fit into another branch. Only push code to these branches if you are
              requested to do so.

---

### Getting Started with Development

#### PHP Development

If you just want to change PHP code or HTML files, you just need to have
[Composer](https://getcomposer.org/doc/00-intro.md) installed. The tool manages
the PHP dependencies with the help of the `composer.json` file.

  1. Run `composer install` to install all dependencies.
  2. Follow the basic installation guide in the README.md.
  3. Make sure your editor or IDE has the correct code formatting settings set.
  4. That's it. You are good to go.


#### Styles and Scripts Development

To change the actual styling of the application or scripts you may have to install
some other tools.

  * NCompPOS requires Node and NPM: [Install both](https://nodejs.org/en/download/)  
    Make sure to use the latest LTS version which is version 8 at the moment.
  * Install Grunt globally by running `npm install -g grunt-cli`.

If you have prepared your machine, run `npm install` to install all dependencies.
After that there are two commands available for development:

  * `grunt dev`   Compiles all assets and starts watching your development files. If you
                  change a file and save it, the compilation will start automatically so
                  you do not have to do it manually.
                  All styles and scripts are not minified and sourcemaps are generated for
                  easier development.

  * `grunt build` This command is used to compile all assets for the production use. It
                  also minifies all assets to make sure pages load faster. Normally this
                  command is not used for development.
