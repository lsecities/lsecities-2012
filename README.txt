# LSE Cities WordPress theme

This is the WordPress theme for https://lsecities.net/

## Quick start

Install and activate the theme, create all the required Pods content
types (see the Developer section of the
[LSE Cities Web Handbook](http://web-handbook.docs.lsecities.net/)
for details).

## Deploying

When updating the theme, in order to deploy to testing/staging/production,
a Make task can be used (from the root of the theme repo):

`make deploy`

This Make tasks needs all the following four environment variables to be
defined:

* `DEPLOY_BRANCH`: the branch to deploy (when deploying to testing, it
  will be necessary to commit or stage any current changes if deploying
  a branch other than the current branch; this shouldn't affect straging
  or production as we wouldn't be committing from random development
  branches)
* `THEME_TMPDIR`: this is a temporary directory; the task will create a
  subdirectory named after the branch that it is asked to deploy (via
  `DEPLOY_BRANCH`)
* `THEME_LIVEDIR`: this is the theme's directory within the WordPress themes
  folder
* `DEPLOY_USER`: user to deploy as; `THEME_LIVEDIR` will typically be
  owned by a system user specific to the instance being deployed to,
  and we use sudo to deploy as such user

Therefore, a full deploy command may look like:

`DEPLOY_BRANCH=master THEME_TMPDIR=/tmp/lsecities-wp-theme THEME_LIVEDIR=/path/to/wordpress/themes/lsecities-wp-theme DEPLOY_USER=user1234 make deploy`

## Contributing

Starting in early 2014, the theme's code is being gradually refactored,
with the aim of achieving the following goals:

* Pods data querying/extraction code totally separate from templates
* Twig templates using HAML syntax (via semanticwp/twig-haml-templating)
* Foundation-based layout
* Grunt as task runner

As components get refactored, the updated code tree is as follows:

* `/assets/scss`: stylesheets
* `/lib/lsecities`: Pods code
* `/lib/lsecities/<pod>/`: code for each Pod
* `/templates/lsecities`: Twig+HAML templates
* `/pods-<pod>.php`: WordPress templates (just thin wrappers around
  the real Twig+HAML templates)
  
### Legacy code structure

* `/stylesheets`: stylesheets (compiled from distinct SCSS source
  repository; the legacy stylesheets use the
  [retired 1140px CSS Grid framework](http://andytaylor.me/2013/04/09/1140px-css-grid-retired/))
* `/javascripts`: theme and vendor Javascript code
* `/includes`: PHP includes
* `/includes/pods/pods/<pod>`: code for each pod
* `/includes/pages/<page>`: code for page types (currently only one-off
  and quarterly newsletters)
* `/includes/plugins`: code ported from previously self-contained WP
  plugins
* `/includes/partials`: Pods code for page components
* `/templates/microsites`: PHP templates for microsites
* `/templates/nav`: PHP templates - all the side navigation partials
* `/templates/pods/<pod>`: PHP templates for individual Pods

## License

Copyright (C) 2011-2015 LSE Cities.

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU Affero General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU Affero General Public License for more details.

You should have received a copy of the GNU Affero General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
