<?php
 return array (
  'name' => 'Categories',
  'label' => '',
  '_id' => 'Categories5deb93fa1da29',
  'fields' => 
  array (
    0 => 
    array (
      'name' => 'Name',
      'label' => '',
      'type' => 'text',
      'default' => '',
      'info' => '',
      'group' => '',
      'localize' => false,
      'options' => 
      array (
      ),
      'width' => '1-2',
      'lst' => true,
      'acl' => 
      array (
      ),
    ),
    1 => 
    array (
      'name' => 'Description',
      'label' => '',
      'type' => 'markdown',
      'default' => '',
      'info' => '',
      'group' => '',
      'localize' => false,
      'options' => 
      array (
      ),
      'width' => '1-1',
      'lst' => true,
      'acl' => 
      array (
      ),
    ),
  ),
  'sortable' => false,
  'in_menu' => false,
  '_created' => 1575719930,
  '_modified' => 1575804092,
  'color' => '#FFCE54',
  'acl' => 
  array (
    'public' => 
    array (
      'entries_view' => false,
      'entries_edit' => false,
      'entries_create' => false,
    ),
    'author' => 
    array (
      'collection_edit' => true,
      'entries_view' => false,
      'entries_edit' => false,
      'entries_create' => false,
      'entries_delete' => false,
    ),
    'editor' => 
    array (
      'entries_view' => true,
      'entries_edit' => true,
      'entries_create' => true,
      'entries_delete' => true,
    ),
    'Publisher' => 
    array (
      'entries_view' => true,
      'entries_edit' => true,
      'entries_create' => true,
      'entries_delete' => true,
    ),
  ),
  'rules' => 
  array (
    'create' => 
    array (
      'enabled' => false,
    ),
    'read' => 
    array (
      'enabled' => false,
    ),
    'update' => 
    array (
      'enabled' => false,
    ),
    'delete' => 
    array (
      'enabled' => false,
    ),
  ),
  'icon' => 'tickets.svg',
  'contentpreview' => 
  array (
    'enabled' => false,
  ),
);