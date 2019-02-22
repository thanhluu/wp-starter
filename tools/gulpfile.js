'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var cssnano = require('gulp-cssnano');
var rename = require("gulp-rename");
var sourcemaps = require("gulp-sourcemaps");
var autoprefixer = require("gulp-autoprefixer");
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var jshint = require('gulp-jshint');
var replace = require('gulp-replace');
var fs = require('fs');
var pkg = JSON.parse(fs.readFileSync('./package.json'));

var jsFiles = [
  '../assets/js/_*.js'
];

var jshintOptions = {
  lookup: true
};

var filesRename = [
  {
    cwd: '../assets/scss/wp-starter.scss',
    name: `${pkg.name}.scss`,
    dest: '../assets/scss/'
  },
  {
    cwd: '../assets/css/wp-starter.css',
    name: `${pkg.name}.css`,
    dest: '../assets/css/'
  },
  {
    cwd: '../assets/css/wp-starter.css.map',
    name: `${pkg.name}.css.map`,
    dest: '../assets/css/'
  },
  {
    cwd: '../assets/css/wp-starter.min.css',
    name: `${pkg.name}.min.css`,
    dest: '../assets/css/'
  },
  {
    cwd: '../assets/js/wp-starter.min.js',
    name: `${pkg.name}.min.js`,
    dest: '../assets/js/'
  },
  {
    cwd: '../assets/js/wp-starter.js',
    name: `${pkg.name}.js`,
    dest: '../assets/js/'
  },
  {
    cwd: '../languages/wp-starter.pot',
    name: `${pkg.name}.pot`,
    dest: '../languages/'
  }
];

gulp.task('sass', function () {
  return gulp.src(`../assets/scss/${pkg.name}.scss`)
    .pipe(sourcemaps.init())
    .pipe(sass.sync().on('error', sass.logError))
    .pipe(sourcemaps.write())
    .pipe(autoprefixer())
    .pipe(gulp.dest('../assets/css'));
});

gulp.task('concat', async (done) => {
  gulp.src(jsFiles)
    .pipe(sourcemaps.init())
    .pipe(concat(`${pkg.name}.js`))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest('../assets/js'));
});

gulp.task('uglify', async (done) => {
  gulp.src(`../assets/js/${pkg.name}.js`)
    .pipe(uglify())
    .pipe(rename(`${pkg.name}.min.js`))
    .pipe(gulp.dest('../assets/js'));
});

gulp.task('jshint', function() {
  gulp.src(['../assets/js/_*.js', './gulpfile.js'])
    .pipe(jshint(jshintOptions))
    .pipe(jshint.reporter('default'));
});

gulp.task('minify', function() {
  return gulp.src(`../assets/css/${pkg.name}.css`)
    .pipe(cssnano())
    .pipe(rename(`${pkg.name}.min.css`))
    .pipe(gulp.dest('../assets/css'));
});

gulp.task('rename', function() {
  for (let i in filesRename) {
    gulp.src(filesRename[i].cwd)
      .pipe(clean({force: true}))
      .pipe(rename(filesRename[i].name))
      .pipe(gulp.dest(filesRename[i].dest));
  }
});

gulp.task('replace', function() {
  gulp.src(['../*.php', '../**/*.php'])
    .pipe(replace(/wp_starter/g, pkg.theme_prefix))
    .pipe(replace(/wp-starter/g, pkg.name))
    .pipe(replace(/WP Starter/g, pkg.theme_name))
    .pipe(replace(/wp-starter-install-plugins/g, `${pkg.name}-install-plugins`))
    .pipe(gulp.dest('../'));

  gulp.src(['../style.css'])
    .pipe(replace(/1\.0\.0/g, pkg.version))
    .pipe(replace(/^.*Theme Name:.*$/m, `Theme Name: ${pkg.theme_name}`))
    .pipe(replace(/^.*Theme URI:.*$/m, `Theme URI: ${pkg.theme_url}`))
    .pipe(replace(/^.*Author:.*$/m, `Author: ${pkg.author_name}`))
    .pipe(replace(/^.*Author URI:.*$/m, `Author URI: ${pkg.author_homepage}`))
    .pipe(replace(/^.*Version:.*$/m, `Version: ${pkg.version}`))
		.pipe(replace(/^.*Description:.*$/m, `Description: ${pkg.description}`))
		.pipe(replace(/^.*Text Domain:.*$/m, `Text Domain: ${pkg.name}`))
    .pipe(gulp.dest('../'));

  gulp.src(['./bower.json'])
    .pipe(replace(/WP Starter/g, pkg.theme_name))
    .pipe(replace(/1\.0\.0/g, pkg.version))
    .pipe(replace(/http:\/\/www\.example\.com/g, pkg.author_homepage))
    .pipe(replace(/Author <contact@example\.com>/g, pkg.author))
    .pipe(gulp.dest('./'));
});

gulp.task('watch', function () {
	gulp.watch('../assets/scss/*.scss', gulp.series('sass'));
	gulp.watch('../assets/js/_*.js', gulp.series('concat'));
});
gulp.task('generate', gulp.series('rename', 'replace'));
gulp.task('build', gulp.series('sass', 'concat', 'uglify', 'minify'));
