<?php

namespace Drupal\csv_import\Controller;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Request;

class ImportPage extends ControllerBase {
  /**
   * Display the markup.
   *
   * @return array
   */
  public function view(Request $request) {

    $form = \Drupal::formBuilder()->getForm('Drupal\csv_import\Form\ImportForm');
    
    return $form;
  }
}
