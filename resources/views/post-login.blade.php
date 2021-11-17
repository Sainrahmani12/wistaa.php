<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>
        Login
    </title>
</head>

<body>
    <div class="container text-center mt-5">
        <h1>Data User</h1>
        <a href="{{route('doa')}}">Back to Doa</a>

    <table class="table">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">EMAIL</th>
            <th scope="col">CITY</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">{{($response['data']['id'])}}</th>
                <td>{{($response['data']['email'])}}</td>
                <td>{{($response['data']['city'])}}</td>
            </tr>
        </tbody>
    </table>
    </div>
