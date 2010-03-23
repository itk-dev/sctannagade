<?php
/* Register some theme functions for forms, theme functions
* that have not been registered by the module that created
* these forms...
*/
function sctannagade_theme() {
  return array(
          'contact_mail_page' => array(
                  'arguments' => array('form' => NULL),
                  'template' => 'contact-mail-page',
          ),
  );
}

function sctannagade_preprocess_contact_mail_page(&$vars) {
  $vars['form_markup'] = drupal_render($vars['form']);
}

function sctannagade_user_profile_form($form) {
  $output = '';

  $vars['form']['contact_information']['#value'] = t('We will get back to you with a quote within 48 hours.');
  $vars['form']['message']['#title'] = t('What you need');
  $vars['form']['subject']['#title'] = t('Name of your company');
  $vars['form']['cid']['#value'] = 1;
  $vars['form']['cid']['#prefix'] = '<div style="display:none;">';
  $vars['form']['cid']['#suffix'] = '</div>';
  $vars['template_file'] = 'contact-mail-page-quote';

  $output .= drupal_render($form);
  return $output;
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
      $vars['current_month'] = date('F Y', mktime(0, 0, 0, substr($raw, -2)+1, 0, substr($raw, 0, 4)));
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
      $tabs .= '<li class="description active"><a href="#description">'. t('Description') .'</a><span></span></li>';
    }
    if (!empty($node->field_pictures[0]['view'])) {
      $tabs .= '<li class="pictures"><a href="#pictures">'. t('Pictures') .'</a><span></span></li>';
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
      $tabs .= '<li class="description active"><a href="#description">'. t('Description') .'</a><span></span></li>';
    }
    if (!empty($node->field_lokale_pictures[0]['view'])) {
      $tabs .= '<li class="pictures"><a href="#pictures">'. t('Pictures') .'</a><span></span></li>';
    }
    if (!empty($node->field_lokal_plantegning[0]['view'])) {
      $tabs .= '<li class="overview"><a href="#floorplan">'. t('Floor plan') .'</a><span></span></li>';
    }
    if (!empty($node->field_lokale_overigt[0])) {
      $tabs .= '<li class="other"><a href="#other">'. t('Other') .'</a><span></span></li>';
    }
    if (!empty($node->field_lokale_email[0]['email'])) {
      $tabs .= '<li class="email"><a href="mailto:'. $node->field_lokale_email[0]['email'] .'"><span></span></a></li>';
    }
    $tabs .= '</ul></div>';
    $vars['lej_lokaler_tabs'] = $tabs;
  }
}
