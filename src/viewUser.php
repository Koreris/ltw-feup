<?php
  include_once('sql/user.php');

  $user = getUser($_SESSION['username']);

?>
  <h2> <?=$user['username'] ?></h2>
  <article id="user">
  <ul>
    <li>
      <span>Name:</span> <?=$user['name']?>
    </li>
    <li>
      <span>UserName:</span> <?=$user['username']?>
    </li>
    <li>
      <span>Email:</span> <?=$user['email']?>
    </li>
    <li>
      <span>Location:</span> <?=$user['location']?>
    </li>
    <li>
      <span>Nationality:</span> <?=$user['nationality']?>
    </li>
    <li>
      <a href="?p=src/editUser"><label>Edit User</label></a>
    </li>
  </ul>
  </article>

  <div id="footRestaurant">
  <a href=index.php> BACK </a>
  </div>