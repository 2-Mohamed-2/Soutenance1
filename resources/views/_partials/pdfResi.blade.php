<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Certificat Residence</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <style>
    .titre{
      font-family: 'Libre Baskerville', serif, ;
      font-style: italic;
      text-decoration-line: underline;
    }
    *{
      /* background-image: url({{ asset('Coms_Ml_logo.png') }}); */
    }

    </style>
</head>
<body>
  <div class="container-fluid">

    <div class="float-end text-center" style="font-size: 20px; ">
      <span style="letter-spacing: 2px; font-size: 20px; font-weight: bold;">REPUBLIQUE DU MALI</span>  <br>
      <span style="font-size: 17px;">UN PEUPLE - UN BUT - UNE FOI</span>
    </div>

    <div class="float-start text-center">
      <span class="text-bolder" style="font-weight: bold; font-size: 20px;">DIRECTION DE LA POLICE <br>
        POLICE NATIONALE
      </span><br>
      <span style="">***********</span><br>
      <span style="font-weight: bold; font-size: 20px;">DIRECTION REGIONALE DE LA POLICE <br>
        NATIONALE DU DISTRICT DE BAMAKO
      </span><br>
      <span style="">***********</span><br>
      <span style="font-weight: bold; font-size: 20px;">COMMISSARIAT DE POLICE DU <br>
         {{ $resi->commissariat->sigle }} de {{ $resi->commissariat->localite }}
      </span><br><br>
      <span style="margin-left: -100px; font-size: 20px;">N° <span style="font-weight: bold; letter-spacing: 2px;"> {{ $resi->id }} </span>/CP </span>
    </div><br><br><br><br><br><br>
    

    <div class="titre">
      <br>
      <h3 style="font-size: 30px; font-family: stahoma;" class="text-center font-Tahoma mt-5 py-5"> 
        Certificat d'Identité de Résidence</h3>
    </div>


    <div style="line-height: 28px; margin-top: -20px" class="corps">
      <span class="nous" style="font-size: 20px;" >Nous soussignons, Commissaire de Police chargé du {{ $resi->commissariat->sigle }} de {{ $resi->commissariat->localite }} , Officié de la Police Judiciaire en résidence à {{ $resi->commissariat->localite }}, certifions que :</span> <br>

      <span>
        <span style="font-size: 19px">Mr/Mme: </span>
        <span style="position: absolute; left:200px; font-weight: bold; font-size: 18px;">{{ $resi->inconnu->nomcomplet }}</span>
      </span> <br>

      <span>
        <span style="font-size: 19px">Né le :</span>
        <span style="position: absolute; left:200px; font-weight: bold; font-size: 18px;">{{ \Carbon\Carbon::parse($resi->inconnu->date_naiss)->format('d-m-Y') }}</span>
        <span style="position: absolute; left:500px; font-size: 19px">à :</span>
        <span style="position: absolute; left:600px; font-weight: bold; font-size: 18px;">{{$resi->inconnu->lieu_naiss}}</span>
      </span> <br>

      <span class="daou"> 
        <span style="font-size: 19px">Fils de :</span>  
        <span style="position: absolute; left:200px; font-weight: bold; font-size: 18px;">{{$resi->inconnu->nom_pere}}</span>
        <span style="position: absolute; left:500px; font-size: 19px"> et de :</span>
        <span style="position: absolute; left:600px; font-weight: bold; font-size: 18px;">{{$resi->inconnu->nom_mere}}</span>
      </span> <br>
      <span class="daou">
        <span style="font-size: 19px">Profession : </span>
        <span style="position: absolute; left:200px; font-weight: bold; font-size: 18px;">{{$resi->profession}}</span>
      </span><br>
      <span class="daou">
        <span style="font-size: 19px">Resulte de : </span> 
        <span style="position: absolute; left:200px; font-weight: bold; font-size: 18px;">La demande de celui-ci</span>
      </span><br>
      <span class="daou">
        <span style="font-size: 19px">Domicilié à : </span> 
        <span style="position: absolute; left:200px; font-weight: bold; font-size: 18px;">{{$resi->domicile}}</span>
        <span style="position: absolute; left:500px; font-size: 19px"> depuis plus de trois(3)Mois.</span>
      </span><br>
        <div style="margin-top: 10px; margin-bottom: 10px;">
           <span class="daou" style="margin-left: 80px; font-size: 20px">En foi de quoi, je lui délivre le présent certificat pour servir et valoir ce que de droit</span><br>
        </div>   
        <div class="float-end text-center">
          <span style="font-size: 20px;">{{ $resi->commissariat->localite }},  le   {{ \Carbon\Carbon::parse($resi['created_at'])->format('d / m / Y') }}</span> <br>
          <span style="letter-spacing: 2px; font-size: 20px; font-weight: bold;">LE COMMISSAIRE DE POLICE</span>  <br>
          
        </div>
    </div>
  </div>

  

</body>
</html>
