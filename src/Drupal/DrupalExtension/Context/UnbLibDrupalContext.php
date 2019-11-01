<?php

namespace Drupal\DrupalExtension\Context;

use Drupal\DrupalExtension\Context\DrupalContext;
use Drupal\search_api\Entity\Index;

/**
 * Provides pre-built step definitions for interacting with Drupal.
 */
class UnbLibDrupalContext extends DrupalContext {

  // Add public methods here.

  /**
   * Wait for $seconds.
   *
   * @When I wait :seconds
   */
  public function iWait($seconds) {
    sleep($seconds);
  }

  /**
   * Index Search API $index_id and wait $seconds
   *
   * @When I re-index :index_id and wait :seconds
   */
  public function iReIndexAndWait($index_id, $seconds) {
    $index = Index::load($index_id);
    $index->indexItems();
    sleep($seconds);
  }

}
