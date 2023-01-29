<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Page</title>
</head>
<body>
	

<?php 

$i=0;
?>

@foreach($record->numbers as $n)	

	<?php
			$x[$i++]=$n->num;
	?>
@endforeach

<?php
	if($i==2)
	{
		$x[2]="";
	}
	if($i==1)
	{
		$x[2]="";
		$x[1]="";
	}
?>
<center>
	@foreach ($errors->all() as $error)
	<div>{{ $error }}</div>
	@endforeach

		<h1>Editing Contact</h1>
		<form action="{{url('phonebook',$record->id)}}" method="post">
			<input type="hidden" name="_method" value="PUT">
<p>         
    {{csrf_field()}}
			<label for="fname">First Name:</label>
			<input type="text" name="fname" id="fname" value="{{$record->fname}}">
			</p>
			<label for="fname">Last Name:</label>
			<input type="text" name="lname" id="lname" value="{{$record->lname}}">
			</p>
			<label for="company">Company:</label>
			<input type="text" name="company" id="company" value="{{$record->company}}">
			</p><p>


			<label for="phone">Phone Number 1:</label>
			<input type="number" name="phone1" id="phone1" value="{{$x[0]}}">
			</p>
			<label for="phone">Phone Number 2:</label>
			<input type="number" name="phone2" id="phone2" value="{{$x[1]}}">
			</p>
			<label for="phone">Phone Number 3:</label>
			<input type="number" name="phone3" id="phone3" value="{{$x[2]}}">
			</p> 


			<label for="email">Email:</label>
			<input type="text" name="email" id="email" value="{{$record->email}}">
			</p>
			<label for="Address">Address:</label>
			<input type="text" name="address" id="address" value="{{$record->address}}" >
			</p>
			<label for="link">Link:</label>
			<input type="text" name="link" id="link" value="{{$record->link}}">
			</p>
			<label for="bday">Birthday:</label>
			<input type="date" name="bday" id="bday" value="{{$record->bday}}">
			</p>
			<label for="notes">Notes:</label>
			<input type="text" name="notes" id="notes" value="{{$record->notes}}">
			</p>
            
			<input type="submit" value="Update">
		</form>
		<br>

        <form action="{{url('phonebook')}}" method="get"> 
            <input type="submit" value="Go Back">
        </form>
	</center>
</body>
</html>