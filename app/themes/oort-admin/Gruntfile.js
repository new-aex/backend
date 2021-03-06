const sass = require('node-sass');

module.exports = function(grunt) {
  grunt.initConfig({
    jshint: {
      options: {
        jshintrc: '.jshintrc'
      },
      all: ['Gruntfile.js', 'assets/js/*.js', '!assets/js/scripts.min.js']
    },
    sass: {
      dist: {
        files: {
          'assets/css/main.min.css': ['assets/scss/app.scss']
        },
        options: {
          implementation: sass,
          style: 'compressed'
        }
      }
    },
    uglify: {
      dist: {
        files: {
          'assets/js/scripts.min.js': [
            'assets/js/plugins/*.js',
            'assets/js/_*.js'
          ]
        },
        options: {
          // JS source map: to enable, uncomment the lines below and update sourceMappingURL based on your install
          sourceMap: 'assets/js/scripts.min.js.map',
          sourceMappingURL:
            '/kittymaria/app/themes/kittymaria/assets/js/scripts.min.js.map'
        }
      }
    },
    version: {
      options: {
        file: 'lib/utils/scripts.php',
        css: 'assets/css/main.min.css',
        cssHandle: 'oortadmin_main',
        js: 'assets/js/scripts.min.js',
        jsHandle: 'oortadmin_scripts'
      }
    },
    watch: {
      sass: {
        files: ['assets/scss/*.scss', 'assets/scss/**/*.scss'],
        tasks: ['sass', 'version']
      },
      js: {
        files: ['<%= jshint.all %>'],
        tasks: ['jshint', 'uglify', 'version']
      },
      livereload: {
        // Browser live reloading
        // https://github.com/gruntjs/grunt-contrib-watch#live-reloading
        options: {
          livereload: true
        },
        files: [
          'assets/css/main.min.css',
          'assets/js/scripts.min.js',
          'templates/*.php',
          'templates/**/*.php',
          '*.php'
        ]
      }
    },
    clean: {
      dist: ['assets/css/main.min.css', 'assets/js/scripts.min.js']
    }
  });

  // Load tasks
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-wp-version');

  // Register tasks
  grunt.registerTask('default', ['clean', 'sass', 'uglify', 'version']);
  grunt.registerTask('dev', ['watch']);
};
