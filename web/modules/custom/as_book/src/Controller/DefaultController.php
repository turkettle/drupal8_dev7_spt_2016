<?php

namespace Drupal\as_book\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class DefaultController.
 *
 * @package Drupal\as_book\Controller
 */
class DefaultController extends ControllerBase {

  /**
   * Listing.
   *
   * @return string
   *   Return Hello string.
   */
  public function listing() {

    $query = \Drupal::entityQuery('node');
    $query->condition('type', 'book', '=');
    $query->condition('status', 1);
    $query->range(0, 10);
    $query->sort('created', 'ASC');
    $nids = $query->execute();

    $nodes = \Drupal\node\Entity\Node::loadMultiple($nids);

    $books = [];
    foreach ($nodes as $node) {
      $books[] = node_view($node, 'teaser');
    }

    return [
      '#theme' => 'book_list',
      'books' => $books,
    ];
  }












}
