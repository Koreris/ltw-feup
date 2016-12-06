<?php

require_once 'sql/connection.php';

function listCommentsByUser($userId)
{
  global $db;
  $stmt = $db->prepare(
   'SELECT * FROM comment
   WHERE user_id = :userId
   ORDER BY comment_date ASC'
   );

  $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
  $stmt->execute();
  return $stmt->fetchAll();
}
?>