<?php
namespace App\Controller\Pages;

use App\Utils\View;

class Checkout extends Page {

  private static function loadJavaScript(): array {
    $scripts = [];
    return $scripts;
  }

  public static function getCheckout(){
    $content = View::render('pages/checkout', [
      'name' => 'Moldato Soluções Tecnológicas',
      'description' => 'Integrando com PagSeguro'
    ]);
    return self::getPage('Checkout', $content, self::loadJavaScript() );
  }
}