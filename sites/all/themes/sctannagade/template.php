<?php
/* Register some theme functions for forms, theme functions
* that have not been registered by the module that created
* these forms...
*/
function sctannagade_theme(){
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
}
