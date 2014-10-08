<?php

// Put the logo path into JavaScript for the live preview.
drupal_add_js(array('color' => array('logo' => theme_get_setting('logo', 'classic'))), 'setting');

$info = array();

// Define the possible replaceable items and their labels.
$info['fields'] = array(
  'base' => t('Page background'),
  'text' => t('Text color'),
  'link' => t('Link color'),
  'linkhover' => t('Link hover color'),
  'bannerbg' => t('Banner background'),
  'border' => t('Border Color'),
  'footercolumnsbg' => t('Footer columns background'),
  'footercolumnscolor' => t('Footer columns text color'),
  'footercolumnslink' => t('Footer columns link color'),
  'footerbg' => t('Footer background'),
);

// Color schemes for the site.
$info['schemes'] = array(
  // Define the default scheme.
  'default' => array(
    // Scheme title.
    'title' => t('Our site default colors'),
    // Scheme colors (Keys are coming from $info['fields']).
    'colors' => array(
      'base' => '#ffffff',
      'text' => '#636262',
      'link' => '#3b3b3b',
      'linkhover' => '#23aeff',
      'bannerbg' => '#f5f5f5',
      'border' => '#eaeaea',
      'footercolumnsbg' => '#3a3a3a',
      'footercolumnscolor' => '#c0c0c0',
      'footercolumnslink' => '#fcfcfc',
      'footerbg' => '#212121',
    ),
  ),
  'red' => array(
    // Scheme title.
    'title' => t('Red'),
    // Scheme colors (Keys are coming from $info['fields']).
    'colors' => array(
      'base' => '#ffffff',
      'text' => '#636262',
      'link' => '#3b3b3b',
      'linkhover' => '#e10707',
      'bannerbg' => '#f5f5f5',
      'border' => '#eaeaea',
      'footercolumnsbg' => '#3a3a3a',
      'footercolumnscolor' => '#c0c0c0',
      'footercolumnslink' => '#fcfcfc',
      'footerbg' => '#212121',
    ),
  ),
  'green' => array(
    // Scheme title.
    'title' => t('Green'),
    // Scheme colors (Keys are coming from $info['fields']).
    'colors' => array(
      'base' => '#ffffff',
      'text' => '#636262',
      'link' => '#3b3b3b',
      'linkhover' => '#a0ce4e',
      'bannerbg' => '#f5f5f5',
      'border' => '#eaeaea',
      'footercolumnsbg' => '#363839',
      'footercolumnscolor' => '#8c8989',
      'footercolumnslink' => '#b3bfbf',
      'footerbg' => '#282a2b',
    ),
  ),
  'pink' => array(
    // Scheme title.
    'title' => t('Pink'),
    // Scheme colors (Keys are coming from $info['fields']).
    'colors' => array(
      'base' => '#ffffff',
      'text' => '#636262',
      'link' => '#3b3b3b',
      'linkhover' => '#fe57a1',
      'bannerbg' => '#f5f5f5',
      'border' => '#eaeaea',
      'footercolumnsbg' => '#363839',
      'footercolumnscolor' => '#8c8989',
      'footercolumnslink' => '#b3bfbf',
      'footerbg' => '#282a2b',
    ),
  ),
  'yellow' => array(
    // Scheme title.
    'title' => t('Yellow'),
    // Scheme colors (Keys are coming from $info['fields']).
    'colors' => array(
      'base' => '#ffffff',
      'text' => '#636262',
      'link' => '#3b3b3b',
      'linkhover' => '#e9a825',
      'bannerbg' => '#f5f5f5',
      'border' => '#eaeaea',
      'footercolumnsbg' => '#363839',
      'footercolumnscolor' => '#8c8989',
      'footercolumnslink' => '#b3bfbf',
      'footerbg' => '#282a2b',
    ),
  ),
);

// Define the CSS file(s) that we want the Color module to use as a base.
$info['css'] = array(
  'css/colors.css',
);


/** Copying **/

// Files we want to copy along with the CSS files.
$info['copy'] = array(
  'logo.png'
);


/** Preview **/

// HTML file to be used in the preview window.
$info['preview_html'] = 'color/preview.html';

// CSS file to be used in the preview window.
$info['preview_css'] = 'color/preview.css';

// Javascript file to use in the preview window.
// This is the one that handles the color changes on the preview form when you're 
// clicking on the color picker.
$info['preview_js'] = 'color/preview.js';


/** Image colors, gradients, slices. **/

// Base file for image generation.
$info['base_image'] = 'color/base.png';

// Reference color used for blending. Matches the base.png's colors.
$info['blend_target'] = '#ffffff';

// Gradients.
$info['gradients'] = array(
  array(
    // Where to apply and with what dimension. (x, y, width, height).
    'dimension' => array(0, 0, 150, 100),
    // Direction of gradient ('vertical' or 'horizontal').
    'direction' => 'vertical',
    // Keys of colors to use for the gradient.
    'colors' => array('linkhover', 'linkhover'),
  ),
);

// Color areas to fill (x, y, width, height).
$info['fill'] = array(
  'linkhover' => array(0, 0, 150, 100),
);

// Coordinates of all the theme slices (x, y, width, height)
// with their filename as used in the stylesheet.
$info['slices'] = array(
  'images/list/arrow1.png' => array(0, 0, 10, 10),
  'images/list/arrow2.png' => array(10, 0, 10, 10),
  'images/list/arrow3.png' => array(20, 0, 10, 10),
  'images/list/arrow4.png' => array(30, 0, 10, 10),
  'images/list/plus.png' => array(40, 0, 10, 10),
  'images/list/pen.png' => array(50, 0, 10, 10),
  'images/list/star.png' => array(60, 0, 10, 10),
  'images/list/ok.png' => array(70, 0, 10, 10),
  'images/list/cross.png' => array(80, 0, 10, 10),
  'images/list/disc.png' => array(90, 0, 10, 10),
  'images/list/bookmark.png' => array(100, 0, 10, 10),
  'images/list/download.png' => array(110, 0, 10, 10),
);
