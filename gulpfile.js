'use strict';

const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const autoprefixer = require('gulp-autoprefixer');
const babel = require("gulp-babel");

gulp.task('sass', function () {
    return gulp.src('wp-content/themes/shuyis_crave/sass/style.scss')
        .pipe(autoprefixer({
            cascade: false
        }))
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(gulp.dest('wp-content/themes/shuyis_crave/'));
});

gulp.task('sass:watch', function () {
    gulp.watch('wp-content/themes/shuyis_crave/sass/**/*.scss', gulp.series('sass'));
});

gulp.task('js', function () {
    return gulp.src("wp-content/themes/shuyis_crave/js/*.js")
        .pipe(babel({
            presets: ["@babel/preset-env"]
        }))
        .pipe(gulp.dest("wp-content/themes/shuyis_crave/"));
})

gulp.task('js:watch', function () {
    gulp.watch('wp-content/themes/shuyis_crave/js/*.js', gulp.series('js'));
});
