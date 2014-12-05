PHP Server Boilerplate
======================

A boilerplate that enables PHP built-in server as Grunt task along with optional Sass and JS tasks.

# Installation & How to Use

[Download the latest stable copy](https://github.com/jabranr/php-server-boilerplate/releases)

#### For development, use: `$ grunt` or `$ grunt serve`

This will run PHP built-in server (requires PHP 5.4+ installation) and watch for requests. Additional task will watch for changes in Sass files (.scss, .sass) and convert them to CSS.

#### For production, use: `$ grunt build`

This will compress and minify the CSS and JS files for production use. It will not watch for changes or run a server.

**Important:** Always make changes to Sass files. `$ grunt build` will override CSS file as it will convert the current state of Sass to CSS before compressing and minifying them.

This boilerplate has following development dependencies.

+ [grunt](https://www.npmjs.org/package/grunt)
+ [grunt-contrib-cssmin](https://www.npmjs.org/package/grunt-contrib-cssmin)
+ [grunt-contrib-sass](https://www.npmjs.org/package/grunt-contrib-sass)
+ [grunt-contrib-uglify](https://www.npmjs.org/package/grunt-contrib-uglify)
+ [grunt-contrib-watch](https://www.npmjs.org/package/grunt-contrib-watch)
+ [grunt-php](https://www.npmjs.org/package/grunt-php)
+ [load-grunt-tasks](https://www.npmjs.org/package/load-grunt-tasks)

# Contribute

Feel free to fork, contribute, redistribute etc.

Use standard procedure:

Fork -> checkout branch -> add feature -> commit & create pull request -> :+1:

# License

MIT License