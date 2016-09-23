<?php

namespace Drupal\as_book\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'ReservationBlock' block.
 *
 * @Block(
 *  id = "reservation_block",
 *  admin_label = @Translation("Réserver ce livre"),
 * )
 */
class ReservationBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

    $form = \Drupal::formBuilder()->getForm('Drupal\as_book\Form\ReservationForm');

    // Récupération de l'URL dans la forme '/node/[NID]'.
    $current_path = \Drupal::request()->getRequestUri();

    // Suppression de la chaîne de caractère '/node/' pour ne garder que l'ID
    // du noeud.
    $form['book_id']['#value'] = str_replace('/node/', NULL, $current_path);

    $build = [];
    $build['reservation_block'] = $form;

    return $build;
  }














}
