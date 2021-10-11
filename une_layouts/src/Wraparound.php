<?php

namespace Drupal\une_layouts;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Layout\LayoutDefault;
use Drupal\Core\Plugin\PluginFormInterface;

/**
 * Create a new layout which wraps one region around another.
 */
class Wraparound extends LayoutDefault implements PluginFormInterface {

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return parent::defaultConfiguration() + [
      'extra_classes' => 'left',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    $configuration = $this->getConfiguration();
    $form['extra_classes'] = [
      '#title' => $this->t('Callout location'),
      '#type' => 'select',
      '#options' => [
        'left' => 'Left',
        'right' => 'Right',
      ],
      '#default_value' => $configuration['extra_classes'],
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateConfigurationForm(array &$form, FormStateInterface $form_state) {
    // Any additional form validation that is required.
  }

  /**
   * {@inheritdoc}
   */
  public function submitConfigurationForm(array &$form, FormStateInterface $form_state) {
    $this->configuration['extra_classes'] = $form_state->getValue('extra_classes');
  }

}
