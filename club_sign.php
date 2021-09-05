  
  <form method='post' action='club_signup.php' onsubmit="return checkForm(this)"><table>
		<tr><th colspan=3 >SignUp</td></tr>
		
		<tr><td>Id</td><td>:</td><td><input type="text" name="lid" minlength="10" maxlength="10" placeholder="Enter your Id" required></td>
		</tr><span></span>
		<tr><td>Club Name</td><td>:</td><td><input type="text"  maxlength="100" name="lf" placeholder="Enter your Full Name" required></td>
		</tr><tr><td>Email</td><td>:</td><td><input type="text"  maxlength="50" name="le" placeholder="Enter your email" required></td>
		</tr><tr><td>Mobile</td><td>:</td><td><input type="text"  maxlength="20" name="lm" placeholder="Enter your mobile number" required></td>
		</tr>
		<tr><td></td><td></td><td><input type="submit" name="lst" ></td>
		</tr>
		</table>
		</form>