<div id="header">
    <h1>Restaurant Advisor</h1>
    <h2>Big menus here</h2>
</div>
<div id="menu">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="src/login.php">Login</a></li>
        <li><a href="src/register.php">Register</a></li>
    </ul>
    <?php if (isset($_SESSION['username'])) { ?>
    <form action="action_logout.php" method="post">
      <label><?=$_SESSION['username']?></label>
      <input type="submit" value="Logout">
    </form>
    <?php } else { ?>
    <form action="action_login.php" method="post">
      <input type="text" name="username" placeholder="username">
      <input type="password" name="password" placeholder="password">
      <input type="submit" value="&gt;&gt;">
    </form>
    <?php } ?>
</div>