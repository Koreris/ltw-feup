<?php
function getId($array, $id) {
  return isset($array[$id]) ? intval($array[$id]) : 0;
}

function checkString($value, $required) {
  return isset($value) && is_string($value) && (!$required || !empty($value));
}

function checkInteger($value, $required) {
  return isset($value) && is_numeric($value) && (!$required || !empty($value));
}
?>