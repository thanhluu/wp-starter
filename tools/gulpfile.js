'use strict';

var gulp = require('gulp');
var terser = require('gulp-terser');
var concat = require("gulp-concat");
var sass = require('gulp-sass');
var cssnano = require('gulp-cssnano');
var rename = require("gulp-rename");
var sourcemaps = require("gulp-sourcemaps");
var autoprefixer = require("gulp-autoprefixer");
var replace = require('gulp-replace');
var fs = require('fs');
var pkg = JSON.parse(fs.readFileSync('./package.json'));

// include js files for compile
var jsFiles = [
	"../assets/js/_*.js"
];

// concat js files
gulp.task("concat", function () {
	return gulp
		.src(jsFiles)
		.pipe(sourcemaps.init())
		.pipe(concat(`theme.js`))
		.pipe(sourcemaps.write())
		.pipe(gulp.dest("../assets/js"));
});

// uglify js files
gulp.task("terser", function () {
	return gulp
		.src(`../assets/js/theme.js`)
		.pipe(terser())
		.pipe(rename(`theme.min.js`))
		.pipe(gulp.dest("../assets/js"));
});

gulp.task('sass', function () {
	return gulp.src('../assets/scss/theme.scss')
		.pipe(sourcemaps.init())
		.pipe(sass.sync().on('error', sass.logError))
		.pipe(sourcemaps.write())
		.pipe(autoprefixer())
		.pipe(gulp.dest('../assets/css'));
});

gulp.task('minify', function () {
	return gulp.src('../assets/css/theme.css')
		.pipe(cssnano())
		.pipe(rename('theme.min.css'))
		.pipe(gulp.dest('../assets/css'));
});

gulp.task('replace', async (done) => {
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
});

gulp.task('generate', gulp.series('replace'));

gulp.task('watch', function () {
	gulp.watch('../assets/scss/*.scss', gulp.series('sass'));
	gulp.watch("../assets/js/_*.js", gulp.series('concat'));
});

gulp.task('build', gulp.series('sass', 'minify', 'concat', 'terser'));
