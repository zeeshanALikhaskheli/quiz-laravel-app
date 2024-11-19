
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$data[['title']]}}</title>
</head>
<body>
    
    <table>
        <tr>
            <th>NAme : </th>
            <th>{{$data[['name']]}}</th>
        </tr>
        <tr>
            <th>Email : </th>
            <th>{{$data[['email']]}}</th>
        </tr>
        <tr>
            <th>Password : </th>
            <th>{{$data[['password']]}}</th>
        </tr>
    </table>

    <a href="{{$data[['url']]}}"> ClicK here to login to your Account .</a>
    <h3>Thank You ! </h3>
    <h3>Regards : <br>
    ICreativez Solution</h3>
</body>
</html>