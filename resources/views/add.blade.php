<!DOCTYPE html>
<html lang="en">
<head>
	<title>Create new Contact</title>
</head>
<body>
	<center>		
		@foreach ($errors->all() as $error)
			<div>{{ $error }}</div>
		@endforeach
		
		<h1>Storing contact in phonebook</h1>
		<form action="{{url('phonebook')}}" method="post">
			<p>
			<label for="fname">First Name:</label>
			<input type="text" name="fname" id="fname" value="abc">
			</p>
			<label for="fname">Last Name:</label>
			<input type="text" name="lname" id="lname" >
			</p>
			<label for="company">Company:</label>
			<input type="text" name="company" id="company" value="Eazydiner">
			</p><p>
			<label for="phone">Phone Number1:</label>
			<input type="number" name="phone1" id="phone1" value="000">
			</p>
			<label for="phone">Phone Number2 (optional):</label>
			<input type="number" name="phone2" id="phone2" >
			</p>
			<label for="phone">Phone Number3 (optional):</label>
			<input type="number" name="phone3" id="phone3" >
			</p>
			<label for="email">Email:</label>
			<input type="text" name="email" id="email" value="abc@eazydiner.com">
			</p>
			<label for="Address">Address:</label>
			<input type="text" name="address" id="address" >
			</p>
			<label for="link">Link:</label>
			<input type="text" name="link" id="link" >
			</p>
			<label for="bday">Birthday:</label>
			<input type="date" name="bday" id="bday" >
			</p>
			<label for="notes">Notes:</label>
			<input type="text" name="notes" id="notes" >
			</p>

            {{csrf_field()}}
			<input type="submit" value="Submit">
		</form>
		<br>

        <form action="{{url('phonebook')}}" method="get"> 
            <input type="submit" value="Go Back">
        </form>
	</center>
</body>
</html>
