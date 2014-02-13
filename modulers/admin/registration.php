<title>User Registration</title>

<div id="form">
	<form ="regform" action="includes/process.php" method="POST">
		<table>
			<tr>
				<td>Username:</td> <td><input type="text" name="user" /></td>
			</tr>
			<tr>
				<td>Password:</td> <td><input type="text" name="pwd" /></td>
			</tr>
			<tr>
				<td>Firstname:</td> <td><input type="text" name="fname" /></td>
			</tr>
			<tr>
				<td>Lastname:</td> <td><input type="text" name="lname" /></td>
			</tr>
			<tr>
				<td>Email:</td> <td><input type="text" name="email" /></td>
			</tr>
			<tr>
				<td>Class:</td> <td><input type="text" name="class" /></td>
			</tr>
			<tr>
				<td>Course:</td> 
				<td>
					<select name=course>
						<option value="1">BTEC National Subsidiary Diploma IT Practitioners</option>
						<option value="2">BTEC National Extended Diploma IT Practitioners</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Status:</td>
				<td>
					<input type="radio" name="status" value="Active" /> Active<br />
					<input type="radio" name="status" value="Withdrawn" /> Withdrawn
				</td>
			</tr>
			<tr>
				<td><input type="hidden" name="subReg" /><input type="submit" value="Submit" /></td>
			</tr>
		</table>
	</form>
</div>