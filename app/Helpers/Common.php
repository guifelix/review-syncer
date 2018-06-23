<?php

if (! function_exists('only_numbers')) {
  /**
    * Remove mask from string number
    * @param string $number
    * @return string
    */
  function only_numbers ($number = '') {
    return preg_replace('/[^0-9]/', '', $number);
  }
}

if (! function_exists('convertDate')) {
  function convertDate($strDate, $format = '') {
    if ( is_null($strDate) ) {
      return null;
    }
    $date = str_replace('/', '-', $strDate);
    $carbon = new Carbon\Carbon($date);
    if (!empty($format)) {
      return $carbon->format($format);
    }
    return $carbon->toDateTimeString();
  }
}

if (!function_exists('removeSpecialChar')){
  /**
   * remove os caracteres especiais
   * @param $string|array
   * @return string|array
   */
  function removeSpecialChar($special){
      $search  = explode(",","ç,æ,œ,á,é,í,ó,ú,à,è,ì,ò,ù,ä,ë,ï,ö,ü,ÿ,â,ê,î,ô,û,å,e,i,ø,u,ã");
      $replace = explode(",","c,ae,oe,a,e,i,o,u,a,e,i,o,u,a,e,i,o,u,y,a,e,i,o,u,a,e,i,o,u,a");
    if (is_array($special)) {
      foreach ($special as &$value) {
        $value = str_replace($search, $replace, $value);
      }
        $noSpecial = $special;
    } else {
      $noSpecial = str_replace($search, $replace, $special);
    }

    return $noSpecial;
  }
}

if (!function_exists('in_array_r')){
  /**
   * realiza a funcao in_array recursivamente
   * @param $needle
   * @param $haystack
   * @param $strict
   * @return bool
   */
  function in_array_r($needle, $haystack, $strict = false) {
    foreach ($haystack as $item) {
      if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
        return true;
      }
    }
    return false;
  }
}

if (!function_exists('products')){
    function products(){
        $products = [
             'product-upsell'
            ,'product-discount'
            ,'store-locator'
            ,'product-options'
            ,'quantity-breaks'
            ,'product-bundles'
            ,'customer-pricing'
            ,'product-builder'
            ,'social-triggers'
            ,'recurring-orders'
            ,'multi-currency'
            ,'quickbooks-online'
            ,'xero'
            ,'the-bold-brain'
        ];

        return $products;
    }
}

