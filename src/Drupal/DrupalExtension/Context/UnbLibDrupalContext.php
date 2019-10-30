<?php

namespace Drupal\DrupalExtension\Context;

use Drupal\DrupalExtension\Context\DrupalContext;

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

}
