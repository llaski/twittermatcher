// Generated on 2014-05-05 using generator-webapp-rjs 0.4.8
'use strict';

// # Globbing
// for performance reasons we're only matching one level down:
// 'test/spec/{,*/}*.js'
// use this if you want to recursively match all subfolders:
// 'test/spec/**/*.js'

module.exports = function (grunt) {

    // Load grunt tasks automatically
    require('load-grunt-tasks')(grunt);

    // Time how long tasks take. Can help when optimizing build times
    require('time-grunt')(grunt);

    // Define the configuration for all the tasks
    grunt.initConfig({

        // Project settings
        src: {
            // Configurable paths
            styles: ['src/styles/*.scss'],
            scripts: [
                'src/bower_components/jquery/jquery.js',
                'src/bower_components/bootstrap-sass/vendor/assets/javascripts/*.js',
                'src/bower_components/underscore/underscore.js',
                'src/bower_components/backbone/backbone.js',
                'src/js/app.js',
                'src/js/templates.js',
                'src/js/models/*.js',
                'src/js/views/*.js',
                'src/js/collections/*.js',
            ],
            pub: 'public',
            pubCss: 'public/css/*.css',
            pubJs: 'public/js/*.js',
            pubImg: 'public/img/**/*',
            pubFonts: 'public/fonts/*'
        },

        concat: {
            options: {
                separator : ';'
            },
            dist: {
                src: '<%= src.scripts %>',
                dest:'<%= src.pub %>/js/main.js'
            }
        },

        // Compiles Sass to CSS and generates necessary files if requested
        compass: {
            options: {
                sassDir: 'src/styles',
                cssDir: 'public/css',
                generatedImagesDir: 'src/img',
                imagesDir: 'public/img',
                javascriptsDir: 'src/js',
                fontsDir: 'public/fonts',
                importPath: 'src/bower_components',
                httpImagesPath: '/img',
                httpGeneratedImagesPath: '/img',
                httpFontsPath: '/fonts',
                relativeAssets: false,
                assetCacheBuster: false
            },
            dist: {}
        },

        copy: {
            main: {
                files: [
                    {
                        expand: true,
                        flatten: true,
                        src: ['src/bower_components/bootstrap-sass/vendor/assets/fonts/bootstrap/*'],
                        dest : 'public/fonts',
                        filter: 'isFile'
                    }
                ]
            }
        },

        uglify: {
            options: {
                mangle: false
            },
            dist: {
                src: '<%= src.pub %>/js/main.js',
                dest:'<%= src.pub %>/js/main.min.js'
            }
        },

        // phpunit: {
        //     classes: {
        //         dir: 'app/tests/'
        //     },
        //     options: {
        //         bin: 'vendor/bin/phpunit',
        //         colors: true
        //     }
        // },

        // Watches files for changes and runs tasks based on the changed files
        watch: {

            sass: {
                files: '<%= src.styles %>',
                tasks: ['compass:dist']
            },

            css: {
                files: '<%= src.pubCss %>',
                options: {
                    livereload: true
                }
            },

            js: {
                files: '<%= src.scripts %>',
                tasks: ['concat', 'uglify'],
                options: {
                    livereload: true
                }
            },

            gruntfile: {
                files: ['Gruntfile.js']
            },

            // tests: {
            //     files: ['app/controllers/*.php','app/models/*.php'],
            //     tasks: ['phpunit']
            // }
        }

    });


    grunt.registerTask('build', [
        'compass',
        'concat',
        'uglify'
    ]);

    grunt.registerTask('default', [
        'build',
        'watch'
    ]);
};
