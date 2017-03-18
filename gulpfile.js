'use strict';

// Grab our gulp packages
var gulp  = require('gulp'),
  autoprefixer = require('autoprefixer'),
  gulpLoadPlugins = require('gulp-load-plugins'),
  yargs = require('yargs'),
  browserSync = require('browser-sync').create(),
  fs = require('fs'),
  path = require('path'),
  glob = require('glob'),
  inq = require('inquirer'),
  rimraf = require('rimraf');

const $ = gulpLoadPlugins();
const wpPath = "./wp-content/themes/trcdo/";
const PRODUCTION = !!(yargs.argv.production);


// Delete the "dist" folder
// This happens every time a build starts
function clean(done) {
  rimraf('dist', done);
}

// Copy what's in node_modules/foundation_emails/scss to src/assets/src
// Should only be run when a project starts or when you want to start over
function init(done) {
  const dir = 'node_modules/foundation-sites/scss/**';
  const dist = 'wp-content/themes/trcdo/sass/';
  const ext = '.scss';

  function isSassPartial(file) {
    return (path.extname(file) == ext && path.basename(file).charAt(0) == '_');
  }

  let sassTask = new glob.Glob(dir, function(er, files) {

    let fileNames = files.map(function(file) {
      if (isSassPartial(file)) return path.basename(file, ext);
    }).filter(Boolean);

    fileNames.splice(fileNames.length, 0, '_settings', '_util');
    fileNames.splice(-1, 2);

    inq.prompt([{
      type: 'confirm',
      message: "Doing this will completely overwrite any changes you've made to the foundation stylesheets.\nOnly do this at the beginning of projects or to start over.\nDo you want to continue? \n",
      default: true,
      name: 'start'
    },{
      type: 'confirm',
      message: 'Are any of your files in src/assets/scss named the following? Can you check?\nThis will overwrite them.\n' + fileNames.join('\n') + '\n',
      default: false,
      name: 'doubleCheck'
    }]).then(function(answer) {
      if (answer.start && !answer.doubleCheck) {
        files.map(function(file) {
          return gulp.src(file)
          .pipe($.ignore.exclude(!isSassPartial(file)))
          .pipe(gulp.dest(dist.concat('foundation/')));
        });
        fs.appendFile(dist.concat('style.scss'), "@import '" + fileNames.join("',\n '") + "';", 'utf8', function(err) {
          if (err) throw err;
          console.log('The new local stylesheets were added to app.scss');
        });
        console.log('\nDone and copied over. Go take a look, maybe check on app.scss and have a super awesome day.');
      } else {
        console.log("\nI'm sorry, Dave. I'm afraid I can't do that. \nMake sure none of those filenamess are in app/src/scss and run \'npm run new\' again.");
      }
    });
  });
  done();
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

// gulp.task('scripts', function() {
//   return gulp.src(wpPath + 'js/scripts/*.js')
//     .pipe($.if(!PRODUCTION, $.sourcemaps.init()))
//     .pipe($.concat('main.min.js'))
//     .pipe($.uglify({preserveComments: 'some'}))
//     .pipe($.if(!PRODUCTION, $.sourcemaps.write('.')))
//     .pipe(gulp.dest(wpPath + 'js'))
//     .pipe($.size({title: 'scripts'}));
// });

gulp.task('serve', function() {

  browserSync.init({
    proxy: "localhost:8000",
  });

  gulp.watch(wpPath + 'sass/**/*.scss',  gulp.series('styles')).on('change', browserSync.reload);
  // gulp.watch(wpPath + 'js/scripts/*.js', gulp.series('scripts')).on('change', browserSync.reload);
  gulp.watch(wpPath + 'images/*.{svg,png,jpg,gif}',  gulp.series('images')).on('change', browserSync.reload);
});

gulp.task('default', gulp.series(
  'styles',
  // 'scripts',
  'images'));

// Initialize
gulp.task('init',
  gulp.series(init));
