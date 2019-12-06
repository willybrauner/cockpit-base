<?php
 return array (
  'name' => 'Home',
  'label' => 'Home',
  '_id' => 'Home5dea86862c622',
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
    1 => 
    array (
      'name' => 'Cover',
      'label' => '',
      'type' => 'gallery',
      'default' => '',
      'info' => '',
      'group' => '',
      'localize' => false,
      'options' => 
      array (
        'gallery' => 
        array (
          'type' => 'gallery',
          'multiple' => false,
          'limit' => 1,
        ),
      ),
      'width' => '1-1',
      'lst' => true,
      'acl' => 
      array (
      ),
    ),
    2 => 
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
    3 => 
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
    4 => 
    array (
      'name' => 'Blocks',
      'label' => '',
      'type' => 'repeater',
      'default' => '',
      'info' => '',
      'group' => '',
      'localize' => false,
      'options' => 
      array (
        'fields' => 
        array (
          0 => 
          array (
            'type' => 'markdown',
            'label' => 'Text Block',
          ),
          1 => 
          array (
            'type' => 'gallery',
            'label' => 'Image Block',
          ),
          2 => 
          array (
            'type' => 'repeater',
            'label' => 'item',
            'options' => 
            array (
              'fields' => 
              array (
                0 => 
                array (
                  'type' => 'text',
                  'label' => 'Text component',
                ),
              ),
            ),
          ),
        ),
      ),
      'width' => '1-1',
      'lst' => true,
      'acl' => 
      array (
      ),
    ),
  ),
  'template' => '',
  'data' => NULL,
  '_created' => 1575650950,
  '_modified' => 1575674132,
  'description' => '',
  'acl' => 
  array (
    'author' => 
    array (
      'data' => false,
    ),
    'public' => 
    array (
      'data' => true,
    ),
  ),
  'color' => '#48CFAD',
  'icon' => 'globe.svg',
);