<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Wisata</title>
</head>

<body>
    <div class="container text-center mt-5">
        <h1>Wisata</h1>
        <a href="{{route('doa')}}">Back to Doa</a>
    </div>
    <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Image</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Nama Wisata</th>
                    <th scope="col">Buka</th>
                    <th scope="col">Kota</th>
                    <th scope="col">Provinsi</th>
                    <th scope="col">Latitude</th>
                    <th scope="col">Longitude</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($respone['data'] as $respon )
                
                    <tr>
                    <th scope="col">{{$i++}}</th>
                    <th scope="col">
                        <img src="{{($respon['image'])}}" class="img-thumbnail" width="200" alt="">
                    </th>
                    <th scope="col">
                        @foreach ($kategori['data'][27] as $row )    
                            {{($row)}}  
                        @endforeach
                    </th>
                    <th scope="col">{{($respon['nama_wisata'])}}</th>
                    <th scope="col">{{($respon['waktu_buka'])}}</th>
                    <th scope="col">{{($respon['kota'])}}</th>
                    <th scope="col">{{($respon['provinsi'])}}</th>
                    <th scope="col">{{($respon['latitude'])}}</th>
                    <th scope="col">{{($respon['longitude'])}}</th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>