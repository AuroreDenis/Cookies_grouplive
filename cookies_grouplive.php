<?php

use Drupal\file\Entity\File;
use Drupal\node\Entity\Node;

/**
 * @file
 * Contains cookies_grouplive.module.
 *
 * @param array $variables
 */

function cookies_grouplive_preprocess_block(array &$variables) {
    
    $theme = \Drupal::theme()->getActiveTheme()->getName();
    if ($theme != 'admin_gl_theme') {
        $variables['#attached']['library'][] = 'cookies_grouplive/tarteaucitron';
    }
    
    
    $config = \Drupal::config('cookies_grouplive.adminsettings');
    // Load the site name out of configuration.

    $variables['cgl_analytics_ga'] = $config->get('cgl_analytics_ga');
    $variables['cgl_analytics_gtag'] = $config->get('cgl_analytics_gtag');
    $variables['cgl_pixel_fb'] = $config->get('cgl_pixel_fb');
    $variables['couleur1'] = $config->get('couleur1');
    $variables['couleur2'] = $config->get('couleur2');
   
/*
    if(\Drupal::theme()->getActiveTheme()->getLogo()){
        $image = File::load(\Drupal::theme()->getActiveTheme()->getLogo());
     
        if ($image) {
            $image_url = file_create_url($image->getFileUri());
        }
        else {
             $image_url = 0;
        }
    } else { 
        $image_url = 0;
    }
    */
    $logo = file_url_transform_relative(file_create_url(theme_get_setting('logo.url')));
    $variables['#attached']['drupalSettings']['cgl_analytics_ga'] = $config->get('cgl_analytics_ga') ? $config->get('cgl_analytics_ga') : false;
    $variables['#attached']['drupalSettings']['cgl_analytics_gtag'] = $config->get('cgl_analytics_gtag') ? $config->get('cgl_analytics_gtag') : false;
    $variables['#attached']['drupalSettings']['cgl_pixel_fb'] = $config->get('cgl_pixel_fb') ? $config->get('cgl_pixel_fb') : false;
    $variables['#attached']['drupalSettings']['couleur1'] = $config->get('couleur1') ? $config->get('couleur1') : false;
    $variables['#attached']['drupalSettings']['couleur2'] = $config->get('couleur2') ? $config->get('couleur2') : false;
    $variables['#attached']['drupalSettings']['logo'] = $logo ? $logo : false;
    $variables['#attached']['drupalSettings']['description'] = $config->get('description') ? $config->get('description') : "Ce site web utilise des cookies, vous pouvez les gÃ©rer ici.";
 
    
    $id_page = $config->get('confident') ? $config->get('confident') : false;
    if ($id_page) {
        $node_page = Node::load($id_page);
        if ( $node_page) {
            $url_page = $node_page->toUrl()->setAbsolute()->toString();
        }else {
            $url_page = 0;
        }
    } else {
        $url_page = 0;
    }
    
    $variables['#attached']['drupalSettings']['confident'] = $url_page;
}
