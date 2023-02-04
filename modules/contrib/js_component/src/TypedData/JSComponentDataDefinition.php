<?php

namespace Drupal\js_component\TypedData;

use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\Core\TypedData\ComplexDataDefinitionBase;
use Drupal\Core\TypedData\DataDefinition;
use Drupal\Core\TypedData\MapDataDefinition;

/**
 * Define JS component data definition.
 */
class JSComponentDataDefinition extends ComplexDataDefinitionBase {

  /**
   * {@inheritdoc}
   */
  public function getPropertyDefinitions() {
    $properties['provider'] = DataDefinition::create('string')
      ->setLabel(new TranslatableMarkup('Provider'))
      ->setRequired(TRUE);
    $properties['label'] = DataDefinition::create('string')
      ->setLabel(new TranslatableMarkup('Label'))
      ->setRequired(TRUE);
    $properties['root_id'] = DataDefinition::create('string')
        ->setLabel(new TranslatableMarkup('Root ID'));
    $properties['description'] = DataDefinition::create('string')
      ->setLabel(new TranslatableMarkup('Description'));
    $properties['template'] = DataDefinition::create('string')
      ->setLabel(new TranslatableMarkup('Template'));
    $properties['libraries'] = MapDataDefinition::create()
      ->setLabel(new TranslatableMarkup('Libraries'));
    $properties['settings'] = MapDataDefinition::create()
      ->setLabel(new TranslatableMarkup('Settings'));
    $properties['settings_scope'] = DataDefinition::create('string')
      ->setLabel(new TranslatableMarkup('Settings Scope'));
    $properties['settings_allow_token'] = DataDefinition::create('boolean')
      ->setLabel(new TranslatableMarkup('Settings Allow Token'));
    $properties['handlers'] = MapDataDefinition::create()
      ->setLabel(new TranslatableMarkup('Handler Classes'));

    return $properties;
  }
}
