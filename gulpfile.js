var gulp      = require('gulp'),
  sass        = require('gulp-ruby-sass'),
  livereload  = require('gulp-livereload'),
  prefix      = require('gulp-autoprefixer'),
  plumber     = require('gulp-plumber'),
  notify      = require("gulp-notify") ,
  uglify      = require('gulp-uglify'),
  rename      = require("gulp-rename"),
  imagemin    = require('gulp-imagemin'),
  pngquant    = require('imagemin-pngquant'),
  concat      = require('gulp-concat'),
  stripDebug  = require('gulp-strip-debug');


// Styles
gulp.task('styles', function() {

  return sass('scss/style.scss', { style: 'expanded', lineNumbers: true })
  .on('error', function (err) {
      console.error('Error!', err.message);
   })
  .pipe(prefix({
            browsers: ['last 2 versions'],
            cascade: false
        }))
  .pipe(gulp.dest('.'))
  .pipe(livereload())
});

// Compress JS
gulp.task('compress', function() {
  gulp.src('js/*.js')

    .pipe(uglify())
    .pipe(rename({suffix: '.min' }))
    .pipe(gulp.dest('js/build'))
    .pipe(notify({ message: 'Compression task complete' }));
});

// Concat Plugins, Minify
gulp.task('plugins', function() {
    gulp.src(['js/plugins/*.js'])
    .pipe(concat('plugins.js'))
    .pipe(stripDebug())
    .pipe(uglify())
    .pipe(rename({suffix: '.min' }))
    .pipe(gulp.dest('js/build'));
});

// Watch

gulp.task('watch', function(){
  livereload.listen();
  gulp.watch('scss/**/*.scss', ['styles']);
  gulp.watch('js/*.js', ['compress']);
  gulp.watch('js/plugins/*.js', ['plugins']);


});

// Images
gulp.task('images', function () {
    return gulp.src('img/org/**/*')
        .pipe(imagemin({
            progressive: true,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngquant()]
        }))
        .pipe(gulp.dest('img/build/'))
        .pipe(notify({ // Add gulpif here
           title: 'Gulp',
           subtitle: 'Success!',
           message: 'Successfully compressed images',
           sound: "Beep"
       }));
});

// Default
gulp.task('default', ['styles','watch']);


