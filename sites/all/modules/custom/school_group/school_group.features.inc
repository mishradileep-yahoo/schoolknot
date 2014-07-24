<?php
/**
 * @file
 * school_group.features.inc
 */

/**
 * Implements hook_node_info().
 */
function school_group_node_info() {
  $items = array(
    'school_group' => array(
      'name' => t('School Group'),
      'base' => 'node_content',
      'description' => t('School Group'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}
