<?php
namespace App\Controller\Pages;

use App\Utils\View;

class Page {
  public static function getPage(string $title = '', string $content = '', array $javascript = []){
    return View::render('pages/page', [
      'title' => $title,
      'content' => $content,
      'site' => 'https://moldato.com'
    ], $javascript);
  }
}