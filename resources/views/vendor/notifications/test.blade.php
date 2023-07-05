<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap_docs/css/bootstrap.min.css') }}">
    <title></title>
</head>
<body>
    <div class="row justify-content-center mt-2">
        <div class="col-10">
          <div class="card mb-4">
            <div class="user-profile-header-banner bg-dark" style="background-color:black;">
              <img src="https://police.gouv.ml/wp-content/uploads/2023/02/cropped-Police-Nationale-du-Mali-1-1.png" alt=""
                  style="width: 300px; max-width: 600px; height: auto; margin: auto; display: block;)">
            </div>
            <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center my-3 mx-3" style="margin-left: 6px; margin-right: 6px; margin-top: 17px;">
                {{-- Intro Lines --}}
                @foreach ($introLines as $line)
                
                <h1>{{ $line }}</h1> <br>
    
                @endforeach

                {{-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum corrupti eum necessitatibus saepe earum? Nemo voluptatibus, libero provident mollitia iste tenetur repudiandae labore error nostrum perferendis asperiores nobis debitis exercitationem! <br>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Architecto voluptatem ea eius libero totam nihil, repellat expedita voluptates sunt, animi at earum nesciunt ipsum cum rem natus numquam quia nisi? --}}
            </div>
          </div>
        </div>
    </div>
</body>
</html>
