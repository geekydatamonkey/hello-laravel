// http://markgoodyear.com/2014/01/getting-started-with-gulp/

// Also:
// https://gist.github.com/isimmons/8701121

var gulp = require('gulp'),
    sass = require('gulp-ruby-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    minifycss = require('gulp-minify-css'),
    jshint = require('gulp-jshint'),
    uglify = require('gulp-uglify'),
    imagemin = require('gulp-imagemin'),
    rename = require('gulp-rename'),
    clean = require('gulp-clean'),
    concat = require('gulp-concat'),
    notify = require('gulp-notify'),
    cache = require('gulp-cache'),
    livereload = require('gulp-livereload'),
    lr = require('tiny-lr'),
    server = lr();

//CSS directories
var paths = {
    styles: {
        sourceDir: 'app/assets/sass',
        targetDir:  'public/css',
        fileType: '*.scss'
    },
    scripts: {
        sourceDir: 'app/assets/js',
        targetDir: 'public/js',
        fileType: '*.js'
    },
    images: {
      sourceDir: 'app/assets/img',
      targetDir: 'public/img'
    },
    livereload: {
        sourceDir: 'app',
        fileType: '*.php'
    }
};
 
// blade directory
var srcBladeDir = 'app/views';


gulp.task('styles', function() {
  var p = paths.styles;
  return gulp.src(p.sourceDir + '/**/' + p.fileType)
    .pipe(sass({ style: 'expanded' }))
    .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
    .pipe(gulp.dest(p.targetDir))
    .pipe(rename({suffix: '.min'}))
    .pipe(minifycss())
    .pipe(gulp.dest(p.targetDir))
    .pipe(livereload(server))
    .pipe(notify({ message: 'Styles task complete' }));
});

gulp.task('scripts', function() {
  var p = paths.scripts;
  return gulp.src(p.sourceDir + '/**/' + p.fileType)
    .pipe(jshint('.jshintrc'))
    .pipe(jshint.reporter('default'))
    .pipe(concat('main.js'))
    .pipe(gulp.dest(p.targetDir))
    .pipe(rename({suffix: '.min'}))
    .pipe(uglify())
    .pipe(gulp.dest(p.targetDir))
    .pipe(livereload(server))
    .pipe(notify({ message: 'Scripts task complete' }));
});

gulp.task('images', function() {
  var p = paths.images;
  return gulp.src(p.sourceDir)
    .pipe(cache(imagemin({ optimizationLevel: 3, progressive: true, interlaced: true })))
    .pipe(gulp.dest(p.targetDir))
    .pipe(livereload(server))
    .pipe(notify({ message: 'Images task complete' }));
});

gulp.task('clean', function() {
  return gulp.src([
      paths.styles.targetDir,
      paths.scripts.targetDir,
      paths.images.targetDir
    ], {read: false})
    .pipe(clean());
});

/* Blade Templates */
// gulp.task('blade', function() {
//     return gulp.src(srcBladeDir + '/**/*.blade.php')
//         .pipe(livereload(server));
// });

gulp.task('livereload', function(){
  var p = paths.livereload;
    return gulp.src(p.sourceDir + '/**/' + p.fileType)
        .pipe(livereload(server));
});

gulp.task('watch', function() {

    // Listen on port 35729
  server.listen(35729, function (err) {
    if (err) {
      return console.log(err)
    };

    // Watch tasks go inside inside server.listen()

    gulp.watch(paths.livereload.sourceDir + '/**/' + paths.livereload.fileType, ['livereload']);

    // Watch .scss files
    gulp.watch('app/assets/sass/**/*.scss', ['styles']);

    // Watch .js files
    gulp.watch('app/assets/js/**/*.js', ['scripts']);

    // Watch image files
    gulp.watch('app/assets/img/**/*', ['images']);
  });

});


gulp.task('default', ['clean'], function() {
    gulp.start('styles', 'scripts', 'images');
});
