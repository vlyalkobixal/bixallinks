<?php

namespace Drupal\bixallinks\Commands;

use Drupal\Component\Plugin\Exception\PluginNotFoundException;
use Drupal\Component\Plugin\Exception\InvalidPluginDefinitionException;
use Drupal\taxonomy\TermStorageInterface;
use Drush\Commands\DrushCommands;

/**
 * A Drush commandfile.
 *
 * In addition to this file, you need a drush.services.yml
 * in root of your module, and a composer.json file that provides the name
 * of the services file to use.
 */
class RemoveDefaultCT extends DrushCommands {
  /**
   * Delete default CT types from (Article, Page) drupal site.
   *
   * @param string $node_type
   *   Node Type/ Bundle to be set.
   *
   * @command bixallinks:deleteDefaultContentType
   * @aliases delete-default-ct
   * @usage bixallinks:deleteDefaultContentType
   *
   * @throws \Exception
   */
  public function deleteDefaultContentType($node_type) {
    try {
//      if ($node_type === 'article' || $node_type === 'page') {
        // Delete all nodes of given content type.
        $storage_handler = \Drupal::entityTypeManager()->getStorage('node');
        $nodes = $storage_handler->loadByProperties(['type' => $node_type]);

        if (isset($nodes)) {
          \Drupal::logger('bixallinks')->notice('Deleting nodes for ' . lcfirst($node_type) . " Content Type.");
          foreach ($nodes as $node) {
            $storage_handler->delete($nodes);
            \Drupal::logger('bixallinks')->notice('Al nodes for the ' . lcfirst($node_type) . " Content Type were deleted.");
          }
        }
        // Delete content type.
        $content_type = \Drupal::entityTypeManager()
          ->getStorage('node_type')
          ->load($node_type);
        if (isset($content_type)) {
          $content_type->delete();
        } else {
          \Drupal::logger('bixallinks')->notice('Content Type ' . lcfirst($node_type) . " does not exists.");
        }
//      }
//      else {
//        \Drupal::logger('bixallinks')->notice('This command only supports deletion of the Basic Page and Article Content Types.');
//      }
    }
    catch (InvalidPluginDefinitionException|PluginNotFoundException $e) {
      // Log the exception to watchdog.
      \Drupal::logger('bixallinks')->error($e->getMessage());
    }
  }

}
