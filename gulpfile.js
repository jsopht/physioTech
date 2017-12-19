const gulp    = require('gulp')
const concat  = require('gulp-concat')
const uglify  = require('gulp-uglify')
const babel   = require('gulp-babel')
const cssmin  = require('gulp-cssmin')
const plumber = require('gulp-plumber')
const bSync   = require('browser-sync').create();

gulp.task('default', ['browser-sync'], () => {
  gulp.watch('./resources/assets/js/**/*.js', ['build-js'])
  gulp.watch('./resources/assets/css/*.css', ['build-css'])
  gulp.watch('./resources/assets/css/others/*.css', ['build-others-css'])
  gulp.watch('./resources/views/**/*.blade.php').on('change', bSync.reload)
});

gulp.task('browser-sync', () => {
  bSync.init({
    proxy: "http://dev.physiotech.com",
    port: '8080',
    open: false,
    notify: false
  });
});

gulp.task('build-js', () => {
  return gulp.src('./resources/assets/js/**/*.js')
  .pipe(plumber())
  .pipe(babel({presets: ['es2015']}))
  .pipe(concat('app.js'))
  .pipe(uglify())
  .pipe(gulp.dest('./public/js'))
  .pipe(bSync.reload({stream: true}))
});

gulp.task('build-css', () => {
  return gulp.src('./resources/assets/css/*.css')
  .pipe(concat('app.css'))
  .pipe(cssmin())
  .pipe(gulp.dest('./public/css/'))
  .pipe(bSync.reload({stream: true}))
});

// gulp.task('build-others-css', () => {
//   return gulp.src('./resources/assets/css/others/*.css')
//   .pipe(concat('others.min.css'))
//   .pipe(cssmin())
//   .pipe(gulp.dest('./public/css/'))
//   .pipe(bSync.reload({stream: true}))
// });
