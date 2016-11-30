<div id="register">
    <ul>
        <form id="userRegister" method="post">
            <li><label> Type of user:<br>
                <input type="radio" name="user_type" value="owner"> Owner
                <input type="radio" name="user_type" value="reviewer" checked> Reviewer  </label> </li>
            <li><label>Username:<br>
                <input type="text" id="username" placeholder="Your username" name="username">
                </label></li>
                <li><label>Password:<br>
                    <input type="password" id="password" placeholder="Your password" name="password">
                </label></li>
                <li><label>Name:<br>
                    <input type="text" id="name" placeholder="Your name" name="name">
                </label></li>
                <li><label>E-Mail:<br>
                    <input type="email" id="email" placeholder="Your email" name="email">
                </label></li>
                <li><label>Location:<br>
                    <input type="text" id="location" placeholder="Your location" name="location">
                </label></li>
                <li><label>Nationality:<br>
                    <input type="text" id="nationality" placeholder="Your nationality" name="nationality">
                </label></li>
                <br>
                <button type="submit" id="submit_register">Submit</button>
            </form>
        </ul>
    </div>
