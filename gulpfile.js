var gulp      = require('gulp'),
  sass        = require('gulp-ruby-sass'),
  livereload  = require('gulp-livereload'),
  plumber     = require('gulp-plumber'),
  prefix      = require('gulp-autoprefixer'),
  notify      = require("gulp-notify") ,
  uglify      = require('gulp-uglify'),
  newer       = require('gulp-newer'),
  rename      = require("gulp-rename"),
  imagemin    = require('gulp-imagemin');
  pngquant    = require('imagemin-pngquant');;


// Styles
gulp.task('styles', function() {
  gulp.src('scss/**/*.scss')
  .pipe(plumber())
  .pipe(sass({sourcemapPath: 'source', style: 'expanded'}))
  .pipe(gulp.dest('.'))
  .pipe(livereload())
  .pipe(notify({ message: 'Styles task complete' }));
});

// Scripts
gulp.task('compress', function() {
  gulp.src('js/*.js')

    .pipe(uglify())
    .pipe(rename({suffix: '.min' }))
    .pipe(gulp.dest('js/build'))
    .pipe(notify({ message: 'Compression task complete' }));
});

// Watch

gulp.task('watch', function(){
  var server = livereload();

  gulp.watch('scss/**/*.scss', ['styles']);
  gulp.watch('js/*.js', ['compress']);
  gulp.watch('**/*.php').on('change', function(file) {
      livereload(server).changed(file.path);
  });
});

// Images
gulp.task('images', function () {
    return gulp.src('img/**/*')
        .pipe(imagemin({
            progressive: true,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngquant()]
        }))
        .pipe(gulp.dest('img/build/'));
});

// Default
gulp.task('default', ['styles','watch']);


