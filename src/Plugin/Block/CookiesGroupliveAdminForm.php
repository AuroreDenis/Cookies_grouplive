<?php


namespace Drupal\cookies_grouplive\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Recherche' Block
 *
 * @Block(
 *   id = "cookies_grouplive_form",
 *   admin_label = @Translation("Bloc de gestion des cookies"),
 * )
 */
class CookiesGroupliveAdminForm extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
    
    $build = [];

        $build['wrapper'] = [
            '#type' => 'container',
            '#attributes' => ['class' => ['config-form-admin']],
        ];
        
        $build['wrapper']['form_config_site_admin'] = \Drupal::formBuilder()->getForm('Drupal\cookies_grouplive\Form\CookiesGroupliveForm');

        return $build;
  }
}