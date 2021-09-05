  
  <form method='post' action='staff_signup.php' onsubmit="return checkForm(this)"><table>
		<tr><th colspan=3 >SignUp</td></tr>
		
		<tr><td>Id</td><td>:</td><td><input type="text" name="lid" minlength="10" maxlength="10" placeholder="Enter your Id" required></td>
		</tr><span></span>
		<tr><td>Full Name</td><td>:</td><td><input type="text"  maxlength="20" name="lf" placeholder="Enter your Full Name" required></td>
		</tr><tr><td>Nick Name</td><td>:</td><td><input type="text"  maxlength="20" name="ln" placeholder="Enter your Nick name" required></td>
		</tr><tr><td>Branch</td><td>:</td><td><select name="b" required>
			   <option value="">Select</option>
			   <option value="cse">cse</option>
			   <option value="it">it</option>
			   <option value="ece">ece</option>
			   <option value="eee">eee</option>
			   <option value="mech">mech</option>
			   <option value="bt">BT</option>
			   <option value="civil">civil</option>
			   </select>
		</td></tr><tr><td>Gender</td><td>:</td><td><select name="g" required>
			   <option value="">Select</option>
			   <option value="m">Male</option>
			   <option value="f">Female</option>
			   </select>
		</td></tr><tr><td>Email</td><td>:</td><td><input type="text"  maxlength="50" name="le" placeholder="Enter your email" required></td>
		</tr><tr><td>Mobile</td><td>:</td><td><input type="text"  maxlength="20" name="lm" placeholder="Enter your mobile number" required></td>
		</tr><tr><td>DOB</td><td>:</td><td><input type="date"  maxlength="20" name="ld" placeholder="Enter your mobile number" required></td>
		</tr>
		<tr><td></td><td></td><td><input type="submit" name="lst" ></td>
		</tr>
		</table>
		</form>