'use strict';

// Grab our gulp packages
var gulp  = require('gulp'),
  autoprefixer = require('autoprefixer'),
  gulpLoadPlugins = require('gulp-load-plugins'),
  yargs = require('yargs'),
  browserSync = require('browser-sync').create(),
  rimraf = require('rimraf');

const $ = gulpLoadPlugins();
const wpPath = "./wp-content/themes/trcdo/";
const PRODUCTION = !!(yargs.argv.production);


// Delete the "dist" folder
// This happens every time a build starts
function clean(done) {
  rimraf('dist', done);
}

gulp.task('images', function() {
  return gulp.src(wpPath + 'images/*.{svg,png,jpg,gif}')
    .pipe($.debug({title: 'image:'}))
    .pipe($.imagemin())
    .pipe(gulp.dest(wpPath + "assets"))
    .pipe($.size({title: 'images'}));
});

gulp.task('styles', function() {
  return gulp.src(wpPath + "sass/style.scss")
    .pipe($.debug({title: 'style:'}))
    .pipe($.if(!PRODUCTION, $.sourcemaps.init()))
    .pipe($.sass({outputStyle: 'compressed'
    }).on('error', $.sass.logError))
    .pipe($.postcss([autoprefixer({
      browsers: ['last 2 version'],
      cascade: false
    })]))
    .pipe($.cssnano())
    .pipe($.if(!PRODUCTION, $.sourcemaps.write('.')))
    .pipe(gulp.dest(wpPath))
    .pipe($.size({title: 'styles'}));
});

gulp.task('scripts', function() {
  return gulp.src(wpPath + 'js/*.js')
    .pipe($.if(!PRODUCTION, $.sourcemaps.init()))
    .pipe($.concat('app.min.js'))
    // .pipe($.uglify({preserveComments: 'some'}))
    .pipe($.if(!PRODUCTION, $.sourcemaps.write('.')))
    .pipe(gulp.dest(wpPath))
    .pipe($.size({title: 'scripts'}));
});

gulp.task('serve', function() {

  browserSync.init({
    proxy: "localhost:6969",
  });

  gulp.watch(wpPath + 'sass/**/*.scss',  gulp.series('styles')).on('change', browserSync.reload);
  gulp.watch(wpPath + 'js/*.js', gulp.series('scripts')).on('change', browserSync.reload);
  gulp.watch(wpPath + 'images/*.{svg,png,jpg,gif}',  gulp.series('images')).on('change', browserSync.reload);
});

gulp.task('default', gulp.series(
  'styles',
  // 'scripts',
  'images'));
