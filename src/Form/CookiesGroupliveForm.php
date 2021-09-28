<?php

/**
 * @file
 * Contains \Drupal\cookies_grouplive\Form\CookiesGroupliveForm.
 */

namespace Drupal\cookies_grouplive\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class CookiesGroupliveForm extends ConfigFormBase {

    /**
     * {@inheritdoc}
     */
    protected function getEditableConfigNames() {
        return [
            'cookies_grouplive.adminsettings',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getFormId() {
        return 'cookies_grouplive_form';
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state) {
        $config = $this->config('cookies_grouplive.adminsettings');

        $form['reglages'] = array(
            '#type' => 'fieldset',
            '#title' => t('Tracking / Cookies'),
            '#weight' => -1,
            '#collapsible' => true,
            '#collapsed' => true,
        );
        
        $form['reglages']['cgl_analytics_ga'] = array(
            '#type' => 'textfield',
            '#title' => $this->t('ID Google Analytics (UA-XXXXXXXX)  :'),
            '#default_value' => $config->get('cgl_analytics_ga'),
        );

        $form['reglages']['cgl_analytics_gtag'] = array(
            '#type' => 'textfield',
            '#title' => $this->t('ID GTM (G-XXXXXXXXX)  :'),
            '#default_value' => $config->get('cgl_analytics_gtag'),
        );

        $form['reglages']['cgl_pixel_fb'] = array(
            '#type' => 'textfield',
            '#title' => $this->t('ID Pixel Facebook  :'),
            '#default_value' => $config->get('cgl_pixel_fb'),
        ); 
        
        $form['personnalise'] = array(
            '#type' => 'fieldset',
            '#title' => t('Personnalisation des cookies'),
            '#weight' => -1,
            '#collapsible' => true,
            '#collapsed' => true,
        );
        
        $form['personnalise']['couleur1'] = array(
            '#type' => 'color',
            '#title' => 'couleur de fond',
            '#default_value' => $config->get('couleur1'),
        );

        $form['personnalise']['couleur2'] = array(
            '#type' => 'color',
            '#title' => 'couleur de texte ',
            '#default_value' => $config->get('couleur2'),
        );
        
       /* $form['personnalise']['logo'] = array(
            '#type' => 'managed_file', 
            '#name' => 'logo',
            '#title' => t('Logo'),
            '#upload_validators' => array(
              'file_validate_extensions' => array('gif png jpg jpeg'),
              'file_validate_size' => array(2000000),
            ),
            '#upload_location' => 'public://' . date('Y-m'),
            '#description' => "Limité à 2 Mo. Types autorisés : gif png jpg jpeg.",
            '#default_value' => $config->get('logo'),
        ); */
        
        $form['personnalise']['description'] = array(
            '#type' => 'textarea', 
            '#name' => 'description',
            '#title' => t('Description'),
            '#maxlength' => 250,
            '#default_value' => "Ce site web utilise des cookies, vous pouvez les gérer ici.",
        );
        
        $form['personnalise']['confident'] = array(
            '#type' => 'number', 
            '#name' => 'confident',
            '#title' => t('Node de la page de Mentions Légales'),
            '#default_value' => $config->get('confident')? $config->get('confident') : 26 ,
        );

        return parent::buildForm($form, $form_state);
    }

    /**
     * {@inheritdoc}
     */
    public function validateForm(array &$form, FormStateInterface $form_state) {
    
    }

    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state) {
        parent::submitForm($form, $form_state);
       
        $this->config('cookies_grouplive.adminsettings')
                ->set('cgl_analytics_ga', $form_state->getValue('cgl_analytics_ga'))
                ->set('cgl_analytics_gtag', $form_state->getValue('cgl_analytics_gtag'))
                ->set('cgl_pixel_fb', $form_state->getValue('cgl_pixel_fb'))
                ->set('couleur1', $form_state->getValue('couleur1'))
                ->set('couleur2', $form_state->getValue('couleur2'))
               // ->set('logo', $form_state->getValue('logo'))
                ->set('description', $form_state->getValue('description'))
                ->set('confident', $form_state->getValue('confident'))
                ->save();
    }

}
