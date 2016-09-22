<?php

namespace Drupal\as_book\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class ReservationForm.
 *
 * @package Drupal\as_book\Form
 */
class ReservationForm extends FormBase {


  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'reservation_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['reservation'] = [
      '#type' => 'submit',
      '#title' => $this->t('Réservation'),
      '#description' => $this->t('Cliquez ici pour réserver le livre'),
      '#value' => $this->t('Réserver'),
    ];
    $form['book_id'] = [
      '#type' => 'hidden',
      '#title' => $this->t('Id livre'),
    ];

    return $form;
  }

  /**
    * {@inheritdoc}
    */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Display result.
    foreach ($form_state->getValues() as $key => $value) {
        drupal_set_message($key . ': ' . $value);
    }

  }

}
