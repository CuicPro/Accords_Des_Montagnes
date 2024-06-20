<?php
require('php/config.php');

// Récupérer les places réservées depuis la base de données
$sql = "SELECT places_reservees FROM reservations";
$stmt = $conn->prepare($sql);
$stmt->execute();
$stmt->bind_result($places_reservees);

$reserved_seats = [];

while ($stmt->fetch()) {
    $reserved_seats = array_merge($reserved_seats, explode(',', $places_reservees));
}

$stmt->close();
$conn->close();

$reserved_seats_json = json_encode($reserved_seats);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accords Des Montagnes</title>
    <link rel="stylesheet" href="Asset/css/style.css">
    <!-- <link rel="stylesheet" href="Asset/css/reservation.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <section id="Accueil">
        <img src="https://aryan-tayal.github.io/Mountains-Parallax/bg.jpg" id="bg" />
        <h2 id="text">18ème édition <br> du festival</h2>
        <img src="https://aryan-tayal.github.io/Mountains-Parallax/man.png" id="man" />
        <img src="https://aryan-tayal.github.io/Mountains-Parallax/clouds_1.png" id="clouds_1" />
        <img src="https://aryan-tayal.github.io/Mountains-Parallax/clouds_2.png" id="clouds_2" />
        <img src="https://aryan-tayal.github.io/Mountains-Parallax/mountain_left.png" id="mountain_left" />
        <img src="https://aryan-tayal.github.io/Mountains-Parallax/mountain_right.png" id="mountain_right" />

        <script>
            const mountainLeft = document.querySelector('#mountain_left');
            const mountainRight = document.querySelector('#mountain_right');
            const cloud1 = document.querySelector('#clouds_1');
            const cloud2 = document.querySelector('#clouds_2');
            const text = document.querySelector('#text');
            const man = document.querySelector('#man');
                    
            window.addEventListener('scroll',()=>{
                let value = scrollY;
                mountainLeft.style.left = `-${value/0.7}px`
                cloud2.style.left = `-${value*2}px`
                mountainRight.style.left = `${value/0.7}px`
                cloud1.style.left = `${value*2}px`
                text.style.bottom = `-${value}px`;
                man.style.height = `${window.innerHeight - value}px`
            });
        </script>
    </section>


    <section id="Planing">
        <h2>Planing Janvier 2025</h2>
        <ul>
            <li style="background-color: var(--C1);">
                <header class="date">Dimanche 12</header>
                <article>
                    <h4 class="heures">11:00 -12:00</h4>
                    <h3 class="event">Rue en musique - Marché</h3>
                    <i>Nous vous invitons à venir, amis accordéonistes, nous rejoindre pour réchauffer les passants au son de votre accordéon</i>
                    <br><br>
                    <h4 class="heures">15:00 -20:00</h4>
                    <h3 class="event">Gala dansant</h3>
                    <i></i>
                </article>
            </li>
            <li style="background-color: var(--C2);">
                <header class="date">Lundi 13</header>
                <article>
                    <h4 class="heures">11:30</h4>
                    <h3 class="event">Restauration en musique</h3>
                    <i>Le Lispach</i>
                    <br><br>
                    <h4 class="heures">19:30</h4>
                    <h3 class="event">Dîner en musique</h3>
                    <i>Auberge des Skieurs, Le Couchetat, Bar restaurant l'ebresse</i>
                </article>
            </li>
            <li style="background-color: var(--C3);">
                <header class="date">Mardi 14</header>
                <article>
                    <h4 class="heures">08:30 - 11:30</h4>
                    <h3 class="event">Ecole Découverte</h3>
                    <i>Les éleves d'une école de .... auront un concert découverte</i>
                    <br><br>
                    <h4 class="heures">19:30</h4>
                    <h3 class="event">Dîner en musique</h3>
                    <i>Les Vallées, Crêperie</i>
                    <br><br>
                    <h4 class="heures">20:30</h4>
                    <h3 class="event">Concert découverte</h3>
                    <i>Un concert découverte serra organisé à la salle des fête</i>
                </article>
            </li>
            <li style="background-color: var(--C4);">
                <header class="date">Mercredi 15</header>
                <article>
                    <h4 class="heures">19:30</h4>
                    <h3 class="event">Dîner en Musique</h3>
                    <i>Le Chalet des roches, Les Chatelminés</i>
                </article>
            </li>
            <li style="background-color: var(--C5);">
                <header class="date">Jeudi 16</header>
                <article>
                    <h4 class="heures">15:00 - 20:00</h4>
                    <h3 class="event">Gala dansant</h3>
                    <i>Halle des congrès</i>
                </article>
            </li>
            <li style="background-color: var(--C6);">
                <header class="date">Vendredi 17</header>
                <article>
                    <h4 class="heures">21:00</h4>
                    <h3 class="event">Dîner dansant</h3>
                    <i>Bar à Croches - Den's Bar, Le Gobiat, Bar restaurant l'ebresse</i>
                </article>
            </li>
        </ul>
    </section>
    <div class="containe-transition"></div>
    <section id="Galerie">
        <div class="carousel">
            <div class="carousel__body">
                <div class="carousel__prev"><i class="fa fa-chevron-left" style="color: #000;"></i></div>
                <div class="carousel__next"><i class="fa fa-chevron-right" style="color: #000;"></i></div>
                <div class="carousel__slider">
                        <div class="carousel__slider__item">
                            <div class="item__3d-frame">
                                <div class="item__3d-frame__box item__3d-frame__box--front">
                                    <img src="Asset/Membres/Membre (0).png" alt="Membre">
                                    <div class="info">
                                        <div class="name">Orchestre Frédéric BUCH</div>
                                        <div class="style">Musette</div>
                                        <div class="region">Vosges</div>
                                    </div>
                                </div>
                                <div class="item__3d-frame__box item__3d-frame__box--left"></div>
                                <div class="item__3d-frame__box item__3d-frame__box--right"></div>
                            </div>
                        </div>

                        <div class="carousel__slider__item">
                            <div class="item__3d-frame">
                                <div class="item__3d-frame__box item__3d-frame__box--front">
                                    <img src="Asset/Membres/Membre (1).png" alt="Membre">
                                    <div class="info">
                                        <div class="name">Frédéric BUCH</div>
                                        <div class="style">Musette</div>
                                        <div class="region">Vosges</div>
                                    </div>
                                </div>
                                <div class="item__3d-frame__box item__3d-frame__box--left"></div>
                                <div class="item__3d-frame__box item__3d-frame__box--right"></div>
                            </div>
                        </div>

                        <div class="carousel__slider__item">
                            <div class="item__3d-frame">
                                <div class="item__3d-frame__box item__3d-frame__box--front">
                                    <img src="Asset/Membres/Membre (2).png" alt="Membre">
                                    <div class="info">
                                        <div class="name">Myriam THIEBAULT</div>
                                        <div class="style">Musette</div>
                                        <div class="region">Vosges</div>
                                    </div>
                                </div>
                                <div class="item__3d-frame__box item__3d-frame__box--left"></div>
                                <div class="item__3d-frame__box item__3d-frame__box--right"></div>
                            </div>
                        </div>

                        <div class="carousel__slider__item">
                            <div class="item__3d-frame">
                                <div class="item__3d-frame__box item__3d-frame__box--front">
                                    <img src="" alt="Membre">
                                    <div class="info">
                                        <div class="name"></div>
                                        <div class="style"></div>
                                        <div class="region"></div>
                                    </div>
                                </div>
                                <div class="item__3d-frame__box item__3d-frame__box--left"></div>
                                <div class="item__3d-frame__box item__3d-frame__box--right"></div>
                            </div>
                        </div>

                        <div class="carousel__slider__item">
                            <div class="item__3d-frame">
                                <div class="item__3d-frame__box item__3d-frame__box--front">
                                    <img src="" alt="Membre">
                                    <div class="info">
                                        <div class="name"></div>
                                        <div class="style"></div>
                                        <div class="region"></div>
                                    </div>
                                </div>
                                <div class="item__3d-frame__box item__3d-frame__box--left"></div>
                                <div class="item__3d-frame__box item__3d-frame__box--right"></div>
                            </div>
                        </div>

                        <div class="carousel__slider__item">
                            <div class="item__3d-frame">
                                <div class="item__3d-frame__box item__3d-frame__box--front">
                                    <img src="" alt="Membre">
                                    <div class="info">
                                        <div class="name"></div>
                                        <div class="style"></div>
                                        <div class="region"></div>
                                    </div>
                                </div>
                                <div class="item__3d-frame__box item__3d-frame__box--left"></div>
                                <div class="item__3d-frame__box item__3d-frame__box--right"></div>
                            </div>
                        </div>

                        <div class="carousel__slider__item">
                            <div class="item__3d-frame">
                                <div class="item__3d-frame__box item__3d-frame__box--front">
                                    <img src="" alt="Membre">
                                    <div class="info">
                                        <div class="name"></div>
                                        <div class="style"></div>
                                        <div class="region"></div>
                                    </div>
                                </div>
                                <div class="item__3d-frame__box item__3d-frame__box--left"></div>
                                <div class="item__3d-frame__box item__3d-frame__box--right"></div>
                            </div>
                        </div>

                        <div class="carousel__slider__item">
                            <div class="item__3d-frame">
                                <div class="item__3d-frame__box item__3d-frame__box--front">
                                    <img src="" alt="Membre">
                                    <div class="info">
                                        <div class="name"></div>
                                        <div class="style"></div>
                                        <div class="region"></div>
                                    </div>
                                </div>
                                <div class="item__3d-frame__box item__3d-frame__box--left"></div>
                                <div class="item__3d-frame__box item__3d-frame__box--right"></div>
                            </div>
                        </div>

                        <div class="carousel__slider__item">
                            <div class="item__3d-frame">
                                <div class="item__3d-frame__box item__3d-frame__box--front">
                                    <img src="" alt="Membre">
                                    <div class="info">
                                        <div class="name"></div>
                                        <div class="style"></div>
                                        <div class="region"></div>
                                    </div>
                                </div>
                                <div class="item__3d-frame__box item__3d-frame__box--left"></div>
                                <div class="item__3d-frame__box item__3d-frame__box--right"></div>
                            </div>
                        </div>

                        <div class="carousel__slider__item">
                            <div class="item__3d-frame">
                                <div class="item__3d-frame__box item__3d-frame__box--front">
                                    <img src="" alt="Membre">
                                    <div class="info">
                                        <div class="name"></div>
                                        <div class="style"></div>
                                        <div class="region"></div>
                                    </div>
                                </div>
                                <div class="item__3d-frame__box item__3d-frame__box--left"></div>
                                <div class="item__3d-frame__box item__3d-frame__box--right"></div>
                            </div>
                        </div>

                        <div class="carousel__slider__item">
                            <div class="item__3d-frame">
                                <div class="item__3d-frame__box item__3d-frame__box--front">
                                    <img src="" alt="Membre">
                                    <div class="info">
                                        <div class="name"></div>
                                        <div class="style"></div>
                                        <div class="region"></div>
                                    </div>
                                </div>
                                <div class="item__3d-frame__box item__3d-frame__box--left"></div>
                                <div class="item__3d-frame__box item__3d-frame__box--right"></div>
                            </div>
                        </div>

                        <div class="carousel__slider__item">
                            <div class="item__3d-frame">
                                <div class="item__3d-frame__box item__3d-frame__box--front">
                                    <img src="" alt="Membre">
                                    <div class="info">
                                        <div class="name"></div>
                                        <div class="style"></div>
                                        <div class="region"></div>
                                    </div>
                                </div>
                                <div class="item__3d-frame__box item__3d-frame__box--left"></div>
                                <div class="item__3d-frame__box item__3d-frame__box--right"></div>
                            </div>
                        </div>

                        <div class="carousel__slider__item">
                            <div class="item__3d-frame">
                                <div class="item__3d-frame__box item__3d-frame__box--front">
                                    <img src="" alt="Membre">
                                    <div class="info">
                                        <div class="name"></div>
                                        <div class="style"></div>
                                        <div class="region"></div>
                                    </div>
                                </div>
                                <div class="item__3d-frame__box item__3d-frame__box--left"></div>
                                <div class="item__3d-frame__box item__3d-frame__box--right"></div>
                            </div>
                        </div>

                        <div class="carousel__slider__item">
                            <div class="item__3d-frame">
                                <div class="item__3d-frame__box item__3d-frame__box--front">
                                    <img src="" alt="Membre">
                                    <div class="info">
                                        <div class="name"></div>
                                        <div class="style"></div>
                                        <div class="region"></div>
                                    </div>
                                </div>
                                <div class="item__3d-frame__box item__3d-frame__box--left"></div>
                                <div class="item__3d-frame__box item__3d-frame__box--right"></div>
                            </div>
                        </div>

                        <div class="carousel__slider__item">
                            <div class="item__3d-frame">
                                <div class="item__3d-frame__box item__3d-frame__box--front">
                                    <img src="" alt="Membre">
                                    <div class="info">
                                        <div class="name"></div>
                                        <div class="style"></div>
                                        <div class="region"></div>
                                    </div>
                                </div>
                                <div class="item__3d-frame__box item__3d-frame__box--left"></div>
                                <div class="item__3d-frame__box item__3d-frame__box--right"></div>
                            </div>
                        </div>

                        <div class="carousel__slider__item">
                            <div class="item__3d-frame">
                                <div class="item__3d-frame__box item__3d-frame__box--front">
                                    <img src="" alt="Membre">
                                    <div class="info">
                                        <div class="name"></div>
                                        <div class="style"></div>
                                        <div class="region"></div>
                                    </div>
                                </div>
                                <div class="item__3d-frame__box item__3d-frame__box--left"></div>
                                <div class="item__3d-frame__box item__3d-frame__box--right"></div>
                            </div>
                        </div>

                        <div class="carousel__slider__item">
                            <div class="item__3d-frame">
                                <div class="item__3d-frame__box item__3d-frame__box--front">
                                    <img src="" alt="Membre">
                                    <div class="info">
                                        <div class="name"></div>
                                        <div class="style"></div>
                                        <div class="region"></div>
                                    </div>
                                </div>
                                <div class="item__3d-frame__box item__3d-frame__box--left"></div>
                                <div class="item__3d-frame__box item__3d-frame__box--right"></div>
                            </div>
                        </div>

                        <div class="carousel__slider__item">
                            <div class="item__3d-frame">
                                <div class="item__3d-frame__box item__3d-frame__box--front">
                                    <img src="" alt="Membre">
                                    <div class="info">
                                        <div class="name"></div>
                                        <div class="style"></div>
                                        <div class="region"></div>
                                    </div>
                                </div>
                                <div class="item__3d-frame__box item__3d-frame__box--left"></div>
                                <div class="item__3d-frame__box item__3d-frame__box--right"></div>
                            </div>
                        </div>
                        
                        <div class="carousel__slider__item">
                            <div class="item__3d-frame">
                                <div class="item__3d-frame__box item__3d-frame__box--front">
                                    <img src="" alt="Membre">
                                    <div class="info">
                                        <div class="name"></div>
                                        <div class="style"></div>
                                        <div class="region"></div>
                                    </div>
                                </div>
                                <div class="item__3d-frame__box item__3d-frame__box--left"></div>
                                <div class="item__3d-frame__box item__3d-frame__box--right"></div>
                            </div>
                        </div>

                        <div class="carousel__slider__item">
                            <div class="item__3d-frame">
                                <div class="item__3d-frame__box item__3d-frame__box--front">
                                    <img src="" alt="Membre">
                                    <div class="info">
                                        <div class="name"></div>
                                        <div class="style"></div>
                                        <div class="region"></div>
                                    </div>
                                </div>
                                <div class="item__3d-frame__box item__3d-frame__box--left"></div>
                                <div class="item__3d-frame__box item__3d-frame__box--right"></div>
                            </div>
                        </div>

                        <div class="carousel__slider__item">
                            <div class="item__3d-frame">
                                <div class="item__3d-frame__box item__3d-frame__box--front">
                                    <img src="" alt="Membre">
                                    <div class="info">
                                        <div class="name"></div>
                                        <div class="style"></div>
                                        <div class="region"></div>
                                    </div>
                                </div>
                                <div class="item__3d-frame__box item__3d-frame__box--left"></div>
                                <div class="item__3d-frame__box item__3d-frame__box--right"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
 (function() {
  "use strict";

  var carousel = document.getElementsByClassName('carousel')[0],
      slider = carousel.getElementsByClassName('carousel__slider')[0],
      items = carousel.getElementsByClassName('carousel__slider__item'),
      prevBtn = carousel.getElementsByClassName('carousel__prev')[0],
      nextBtn = carousel.getElementsByClassName('carousel__next')[0];
  
  var width, height, totalWidth, margin = 20,
      currIndex = 0,
      interval, intervalTime = 4000;
  
  function init() {
      resize();
      move(Math.floor(items.length / 2));
      bindEvents();
    
      timer();
  }
  
  function resize() {
      width = Math.max(window.innerWidth * .25, 275),
      height = window.innerHeight * .5,
      totalWidth = width * items.length;
    
      slider.style.width = totalWidth + "px";
    
      for(var i = 0; i < items.length; i++) {
          let item = items[i];
          item.style.width = (width - (margin * 2)) + "px";
          item.style.height = height + "px";
      }
  }
  
  function move(index) {
    
      if(index < 1) index = items.length;
      if(index > items.length) index = 1;
      currIndex = index;
    
      for(var i = 0; i < items.length; i++) {
          let item = items[i],
              box = item.getElementsByClassName('item__3d-frame')[0];
          if(i == (index - 1)) {
              item.classList.add('carousel__slider__item--active');
              box.style.transform = "perspective(1200px)"; 
          } else {
            item.classList.remove('carousel__slider__item--active');
              box.style.transform = "perspective(1200px) rotateY(" + (i < (index - 1) ? 40 : -40) + "deg)";
          }
      }
    
      slider.style.transform = "translate3d(" + ((index * -width) + (width / 2) + window.innerWidth / 2) + "px, 0, 0)";
  }
  
  function timer() {
      clearInterval(interval);    
      interval = setInterval(() => {
        move(++currIndex);
      }, intervalTime);    
  }
  
  function prev() {
    move(--currIndex);
    timer();
  }
  
  function next() {
    move(++currIndex);    
    timer();
  }
  
  
  function bindEvents() {
      window.onresize = resize;
      prevBtn.addEventListener('click', () => { prev(); });
      nextBtn.addEventListener('click', () => { next(); });    
  }




  
  init();
  
})();

    </script>

    
    <section id="Reservation">
        <div class="room">
            <div id="seats-container">
                <div id="top-seats-container"></div>
                <div id="left-seats-container"></div>
                <div id="bottom-seats-container"></div>
                <div id="scene"><h1>Scene</h1></div>
            </div>             
            </div>
                <button id="pay-button" class="Btn">
                    <span>Etape suivante</span>
                    <svg viewBox="0 0 576 512" class="svgIcon">
                        <path
                        d="M512 80c8.8 0 16 7.2 16 16v32H48V96c0-8.8 7.2-16 16-16H512zm16 144V416c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V224H528zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm56 304c-13.3 0-24 10.7-24 24s10.7 24 24 24h48c13.3 0 24-10.7 24-24s-10.7-24-24-24H120zm128 0c-13.3 0-24 10.7-24 24s10.7 24 24 24H360c13.3 0 24-10.7 24-24s-10.7-24-24-24H248z"
                        ></path>
                    </svg>
                </button>
        </div>
        <script src="Asset/js/reservationGen.js"></script>


        <script>
            $(document).ready(function() {
                var reservedSeats = <?php echo $reserved_seats_json; ?>;
                
                // Pour chaque siège réservé
                $.each(reservedSeats, function(index, seatNumber) {
                    // Sélectionner l'élément avec le data-seat-number correspondant et ajouter la classe 'reserved'
                    $('[data-seat-number="' + seatNumber + '"]').addClass('reserved');
                });

                // Afficher les sièges réservés dans la console pour le débogage
                console.log("Sièges réservés:", reservedSeats);
            });
        </script>

        <?php var_dump($reserved_seats_json); 
            // $jsonString = '["1.4-A18"]';
            $jsonString = $reserved_seats_json;
            $array = json_decode($jsonString); // Convertit la chaîne JSON en tableau PHP
            
            // Accès à l'élément du tableau
            if (!empty($array)) {
                $firstElement = $array[0];
                echo "Premier élément du tableau : $firstElement";
            } else {
                echo "Le tableau est vide ou non valide.";
            }
        
        
        ?>
        <script>
            $(document).ready(function() {
                var reservedSeats = <?php echo $reserved_seats_json; ?>;
                
                // Pour chaque siège réservé
                $.each(reservedSeats, function(index, seatNumber) {
                    // Sélectionner l'élément avec le data-seat-number correspondant et ajouter la classe 'reserved'
                    $('[data-seat-number="' + seatNumber + '"]').addClass('reserved');
                });
            });
        </script>
    </section>
    <section id="Commentaire">  
        <form id="commentForm" action="php/form/comm_logic_form.php" method="get">
            <h2>Cela vous a plu ?</h2>
            <i>Laissez-nous un commentaire</i>
    
            <div class="box name">
                <label for="Prénom">Prénom</label>
                <label for="Nom">Nom</label>
                <input type="text" name="Prénom" placeholder="Prénom">
                <input type="text" name="Nom" placeholder="Nom">
            </div>
            <div class="box info">
                <label for="Email">E-mail</label>
                <label for="CodePostal">Code Postal</label>
                <input type="text" name="Email" placeholder="E-mail">
                <input type="number" name="CodePostal" placeholder="00000">
            </div>
    
            <div class="rating">
                <div class="rating-value">
                    <span id="rating-value">0</span>/5
                </div>
    
                <input type="radio" name="star" id="star5"><label for="star5" title="5 étoiles">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="radio" name="star" id="star4"><label for="star4" title="4 étoiles">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="radio" name="star" id="star3"><label for="star3" title="3 étoiles">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="radio" name="star" id="star2"><label for="star2" title="2 étoiles">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="radio" name="star" id="star1"><label for="star1" title="1 étoile">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            </div>
    
            <textarea name="comment" id="comment" placeholder="Votre commentaire"></textarea>
            
            <button type="submit">Envoyer 📩</button>
        </form>
    
        <script>
            const stars = document.querySelectorAll('.rating input');
            const ratingValueSpan = document.getElementById('rating-value');
            
            stars.forEach(star => {
                star.addEventListener('change', () => {
                    ratingValueSpan.textContent = star.id.slice(-1);
                });
            });
        </script>
    
        <script>
            document.getElementById('commentForm').addEventListener('submit', function(event) {
                const codePostal = document.querySelector('input[name="CodePostal"]').value;
                const inputs = document.querySelectorAll('input[type="text"], textarea');
                const forbiddenPatterns = [
                    /m[e3]rd[e3]/i, /c[o0]nn[a4]rd/i, /s[a@]l[o0]pe/i, /p[uû]te/i, 
                    /p[uû]t[a@]in/i, /enc[uû]lé/i, /b[i1]te/i, /c[uû]l/i, /b[o0]rdel/i, 
                    /f[o0]utr[e3]/i, /ch[i1]er/i, /n[i1]quer/i, /p[eé]d[eé]/i, /n[eè]gr[eè]/i, 
                    /p[o0]uff[i1]ass[e3]/i, /s[a@]l[a@]ud/i, /b[a@]t[a@]rd/i, /f[i1]ls de p[uû]te/i, 
                    /t[a@] gueul[e3]/i, /enf[o0][i1]r[e3]/i, /tr[o0]u du c[uû]l/i, /sal[o0]p[a@]rd/i, 
                    /m[a@]ng[e3] m[eé]rd[e3]/i, /p[i1]ss[e3]/i, /cass[e3]-c[o0]u[i1]ll[e3]s/i, 
                    /c[o0]u[i1]ll[e3]s/i, /br[a@]nl[e3]ur/i, /g[o0][uû][i1]n[e3]/i, 
                    /suce m[a@] b[i1]t[e3]/i, /suc[e3]r/i, /br[a@]nl[e3]tt[e3]/i, /z[i1]z[i1]/i, 
                    /s[e3]x[e3]/i
                ];
                
                // Vérification du code postal
                const isCodePostalValid = /^[0-9]{5}$/.test(codePostal);
                if (!isCodePostalValid) {
                    alert('Veuillez entrer un code postal valide.');
                    event.preventDefault();
                    return;
                }
                
                // Vérification des mots grossiers
                let containsForbiddenWords = false;
                inputs.forEach(input => {
                    forbiddenPatterns.forEach(pattern => {
                        if (pattern.test(input.value)) {
                            containsForbiddenWords = true;
                        }
                    });
                });
                
                if (containsForbiddenWords) {
                    alert('Veuillez ne pas utiliser de mots grossiers ou à caractère sexuel.');
                    event.preventDefault();
                }
            });
        </script>
    </section>
    
</body>
</html>