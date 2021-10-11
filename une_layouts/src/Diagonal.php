<?php

namespace Drupal\une_layouts;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Layout\LayoutDefault;
use Drupal\Core\Plugin\PluginFormInterface;

/**
 * Create a new layout which wraps one region around another.
 */
class Diagonal extends LayoutDefault implements PluginFormInterface {

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return parent::defaultConfiguration() + [
      'region_1' => 'full',
      'region_2' => 'full',
      'region_3' => 'full',
      'region_4' => 'full',
      'pullup' => FALSE,
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {

    $configuration = $this->getConfiguration();

    $form['region_1'] = [
      '#title' => $this->t('Region 1'),
      '#type' => 'select',
      '#options' => [
        'full' => 'Full',
        '2col' => '50/50',
      ],
      '#default_value' => $configuration['region_1'],
    ];

    $form['region_2'] = [
      '#title' => $this->t('Region 2 (required)'),
      '#type' => 'select',
      '#options' => [
        'full' => 'Full',
        '2col' => '50/50',
      ],
      '#default_value' => $configuration['region_2'],
    ];

    $form['region_3'] = [
      '#title' => $this->t('Region 3 (required)'),
      '#type' => 'select',
      '#options' => [
        'full' => 'Full',
        '2col' => '50/50',
      ],
      '#default_value' => $configuration['region_3'],
    ];

     $form['region_4'] = [
      '#title' => $this->t('Region 4'),
      '#type' => 'select',
      '#options' => [
        'full' => 'Full',
        '2col' => '50/50',
      ],
      '#default_value' => $configuration['region_4'],
    ];

    $form['pullup'] = [
      '#title' => 'Pull up region 2?',
      '#type' => 'checkbox',
      '#description' => t('This allows the elements in region 2 to hang over the diagonal'),
      '#default_value' => $configuration['pullup'],
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateConfigurationForm(array &$form, FormStateInterface $form_state) {
    // Any additional form validation that is required.
    // Review form_set_error() in D7 for validation implementation
    // $form_state->getValue('whatever');
  }

  /**
   * {@inheritdoc}
   */
  public function submitConfigurationForm(array &$form, FormStateInterface $form_state) {
    $this->configuration['region_1'] = $form_state->getValue('region_1');
    $this->configuration['region_2'] = $form_state->getValue('region_2');
    $this->configuration['region_3'] = $form_state->getValue('region_3');
    $this->configuration['region_4'] = $form_state->getValue('region_4');
    $this->configuration['pullup'] = $form_state->getValue('pullup');
  }
}
