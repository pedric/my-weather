var gulp        = require('gulp');
var browserSync = require('browser-sync').create();
var sass        = require('gulp-sass');

// Server
gulp.task('serve', ['sass'], function() {

  browserSync.init({
    server: "./app"
  });

  gulp.watch("src/scss/*.scss", ['sass']);
  gulp.watch("src/scss/*/*.scss", ['sass']);
  gulp.watch("app/*.html").on('change', browserSync.reload);
  gulp.watch("app/js/*.js").on('change', browserSync.reload);
});

// Sass -> CSS
gulp.task('sass', function() {
  return gulp.src("src/scss/main.scss")
    .pipe(sass())
    .pipe(gulp.dest("app/css"))
    .pipe(browserSync.stream());
});

gulp.task('default', ['serve']);
