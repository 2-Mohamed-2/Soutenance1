@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Accueil')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-crm.js')}}"></script>
@endsection

@section('content')
  
  <!-- Cards -->
  <div class="row mb-5">
    <div class="col-md">
      <div class="card mb-3">
        <div class="row g-0">
          <div class="col-md-4">
            <img class="card-img card-img-left" style="height: 100%;" src="{{asset('Imgs_Accueil/drapeau.webp')}}" alt="Card image" />
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h4 class="card-title">Présentation de la police</h4>
              <p class="card-text">
                La Direction Générale de la Police Nationale a été créée par l’ordonnance n° 04-26/PRM du 16 septembre 2004 ratifiée par la Loi n° 05-020 du 30 mai 2005. C’est un Service Central qui a pour mission d’élaborer et d’assurer la mise en œuvre des éléments de la politique nationale dans le domaine du maintien de l’ordre et de la sécurité publique et de porter son concours, L’exécution des lois et des règlements. <br>
                À cet effet, elle est chargée de : <br>                
                • Assurer la protection des personnes et des biens ; <br>
                • Maintenir l’ordre, la sécurité et la tranquillité publics ; <br>
                • Veiller au respect des lois et règlements par l’exécution des missions de police administrative et de police judiciaire ; <br>
                • Assurer le contrôle de la réglementation sur les armes et munitions ; <br>
                • Contrôler les activités des services privés de sécurité ; <br>
                • Contrôler les établissements classés de jeu ; <br>
                • Assurer la police de l’air et des frontières ; <br>
                • Participer à la protection des Institutions de l’Etat et des Hautes personnalités ; <br>
                • Participer à la mission d’information du Gouvernement ; <br>
                • Participer aux actions de maintien de la paix et d’assistance humanitaire ; <br>
                • Participer à la protection et à la défense civile. <br>
                Elle est dirigée par un Directeur Général nommé par décret pris en Conseil des ministres, assisté par un Directeur Général Adjoint nommé dans les mêmes conditions.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Cards -->
  <div class="row mb-5 justify-content-arround">

    {{--  Mot de bienvenu du dgpol --}}
    <div class="col-md-6 col-lg-4 mb-3">
      <div class="card h-100">
        <div class="card-body">
          <h4>DG de la police</h4>
          <h6 class="card-subtitle text-muted">Mots de bienvenue</h6>
        </div>
        <img class="img-fluid" src="{{asset('Imgs_Accueil/d-g_police.jpg')}}" alt="Card image cap" />
        <div class="card-body">
          <p class="card-text" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#dg_mots_plus" aria-controls="accordionIcon-1">
            En ma qualité de Directeur Général de la Police Nationale,
            <div id="dg_mots_plus" class="accordion-collapse collapse" data-bs-parent="#accordionIcon">
              <div class="accordion-body">
                je félicite les femmes et les hommes de la Police qui réalisent un travail important jour et nuit, parfois dans des conditions difficiles et au péril de leur vie.
                Chaque jour, notre police monte en puissance, accroît ses effectifs et ses équipements grâce à la détermination de nos plus hautes autorités et se modernise afin de relever les défis sécuritaires actuels et à venir auxquels nous avons à faire face.
                Je tiens ici à remercier chaleureusement nos policières et nos policiers pour le dévouement et la loyauté dont ils font preuve et je les encourage à persévérer dans cette voie afin de garantir la quiétude et la tranquillité publique. Je félicite particulièrement les patrouilles pédestres qui sillonnent depuis le début de l’année nos rues et nos quartiers afin de sécuriser au plus près nos compatriotes et leurs biens.
              </div>
            </div>
          </p>          
        </div>
        
      </div>
    </div>

    {{--  Structuration --}}
    <div class="col-md-6 col-lg-4 mb-3">
      <div class="card h-100">
        <div class="card-body">
          <h4>Structuration</h4>
          <h6 class="card-subtitle text-muted">Structuration de la police</h6>
        </div>
        <img class="img-fluid" src="{{asset('Imgs_Accueil/elmt_2.jpg')}}" alt="Card image cap" />
        <div class="card-body">
          <p class="card-text" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#mots_plus" aria-controls="accordionIcon-1">
            La Direction Générale de la Police comprend :
            <div id="mots_plus" class="accordion-collapse collapse" data-bs-parent="#accordionIcon">
              <div class="accordion-body">
                Au niveau national : l’Inspection Générale ; Les Directions de Service qui sont : <br>
                • La Direction de la Sécurité Publique dont dépendent les unités spéciales d’intervention ;<br>
                • La Direction de la Police Judiciaire avec ses unités spéciales ;<br>
                • La Direction des Renseignements Généraux et de la Surveillance du Territoire ;<br>
                • La Direction du Personnel des Finances et du Matériel ;<br>
                • La Direction de la Police des Frontières et ses unités spécialisées ;<br>
                • La Direction de la Formation dont dépend l’école Nationale de Police.<br>
                Les Services Rattachés qui sont :<br>
                • Le Bureau des études de la Coopération et de l’Informatique ;<br>
                • Le Service de Transmission et des Télécommunications ;<br>
                • Le Service de Santé et des Affaires Sociales.<br>
                Au niveau régional : Les Directions Régionales de la Police Nationale.<br>
                Au niveau local : les Services Territoriaux de sécurité publique dans les agglomérations urbaines. Ils sont chargés des missions de police administrative et/ou de police judiciaire dans les limites de leur compétence territoriale. Ils comprennent : les Commissariats de Police et des Postes de sécurité publique.
              </div>
            </div>
          </p>          
        </div>
        
      </div>
    </div>

    <!-- Quelques imgs des elements-->
    <div class="col-md-6 col-lg-4 mb-3">
      <div class="card-body">
        <h4>Quelques clichés des éléments</h4>
      </div>     
      <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
          <li data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></li>
          <li data-bs-target="#carouselExample" data-bs-slide-to="1"></li>
          <li data-bs-target="#carouselExample" data-bs-slide-to="2"></li>
          <li data-bs-target="#carouselExample" data-bs-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="{{asset('Imgs_Accueil/Elmt_1.jpg')}}" alt="First slide" />
            <div class="carousel-caption d-none d-md-block">
              <h3>Les officiels</h3>
              <p>Rencontre de certains officiés hauts placés de la DGP.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{asset('Imgs_Accueil/Elmt_5.jpg')}}" alt="Second slide" />
            <div class="carousel-caption d-none d-md-block">
              <h3>Patrouille</h3>
              <p>Une petite descente en ville</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{asset('Imgs_Accueil/Elmt_3.jpg')}}" alt="Third slide" />
            <div class="carousel-caption d-none d-md-block">
              <h3>Demostration</h3>
              <p>Une petite demo des capacités de nos hommes</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{asset('Imgs_Accueil/Elmt_4.jpg')}}" alt="Third slide" />
            <div class="carousel-caption d-none d-md-block">
              <h3>Defilé</h3>
              <p>Le passage de nos hommes durant un defilé militaire</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </a>
      </div>

      <br>
      <hr>
      <hr>
      <hr>
      <br>

      <div class="card-body">
        <h4>Fonctionnement</h5>
      </div>
      <div class="card-body">
        <p class="card-text" class="accordion-button collapsed">
          Le Directeur Générale de la Police Nationale dirige, coordonne et contrôle l’action de l’ensemble des services de la Police. L’Inspecteur en Chef, les Directeurs de Services, les Chefs des Services Rattachés la Direction Générale et les Directeurs Régionaux de la Police Nationale coordonnent et contrôlent les activités de leurs services et rendent compte au Directeur Général de la Police Nationale. Les Commissaires de Police de Sécurité Publique organisent et contrôlent le travail de leurs unités et rendent compte au Directeur Régional de la Police Nationale.
        </p>          
      </div>

    </div>


  </div>
  <!-- Fin -->

  <!-- Text alignment -->
<h5 class="pb-1 mb-4 fw-bolder text-center">Partenaires</h5>
<div class="row mb-5">
  <div class="col-md-3 col-lg-4">
    <div class="card mb-3">
      <img class="card-img card-img-left" src="{{asset('Imgs_Accueil/partenaire1.png')}}" alt="Card image" />
    </div>
  </div>
  <div class="col-md-3 col-lg-4">
    <div class="card mb-3">
      <img class="card-img card-img-left" src="{{asset('Imgs_Accueil/partenaire2.png')}}" alt="Card image" />
    </div>
  </div>
  <div class="col-md-3 col-lg-4">
    <div class="card mb-3">
      <img class="card-img card-img-left" src="{{asset('Imgs_Accueil/partenaire3.png')}}" alt="Card image" />
    </div>
  </div>
</div>
<!--/ Text alignment -->


<!-- Advanced footer -->
<section id="adv-footer">

  <footer class="footer bg-light">
    <div class="container-fluid container-p-x pt-5 pb-4">
      <div class="row">
        
        <div class="container-fluid d-flex flex-md-row flex-column justify-content-between align-items-md-center gap-1 container-p-x py-3">
          <div>
            <h4 class="fw-bolder mb-3"><a href="{{ config('variables.livePreview') }}" target="_blank" class="footer-text">{{ config('variables.templateName') }} </a></h4>
            <span>Plateforme à la portée de tous !</span>
          </div>

          <div>
            <h4 class="fw-bolder mb-3"><a href="javascript:void(0)" class="footer-text">
              Contact </a></h4>
            <span>Plateforme à la portée de tous !</span>
            <div class="social-icon my-3">
              <a href="https://www.facebook.com/ccpndgpn" class="btn btn-icon btn-sm btn-facebook me-2"><i class='bx bxl-facebook'></i></a>
              <a href="https://twitter.com/CellulePolice?t=-Fx05Cfoj1aywYrA_Nq5mw&s=09" class="btn btn-icon btn-sm btn-twitter me-2"><i class='bx bxl-twitter'></i></a>
            </div>
            <ul class="list-unstyled">
              <li>
                <a href="tel:+223 80 333" class="footer-link d-block pb-2"> 
                  <i class="fa-solid fa-phone"> </i>
                   80 333
                </a>
              </li>
              <li>
                <a href="tel:+223 80 333" class="footer-link d-block pb-2"> 
                  <i class="fa-solid fa-phone"> </i> 
                   80 00 11 11
                </a>
              </li>
              <li>
                <a href="tel:+223 80 333" class="footer-link d-block pb-2"> 
                  <i class="fa-solid fa-phone"> </i>
                   80 00 11 15
                </a>
              </li>
              <li>
                <a href="mailto:dgpn@police.gouv.ml" class="footer-link d-block pb-2"> 
                  <i class="fa-sharp fa-solid fa-envelope"></i>
                   dgpn@police.gouv.ml
                </a>
              </li>
            </ul>
          </div>

          <div>
            <h5>Annexes</h5>
            <ul class="list-unstyled"> 
              <hr>             
              <li>
                <a href="javascript:void(0)" class="footer-link d-block pb-2"> 
                  <i class="fa-solid fa-location-dot">  </i>
                    Hamdallaye ACI 2000, Bamako (Direction Generale)
                </a>
              </li>
              <hr>
              <li>
                <a href="javascript:void(0)" class="footer-link d-block pb-2"> 
                  <i class="fa-sharp fa-solid fa-clock"></i>
                  24h/24
                </a>
              </li>
              <hr>
              <li class="text-center fw-bolder">
                DIRECTION GENERALE DE LA POLICE DU MALI
              </li>
              <li class="text-center">
                <i>Loyauté - Honneur - Dignité</i>                
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
</section>
<!--/ Advanced footer -->




@include('Visitors.Modals.login-createAccount')

@endsection
