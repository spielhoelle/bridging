const gulp          = require('gulp'),
    browserSync   = require('browser-sync').create(),
    sass          = require('gulp-sass'),
    autoprefixer  = require('gulp-autoprefixer');


const wpPath = './wp-content/themes/bringing-ideas'
const dockerPort = 8080

gulp.task('serve', ['sass'], function() {

    browserSync.init({
      proxy: `localhost:${dockerPort}`,
      open: false
    });

    gulp.watch(`${wpPath}/*.php`).on('change', browserSync.reload);
    gulp.watch(`${wpPath}/sass/**/*.sass`, ['sass']);
});

gulp.task('sass', function() {
  return gulp.src(`${wpPath}/sass/style.sass`)
    .pipe(sass({
      errLogToConsole: true,
      outputStyle: 'compressed'
    }).on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(gulp.dest(`${wpPath}/`))
    .pipe(browserSync.stream());
});


gulp.task('default', ['serve']);
