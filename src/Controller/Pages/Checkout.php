<?php
namespace App\Controller\Pages;

use App\Utils\View;

use Moldato\PagBankSDK\AppCredentials;
use Moldato\PagBankSDK\AppSession;
use Moldato\PagBankSDK\SellerCredentials;
use Moldato\PagBankSDK\SellerSession;
use Moldato\PagBankSDK\Prepare;

class Checkout extends Page {

  private static function loadJavaScript(): array {
    /** Montando credencial para aplicação */
    $appCredential = new AppCredentials;
    $appCredential->appId = 'app1088596492';
    $appCredential->appKey = 'E3CB565F5353D24BB4B13FA0F6291C32';
    $appSession = new AppSession($appCredential);

    /** 
     * Montando credencial para vendedor direto 
     */
    // $sellerCredentials = new SellerCredentials;
    // $sellerCredentials->email = 'alysonforever@gmail.com';
    // $sellerCredentials->token = '953D361099A44089B60B355A9084D72F';
    // $sellerSession = new SellerSession($sellerCredentials);

    $prepare = new Prepare($appSession->create());
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
