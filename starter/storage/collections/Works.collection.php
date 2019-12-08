<?php
 return array (
  'name' => 'Works',
  'label' => 'works',
  '_id' => 'Works5debc96ec1a53',
  'fields' => 
  array (
    0 => 
    array (
      'name' => 'Title',
      'label' => '',
      'type' => 'text',
      'default' => '',
      'info' => '',
      'group' => '',
      'localize' => true,
      'options' => 
      array (
        'slug' => true,
      ),
      'width' => '1-1',
      'lst' => true,
      'acl' => 
      array (
      ),
    ),
    1 => 
    array (
      'name' => 'Slug',
      'label' => 'Slug',
      'type' => 'text',
      'default' => '',
      'info' => '',
      'group' => '',
      'localize' => true,
      'options' => 
      array (
        'type' => 'Text',
        'slug' => true,
      ),
      'width' => '1-3',
      'lst' => true,
      'acl' => 
      array (
      ),
    ),
    2 => 
    array (
      'name' => 'Publish',
      'label' => 'Publish ',
      'type' => 'boolean',
      'default' => '',
      'info' => '',
      'group' => '',
      'localize' => false,
      'options' => 
      array (
      ),
      'width' => '1-3',
      'lst' => true,
      'acl' => 
      array (
      ),
    ),
    3 => 
    array (
      'name' => 'Categories',
      'label' => '',
      'type' => 'collectionlink',
      'default' => '',
      'info' => '',
      'group' => '',
      'localize' => false,
      'options' => 
      array (
        'link' => 'Categories',
        'display' => 'Category',
        'multiple' => false,
        'limit' => 1,
      ),
      'width' => '1-3',
      'lst' => true,
      'acl' => 
      array (
      ),
    ),
    4 => 
    array (
      'name' => 'Gallery',
      'label' => '',
      'type' => 'gallery',
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
    5 => 
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
  '_created' => 1575733614,
  '_modified' => 1575832432,
  'color' => '#A0D468',
  'acl' => 
  array (
    'author' => 
    array (
      'collection_edit' => false,
      'entries_view' => false,
      'entries_edit' => false,
      'entries_create' => false,
      'entries_delete' => false,
    ),
    '' => 
    array (
      'collection_edit' => false,
    ),
    'public' => 
    array (
      'entries_view' => false,
      'entries_edit' => false,
      'entries_create' => false,
      'entries_delete' => false,
    ),
    'editor' => 
    array (
      'collection_edit' => true,
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
    'Editor' => 
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
  'icon' => 'cart.svg',
  'contentpreview' => 
  array (
    'enabled' => false,
  ),
  'group' => '',
);