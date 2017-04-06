var gulp = require('gulp');

// sass
var sass = require('gulp-sass');

// Browser Sync
var browserSync = require('browser-sync').create();

// JS Minify
var uglify = require('gulp-uglify'),
  concat = require('gulp-concat');


// CSS Minify
var cssnano = require('gulp-cssnano');

// Optimize Images
var imagemin = require('gulp-imagemin');

gulp.task('browserSync', function() {
 var files = [
      '**/*.php',
      '**/*.html',
      '**/js/*.js',
      '**/css/*.css',
      '**/sass/*.scss',
  ];
  browserSync.init(files, {
    proxy: '192.168.2.250/icms',
  });
})

gulp.task('images', function(){
  gulp.src('assets/img/**/*.+(png|jpg|gif|svg)')
  .pipe(imagemin())
  .pipe(gulp.dest('dist/m/img'))
});

gulp.task('sass', function(){
  var files = [
    'assets/sass/_styles.scss',
    'assets/sass/media.scss',
    'assets/sass/*.scss',
  ];
   return gulp.src(files)
    .pipe(sass().on('error', sass.logError))
    .pipe(concat('main.min.css'))
    .pipe(cssnano({ zindex: false }))
    .pipe(browserSync.reload({
      stream: true
    }))
    .pipe(gulp.dest('assets/css'))
})

gulp.task('compressjs', function (cb) {
    return gulp.src('assets/js/app.js')
      .pipe(concat('jq.min.js'))
      .pipe(uglify())
      .pipe(gulp.dest('assets/js/m'));
});

gulp.task('compressng', function (cb) {
    return gulp.src([
        'assets/js/main.js',
        'assets/js/configs.js',
        'assets/js/services.js',
        'assets/js/directives.js',
        'assets/js/controllers.js',
      ])
      .pipe(concat('ng.min.js'))
      // .pipe(uglify())
      .pipe(gulp.dest('assets/js/m'))
});

gulp.task('run', ['browserSync', 'sass', 'compressjs', 'compressng'], function (){
  gulp.watch('assets/sass/*.scss', ['sass']);
  gulp.watch('assets/js/*.js', ['compressjs']);
  gulp.watch('assets/js/*.js', ['compressng']);
  gulp.watch('assets/css/*.min.css', browserSync.reload);
})
