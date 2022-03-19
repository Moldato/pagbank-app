<?php

namespace App\Utils;

class View {
  private static function getContentView(string $view): string {
    $file = __DIR__.'/../resources/view/'.$view.'.html';
    return file_exists($file) ? file_get_contents($file) : '';
  }

  public static function render(string $view, array $vars = [], array $javaScripts = []): string {
    $contentView = self::getContentView($view);
    $keys = array_keys($vars);
    $keys = array_map(function($item){
      return '{{'.$item.'}}';
    }, $keys);
    $contentView = str_replace($keys, array_values($vars), $contentView);
    $contentView = str_replace('{{SCRIPTS}}', implode('<br/>', $javaScripts), $contentView);
    return $contentView;
  }
}