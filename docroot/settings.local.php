<?php
/**
 * @file
 * Main Backdrop CMS configuration file.
 */

/**
 * Site configuration files location.
 */
$config_directories['active'] = '../config/dev-active';
$config_directories['staging'] = '../config/staging';

/**
 * Access control for update.php script.
 */
$settings['update_free_access'] = FALSE;

/**
 * Trusted host configuration.
 */
$settings['trusted_host_patterns'] = array('.*');

/**
 * DDEv settings
 */
if (getenv('IS_DDEV_PROJECT') == 'true') {
  // Automatically generated include for settings managed by ddev.
  $ddev_settings = __DIR__ . '/settings.ddev.php';
  if (is_readable($ddev_settings)) {
    require $ddev_settings;
  }

  /**
   * Base URL (needed for bee).
   */
  $base_url = getenv('DDEV_PRIMARY_URL');

  // Theme debug.
  $config['system.core']['theme_debug'] = FALSE;

  // Disable page cache.
  $config['system.core']['cache'] = FALSE;
  // Disable CSS aggregation.
  $config['system.core']['preprocess_css'] = FALSE;
  // Disable JS aggregation.
  $config['system.core']['preprocess_js'] = FALSE;

  // Errors and debugging.
  $config['system.core']['error_level'] = 'all';

  // PHP overrides - more forcibly.
  error_reporting(E_ALL & ~E_NOTICE);
}
else {
  /**
   * Include generic local settings for all backdrop sites.
   * - Note: Ths symlink doesn't work for Ddev (yet).
   * - Dev settings copied above.
   */
  if (file_exists(__DIR__ . '/settings.local.dev.php')) {
    include __DIR__ . '/settings.local.dev.php';
  }
}
