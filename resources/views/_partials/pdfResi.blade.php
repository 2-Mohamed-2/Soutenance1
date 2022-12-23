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
      font-family: 'Libre Baskerville', serif;ive;
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
      <span>COMMISSARIAT DE POLICE  </span>    <br>
      <span>DU*****************</span> <br>
      <span style="">***********</span><br><br>
      <span style="margin-left: -100px;">N°..............<span style="position: absolute; top:55; left:125px; margin-left: -82px;">{{$resi->numero}}</span>......./CP</span>
    </div><br>

    <div class="titre">
      <h3 style="font-size: 30px; font-family: stahoma;" class="text-center font-Tahoma mt-5 py-5"> <span>Certificat de Résidence</span></h3>
    </div>


    <div style="line-height: 28px; margin-top: -20px" class="corps">
      <span class="nous" style="font-size: 18px;" >Nous Soussigné, Commissaire de Police de la Ville(NOM DE LA VILLE) certifions que</span>

      <span>Mr/Mme:.................................<span style="position: absolute; top:159; left:125px;"></span>.................................................................................................................</span>

      <span>Né_le:.......................<span style="position: absolute; top:179; left:125px;">{{$resi->ne}}</span>.................................a:............................................................................................</span>
      <span class="daou">Fils_de:......................................................Et_de:.....................................................................................</span>
      <span class="daou">Profession:.................................................................................................................................................</span>
      <span class="daou">Resulte_de:................................................................................................................................................</span>
      <span class="daou">Domicile:....................................................................................................................................................</span><br>
      <span  class="daou">Depuis plus de trois(3)Mois</span><br>
      <span  class="daou" style="margin-left:80px;">En foi de quoi, je lui délivre le présent certificat pour servir et valoir ce que de droit</span><br><br>
      <span style="" class="daou">Pour Constitution de</span>     <span style="margin-left:350px;">**********</span><br>
      <span class="daou" style="font-family:'Times New Roman', Times, serif">Dossier:...................</span> <span style="margin-left:350px;">P/<i>LE Commissairre de Police</i> P/O</span>
    </div>
  </div>

  <hr>

 <!-- <div class="container-fluid">

    <div class="float-end text-center">
      <span>REPUBLIQUE DU MALI</span>  <br>
      <span style="font-size: 12px;">UN PEUPLE - UN BUT - UNE FOI</span>   
      
    </div>

    <div class="float-start text-center">
      <span>COMMISSARIAT DE POLICE  </span>    <br>
      <span>DU*****************</span> <br>
      <span style="">***********</span><br><br>
      <span style="margin-left: -100px;">N°............../CP</span>
    </div><br>
<br>
    <div class="">
      <h3 class="titre text-center mt-5 py-5"> <span >Certificat de Résidence</span></h3>
    </div>


    <div style="line-height: 25px; margin-top: -20px" class="corps">
      <span class="nous">Nous Soussigné, Commissaire de Police de la Ville(NOM DE LA VILLE) certifions que</span>
      <span   class="daou">Mr/Mme:..................................................................................................................................................</span>
      <span class="daou">Né_le:........................................................a:............................................................................................</span>
      <span class="daou">Fils_de:......................................................Et_de:.....................................................................................</span>
      <span class="daou">Profession:.................................................................................................................................................</span>
      <span class="daou">Resulte_de:................................................................................................................................................</span>
      <span class="daou">Domicile:....................................................................................................................................................</span><br>
      <span  class="daou">Depuis plus de trois(3)Mois</span><br>
      <span  class="daou" style="margin-left:80px;">En foi de quoi, je lui délivre le présent certificat pour servir et valoir ce que de droit</span><br><br>
      <span style="" class="daou">Pour Constitution de</span>     <span style="margin-left:350px;">**********</span><br>
      <span class="daou">Dossier:...................</span> <span style="margin-left:350px;">P/<i>LE Commissiare de Police</i> P/O</span>
    </div> -->
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
