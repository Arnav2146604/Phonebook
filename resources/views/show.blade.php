<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Details</title>
</head>
<body>
    <center>
        <table border="1" cellspacing="4" cellpadding="4">
        <tr > 
            <th colspan="2"> 
                <h1>
                    <b>Contact Details: 
                </h1>
            </th>
    
            
        </tr>
        <tr>
            <td>
                <b>First Name:</b> 
            </td>
            <td>
                {{$record->fname}}
            </td>
        </tr>
        <tr>
            <td>
                <b>Last Name:</b>
            </td>
            <td>
                {{$record->lname}} 
            </td>
        </tr>
        <tr>
            <td>
                <b>Company:</b>
            </td>
            <td>
                {{$record->company}} 
            </td>
        </tr>
        <tr>
            <td>
                <b>Phone:</b> 
            </td>
            <td>
                <?php $n=1 ?> 
                @foreach($record->numbers as $num)
                    {{$n++}} => 
                    {{$num->num}} <br>
                @endforeach
            </td>
        </tr>
        <tr>
            <td>
                <b>Email:</b>
            </td>
            <td>
                {{$record->email}} 
            </td>
        </tr>
        <tr>
            <td>
                <b>Address:</b>
            </td>
            <td>
                {{$record->address}}
            </td>
        </tr>
        <tr>
            <td>
                <b>Link:</b>
            </td>
            <td>
                {{$record->link}}
            </td>
        </tr>
        <tr>
            <td>
                <b>Birthday:</b>
            </td>
            <td>
                {{$record->bday}} 
            </td>
        </tr>
        <tr>
            <td>
                <b>Notes:</b> 
            </td>
            <td>
                {{$record->notes}}
            </td>
        </tr>
    </table>
    
    
    
    <br>
    
    <!-- <a href="{{url('phonebook')}}" method="get">Go Back</a> -->
    
    <form action="{{url('phonebook')}}" method="get"> 
        <input type="submit" value="Go Back">
    </form>
    
    </center>
    

</body>
</html>



