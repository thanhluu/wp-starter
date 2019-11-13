'use strict';

var gulp = require('gulp');
var replace = require('gulp-replace');
var fs = require('fs');
var pkg = JSON.parse(fs.readFileSync('./package.json'));

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
