<?php

function generateResponse($msg, $request) {
  return array('msg' => $msg, 'request' => strtolower($request));
}

?>
