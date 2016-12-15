<?php
  include_once('sql/user.php');

  $user = getUser($_SESSION['username']);

?>
  <h2> <?=$user['username'] ?></h2>
  <article id="artic_view_user">
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
      <button class="css_btn_class" type="button" id="btn_edit_User" onclick="window.location.href='?p=src/editUser'">Edit User</button>
    </li>
  </ul>
  </article>

  <div id="footRestaurant">
  <a href=index.php> BACK </a>
  </div>
