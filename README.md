# Geography.pk

This is code for WordPress theme for Geography of Pakistan website. The website can be visited at [http://geography.pk](http://geography.pk)

You can fork, update and send pull requests. Please make sure that you describe your updates in PRs.


# Contribute

To contribute, you must have following installed at your machine:

* WordPress
* PHP 5.4.0
* MySQL
* Node.js
* Bower
* Grunt.js

Follow these steps to setup the workflow:

* Fork the repository at [https://github.com/pkgeography/geography.pk/fork](https://github.com/pkgeography/geography.pk/fork)

All workflow and tasks related files need to be at same level with WordPress install i.e.

```
wordpress/
.bowerrc
.gitignore
Gruntfile.js
LICENSE
README.md
bower.json
package.json
```

* Create new branch `git checkout -b my_quick_fix`
* Run `npm install && bower install` to install dev dependencies
* Run `grunt` to fire up the PHP built-in server and watch task
* Edit theme files in wordpress/wp-content/themes/pkgeography/
* Commit with a message explaning changes
* Open pull request


# License

MIT License