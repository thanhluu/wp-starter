# WordPress Starter Theme

[![Travis CI Build Status](https://travis-ci.org/thanhluu/wp-starter.svg?branch=master)](https://travis-ci.org/thanhluu/wp-starter) [![devDependency Status](https://david-dm.org/thanhluu/wp-starter/dev-status.svg)](https://david-dm.org/thanhluu/wp-starter#info=devDependencies)

Whenever I start developing a new project, it really takes me quite a lot of time to set up neccessary tools. In this repo, I would like to share the great tools which I have been using to build the WordPress themes. Plus, they were also standardized so that I totally develop the WordPress themes with high quality.

## List of tools

* [Bower](http://bower.io/) for front-end package management
* [gulp.js](http://gruntjs.com/) for running automation JavaScript tasks
* [Travis CI](http://travis-ci.org) for automatically testing PHP codes, using [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer) and [WordPress-Coding-Standard](https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards)
* [Gitignore](http://www.gitignore.io/) for determine which files and directories to ignore, before you make a commit
* [Editor Config](http://editorconfig.org/) for configuring the editor according to the same [standard](http://make.wordpress.org/core/handbook/coding-standards/php/#indentation)

## Globally Setup

Your Computer must setup those tools before start develop this theme:

1. [Node.js](http://nodejs.org/download/)
2. [Git CMD](http://git-scm.com/) (For Windows, you must install Git Bash)
3. Gulp-CLI: Open CMD (on Windows) or Termnial (Mac and Linux) type `npm install -g gulp-cli`
4. [Sublime Text](http://www.sublimetext.com/)
5. [Sublime Package Control](https://sublime.wbond.net/)
5. [Editor Config Sublime](https://github.com/sindresorhus/editorconfig-sublime) (You can install via Sublime Package Control)

## Project Setup

From the command line, navigate to the theme directory

1. Navigate to `<theme-folder>/tools/`
2. Run `yarn install` to install Node modules
3. Run `bower install` to install front-end packages
4. Config your project on `tools/package.json`
5. Run `gulp generate` to generate your WordPress theme

## Available Grunt Commands

When completed, you'll be able to run the various Grunt commands provided from the command line:

* `gulp generate` — Generate a new theme
* `gulp watch` — Compile assets when file changes are made
* `gulp build` — Build for production


## Running Travis CI

You want Travis CI to work, firstly, you need to sign in at [https://travis-ci.org/](https://travis-ci.org/) via your Github account. Then, just enable your projects by flicking the switch, and push new commit to Github.

## Editor Config

Regarding Sublime Text Editor, you can install a plugin named [Editor Config Sublime](https://github.com/sindresorhus/editorconfig-sublime) into Sublime via [Package Control](https://sublime.wbond.net/).
