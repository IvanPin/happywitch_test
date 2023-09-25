var gulp = require('gulp'),
    sass = require('gulp-sass')(require('sass'));
const concat = require('gulp-concat');
const fileInclude = require('gulp-file-include');
const rename = require('gulp-rename');
const sourcemaps = require('gulp-sourcemaps');
const bulk = require('gulp-sass-bulk-importer');
const prefixer = require('gulp-autoprefixer');
const clean = require('gulp-clean-css');
var watch = require('gulp-watch');


gulp.task('sass-global', function () {
    return gulp.src(['templates/template.scss', 'components/**/*.scss'])
        .pipe(sourcemaps.init())
        .pipe(bulk())
        .pipe(sass())
        .pipe(prefixer({
            overrideBrowserslist: ['last 8 versions'],
            browsers: [
                'Android >= 4',
                'Chrome >= 20',
                'Firefox >= 24',
                'Explorer >= 11',
                'iOS >= 6',
                'Opera >= 12',
                'Safari >= 6',
            ],
        }))
        .pipe(clean())
        .pipe(concat('style.css'))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest('assets'))
});

gulp.task('js-global', function () {
    return gulp.src(['components/**/*.js'])
        .pipe(sourcemaps.init())
        .pipe(concat('script.js'))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest('assets'))
});


gulp.task('watch', function () {
   gulp.watch(['components/**/*.scss'], {usePolling: true}, gulp.series('sass-global'));
    gulp.watch(['components/**/*.js'], {usePolling: true}, gulp.series('js-global'));
});

gulp.task('default', gulp.series(['sass-global', 'js-global']));
