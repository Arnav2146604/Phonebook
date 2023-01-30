<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phonebook</title>
</head>
<body>
    <center>
<h1><u>PHONEBOOK</u></h1>

    <table border="1" cellspacing="4" cellpadding="4">
        <tr> 
            <th> Sr.</th>
            <th> Name</th>
    
            <th> Action </th>
        </tr>
        <?php $n=1 ?>
        @foreach($records as $record)
        <tr>
            <td>
                {{$n++}}
            </td>
            <td>
            <a href="{{url('phonebook',$record->id)}}" >{{$record->fname}} {{ $record->lname}}</a>
                
            </td>
            <td>
                <a href="{{url('phonebook',[$record->id, 'edit'])}}" >Edit</a> /
                
                
                <form method="POST" action="{{url('phonebook',$record->id)}}">
                    <input type="hidden" name="_method" value="DELETE">
                    {{csrf_field()}}
                    <input type="submit" name= "submit" value="Delete">
                </form>
            </td>
        </tr>
        @endforeach
</table>
    <br>
    <a href="{{url('phonebook/create')}}"> Add new contact</a> 
    <br>
    <a href="{{url('api/sdelete')}}" >View Soft Deleted Numbers</a>
</center>
</body>
</html>