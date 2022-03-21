<?php
namespace App\Controller\Pages;

use App\Utils\View;

use Moldato\PagBankSDK\Credentials;
use Moldato\PagBankSDK\Session;
use Moldato\PagBankSDK\Prepare;

class Checkout extends Page {

  private static function loadJavaScript(): array {
    $credential = new Credentials;
    $credential->email = 'alysonforever@gmail.com';
    $credential->token = '953D361099A44089B60B355A9084D72F';
    $session = new Session($credential);
    $prepare = new Prepare($session->create());
    $scripts = $prepare->initPagBankLib();
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


echo '<pre>';
echo '</pre>';