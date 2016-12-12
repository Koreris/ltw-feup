<div id="register">
  <form id="userRegister" method="post">
  <ul>
      <li><label> <span>Type of user:</span>
          <input type="radio" name="user_type" value="owner"> Owner
          </label>
          <label>
          <input type="radio" name="user_type" value="reviewer" checked> Reviewer
          </label>
      </li>
      <li><label> <span>Username:</span> <br>
          <input type="text" id="username" placeholder="Your username" name="username">
      </label></li>
      <li><label> <span>Password:</span> <br>
          <input type="password" id="password" placeholder="Your password" name="password">
      </label></li>
      <li><label> <span>Name:</span> <br>
          <input type="text" id="name" placeholder="Your name" name="name">
      </label></li>
      <li><label> <span>E-Mail:</span> <br>
          <input type="email" id="email" placeholder="Your email" name="email">
      </label></li>
      <li><label> <span>Location:</span> <br>
          <input type="text" id="location" placeholder="Your location" name="location">
      </label></li>
      <li><label> <span>Nationality:</span> <br>
          <input type="text" id="nationality" placeholder="Your nationality" name="nationality">
      </label></li>
  </ul>
      <button type="button" id="submit_register">Submit</button>
  </form>
</div>
