<?php
/* Register some theme functions for forms, theme functions
* that have not been registered by the module that created
* these forms...
*/

function sctannagade_theme() {
  return array(
    'contact_mail_page' => array(
      'arguments' => array('form' => NULL),
    ),
    'search-block-form' => array(
      'arguments' => array('form' => NULL),
    ),
  );
}

function sctannagade_contact_mail_page($form) {
  
  $form['subject']['#type'] = 'hidden';
  $form['subject']['#value'] = t('Besked til sct. anna gade');
  
  $form['name']['#title'] = t('Name');
  $form['mail']['#title'] = t('E-mail address');

  $form['message']['#title'] = t('Question or comment');

  // Change submit button
  $form['submit']['#type'] = "image_button" ;
  $form['submit']['#src'] = drupal_get_path('theme','sctannagade')."/images/button-contact-form-submit.png";
  $form['submit']['#attributes']['class'] = "";
  
  return drupal_render($form);
}

function sctannagade_search_block_form($form) {

  // Remove search titel
  $form['search_block_form']['#title'] = '';
  
  // Change submit button
  $form['submit']['#type'] = "image_button" ;
  $form['submit']['#src'] = drupal_get_path('theme','sctannagade')."/images/button-search-form-submit.png";
  $form['submit']['#attributes']['class'] = "";
  
  return drupal_render($form);
}


/**
 * Override or insert variables into the page templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 */
function sctannagade_preprocess_page(&$vars) {
  // Get url
  if (module_exists('path')) {
    $path_alias = drupal_get_path_alias($_GET['q']);
    $alias_parts = explode('/', $path_alias);
    // If url contains 'nyheder' add $current_month to $vars
    if (in_array('nyheder', $alias_parts)) {
      $raw = (count($alias_parts) > 1 ? $alias_parts[1] : date('Ym'));
      $time = mktime(0, 0, 0, substr($raw, -2)+1, 0, substr($raw, 0, 4));
      $vars['current_month'] = date_format_date(new DateTime(date('Y-m-d', $time)), 'custom', 'F Y');
    }

    if (isset($vars['node'])) {
      $node = $vars['node'];
      if ($node->type == 'faste_brugere') {
	drupal_add_js(path_to_theme().'/js/faste_brugere.js');
	$vars['scripts'] = drupal_get_js();
      }
      if ($node->type == 'lej_lokaler') {
	drupal_add_js(path_to_theme().'/js/lej_lokaler.js');
	$vars['scripts'] = drupal_get_js();
      }
      if ($node->type == 'outdor_facilities') {
	drupal_add_js(path_to_theme().'/js/outdor_facilities.js');
	$vars['scripts'] = drupal_get_js();
      }
    }
  }
}

/**
 * Override or insert variables into the node templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
function sctannagade_preprocess_node(&$vars, $hook) {
  $node = $vars['node'];
  $vars['template_files'][] = 'node-'. $node->nid;
  
  if ($node->type == 'faste_brugere') { // May be this should have been done in a theme function
    $tabs = '<div class="item-list"><ul>';
    if (!empty($node->field_description[0]['value'])) {
      $tabs .= '<li class="description active">' .l(t('Description'), '#description', array('attributes' => array('class' => 'active'))). '<span></span></li>';
    }
    if (!empty($node->field_pictures[0]['view'])) {
      $tabs .= '<li class="pictures">' .l(t('Pictures'), '#pictures'). '<span></span></li>';
    }
    if (!empty($node->field_email[0]['email'])) {
      $tabs .= '<li class="email"><a href="mailto:'. $node->field_email[0]['email'] .'"><span></span></a></li>';
    }
    $tabs .= '</ul></div>';
    $vars['faste_brugere_tabs'] = $tabs;
  }

  if ($node->type == 'lej_lokaler') { // May be this should have been done in a theme function
    $tabs = '<div class="item-list"><ul>';
    if (!empty($node->field_lokale_description[0]['value'])) {
      $tabs .= '<li class="description active">' .l(t('Description'), '#description', array('attributes' => array('class' => 'active'))). '<span></span></li>';
    }
    if (!empty($node->field_lokale_pictures[0]['view'])) {
      $tabs .= '<li class="pictures">' .l(t('Pictures'), '#pictures'). '<span></span></li>';
    }
    if (!empty($node->field_lokal_plantegning[0]['view'])) {
      $tabs .= '<li class="floorplan">' .l(t('Floor plan'), '#floorplan'). '<span></span></li>';
    }
    if (!empty($node->field_lokale_overigt[0])) {
      $tabs .= '<li class="other">' .l(t('Other'), '#other'). '<span></span></li>';
    }
    if (!empty($node->field_lokale_email[0]['email'])) {
      $tabs .= '<li class="email"><a href="mailto:'. $node->field_lokale_email[0]['email'] .'"><span></span></a></li>';
    }
    $tabs .= '</ul></div>';
    $vars['lej_lokaler_tabs'] = $tabs;
  }

  if ($node->type == 'outdor_facilities') { // May be this should have been done in a theme function
    $tabs = '<div class="item-list"><ul>';
    if (!empty($node->field_outdor_description[0]['value'])) {
      $tabs .= '<li class="description active">' .l(t('Description'), '#description', array('attributes' => array('class' => 'active'))). '<span></span></li>';
    }
    if (!empty($node->field_outdor_pictures[0]['view'])) {
      $tabs .= '<li class="pictures">' .l(t('Pictures'), '#pictures'). '<span></span></li>';
    }
    if (!empty($node->field_outdor_ovrigt[0])) {
      $tabs .= '<li class="other">' .l(t('Other'), '#other'). '<span></span></li>';
    }
    if (!empty($node->field_outdor_email[0]['email'])) {
      $tabs .= '<li class="email"><a href="mailto:'. $node->field_outdor_email[0]['email'] .'"><span></span></a></li>';
    }
    $tabs .= '</ul></div>';
    $vars['outdor_facilities_tabs'] = $tabs;
  }
}


function sctannagade_preprocess_views_view(&$vars) {

  if (module_exists('path')) {
    $path_alias = drupal_get_path_alias($_GET['q']);
    $alias_parts = explode('/', $path_alias);

    // Create calendar navigation links
    if (in_array('kalender', $alias_parts) && $vars['exposed']) {
      $current = $alias_parts[count($alias_parts)-1];
      if (preg_match('/^\d{4}-W\d{1,2}$/', $current)) {	
	$current_date = strtotime($current);
      }
      else {
	$current_date = time();
      }

      // Find next week
      $next = strtotime('+1 week', $current_date);

      // Find prev week
      $prev = strtotime('-1 week', $current_date);

      $calendar_navigation_prev = l(t('Previous week'), $alias_parts[0] .'/'. date('Y-\WW', $prev));
      $calendar_navigation_this = l(t('This week'), $alias_parts[0] .'/'. date('Y-\WW'), array('attributes' => array('class' => 'current')));
      $calendar_navigation_next = l(t('Next week'), $alias_parts[0] .'/'. date('Y-\WW', $next));

      $vars['attachment_before'] = '<div class="calendar-navigation">'.$calendar_navigation_prev.' < '.$calendar_navigation_this.' > '.$calendar_navigation_next.'</div>';
    }
  }
}

/**
 * Override breadcrumb
 */
function sctannagade_breadcrumb($breadcrumb) {
  if (count($breadcrumb) > 1) {
    $breadcrumb =  array_slice($breadcrumb, 1);
    $breadcrumb[count($breadcrumb)-1] = '<span class="last">' .$breadcrumb[count($breadcrumb)-1]. '</span>';
    return implode(' > ', $breadcrumb);
  }
}