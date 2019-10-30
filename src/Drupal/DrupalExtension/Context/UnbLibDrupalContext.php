<?php

namespace Drupal\DrupalExtension\Context;

use Drupal\DrupalExtension\Context\DrupalContext;

/**
 * Provides pre-built step definitions for interacting with Drupal.
 */
class UnbLibDrupalContext extends DrupalContext {

  /**
   * Creates and authenticates a user with the given role(s).
   *
   * @Given I am logged in as a user with the :role role(s)
   * @Given I am logged in as a/an :role
   */
    public function assertAuthenticatedByRole($role) {
        // Check if a user with this role is already logged in.
        if (!$this->loggedInWithRole($role)) {
            // Create user (and project)
            $user = (object) array(
            'name' => $this->getRandom()->name(8),
            'pass' => $this->getRandom()->name(16),
            'role' => $role,
            );
            $user->mail = "{$user->name}@example.com";

            $this->userCreate($user);

            $roles = explode(',', $role);
            $roles = array_map('trim', $roles);
            foreach ($roles as $role) {
                if (!in_array(strtolower($role), array('authenticated', 'authenticated user'))) {
                    $this->getDriver()->userAddRole($user, $role);
                }
            }

            // Login.
            $this->login($user);
        }
    }

}
