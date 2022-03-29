<?php
function estaVacio($var)
{


  return empty(trim($var));
}

function esText($var)
{
  return preg_match('/^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/', $var);
}


function esMail($var)
{
  return  filter_var($var, FILTER_VALIDATE_EMAIL);
}


function esCarnet($var)
{

  return  preg_match('/^[A-Z]{2}[0-9]{6}$/', $var);
}
function esTel($var)
{
  return  preg_match('/^[267][0-9]{3}-?[0-9]{4}$/', $var);
}


function esCodigoEditorial($var)
{
  return  preg_match('/^EDI[0-9]{3}$/', $var);
}
function esCodigoAutor($var)
{
  return  preg_match('/^AUT[0-9]{3}$/', $var);
}

function esCodigoLibro($field)
{
  return preg_match('/^LIB[0-9]{6}$/', $field);
}
function esNumero($field)
{
    return is_numeric($field);
}
