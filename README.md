# Bixal Links v1 General module


## Getting Started
This module is for Drupal 9 and Drupal 10.x. 
[please visit https://github.com/vlyalkobixal/bixallinks](https://github.com/vlyalkobixal/bixallinks)

You can download this module by installing via composer. First, add
the code snippet below in your composer.json file within the
`"repositories": [...` area or create one if you do not have this.

```json
     "type": "package",
"package": {
"name": "vlyalkobixal/bixallinks",
"version": "1.0.0",
"type":"drupal-module",
"source": {
"url": "https://github.com/vlyalkobixal/bixallinks.git",
"type": "git",
"reference": "v1.0.0"
}
}
```

As an example, once you add the code above, your entire repositories block might look like this:

```json
    "repositories": [
        {
            "type": "composer",
            "url": "https://packages.drupal.org/8"
        },
        {
            "type": "composer",
            "url": "https://asset-packagist.org"
        },
        {
            "type": "package",
            "package": {
                "name": "vlyalkobixal/bixallinks",
                "version": "1.0.0",
                "type":"drupal-module",
                "source": {
                    "url": "https://github.com/vlyalkobixal/bixallinks.git",
                    "type": "git",
                    "reference": "v1.0.0"
                }
            }
        }
    ],
```

Once this is set, run the command below to download.

```bash
composer require vlyalkobixal/bixallinks
```

## Usage
* Enable this module either via drush or the Drupal admin UI.

## Getting help
If you need help, [please contact Vera Lyalko](mailto:vera.lyalko@bixal.com) at Bixal Solutions Inc.


This module consists of various submodules, here is the order in which you should enable them with `drush` / `lando drush`.

```bash
# Install default CTs
drush en bixallinks
drush en bixallinks_taxonomy
drush en bixallinks_terms_import
drush en bixallinks_person
drush en bixallinks_landing_page
drush en bixallinks_event
drush en bixallinks_resource
# Only run the following commands,
# If content type is still present (page/article),
# Delete page and article CTs using following scripts
drush bixallinks:deleteDefaultContentType page
drush bixallinks:deleteDefaultContentType article
# Install page and article CTs
drush en bixallinks_page
drush en bixallinks_article
# Install Solr configs and add Solr listings views
drush en bixallinks_solr
# Install Solr listings views facets
drush en bixallinks_solr2
# Install content workflow and notifications
drush en bixallinks_workflow
```
