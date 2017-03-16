<?php
namespace Library;

class URLFormatter
{

  public static function format($libelle)
  {
    $a = "ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ";
    $b = "aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr";

    $libelle = utf8_decode($libelle);
    $libelle = strstr($libelle, utf8_decode($a), $b);
    $libelle = trim($libelle);
    $libelle = preg_replace("#[0-9]#", "", $libelle);
    $libelle = trim($libelle);
    $libelle = preg_replace("#[^a-zA-Z ]#", "", $libelle);
    $libelle = trim($libelle);
    $libelle = preg_replace("/\\s+/", "-", $libelle);

    return strtolower($libelle);
  }

}