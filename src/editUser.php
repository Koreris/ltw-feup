<?php
  include_once('sql/user.php');

  $user = getUser($_SESSION['username']);

?>
  <h2> <?=$user['username'] ?></h2>
  <article id="user">
  <ul>
    <li>
      <span>Name:</span> <input type="text" id="name" placeholder="<?=$user['name']?>" name="name">
    </li>
    <li>
      <span>UserName:</span> <input type="text" id="username" placeholder="<?=$user['username']?>" name="username">
    </li>
    <li>
      <span>Password:</span> <input type="password" id="password" placeholder="Your password" name="password">
    </li>
    <li>
      <span>Email:</span> <input type="email" id="email" placeholder="<?=$user['email']?>" name="email">
    </li>
    <li>
      <span>Location:</span> <input type="text" id="location" placeholder="<?=$user['location']?>" name="location">
    </li>
    <li>
      <span>Nationality:</span> <input type="text" id="nationality" placeholder="<?=$user['nationality']?>" name="nationality">
    </li>
  </ul>
  </article>

  <div id="footRestaurant">
  <a href=index.php> BACK </a>
  </div>