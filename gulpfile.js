const PROJECT_FOLDER = "dist";
const SOURCE_FOLRED = "src";

let fs = require('fs');

let path = {
    build: {
        html: PROJECT_FOLDER + '/',
        css: PROJECT_FOLDER + '/css/',
        js: PROJECT_FOLDER + '/js/',
        img: PROJECT_FOLDER + '/img/',
        fonts: PROJECT_FOLDER + '/fonts/',
    },
    src: {
        html: [SOURCE_FOLRED + '/*.html', '!' + SOURCE_FOLRED + '/_*.html'],
        css: SOURCE_FOLRED + '/scss/style.scss',
        js: [SOURCE_FOLRED + '/js/script.js', '!' + SOURCE_FOLRED + '/_*.js'],
        img: SOURCE_FOLRED + '/img/**/*.{jpg,png,svg,gif,ico,webp}',
        fonts: SOURCE_FOLRED + '/fonts/*.ttf',
    },
    watch: {
        html: SOURCE_FOLRED + '/**/*.html',
        css: SOURCE_FOLRED + '/scss/**/*.scss',
        js: SOURCE_FOLRED + '/js/**/*.js',
        img: SOURCE_FOLRED + '/img/**/*.{jpg,png,svg,gif,ico,webp}'
    },
    clean: './' + PROJECT_FOLDER + '/'
}

let { src, dest } = require('gulp'),
    gulp = require('gulp'),
    browsersync = require('browser-sync').create(),
    fileinclude = require('gulp-file-include'),
    del = require('del'),
    scss = require('gulp-sass')(require('sass')),
    autoprefixer = require('gulp-autoprefixer'),
    clean_css = require('gulp-clean-css'),
    rename = require('gulp-rename'),
    uglify = require('gulp-uglify-es').default,
    babel = require('gulp-babel'),
    imagemin = require('gulp-imagemin'),
    webp = require('gulp-webp'),
    webpHtml = require('gulp-webp-html'),
    webpCSS = require('gulp-webp-css'),
    svgSprite = require('gulp-svg-sprite'),
    ttf2woff = require('gulp-ttf2woff'),
    ttf2woff2 = require('gulp-ttf2woff2'),
    fonter = require('gulp-fonter'),
    group_media = require('gulp-group-css-media-queries');

function browserSync(params) {
    browsersync.init({
        server: {
            baseDir: './' + PROJECT_FOLDER + '/'
        },
        port: 3000,
        notify: false
    });
}

function fonts(params) {
    src(path.src.fonts)
        .pipe(ttf2woff())
        .pipe(dest(path.build.fonts));
    return src(path.src.fonts)
        .pipe(ttf2woff2())
        .pipe(dest(path.build.fonts));

}

function html() {
    return src(path.src.html)
        .pipe(fileinclude())
        .pipe(webpHtml())
        .pipe(dest(path.build.html))
        .pipe(browsersync.stream())
}

function images() {
    return src(path.src.img)
        .pipe(webp({
            quality: 70
        }))
        .pipe(dest(path.build.img))
        .pipe(src(path.src.img))
        .pipe(
            imagemin({
                progressive: true,
                svgoPlugins: [{ removeViewBox: false }],
                interlaced: true,
                optimizationLevel: 3 // 0-7
            })
        )
        .pipe(dest(path.build.img))
        .pipe(browsersync.stream())
}

function css() {
    return src(path.src.css)
        .pipe(scss({
            outputStyle: 'expanded'
        }))
        .pipe(group_media())
        .pipe(
            autoprefixer({
                overrideBrowserslist: ["last 5 versions"],
                cascade: true
            })
        )
        .pipe(webpCSS())
        .pipe(dest(path.build.css))
        .pipe(clean_css())
        .pipe(rename({
            extname: '.min.css'
        }))
        .pipe(dest(path.build.css))
        .pipe(browsersync.stream())
}

function js() {
    return src(path.src.js)
        .pipe(fileinclude())
        .pipe(dest(path.build.js))
        .pipe(
            uglify()
        )
        .pipe(rename({
            extname: '.min.js'
        }))
        .pipe(babel({
            presets: ['@babel/env']
        }))
        .pipe(dest(path.build.js))
        .pipe(browsersync.stream())
}

gulp.task('otf2ttf', function () {
    return gulp.src([SOURCE_FOLRED + '/fonts/*.otf'])
        .pipe(fonter({
            formats: ['ttf']
        }))
        .pipe(dest(SOURCE_FOLRED + '/fonts/'));
});

gulp.task('svgSprite', function () {
    return gulp.src([SOURCE_FOLRED + '/iconsprite/*.svg'])
        .pipe(svgSprite({
            mode: {
                stack: {
                    sprite: '../icons/icons.svg',
                    // example: true
                }
            }
        }))
        .pipe(dest(path.build.img))
});

function fontsStyle(params) {
    let file_content = fs.readFileSync(SOURCE_FOLRED + '/scss/fonts.scss');
    if (file_content == '') {
        fs.writeFile(SOURCE_FOLRED + '/scss/fonts.scss', '', cb);
        return fs.readdir(path.build.fonts, function (err, items) {
            if (items) {
                let c_fontname;
                for (var i = 0; i < items.length; i++) {
                    let fontname = items[i].split('.');
                    fontname = fontname[0];
                    if (c_fontname != fontname) {
                        fs.appendFile(SOURCE_FOLRED + '/scss/fonts.scss', '@include font("' + fontname + '", "' + fontname + '", "400", "normal");\r\n', cb);
                    }
                    c_fontname = fontname;
                }
            }
        })
    }
}

function cb() { }

function watchFiles(params) {
    gulp.watch([path.watch.css], css)
    gulp.watch([path.watch.img], images)
    gulp.watch([path.watch.js], js)
    gulp.watch([path.watch.html], html)
}

function clean(params) {
    return del(path.clean);
}

let build = gulp.series(clean, gulp.parallel(js, css, html, images, fonts), fontsStyle);
let watch = gulp.parallel(build, watchFiles, browserSync);

exports.fontsStyle = fontsStyle;
exports.fonts = fonts;
exports.images = images;
exports.js = js;
exports.css = css;
exports.html = html;
exports.build = build;
exports.watch = watch;
exports.default = watch;