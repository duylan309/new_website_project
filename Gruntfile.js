module.exports = function (grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        cssmin: {
            options: {
                shorthandCompacting: false,
                roundingPrecision: -1
            },
            target: {
                files: {
                    'public/admin/asset/css/style.css': [
                        'public/admin/asset/css/bootstrap.min.css',
                        'public/admin/asset/css/fonticon.min.css',
                        'public/admin/asset/css/morris.min.css',
                        'public/admin/asset/css/sb-admin.css',
                        'public/admin/asset/css/admin_style.css'
                    ]
                }
            }
        },
        concat: {
            all: {
                src: [
                    'public/admin/asset/js/jquery.min.js',
                    'public/admin/asset/js/bootstrap.min.js',
                    'public/admin/asset/js/sortable.min.js'
                ],
                dest: 'public/admin/asset/js/script.js'
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.registerTask('dev', ['cssmin', 'concat']);
};
