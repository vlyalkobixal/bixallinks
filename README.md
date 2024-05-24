# Bixal Links v1 General module


## Getting Started
This module is for Drupal 9 and Drupal 10.x. 
[please visit https://github.com/vlyalkobixal/bixallinks](https://github.com/vlyalkobixal/bixallinks)

You can download this module by installing via composer. First, add
the code snippet below in your composer.json file within the
`"repositories": [...` area or create one if you do not have this.

```json
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
After this module download via composer. First, add
the content of the bixallinks composer.jsom require section to your project root
composer.json file within the
`"require": {...` section. So when the module enabled, the dependencies 
already installed and will be enabled.

```json
    "require": {
          "drupal/field_group": "^3.4",
          "drupal/crop": "^2.3",
          "drupal/image_widget_crop": "^2.4",
          "drupal/themable_forms": "^1.0",
          "drupal/media_library_edit": "^3.0",
          "drupal/entity_reference_revisions": "^1.11",
          "drupal/paragraphs": "^1.17",
          "drupal/admin_toolbar": "^3.4",
          "drupal/twig_tweak": "^3.3",
          "drupal/twig_field_value": "^2.0",
          "drupal/smart_date": "^4.1",
          "drupal/address": "^2.0",
          "drupal/inline_entity_form": "^3.0@RC",
          "drupal/pathauto": "^1.12",
          "drupal/allowed_formats": "^3.0",
          "drupal/search_api": "^1.34",
          "drupal/search_api_solr": "^4.3",
          "drupal/viewsreference": "^2.0@beta",
          "drupal/migrate_plus": "^6.0",
          "drupal/migrate_source_csv": "^3.6",
          "drupal/migrate_tools": "^6.0",
          "drupal/facets": "^3.0@beta",
          "drupal/better_exposed_filters": "^6.0"
    }
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
