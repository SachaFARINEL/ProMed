<?php

namespace Controllers;


class Utils extends Controller
{

  public static function dateToFrench($date, $format)
  {
    $english_days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
    $french_days = array('lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche');
    $english_months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    $french_months = array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
    return str_replace($english_months, $french_months, str_replace($english_days, $french_days, date($format, strtotime($date))));
  }

  public static function dateToAge($date)
  {
    return (date_diff(date_create($date), date_create(date("Y-m-d")))->format('%y'));
  }

  public static function espaceTelephone($tel)
  {
    return implode(' ', str_split($tel, 2));
  }
}
