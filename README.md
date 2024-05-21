# Bixal Links v1 General module

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
