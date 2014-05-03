'use strict';
module.exports = function(grunt) {

    // load all grunt tasks
    require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

    grunt.initConfig({

        watch: {
            less: {
                files: [
                    'assets/less/*.less',
                    'assets/less/*/*.less'
                ],
                tasks: ['less']
            },
            sass: {
                files: ['assets/sass/**/*.{scss,sass}'],
                tasks: ['sass:prod']
            },
            livereload: {
                options: { livereload: true },
                files: [ 'assets/css/*.css', 'style.css', 'assets/js/*.js', '*.html', '*.php', 'assets/images/**/*.{png,jpg,jpeg,gif,webp,svg}']
            }

        },

        sass: {
            prod: {
                files: {
                    'assets/css/app.css': 'assets/sass/app.scss'
                }
            }
        },

        less: {
            development: {
                options: {
                    paths: ['assets/css'],
                    yuicompress: true,
                    syncImport: true
                },
                files: {
                    'assets/css/app.css': 'assets/less/app.less',
                    'assets/css/framework.css': 'assets/less/framework.less'
                }
            }
        },

        jshint: {
            options: {
                jshintrc: '.jshintrc',
                force: 'true'
            },
            all: [
                'Gruntfile.js',
                'assets/js/source/**/*.js',
                '!assets/js/source/plugins/*',
                '!assets/js/source/plugins.js'
            ]
        },

        uglify: {
            plugins: {
                files: {
                    'assets/js/plugins.min.js': [
                        'assets/js/source/plugins.js',
                        'assets/js/source/plugins/**/*.js',
                        'assets/components/reveal.js/js/reveal.js',  // Reveal.js Doc
                        'assets/components/reveal.js/lib/js/head.min.js',  // Reveal.js Doc
                        'assets/components/charts.js/Chart.js',  // Charts.js
                    ]
                }
            },
            main: {
                files: {
                    'assets/js/main.min.js': [
                        'assets/js/source/main.js'
                    ]
                }
            }
        }
    });

    // register task
    grunt.registerTask('test', ['jshint']);
    grunt.registerTask('minify', ['jshint', 'uglify']);
    grunt.registerTask('default', ['watch','uglify']);

};
