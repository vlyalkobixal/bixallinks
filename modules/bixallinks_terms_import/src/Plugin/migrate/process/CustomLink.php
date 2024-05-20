<?php
/**
 * @file
 * Contains \Drupal\usaid_migrations\Plugin\migrate\process\CustomLink
 */

namespace Drupal\usaid_migrations\Plugin\migrate\process;

use Drupal\migrate\MigrateException;
use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\ProcessPluginBase;
use Drupal\migrate\Row;

/**
 * Explode a string and turn into an array for a link field
 *
 * @MigrateProcessPlugin(
 *   id = "usaid_custom_link",
 * )
 */

class CustomLink extends ProcessPluginBase {
  /**
   * {@inheritdoc}
   */
  public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {
    $link_string = str_replace(array('<p>    ', '</p>'),'', $value);
    $link_array = explode('|', $link_string);
    try {
      if (count($link_array) === 2) {
        $value = [
          'uri' => $link_array[1],
          'title' => $link_array[0],
        ];
      }
      else {
        if (count($link_array === 1)) {
          $value = [
            'uri' => $link_array[0],
            'title' => $link_array[0],
          ];
        }
        else {
          $value = '';
        }
      }
    }
    catch (\Exception $e) {
      throw new MigrateException('Invalid link.');
    }
    return $value;
  }
}