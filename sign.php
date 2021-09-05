  
  <form method='post' action='signup.php' onsubmit="return checkForm(this)"><table>
		<tr><th colspan=3 >SignUp</td></tr>
		
		<tr><td>Id</td><td>:</td><td><input type="text" name="lid" pattern="[a-zA-Z0-9]{10}" maxlength="10" title="Use your college Id,Exact 10 characters" placeholder="Enter your Id" required></td>
		</tr><span></span>
		<tr><td>Full Name</td><td>:</td><td><input type="text"  maxlength="30" title="Not more than 30 characters" name="lf" placeholder="Enter your Full Name" required></td>
		</tr><tr><td>Nick Name</td><td>:</td><td><input type="text"  maxlength="15" title="Not more than 15 characters" name="ln" placeholder="Enter your Nick name" required></td>
		</tr><tr><td>Year</td><td>:</td><td><select name="y" required>
			   <option value="">Select</option>
			   <option value="1">1</option>
			   <option value="2">2</option>
			   <option value="3">3</option>
			   <option value="4">4</option>
			   </select>
		</td></tr><tr><td>Branch</td><td>:</td><td><select name="b" required>
			   <option value="">Select</option>
			   <option value="cse">cse</option>
			   <option value="it">it</option>
			   <option value="ece">ece</option>
			   <option value="ece">ecm</option>
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
		</td></tr><tr><td>Email</td><td>:</td><td><input type="text"  maxlength="100" title="example@gmail.com" name="le" placeholder="example@gmail.com" required></td>
		</tr><tr><td>Mobile</td><td>:</td><td><input type="text"  maxlength="10" name="lm" pattern="[7-9][0-9]{9}" title="10 digit mobile number" placeholder="Enter your mobile number" required></td>
		</tr><tr><td>DOB</td><td>:</td><td><input type="date"  maxlength="20" name="ld" required></td>
		</tr>
		<tr><td></td><td></td><td><input type="submit" name="lst" ></td>
		</tr>
		</table>
		</form>