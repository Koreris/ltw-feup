<?php
  include_once('sql/user.php');

  $user = getUser($_SESSION['username']);

?>
  <h2> <?=$user['username'] ?></h2>
  <article id="user">
    <form id="editUser" method="post">
      <ul>
        <li><label> <span>Type of user:</span>
            <input type="radio" name="user_type" value="owner"  checked="<?= $user['is_owner'] ? "checked" : "";?>" > Owner
            </label>
            <label>
            <input type="radio" name="user_type" value="reviewer"  checked="<?= $user['is_reviewer'] ? "checked" : "";?>" > Reviewer
            </label>
        </li>
        <li>
          <span>Name:</span> <input type="text" id="name" value="<?=$user['name']?>" name="name">
        </li>
        <li>
          <span>UserName:</span> <input type="text" id="username" value="<?=$user['username']?>" name="username" disabled>
        </li>
        <li>
          <span>Password:</span> <input type="password" id="password" placeholder="Your password" name="password"> 
        </li>
        <li>
          <span>Email:</span> <input type="email" id="email" value="<?=$user['email']?>" name="email">
        </li>
        <li>
          <span>Location:</span> <input type="text" id="location" value="<?=$user['location']?>" name="location">
        </li>
        <li>
          <span>Nationality:</span> <input type="text" id="nationality" value="<?=$user['nationality']?>" name="nationality">
        </li>
      </ul>
      <button type="button" id="submit_editUser">Update</button>
    </form>
  </article>

  <div id="footRestaurant">
    <a href=index.php> BACK </a>
  </div>
