// Boilerplate for PHP server along with optional Sass and JS tasks.

module.exports = function(grunt) {

	// Load all tasks
	require('load-grunt-tasks')(grunt);

	// Setup app path
	var config = {
		root: 'wordpress',
		app: 'wordpress/wp-content/themes/pkgeography'
	};

	grunt.initConfig({

		// Read package file for later reuse
		pkg: grunt.file.readJSON('package.json'),

		// Copy params to local scope
		config: config,

		// Sass task
		sass: {
			dist: {
				files: {
					'<%= config.app %>/css/style.css':'<%= config.app %>/sass/{,*/}*.{scss,sass}'
				},
				options: {
					style: 'expanded'
				}
			}
		},

		// CSS minifying task
		cssmin: {
			dist: {
				files: {
					'<%= config.app %>/css/style.min.css':['<%= config.app %>/css/style.css']
				},
				options: {
					banner: '/*! <%= pkg.name %> | v<%= pkg.version %> | <%= pkg.author %> | <%= pkg.homepage %> | <%= pkg.license %> */ \n'
				}
			}
		},

		// JS minifying task
		uglify: {
			options: {
				banner: '/*! <%= pkg.name %> | v<%= pkg.version %> | <%= pkg.author %> | <%= pkg.homepage %> | <%= pkg.license %> */ \n',
				preserveComments: 'some'
			},
			build: {
				src: '<%= config.app %>/js/main.js',
				dest: '<%= config.app %>/js/main.min.js',
			}
		},

		// PHP server task
		php: {
			options: {
				base: '<%= config.root %>',
				hostname: 'localhost',
				open: false
			},
			watch: {}
		},

		// Watch for changes task
		watch: {
			sass: {
				files: ['<%= config.app %>/sass/{,*/}*.{scss,sass}'],
				tasks: ['sass', 'cssmin'],
				options: {
					spawn: false,
					livereload: true
				}
			},
			js: {
				files: ['<%= config.app %>/js/main.js'],
				tasks: ['uglify'],
				options: {
					spawn: false,
					livereload: true
				}
			},
			php: {
				files: ['<%= config.app %>/{,*/}*.{php,html}'],
				options: {
					livereload: true
				}
			}
		}
	});

	// Register all tasks
	grunt.registerTask('default', [
		'php:watch',
		'watch'
	]);

	grunt.registerTask('serve', [
		'php:watch',
		'watch'
	]);

	grunt.registerTask('noserve', [
		'watch'
	]);

	// Production build task
	grunt.registerTask('build', [
		'sass:dist',
		'cssmin:dist',
		'uglify'
	]);
};