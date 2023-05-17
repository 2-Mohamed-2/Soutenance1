<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <lin<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
      /* background-image: url({{ asset('image/1680483829.jpg') }}); */
    }

    </style>
</head>
<body>
  <div class="container-fluid">

    <div class="float-end text-center">
      <span>REPUBLIQUE DU MALI</span>  <br>
      <span style="font-size: 12px;">UN PEUPLE - UN BUT - UNE FOI</span>

    </div>

    <div class="float-start text-center">
      <span>DIRECTION DE LA POLICE <br>
        POLICE NATIONALE
      </span><br>
      <span style="">***********</span><br>
      <span>DIRECTION REGIONALE DE LA POLICE <br>
        NATIONALE DU DISTRICT DE BAMAKO
      </span><br>
      <span style="">***********</span><br>
      <span>COMMISSARIAT DE POLICE DU <br>
         {{ Auth::user()->commissariat->localite }}
      </span><br><br>
      <span style="margin-left: -100px;">N°..............<span style="position: absolute; top:125; left:160px; margin-left: -82px;">{{$resi->id}}</span>......./CP</span>
    </div><br><br><br><br><br>

    <div class="titre">
      <h3 style="font-size: 30px; font-family: stahoma;" class="text-center font-Tahoma mt-5 py-5"> <span>Certificat de Résidence</span></h3>
    </div>


    <div style="line-height: 28px; margin-top: -20px" class="corps">
      <span class="nous" style="font-size: 18px;" >Nous Soussignons, Commissaire de Police de la Ville du {{ Auth::user()->commissariat->localite }} certifions que</span>

      <span>Mr/Mme:.................................<span style="position: absolute; top:215; left:125px;">{{ $resi->certifions }}</span>.................................................................................................................</span>

      <span>Né_le:.......................<span style="position: absolute; top:235; left:125px;">{{$resi->ne}}</span>.................................a:.......................................<span style="position: absolute; top:235; left:320px;">{{$resi->a}}</span>.....................................................</span>
      <span class="daou">Fils_de:.........................<span style="position: absolute; top:256; left:125px;">{{$resi->fils}}</span>.............................Et_de:...............................<span style="position: absolute; top:256; left:330px;">{{$resi->et}}</span>.......................................................</span>
      <span class="daou">Profession:.............................<span style="position: absolute; top:277; left:125px;">{{$resi->profession}}</span>....................................................................................................................</span>
      <span class="daou">Resulte_de:..................................<span style="position: absolute; top:299; left:125px;">{{$resi->resulte}}</span>..............................................................................................................</span>
      <span class="daou">Domicile:................................<span style="position: absolute; top:319; left:125px;">{{$resi->domicile}}</span>....................................................................................................................</span><br>
      <span  class="daou">Depuis plus de trois(3)Mois</span><br>
      <span  class="daou" style="margin-left:80px;">En foi de quoi, je lui délivre le présent certificat pour servir et valoir ce que de droit</span><br><br>
      <span style="" class="daou">Pour Constitution de</span>     <span style="margin-left:209px;">{{ Auth::user()->commissariat->localite }}, le  {{ \Carbon\Carbon::parse($resi['created_at'])->format('d/m/y') }}</span><br>
      {{-- <span class="daou" style="font-family:'Times New Roman', Times, serif">Dossier:...................</span>--}} <span style="margin-left:350px;">P/<i>LE Commissairre de Police</i> P/O</span>
    </div>
  </div>

  <hr>

</body>
</html>






<!--<div class="container">
  <div class="row justify-content center">
    <span>COMMISSARIAT DE POLICE  </span>     <span>REPUBLIQUE DU MALI</span><br>
    <span>DU*****************</span>   <span>UN PEUPLE - UN BUT - UNE FOI</span><br>
    <span>***********</span><br>
    <span>N°............../CP</span><br>
    <span>Certificat de Résidence</span> <br>

<div class="corps">
    <span class= " daou">Nous Soussigné, Commissaire de Police de la Ville(NOM DE LA VILLE) cerifions que</span><br>
    <span class="daou">Mr/Mme:.....................<span></span>.............................................................................................................................</span>
    <span class="daou">Né_le:........................................................a:............................................................................................</span>
    <span class="daou">Fils_de:......................................................Et_de:.....................................................................................</span>
    <span class="daou">Profession:.................................................................................................................................................</span>
    <span class="daou">Resulte_de:................................................................................................................................................</span>
    <span class="daou">Domicile:....................................................................................................................................................</span><br>
    <span  class="daou">Depuis plus de trois(3)Mois</span>
    <span  class="daou">En foi de quoi, je lui délivre le présent certificat pour servir et valoir ce que de droit</span><br>
    <span  class="daou">Pour Constitution de</span>     <span>**********</span><br>
    <span class="daou">Dossier:...................</span> <span>P/LE Commissiare de Police P/O</span>
  </div>
</div>

</div> -->
