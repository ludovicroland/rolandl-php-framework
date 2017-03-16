<?php
namespace Library;

class Base64Decoder
{

  public static function getNumber($encoded)
  {
    $decoded = base64_decode($encoded);
    $rawBytes = "";

    foreach (str_split($decoded) as $byte)
    {
      $rawBytes .= " " . sprintf("%08b", ord($byte));
    }

    return bindec($rawBytes);
  }

  public static function getString($encoded)
  {
    $decoded = base64_decode($encoded);
    $raw = "";

    foreach (str_split($decoded) as $byte)
    {
      $raw .= chr(bindec(sprintf("%08b", ord($byte))));
    }

    return $raw;
  }

  public static function getBool($encoded)
  {
    return $encoded == "AQ==";
  }

  public static function zDecodeBool($encoded)
  {
    $decoded = base64_decode($encoded);
    $byteArray = array();

    foreach (str_split($decoded) as $byte)
    {
      $byteArray[] = sprintf("%08b", ord($byte));
    }

    return $byteArray[0] == "00000001";
  }

}