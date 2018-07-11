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
    /**
     * Return an array of the bold's products
     * @param  string $type 'keyvalArray', 'keyvalObject', 'valObject', 'valArray' or null
     * @return array       array|object
     */
    function products($type = null){
        $type = str_replace(' ', '', strtolower($type));
        switch ($type) {
            case 'keyvalarray':
                $products = [
                     'product-upsell'    => 'product-upsell'
                    ,'product-discount'  => 'product-discount'
                    ,'store-locator'     => 'store-locator'
                    ,'product-options'   => 'product-options'
                    ,'quantity-breaks'   => 'quantity-breaks'
                    ,'product-bundles'   => 'product-bundles'
                    ,'customer-pricing'  => 'customer-pricing'
                    ,'product-builder'   => 'product-builder'
                    ,'social-triggers'   => 'social-triggers'
                    ,'recurring-orders'  => 'recurring-orders'
                    ,'multi-currency'    => 'multi-currency'
                    ,'quickbooks-online' => 'quickbooks-online'
                    ,'xero'              => 'xero'
                    ,'the-bold-brain'    => 'the-bold-brain'
                ];
                break;
            case 'keyvalobject':
                $products = (object)[
                     'product-upsell'    => 'product-upsell'
                    ,'product-discount'  => 'product-discount'
                    ,'store-locator'     => 'store-locator'
                    ,'product-options'   => 'product-options'
                    ,'quantity-breaks'   => 'quantity-breaks'
                    ,'product-bundles'   => 'product-bundles'
                    ,'customer-pricing'  => 'customer-pricing'
                    ,'product-builder'   => 'product-builder'
                    ,'social-triggers'   => 'social-triggers'
                    ,'recurring-orders'  => 'recurring-orders'
                    ,'multi-currency'    => 'multi-currency'
                    ,'quickbooks-online' => 'quickbooks-online'
                    ,'xero'              => 'xero'
                    ,'the-bold-brain'    => 'the-bold-brain'
                ];
                break;
            case 'valobject':
                $products = (object)[
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
                break;
            case 'valarray':
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
                break;
            default:
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
                break;
        }

        return $products;
    }
}

if (!function_exists('camelize')){
    /**
     * Function to convert string to camel case
     * it takes strings separated with '-','.' and '_' and replaces with spaces and then converts each word to camel case.
     * e.g. camel-case -> Camel Case
     * @param  array|string $string Array or string to be converted
     * @return array|string         Array or string converted
     */
    function camelize($string){
        if (is_array($string)) {
            foreach ($string as $key => $str) {
                $camel[$key] = camelize($str);
            }
        } else {
            $camel = ucwords(str_replace(['-','.','_'], ' ', $string));
        }

        return $camel;

    }
}



