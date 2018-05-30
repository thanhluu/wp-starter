'use strict';

// require some node and gulp modules
var gulp = require('gulp');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var rename = require('gulp-rename');
var sass = require('gulp-sass');
var maps = require('gulp-sourcemaps');
var jshint = require('gulp-jshint');
var autoprefixer = require('gulp-autoprefixer');
var replace = require('gulp-replace');
var zip = require('gulp-zip');
var clean = require('gulp-clean');
var wpPot = require('gulp-wp-pot');
var cssmin = require('gulp-cssnano');
var fs = require('fs');
var pkg = JSON.parse(fs.readFileSync('./package.json'));

// include js files for compile
var jsFiles = [
  '../assets/js/fine-uploader.min.js',
  '../assets/js/_*.js'
];

// copy files
var copyFiles = [];

// autoprefixer settings
var autoprefixerOptions = {
  browsers: ['last 2 versions', 'ie 9', 'android 2.3', 'android 4', 'opera 12']
};

// sass options
var sassOptions = {
  errLogToConsole: true,
  outputStyle: 'expanded'
};

// enable lookup .jshintrc for jshint module
var jshintOptions = {
  lookup: true
};

// init rename files
var filesRename = [
  {
    cwd: '../assets/scss/evo.scss',
    name: `${pkg.prefix.name}.scss`,
    dest: '../assets/scss/'
  },
  {
    cwd: '../assets/css/evo.css',
    name: `${pkg.prefix.name}.css`,
    dest: '../assets/css/'
  },
  {
    cwd: '../assets/css/evo.css.map',
    name: `${pkg.prefix.name}.css.map`,
    dest: '../assets/css/'
  },
  {
    cwd: '../assets/css/evo.min.css',
    name: `${pkg.prefix.name}.min.css`,
    dest: '../assets/css/'
  },
  {
    cwd: '../assets/js/evo.min.js',
    name: `${pkg.prefix.name}.min.js`,
    dest: '../assets/js/'
  },
  {
    cwd: '../assets/js/evo.js',
    name: `${pkg.prefix.name}.js`,
    dest: '../assets/js/'
  },
  {
    cwd: '../languages/evo.pot',
    name: `${pkg.prefix.name}.pot`,
    dest: '../languages/'
  }
];


// concat js files
gulp.task('concat', function() {
  gulp.src(jsFiles)
    .pipe(maps.init())
    .pipe(concat(`${pkg.prefix.theme_prefix}.js`))
    .pipe(maps.write())
    .pipe(gulp.dest('../assets/js'));
});

// uglify js files
gulp.task('uglify', function() {
  gulp.src(`../assets/js/${pkg.prefix.theme_prefix}.js`)
    .pipe(uglify())
    .pipe(rename(`${pkg.prefix.theme_prefix}.min.js`))
    .pipe(gulp.dest('../assets/js'));
});

// run jshint
gulp.task('jshint', function() {
  gulp.src(['../assets/js/_*.js', './gulpfile.js'])
    .pipe(jshint(jshintOptions))
    .pipe(jshint.reporter('default'));
});


// run compile sass
gulp.task('sass', function() {
  gulp.src(`../assets/scss/${pkg.prefix.theme_prefix}.scss`)
    .pipe(maps.init())
    .pipe(sass(sassOptions).on('error', sass.logError))
    .pipe(maps.write())
    .pipe(autoprefixer(autoprefixerOptions))
    .pipe(gulp.dest(`../assets/css`));
});

// run minify css
gulp.task('minify', function() {
  gulp.src(`../assets/css/${pkg.prefix.theme_prefix}.css`)
    .pipe(cssmin())
    .pipe(rename(`${pkg.prefix.theme_prefix}.min.css`))
    .pipe(gulp.dest('../assets/css'));
});

// run copy assets
gulp.task('copy', function() {
  for (var i in pkg.dependencies) {
    gulp.src(`./node_modules/${i}/**/*`)
      .pipe(gulp.dest(`../assets/vendor/${i}`));
  }

  for (var y in copyFiles) {
    gulp.src(copyFiles[y].from)
      .pipe(gulp.dest(copyFiles[y].to));
  }

  gulp.src('../assets/vendor/fontawesome/fonts/**/*')
      .pipe(gulp.dest('../assets/font'));
});

// run rename files
gulp.task('rename', function() {
  for (let i in filesRename) {
    gulp.src(filesRename[i].cwd)
      .pipe(clean({force: true}))
      .pipe(rename(filesRename[i].name))
      .pipe(gulp.dest(filesRename[i].dest));
  }
});

// run replace prefix in files
gulp.task('replace', function() {
  // replace function prefix
  gulp.src(['../*.php', '../**/*.php'])
    .pipe(replace(/wp_starter/g, pkg.prefix.name))
    .pipe(replace(/wp-starter/g, pkg.prefix.theme_prefix))
    .pipe(replace(/WP Starter/g, pkg.prefix.theme_name))
    .pipe(replace(/wp-starter-install-plugins/g, `${pkg.prefix.theme_prefix}-install-plugins`))
    .pipe(replace(/WP_Starter_Navwalker/g, `${pkg.prefix.theme_class_prefix}_Navwalker`))
    .pipe(gulp.dest('../'));

  // replace theme infomations
  gulp.src(['../style.css'])
    .pipe(replace(/1\.0\.0/g, pkg.version))
    .pipe(replace(/^.*Theme Name:.*$/m, `Theme Name: ${pkg.prefix.theme_name}`))
    .pipe(replace(/^.*Theme URI:.*$/m, `Theme URI: ${pkg.theme_url}`))
    .pipe(replace(/^.*Author:.*$/m, `Author: ${pkg.author_name}`))
    .pipe(replace(/^.*Author URI:.*$/m, `Author URI: ${pkg.homepage}`))
    .pipe(replace(/^.*Version:.*$/m, `Version: ${pkg.version}`))
    .pipe(replace(/^.*Description:.*$/m, `Description: ${pkg.description}`))
    .pipe(gulp.dest('../'));

  // replace bower infomations
  gulp.src(['./bower.json'])
    .pipe(replace(/WP Starter/g, pkg.prefix.theme_name))
    .pipe(replace(/1\.0\.0/g, pkg.version))
    .pipe(replace(/http:\/\/www\.example\.com/g, pkg.homepage))
    .pipe(replace(/Author <contact@example\.com>/g, pkg.author))
    .pipe(gulp.dest('./'));
});

// make wp pot file
gulp.task('makepot', function() {
  gulp.src(['../*.php', '../**/*.php'])
    .pipe(wpPot({
      domain: pkg.prefix.theme_prefix
    }))
    .pipe(gulp.dest(`../languages/${pkg.prefix.theme_prefix}.pot`));
});

// compress for release
gulp.task('compress', ['clean'], function() {
  gulp.src([
      '*',
      '*/**',
      '!assets/vendor{,/**}',
      '!tools{,/**}',
      '!release{,/**}',
      '!graphic{,/**}',
      '!gulp{,/**}'
    ], {cwd: '../'})
    .pipe(zip(`${pkg.prefix.name}-${pkg.version}.zip`))
    .pipe(gulp.dest('../release'));
});

// clean current files
gulp.task('clean', function() {
  gulp.src([
    `../release/${pkg.prefix.name}-${pkg.version}.zip`
  ])
  .pipe(clean({ force: true }));
});

// register watch action
gulp.task('watch', function() {
  gulp.watch('../assets/scss/*.scss', ['sass']);
  gulp.watch('../assets/scss/_*.scss', ['sass']);
  gulp.watch('../assets/js/_*.js', ['concat']);
});

// register task generate action
gulp.task('generate', ['rename', 'replace']);

// register task for dev action
gulp.task('dev', ['copy', 'sass', 'concat']);

// register task for build action
gulp.task('build', ['copy', 'sass', 'minify', 'concat', 'uglify', 'makepot']);
