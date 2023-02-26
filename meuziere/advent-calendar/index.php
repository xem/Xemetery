<!doctype html>
<meta charset=utf-8>
<link rel=stylesheet href="edu.css">
<link rel=stylesheet href="style.css">
<link rel="shortcut icon" href="favicon.ico">
<title>Calendrier de l'Avent Qwant Junior</title>

<?php
$day = 24;
$success = false;
?>

<script>
    var currentday = 24;
</script>

<nav class="sidebar" role="sidebar">
    <div class="sidebar__inner">
        <a class="sidebar__top sidebar__top--search" href="https://www.qwantjunior.com/" title="retour à la page d'accueil"><span class="sidebar__logo"></span></a>
        <ul class="sidebar__content">
            <li class="sidebar__item sidebar__item--web" title="Web">
                <a class="sidebar__item__link" href="https://www.qwantjunior.com/web"><span class="sidebar__item__icon"></span><span class="sidebar__item__label">Web</span></a>
            </li>
            <li class="sidebar__item sidebar__item--news" title="Actualité">
                <a class="sidebar__item__link" href="https://www.qwantjunior.com/news"><span class="sidebar__item__icon"></span><span class="sidebar__item__label">Actualité</span></a>
            </li>
            <li class="sidebar__item sidebar__item--education" title="Éducation">
                <a class="sidebar__item__link" href="https://www.qwantjunior.com/education"><span class="sidebar__item__icon"></span><span class="sidebar__item__label">Éducation</span></a>
            </li>
            <li class="sidebar__item sidebar__item--images" title="Images">
                <a class="sidebar__item__link" href="https://www.qwantjunior.com/images"><span class="sidebar__item__icon"></span><span class="sidebar__item__label">Images</span></a>
            </li>
            <li class="sidebar__item sidebar__item--videos" title="Vidéos">
                <a class="sidebar__item__link" href="https://www.qwantjunior.com/videos"><span class="sidebar__item__icon"></span><span class="sidebar__item__label">Vidéos</span></a>
            </li>
            <li class="sidebar__item sidebar__item--boards">
                <a class="sidebar__item__link" href="https://www.qwantjunior.com/carnets/?l=fr" target="_blank" title="carnets"><span class="sidebar__item__icon"></span><span class="sidebar__item__label">Carnets</span></a>
            </li>
        </ul>
    </div>
</nav>

<div class="wrapper" id="wrapper">

    <header>

        <div class="snow_container">
            <div class="snow near" id=snow1></div>
            <div class="snow far" id=snow2></div>
        </div>
        <div class="logo"></div>

    </header>

    <div class="title">

        <img src="img/decouvre.png" class="discover">
        <?php if ($success == false): ?>
            <p>
                Le Calendrier de l'Avent 2016 est terminé !
                <br>
                <b><a href=" https://blog.qwant.com/surveillez-vos-boites-mails-les-gagnants-du-calendrier-de-lavent-sont-tombes/">Les gagnants ont été tirés au sort</a></b>.
                <br>
                Merci pour votre participation !
                <br><br>
            </p>
            <p>
            <p>
            <p>
            <p>
            
            <hr>
        <?php endif; ?>
    </div>

    <?php if ($success == true) { ?>

        <div class="container">
            <div class="popin visible final">
                <div id="popinclose" class="visible final" onclick="location = location">
                    <img src="img/ico-next.png"> Retour au calendrier
                </div>

                <br> <br> <br> <br> <img src="img/cadeaux-concours.jpg"> <br> <br>
                <div class="popin-info">
                    <h3>Félicitations!</h3>

                    Ta participation a bien été prise en compte, reviens nous voir dès le
                    <b>5 janvier 2017</b> pour voir si tu fais partie de nos grands gagnants !

                </div>
                <br> <br> <br>
            </div>
        </div>

    <?php } else { ?>

        <div class="container" onmouseover="lasthoveredcube = -1">

            <div class="camera" id="scene"></div>

            <div class="billboard" id="billboard">
                <img src="img/chiffre/cestle.png" height=30 style="position: relative; top: -4px;">
                <img src="img/chiffre/24.png" height=30 style="margin:0 5px; position: relative; top: -4px;">
                <img src="img/chiffre/aujourdhui.png" height=30> <br>
                <p>Chaque jour une nouvelle case se débloque pour te faire avancer dans la réalisation de ton jeu de Noël !
            </div>

            <div id="popinclose" class="" onclick="popincloseclick()"><img src="img/ico-next.png"> Retour au calendrier
            </div>

            <div class="popin" id="popin1">

                <iframe src="https://player.vimeo.com/video/193608526" width="900" height="506" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

                <div class="popin-left">
                    <img src="img/dino1.jpg">
                </div>

                <div class="popin-right">
                    <h3>Toutes les étapes de la vidéo en détail</h3>
                    <ol>
                        <li><b>1.</b><span>Ouvre ton navigateur et saisis l’url : <a href="http://scratch.mit.edu" target=_blank>scratch.mit.edu</a>
                        <li><b>2.</b> <span>Si tu as déjà un compte Scratch, connecte-toi.
                        <li><b>3.</b> <span>Si tu n’as pas de compte Scratch, clique sur le lien «Rejoindre Scratch».
                        <li><b>4.</b> <span>Suis les différentes étapes pour créer ton compte.
                        <li><b>5.</b> <span>Choisis ton nom d’utilisateur et mot de passe.
                        <li><b>6.</b> <span>Complète les informations demandées.
                        <li><b>7.</b> <span>Entre l’adresse mail de tes parents.
                        <li><b>8.</b> <span>Bravo, tu as créé ton compte de Scratch !
                        <li><b>9.</b> <span>Clique maintenant sur ton pseudo, en haut à droite du site.
                        <li><b>10.</b> <span>Sélectionne la section «Mes projets».
                        <li><b>11.</b> <span>Clique sur le bouton «Nouveau projet».
                        <li><b>12.</b> <span>Super, tu es prêt à créer ton jeu !
                    </ol>
                </div>

                <div class="popin-carousel">
                    <div class="popin-carousel-left" onclick="carousel_left(carousel1)"><img src="img/bt-previous.png">
                    </div>
                    <div class="popin-carousel-scroll">
                        <div class="popin-carousel-scroll-inner" id="carousel1" style="width: 2450px; left: 0">
                            <a href="img/day1/1.jpg" target=_blank><img src="img/day1/thumb/1.jpg" width=268></a>
                            <a href="img/day1/2.jpg" target=_blank><img src="img/day1/thumb/2.jpg" width=268></a>
                            <a href="img/day1/3.jpg" target=_blank><img src="img/day1/thumb/3.jpg" width=268></a>
                            <a href="img/day1/4.jpg" target=_blank><img src="img/day1/thumb/4.jpg" width=268></a>
                            <a href="img/day1/5.jpg" target=_blank><img src="img/day1/thumb/5.jpg" width=268></a>
                            <a href="img/day1/6.jpg" target=_blank><img src="img/day1/thumb/6.jpg" width=268></a>
                            <a href="img/day1/7.jpg" target=_blank><img src="img/day1/thumb/7.jpg" width=268></a>
                            <a href="img/day1/8.jpg" target=_blank><img src="img/day1/thumb/8.jpg" width=268></a>
                            <a href="img/day1/9.jpg" target=_blank><img src="img/day1/thumb/9.jpg" width=268></a>
                        </div>
                    </div>
                    <div class="popin-carousel-right" onclick="carousel_right(carousel1)"><img src="img/bt-next.png">
                    </div>
                </div>

                <br> <img src="img/junior-account-spacer.png"> <br>

                <div class="popin-info">
                    <h3>Avant de commencer l’étape 2 :</h3>
                    Télécharge le décor de ton jeu
                    <b><a href="img/day1/jour.svg" download>en cliquant ici</a></b> et enregistre-le sur ton ordinateur.
                </div>

                <iframe src="https://player.vimeo.com/video/193686454" width="900" height="506" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

                <div class="popin-left">
                    <img src="img/dino2.jpg">
                </div>

                <div class="popin-right">
                    <h3>Toutes les étapes de la vidéo en détail</h3>
                    <ol>
                        <li><b>1.</b> <span>Remplace le titre de ton projet par "Calendrier de l'Avent" en haut à gauche de l'écran.
                        <li><b>2.</b> <span>Supprime le chat "Scratchy" en cliquant sur la petite vignette du chat situé dans l'encart en bas à gauche puis fais un clic droit dessus et sélectionne l'option "supprimer".
                        <li><b>3.</b> <span>Enregistre ensuite l'image qui composera ton décor <b><a href="img/day1/jour.svg" download>en cliquant ici</a></b>.
                        <li><b>4.</b> <span>Ajoute cette image à ton jeu en cliquant la troisième icône symbolisée par un dossier. Ce dernier est placé en dessous la scène.
                        <li><b>5.</b> <span>Sélectionne maintenant le fichier que tu viens d'enregistrer sur ton ordinateur à l'étape 3 et clique sur le bouton "Ouvrir". Ton décor est maintenant présent dans ton jeu.
                        <li><b>6.</b> <span>Clique sur l'onglet "Sons" tout en haut du site.
                        <li><b>7.</b> <span>Supprime le son "Pop" en cliquant sur la petite croix.
                        <li><b>8.</b> <span>Clique sur le haut-parleur situé sous le titre "Nouveau son" pour ajouter un nouveau son.
                        <li><b>9.</b> <span>Clique sur le lien "boucles musicales" et sélectionne la musique que tu souhaites utiliser, par exemple le son "Xylo3", puis clique sur le bouton "OK".
                        <li><b>10.</b> <span>Clique ensuite sur l'onglet "Scripts" puis sur la palette "Evenements".
                        <li><b>11.</b> <span>Sélectionne le premier bloc marron "Quand le drapeau vert est cliqué" et dépose-le sur la zone de Scripts sur la droite.
                        <li><b>12.</b> <span>Clique ensuite sur la palette Sons.
                        <li><b>13.</b> <span>Déplace le second bloc rose "Jouer le son Xylo3 jusqu'au bout" et place le juste en dessous du bloc marron "Quand le drapeau vert est cliqué". Attention de ne pas utiliser le premier bloc "jouer le son Xylo3", sinon tu n’entendras pas la musique.
                        <li><b>14.</b> <span>Pour faire jouer ton son en boucle, clique sur la palette "contrôle" et récupère le troisième bloc "répéter indéfiniment" pour entourer le bloc rose "Jouer le son Xylo3" situé dans la zone de Scripts sur la droite.
                        <li><b>15.</b> <span>Tu peux maintenant tester ton jeu en cliquant sur le drapeau vert en haut à droite de la scène.
                    </ol>
                </div>

                <br> <br> <br> <br>

                Réalisé en partenariat avec
                <a href="http://www.techkidsacademy.com/" target=_blank><img src="img/techkids.png" height=12></a>

                <img class="popin-tomorrow" src="img/rdv-demain.png">

                <br>

                <div class="return-popin" onclick="popincloseclick()">Retour au calendrier</div>

            </div>


            <div class="popin" id="popin2">

                <div class="popin-info full">
                    <h3>Avant de commencer:</h3>
                    Télécharge les différents éléments dont tu auras besoin et enregistre-les sur ton ordinateur:
                    <ul>
                        <li><b><a href="img/day2/Chalet.sprite2" download>le chalet</a></b>
                        <li><b><a href="img/day2/Sapin.sprite2" download>le sapin</a></b>
                        <li><b><a href="img/day2/Decorations.sprite2" download>les décorations</a></b>
                    </ul>
                </div>

                <iframe src="https://player.vimeo.com/video/194004924" width="900" height="506" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

                <div class="popin-left">
                    <img src="img/dino1.jpg">
                </div>

                <div class="popin-right">
                    <h3>Aujourd'hui nous allons ajouter un chalet et un sapin à notre décor :</h3>
                    <ol>
                        <li><b>1.</b>
                            <span>Enregistre l'image "Chalet.sprite2" <b><a href="img/day2/Chalet.sprite2" download>en cliquant ici</a></b>.
                        <li><b>2.</b> <span>Clique sur le bouton "Importer le lutin depuis un fichier" symbolisé par l'icône "Dossier" et sélectionne le fichier "Chalet.sprite2" puis clique sur le bouton "Ouvrir". Ton chalet est maintenant dans ta scène.
                        <li><b>3.</b> <span>Depuis la palette "Evénements", prends le bloc "Quand le drapeau vert est cliqué" et dépose-le dans la zone de "Scripts" à droite.
                        <li><b>4.</b> <span>Depuis la palette "Mouvement", prends le bloc "Aller à x:, y:" et positionne-le juste en dessous de "Quand drapeau vert est cliqué".
                        <li><b>5.</b> <span>Place ton chalet à la bonne position en entrant la valeur 200 dans le champ "Aller à x:" et tape la valeur 95 en "y".
                        <li><b>6.</b> <span>Clique sur le drapeau vert au-dessus de ta scène pour vérifier que tout fonctionne bien, puis clique sur le bouton stop pour arrêter la lecture.
                        <li><b>7.</b>
                            <span>Enregistre ensuite l'image "Sapin.sprite2" <b><a href="img/day2/Sapin.sprite2" download>en cliquant ici</a></b>.
                        <li><b>8.</b> <span>Clique à nouveau sur le bouton "Importer le lutin depuis un fichier" symbolisé par l'icône "Dossier" et sélectionne le fichier "Sapin.sprite2" puis clique sur le bouton "Ouvrir". Ton sapin est maintenant dans ta scène.
                        <li><b>9.</b> <span>Depuis la palette "Evénements", prends le bloc "Quand le drapeau vert est cliqué" et dépose-le dans la zone de "Scripts" à droite.
                        <li><b>10.</b> <span>Depuis la palette "Mouvement", reprends le bloc "Aller à x:, y:" et positionne-le juste en dessous de "Quand le drapeau vert est cliqué".
                        <li><b>11.</b> <span>Place ton sapin à la bonne position en entrant la valeur -190 dans le champ "Aller à x:" et tape la valeur -20 en "y".
                        <li><b>12.</b> <span>Tu peux à nouveau tester ton jeu en cliquant sur le drapeau vert au-dessus de ta scène.
                        <li><b>13.</b>
                            <span>Enregistre maintenant l'image "Decorations.sprite2" <a href="img/day2/Decorations.sprite2" download>en cliquant ici</a></span>.
                        <li><b>14.</b> <span>Clique à nouveau sur le bouton "Importer le lutin depuis un fichier" symbolisé par l'icône "Dossier" et sélectionne le fichier "Decorations.sprite2" puis clique sur le bouton "Ouvrir". Tes décorations sont maintenant dans ta scène.
                        <li><b>15.</b> <span>Depuis la palette "Evénements", prends le bloc "Quand le drapeau vert est cliqué" et dépose-le dans la zone de "Scripts" à droite.
                        <li><b>16.</b> <span>Depuis la palette "Mouvement", prends le bloc "Aller à pointeur de souris" et positionne-le juste en dessous de "Quand drapeau vert est cliqué".
                        <li><b>17.</b> <span>Clique sur la petite flèche noire à droite de "pointeur de souris" et sélectionne "Sapin"
                        <li><b>18.</b> <span>Depuis la palette "Apparence", prends le bloc "Aller au premier plan" et place-le en dessous de "Aller à Sapin".
                        <li><b>19.</b> <span>Clique sur l'onglet "Costumes" pour personnaliser tes décorations. Tu peux utiliser la "loupe +" en bas à droite pour zoomer sur ton élément.
                        <li><b>20.</b> <span>Clique maintenant sur le pot de peinture sur la droite de ton écran.
                        <li><b>21.</b> <span>Utilise l'outil "Dégradé circulaire" situé en bas de l'interface (le quatrième bloc noir), puis choisis la couleur que tu souhaites utiliser dans ta palette de couleurs.
                        <li><b>22.</b> <span>Remplis ensuite les boules de la couleur de ton choix.
                    </ol>
                </div>


                <br> <br> <br> <br>

                Réalisé en partenariat avec
                <a href="http://www.techkidsacademy.com/" target=_blank><img src="img/techkids.png" height=12></a>

                <img class="popin-tomorrow" src="img/rdv-demain.png">

                <br>

                <div class="return-popin" onclick="popincloseclick()">Retour au calendrier</div>


            </div>


            <div class="popin" id="popin3">

                <div class="popin-info full">
                    <h3>C'est le Quiz du week-end !</h3>
                    Trouve la bonne réponse au quiz du weekend pour augmenter tes chances de gagner des cadeaux !
                </div>

                <div class="popin-left">
                    <img src="img/quiz/dino-qwant.jpg">
                </div>

                <br> <br>

                <div class="popin-right">
                    <div class="quiz">
                        <h3>Sais-tu qui est le principal inventeur du Web?</h3>
                        <ol>
                            <li class=wrong onclick="quizclick(this, correct3, wrong3, tick3_1)">
                                <span class="tick" id=tick3_1></span>Steve Jobs
                            <li class=wrong onclick="quizclick(this, correct3, wrong3, tick3_2)">
                                <span class="tick" id=tick3_2></span>Bill Gates
                            <li class=correct onclick="quizclick(this, correct3, wrong3, tick3_3)">
                                <span class="tick" id=tick3_3></span>Tim Berners-Lee
                        </ol>
                    </div>
                </div>

                <div class="popin_answer_correct" id=correct3>
                    <img src="img/quiz/icone-true.jpg">
                    <h2>Félicitations !</h2>
                    Tu as trouvé la bonne réponse ! <br> Trouve plus d'informations sur la réponse
                    <a href="https://www.qwantjunior.com/?q=inventeur+du+web&t=web" target=_blank>en cliquant ici</a>.
                </div>

                <div class="popin_answer_wrong" id=wrong3>
                    <img src="img/quiz/icone-wrong.jpg">
                    <h2>Dommage !</h2>
                    Ce n'est pas la bonne réponse, retente ta chance ! <br> Trouve plus d'informations sur la réponse
                    <a href="https://www.qwantjunior.com/?q=inventeur+du+web&t=web" target=_blank>en cliquant ici</a>.
                </div>

                <br> <img src="img/junior-account-spacer.png"> <br>

                <img class="popin-tomorrow" src="img/rdv-demain.png"> <br> <br>

            </div>


            <div class="popin" id="popin4">

                <div class="popin-info full">
                    <h3>C'est le Quiz du week-end !</h3>
                    Trouve la bonne réponse au quiz du weekend pour augmenter tes chances de gagner des cadeaux !
                </div>

                <div class="popin-left">
                    <img src="img/quiz/dino-qwant.jpg">
                </div>

                <br> <br>

                <div class="popin-right">
                    <div class="quiz">
                        <h3>Que veut dire l'abréviation www. que l'on trouve souvent devant un site internet ?</h3>
                        <ol>
                            <li class=correct onclick="quizclick(this, correct4, wrong4, tick4_1)">
                                <span class="tick" id=tick4_1></span>World Wide Web
                            <li class=wrong onclick="quizclick(this, correct4, wrong4, tick4_2)">
                                <span class="tick" id=tick4_2></span>World Wild Web
                            <li class=wrong onclick="quizclick(this, correct4, wrong4, tick4_3)">
                                <span class="tick" id=tick4_3></span>Wonderful Wise Web
                        </ol>
                    </div>
                </div>

                <div class="popin_answer_correct" id=correct4>
                    <img src="img/quiz/icone-true.jpg">
                    <h2>Félicitations !</h2>
                    Tu as trouvé la bonne réponse ! <br> Trouve plus d'informations sur la réponse
                    <a href="https://www.qwantjunior.com/?q=%22que%20signifie%20www%22&t=web" target=_blank>en cliquant ici</a>.
                </div>

                <div class="popin_answer_wrong" id=wrong4>
                    <img src="img/quiz/icone-wrong.jpg">
                    <h2>Dommage !</h2>
                    Ce n'est pas la bonne réponse, retente ta chance ! <br> Trouve plus d'informations sur la réponse
                    <a href="https://www.qwantjunior.com/?q=%22que%20signifie%20www%22&t=web" target=_blank>en cliquant ici</a>.
                </div>

                <br> <img src="img/junior-account-spacer.png"> <br>

                <img class="popin-tomorrow" src="img/rdv-demain.png"> <br> <br>

            </div>


            <div class="popin" id="popin5">
                <div class="popin-info ">
                    <h3>Avant de commencer:</h3>
                    Télécharge le fichier
                    <b><a href="img/day5/Bonhomme-de-neige.sprite2" download>Bonhomme-de-neige.sprite2</a></b> et enregistre-le sur ton ordinateur.
                </div>

                <iframe src="https://player.vimeo.com/video/194023077" width="900" height="506" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

                <div class="popin-left">
                    <img src="img/dino1.jpg">
                </div>

                <div class="popin-right">
                    <h3>Aujourd'hui, nous allons ajouter une petite animation avec un bonhomme de neige :</h3>
                    <ol>
                        <li><b>1.</b>
                            <span> Enregistre l'image "Bonhomme-de-neige.sprite2" <b><a href="img/day5/Bonhomme-de-neige.sprite2" download>en cliquant ici</a></b>.
                        <li><b>2.</b> <span> Clique sur le bouton "Importer le lutin depuis un fichier" symbolisé par l'icône "Dossier" et sélectionne le fichier "Bonhomme-de-neige.sprite2" puis clique sur le bouton "Ouvrir". Ton bonhomme de neige est maintenant dans ta scène.
                        <li><b>3.</b> <span> Depuis la palette "Evénements", prends le bloc "Quand le drapeau vert est cliqué" et dépose-le dans la zone de "Scripts" à droite.
                        <li><b>4.</b> <span> Depuis la palette "Mouvement", prends le bloc "Aller à x:, y:" et positionne-le juste en dessous du bloc marron "Quand drapeau vert est cliqué".
                        <li><b>5.</b> <span> Place ton bonhomme à la bonne position en entrant la valeur 50 dans le champ "Aller à x:" et tape la valeur 0 en "y".
                        <li><b>6.</b> <span> Depuis la palette "Contrôle" prends le bloc "Répéter indéfiniment" et place-le sous le bloc bleu dans la zone de "Scripts". Cette action permettra d'animer ton bonhomme de neige en boucle.
                        <li><b>7.</b> <span> Clique ensuite sur l'onglet "Costumes" pour voir tous les costumes présents pour ce lutin qui composeront ton animation.
                        <li><b>8.</b> <span> Clique à nouveau sur l'onglet "Scripts".
                        <li><b>9.</b> <span> Depuis la palette "Apparence", prends le bloc "Basculer sur le costume" et place-le dans la boucle marron "Répéter indéfiniment"
                        <li><b>10.</b> <span> Clique sur le triangle noir à côté de "Bonhomme_de_neige10" et sélectionne l'option "Vide".
                        <li><b>11.</b> <span> Depuis la palette "Contrôle", prends le bloc "Répéter 10 fois" et place en dessous du bloc violet "Basculer le costume "Vide".
                        <li><b>12.</b> <span> Remplace 10 par 8.
                        <li><b>13.</b> <span> Depuis la palette "Contrôle", prends le bloc "Attendre 1 seconde" et place-le à l'intérieur du bloc marron "Répéter 8 fois" pour mettre une petite pause à cette animation.
                        <li><b>14.</b> <span> Retourne dans la palette "Apparence" et prends le bloc "Costume suivant" et place-le en dessous du bloc marron "Attendre 1 seconde".
                        <li><b>15.</b> <span> Depuis la palette "Contrôle", prends le bloc "Attendre 1 seconde" et place-le après le bloc marron "Répéter 8 fois".
                        <li><b>16.</b> <span> Clique maintenant sur le drapeau vert pour découvrir ton animation.
                    </ol>
                </div>


                <br> <br> <br> <br>

                Réalisé en partenariat avec
                <a href="http://www.techkidsacademy.com/" target=_blank><img src="img/techkids.png" height=12></a>

                <img class="popin-tomorrow" src="img/rdv-demain.png">

                <br>

                <div class="return-popin" onclick="popincloseclick()">Retour au calendrier</div>
            </div>


            <div class="popin" id="popin6">

                <div class="popin-info ">
                    <h3>Avant de commencer:</h3>
                    Télécharge le fichier
                    <b><a href="img/day6/Skieur.sprite2" download>Skieur.sprite2</a></b> et enregistre-le sur ton ordinateur.
                </div>

                <iframe src="https://player.vimeo.com/video/194350813" width="900" height="506" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

                <div class="popin-left">
                    <img src="img/dino1.jpg">
                </div>

                <div class="popin-right">
                    <h3>Aujourd'hui, nous allons animer notre skieur :</h3>
                    <ol>
                        <li><b>1.</b>
                            <span>Enregistre l'image "Skieur.sprite2" <b><a href="img/day6/Skieur.sprite2" download>en cliquant ici</a></b>
                        <li><b>2.</b> <span>Clique sur le bouton "Importer le lutin depuis un fichier" symbolisé par l'icône "Dossier" et sélectionne le fichier "skieur.sprite2" puis clique sur le bouton "Ouvrir". Ton skieur est maintenant dans ta scène.
                        <li><b>3.</b> <span>Depuis la palette "Evénements", prends le bloc "Quand le drapeau vert est cliqué" et dépose-le dans la zone de "Scripts" à droite.
                        <li><b>4.</b> <span>Depuis la palette "Mouvement", prends le bloc "Aller à x:, y:" et positionne-le juste en dessous de "Quand drapeau vert est cliqué".
                        <li><b>5.</b> <span>Place ton skieur en bas et à gauche en entrant la valeur -195 dans le champ "Aller à x:" et tape la valeur -115 en "y".
                        <li><b>6.</b> <span>Depuis la palette "Contrôle", prends le bloc "Répéter jusqu'à" et dépose-le en dessous de aller à x: y:
                        <li><b>7.</b> <span>Depuis la palette "Capteurs" prends le premier bloc "pointeur de souris touché?" et dépose-le en plaçant le bord gauche à l'intérieur de l'hexagone du bloc "Répéter jusqu'à"
                        <li><b>8.</b> <span>Clique sur la petite flèche noire à droite de "pointeur de souris" et sélectionne "Bord".
                        <li><b>9.</b> <span>Depuis la palette "Mouvement", prends le bloc "avancer de 10" et dépose-le à l'intérieur du bloc "répéter jusqu'à bord touché?".
                        <li><b>10.</b> <span>Dans le bloc "avancer de 10" remplace 10 par 6.
                        <li><b>11.</b> <span>Depuis la palette "Contrôle", prends le bloc "Répéter indéfiniment" et viens entourer tous les blocs en dessous de "Quand drapeau vert cliqué".
                        <li><b>12.</b> <span>Clique sur le drapeau vert pour vérifier que cela fonctionne bien.
                        <li><b>13.</b> <span>Clique sur le bouton stop et dans le bloc "avancer de" remplace 6 par 4 pour que ton lutin se déplace plus doucement.
                        <li><b>14.</b> <span>Clique sur le drapeau vert pour vérifier que cela fonctionne bien.
                        <li><b>15.</b> <span>Clique sur le bouton stop et dans le bloc "avancer de" remplace 4 par 8 pour que ton lutin se déplace plus rapidement.
                        <li><b>16.</b> <span>Clique sur le drapeau vert pour vérifier que cela fonctionne bien.
                        <li><b>17.</b> <span>Clique sur le bouton stop et dans le bloc "avancer de" remplace 8 par 6 (ou la valeur que tu veux)

                    </ol>
                </div>


                <br> <br> <br> <br>

                Réalisé en partenariat avec
                <a href="http://www.techkidsacademy.com/" target=_blank><img src="img/techkids.png" height=12></a>

                <img class="popin-tomorrow" src="img/rdv-demain.png">

                <br>

                <div class="return-popin" onclick="popincloseclick()">Retour au calendrier</div>


            </div>


            <div class="popin" id="popin7">

                <iframe src="https://player.vimeo.com/video/194519341" width="900" height="506" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

                <div class="popin-left">
                    <img src="img/dino1.jpg">
                </div>

                <div class="popin-right">

                    <h3>Bonjour, aujourd’hui on va s’amuser à personnaliser notre jeu ! </h3>

                    <p>Que dirais-tu de colorier ton skieur ?

                    <ol>
                        <li><b>1.</b> <span>Dans la zone des lutins, clique sur la vignette du Skieur.
                        <li><b>2.</b> <span>Puis clique sur l’onglet Costumes, à côté de Scripts.
                        <li><b>3.</b> <span>Avant de colorier notre skieur, nous allons grossir l’image.
                        <li><b>4.</b> <span>Clique plusieurs fois sur la petite loupe + située en bas à droite de l’écran, pour zoomer sur ton skieur, jusqu’à ce que tu voies bien tous les détails. Clique sur la loupe avec le – pour dézoomer.
                        <li><b>5.</b> <span>Regarde la barre d’outils à droite avec toutes les petites icônes. Est-ce que tu vois l’icône avec le petit pot de peinture ? C’est la 2ème en partant du bas. Clique sur cette icône avec le pot de peinture pour colorier une forme.
                        <li><b>6.</b> <span>Ensuite choisis une couleur dans la palette de couleurs en cliquant sur un petit carré de couleur. Tu trouveras toutes les couleurs de l’arc en ciel en cliquant sur la petite icône à gauche des carrés de couleur. Déplace le petit rond pour trouver ta couleur préférée !
                        <li><b>7.</b> <span>Une fois que tu as choisi ta couleur, déplace le curseur de ta souris à l’endroit où tu veux colorier, par exemple le bonnet… tu vois, le bonnet change de couleur, clique pour colorier. Voilà, on a changé les couleurs du bonnet !
                        <li><b>8.</b> <span>Si tu te trompes, tu peux revenir en arrière en cliquant sur la petite flèche en haut. Clique autant de fois que tu as besoin pour annuler les dernières actions.
                        <li><b>9.</b> <span>Super ! Tu peux aussi choisir deux couleurs pour faire des dégradés. Pour choisir la 2ème couleur, clique sur le petit carré blanc à côté de ta 1ère couleur et choisis une nouvelle couleur. Choisis ensuite le style de dégradé que tu veux faire et clique sur ton skieur pour le colorier.
                        <li><b>10.</b> <span>Sois créatif, continue à colorier ton skieur.
                        <li><b>11.</b> <span>Génial ! Et si tu t’amusais à colorier ton bonhomme de neige ? N’oublie pas les différents costumes du bonhomme de neige… tu peux aussi décider de faire un bonhomme de différentes couleurs à chaque fois, ce sera rigolo !
                    </ol>

                    <p>À toi de jouer et à demain pour la suite du programme…

                </div>


                <br> <br> <br> <br>

                Réalisé en partenariat avec
                <a href="http://www.techkidsacademy.com/" target=_blank><img src="img/techkids.png" height=12></a>

                <img class="popin-tomorrow" src="img/rdv-demain.png">

                <br>

                <div class="return-popin" onclick="popincloseclick()">Retour au calendrier</div>


            </div>


            <div class="popin" id="popin8">

                <div class="popin-info">
                    <h3>Avant de commencer cette étape :</h3>
                    Télécharge l'image du flocon de neige
                    <b><a href="img/day8/Flocon.sprite2" download>en cliquant ici</a></b> et enregistre-la sur ton ordinateur.
                </div>

                <iframe src="https://player.vimeo.com/video/194681338" width="900" height="506" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

                <div class="popin-left">
                    <img src="img/dino1.jpg">
                </div>

                <div class="popin-right">
                    <h3>Bonjour, et si on faisait tomber la neige ?</h3>
                    <ol>
                        <li><b>1.</b>
                            <span>Enregistre l'image "Flocon.sprite2" <b><a href="img/day8/Flocon.sprite2" download>en cliquant ici</a></b>.
                        <li><b>2.</b> <span>Dans la zone des lutins, clique sur la 3ème icône à côté de "Nouveau lutin" pour Importer le lutin depuis un fichier et choisis le fichier Flocon ou Flocon.sprite2. Voilà, le flocon de neige apparaît dans la zone des lutins.
                        <li><b>3.</b> <span>Bien, on va commencer par placer notre flocon de neige en haut dans le ciel. Démarre un nouveau script avec le bloc "quand le drapeau vert est cliqué". Puis clique sur la palette "Apparence" et glisse et dépose en dessous les blocs "aller au premier plan" et "montrer" pour afficher le flocon.
                        <li><b>4.</b> <span>Clique maintenant sur la palette "Mouvement" et glisse entre les deux blocs violets, le bloc "aller à x : ( ) y : ( )". Clique à l’intérieur de la case à côté de y (l’axe vertical) et saisis 155 pour placer le flocon en haut dans le ciel.
                        <li><b>5.</b> <span>Pour positionner le flocon n’importe où sur la largeur de la scène, on va changer la valeur de x (axe horizontal). Clique sur la palette "Opérateurs" (couleur verte) et glisse la pointe gauche du bloc "nombre aléatoire entre ( ) et ( )" dans la case à droite de x. Saisis -230 dans la 1ère case et 230 dans la seconde case.
                        <li><b>6.</b> <span>Il est temps de faire tomber la neige ! Faisons descendre le flocon jusqu’au bord de la scène. Clique sur la palette Contrôle, prends le bloc "répéter jusqu’à &lt;…>" et mets-le sous le bloc "montrer".
                    <br>- Clique ensuite sur la palette "Capteurs" (bleu clair) et glisse le 1er bloc "&lt;…> touché ?" dans le petit hexagone du bloc "répéter jusqu’à &lt;…>". Clique sur le petit triangle noir et choisis "bord" dans le menu déroulant.
                    <br>- Depuis la palette "Mouvement", glisse et dépose le bloc "ajouter (10) à y" à l’intérieur du bloc "répéter jusqu’à bord touché". Remplace 10 par -4 pour faire descendre le flocon jusqu’au bord.
                        <li><b>7.</b> <span>Clique sur le drapeau vert pour vérifier que ton flocon tombe bien du ciel.
                        <li><b>8.</b> <span>Super, mais ce serait encore plus chouette s’il neigeait tout le temps !
                        <li><b>9.</b> <span>Depuis la palette "Apparence", glisse et dépose le bloc "cacher" sous le bloc "aller au premier plan". Puis clique sur la palette "Contrôle" et ajoute en dessous du bloc "attendre (1) secondes". Remplace 1 par un nombre aléatoire en 1 et 2 par exemple.
                        <li><b>10.</b> <span>Place un bloc "répéter indéfiniment" sous le bloc "aller au premier plan" et entoure les six derniers blocs, pour que le flocon de neige tombe pendant tout le jeu.

                    </ol>

                    <p>Clique sur le drapeau vert pour regarder la neige tomber.

                    <p>Demain je te montrerai des astuces pour améliorer ton jeu !

                </div>


                <br> <br> <br> <br>

                Réalisé en partenariat avec
                <a href="http://www.techkidsacademy.com/" target=_blank><img src="img/techkids.png" height=12></a>

                <img class="popin-tomorrow" src="img/rdv-demain.png">

                <br>

                <div class="return-popin" onclick="popincloseclick()">Retour au calendrier</div>

            </div>


            <div class="popin" id="popin9">

                <iframe src="https://player.vimeo.com/video/194681453" width="900" height="506" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

                <div class="popin-left">
                    <img src="img/dino1.jpg">
                </div>

                <div class="popin-right">
                    <h3>Bonjour ! Hier nous avons vu comment faire tomber un flocon de neige. Aujourd’hui je vais te montrer comment avoir facilement plusieurs flocons de neige différents.</h3>
                    <ol>
                        <li><b>1.</b> <span>Dans la zone des lutins, clique sur ton flocon de neige.
                        <li><b>2.</b> <span>Afin de pouvoir modifier la taille de ton flocon de neige, ajoute depuis la palette "Apparence", le bloc "mettre à (100)% de la taille initiale", juste en dessous du bloc "aller au premier plan".
                        <li><b>3.</b> <span>Si nous voulons que notre flocon de neige soit deux fois plus petit, quel nombre devons-nous mettre dans le bloc ? … Remplace 100 par 50 pour que ton flocon soit deux fois plus petit. Essaye avec d’autres valeurs !
                        <li><b>4.</b> <span>Clique sur le drapeau vert pour voir le résultat.
                        <li><b>5.</b> <span>Et si nous ajoutions d’autres flocons maintenant ? Tu vas voir, c’est très simple. Clique avec le bouton droit de ta souris sur la vignette de ton flocon et choisis l’option "dupliquer" dans le menu. Bravo ! Un deuxième flocon est apparu dans la zone des lutins.
                        <li><b>6.</b> <span>Clique sur Flocon2. Tu as vu? Le deuxième flocon a exactement le même script que le premier. Amuse-toi à changer la taille du flocon dans le bloc "mettre à (…)% de la taille initiale".
                        <li><b>7.</b> <span>Tu peux aussi changer la vitesse à laquelle le flocon descend. As-tu une idée de comment faire ? Allez, je t’aide, il suffit de changer la valeur dans le bloc "ajouter (-4) à y". Si tu veux que ton flocon tombe plus vite, essaye avec -5 et pour qu’il aille moins vite, essaye -2.
                        <li><b>8.</b> <span>Bien sûr, tu peux dupliquer d’autres flocons, comme tu l’as fait avec le premier flocon. Je te rappelle, il suffit de cliquer avec le bouton droit de la souris sur le flocon et de choisir "dupliquer" dans le menu.
                        <li><b>9.</b> <span>Amuse-toi à créer pleins de flocons de neige différents.
                    </ol>

                    <p>Super, il neige ! Rendez-vous demain pour de nouvelles aventures…

                </div>

                <br> <br> <br> <br>

                Réalisé en partenariat avec
                <a href="http://www.techkidsacademy.com/" target=_blank><img src="img/techkids.png" height=12></a>

                <img class="popin-tomorrow" src="img/rdv-demain.png">

                <br>

                <div class="return-popin" onclick="popincloseclick()">Retour au calendrier</div>

            </div>


            <div class="popin" id="popin10">

                <div class="popin-info full">
                    <h3>C'est le Quiz du week-end !</h3>
                    Trouve la bonne réponse au quiz du weekend pour augmenter tes chances de gagner des cadeaux !
                </div>

                <div class="popin-left">
                    <img src="img/quiz/dino-qwant.jpg">
                </div>

                <br> <br>

                <div class="popin-right">
                    <div class="quiz">
                        <h3>Que veut dire "code open source" en programmation ?</h3>
                        <ol>
                            <li class=wrong onclick="quizclick(this, correct10, wrong10, tick10_1)">
                                <span class="tick" id=tick10_1></span>Un code secret que l'on intègre dans un logiciel pour connaître sa source
                            <li class=wrong onclick="quizclick(this, correct10, wrong10, tick10_2)">
                                <span class="tick" id=tick10_2></span>Une ligne de code qui permet d'ouvrir la source d'une donnée
                            <li class=correct onclick="quizclick(this, correct10, wrong10, tick10_3)">
                                <span class="tick" id=tick10_3></span>L'ensemble des lignes de code que le programmeur rend publiques
                        </ol>
                    </div>
                </div>

                <div class="popin_answer_correct" id=correct10>
                    <img src="img/quiz/icone-true.jpg">
                    <h2>Félicitations !</h2>
                    Tu as trouvé la bonne réponse ! <br> Trouve plus d'informations sur la réponse
                    <a href="https://www.qwantjunior.com/?q=code%20open%20source&t=web" target=_blank>en cliquant ici</a>.
                </div>

                <div class="popin_answer_wrong" id=wrong10>
                    <img src="img/quiz/icone-wrong.jpg">
                    <h2>Dommage !</h2>
                    Ce n'est pas la bonne réponse, retente ta chance ! <br> Trouve plus d'informations sur la réponse
                    <a href="https://www.qwantjunior.com/?q=code%20open%20source&t=web" target=_blank>en cliquant ici</a>.
                </div>

                <br> <img src="img/junior-account-spacer.png"> <br>

                <img class="popin-tomorrow" src="img/rdv-demain.png"> <br> <br>
            </div>


            <div class="popin" id="popin11">

                <div class="popin-info full">
                    <h3>C'est le Quiz du week-end !</h3>
                    Trouve la bonne réponse au quiz du weekend pour augmenter tes chances de gagner des cadeaux !
                </div>

                <div class="popin-left">
                    <img src="img/quiz/dino-qwant.jpg">
                </div>

                <br> <br>

                <div class="popin-right">
                    <div class="quiz">
                        <h3>En informatique, qu'est-ce qu'une police de caractères ?</h3>
                        <ol>
                            <li class=wrong onclick="quizclick(this, correct11, wrong11, tick11_1)">
                                <span class="tick" id=tick11_1></span>Une règle du comportement qu'il faut respecter sur Internet
                            <li class=correct onclick="quizclick(this, correct11, wrong11, tick11_2)">
                                <span class="tick" id=tick11_2></span>Une représentation graphique des lettres de l'alphabet et des chiffres
                            <li class=wrong onclick="quizclick(this, correct11, wrong11, tick11_3)">
                                <span class="tick" id=tick11_3></span>Des gendarmes qui enquêtent sur le web
                        </ol>
                    </div>
                </div>

                <div class="popin_answer_correct" id=correct11>
                    <img src="img/quiz/icone-true.jpg">
                    <h2>Félicitations !</h2>
                    Tu as trouvé la bonne réponse ! <br> Trouve plus d'informations sur la réponse
                    <a href="https://www.qwantjunior.com/?q=police%20de%20caract%C3%A8res&t=web" target=_blank>en cliquant ici</a>.
                </div>

                <div class="popin_answer_wrong" id=wrong11>
                    <img src="img/quiz/icone-wrong.jpg">
                    <h2>Dommage !</h2>
                    Ce n'est pas la bonne réponse, retente ta chance ! <br> Trouve plus d'informations sur la réponse
                    <a href="https://www.qwantjunior.com/?q=police%20de%20caract%C3%A8res&t=web" target=_blank>en cliquant ici</a>.
                </div>

                <br> <img src="img/junior-account-spacer.png"> <br>

                <img class="popin-tomorrow" src="img/rdv-demain.png"> <br> <br>
            </div>


            <div class="popin" id="popin12">

                <div class="popin-info">
                    <h3>Avant de commencer cette étape :</h3>
                    Télécharge l'image du cookie
                    <b><a href="img/day12/Cookie.sprite2" download>en cliquant ici</a></b> et enregistre-la sur ton ordinateur.
                </div>

                <iframe src="https://player.vimeo.com/video/194845643" width="900" height="506" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

                <div class="popin-left">
                    <img src="img/dino1.jpg">
                </div>

                <div class="popin-right">
                    <h3>Bonjour, content de te retrouver ! Aujourd’hui, nous allons ajouter un obstacle devant notre skieur. On va afficher aléatoirement, soit un rocher, soit un cookie.</h3>
                    <ol>
                        <li><b>1.</b>
                            <span>Enregistre l'image "Cookie.sprite2" <b><a href="img/day12/Cookie.sprite2" download>en cliquant ici</a></b>.
                        <li><b>2.</b> <span>Importe le lutin Cookie en cliquant sur l’icône "Importer le lutin depuis un fichier".
                        <li><b>3.</b> <span>Démarre un nouveau script avec le bloc "quand le drapeau vert est cliqué".
                        <li><b>4.</b> <span>Place ton cookie en bas de l’écran : depuis la palette Mouvement, glisse et dépose en dessous le bloc "aller à x : ( )  y : ( )" et remplace les valeurs pour avoir "x : 12" et "y : -132". Clique sur le drapeau vert pour vérifier que ton cookie est bien en bas.
                        <li><b>5.</b> <span>Bien, nous allons maintenant faire apparaître et disparaître notre cookie.
                    <br>- Clique sur la palette "Apparence" et ajoute les blocs montrer et cacher. 
                    <br>- Puis depuis la palette "Contrôle", glisse une pause en dessous de chaque bloc, avec le bloc "attendre (1) secondes". 
                    <br>- Termine en entourant les 4 derniers blocs avec un bloc "répéter indéfiniment". 
                    <br>- Clique sur le drapeau vert et regarde ton cookie clignoter !
                        <li><b>6.</b> <span>Pas mal comme effet ! Nous allons maintenant demander à l’ordinateur d’afficher au hasard un cookie ou un rocher.
                    <br>- Clique sur la palette "Apparence" et glisse et dépose le bloc "basculer sur le costume &lt;…>" juste au-dessus du bloc "montrer".
                    <br>- Depuis la palette "Opérateurs", prends le bloc "nombre aléatoire entre (1) et (10)" et insère la pointe gauche du bloc dans la case à côté de "basculer sur le costume". 
                    <br>- Remplace 10 par 7…. Et oui, notre lutin a 7 costumes ! 
                    <br>- Clique sur le drapeau vert, tu vois maintenant soit un rocher, soit un cookie.
                        <li><b>7.</b> <span>Améliore l’effet en ajoutant des blocs "nombre aléatoire entre ( ) et ( )" dans les deux blocs "attendre (1) secondes". J’ai mis entre 1 et 3 pour le premier bloc et entre 2 et 4 pour le second bloc, mais tu peux essayer d’autres valeurs.


                    </ol>

                    <p>Voilà nous avons un rocher et un cookie ! Pour l’instant, notre skieur passe à travers, nous verrons demain comment modifier son comportement… alors, à demain !

                </div>

                <br> <br> <br> <br>

                Réalisé en partenariat avec
                <a href="http://www.techkidsacademy.com/" target=_blank><img src="img/techkids.png" height=12></a>

                <img class="popin-tomorrow" src="img/rdv-demain.png">

                <br>

                <div class="return-popin" onclick="popincloseclick()">Retour au calendrier</div>

            </div>


            <div class="popin" id="popin13">

                <iframe src="https://player.vimeo.com/video/195264127" width="900" height="506" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

                <div class="popin-left">
                    <img src="img/dino1.jpg">
                </div>

                <div class="popin-right">
                    <h3>Bonjour ! Que dirais-tu de faire sauter notre skieur pour éviter le rocher ?</h3>

                    <p>Nous allons faire en sorte que lorsqu’on appuie sur la barre espace sur notre clavier, notre skieur saute en l’air, ce qui va lui permettre d’éviter les rochers.

                    <ol>
                        <li><b>1.</b> <span>C’est parti ! Commence par cliquer sur la vignette du skieur dans la zone des lutins.
                        <li><b>2.</b> <span> Crée un nouveau script avec le bloc "quand le drapeau vert est cliqué", à côté ou en dessous de ton premier script.
                        <li><b>3.</b> <span>Commençons par créer la condition « si on appuie si la touche espace » :
                    <br>- Clique sur la palette "Contrôle" et glisse en dessous un bloc "répéter indéfiniment".
                    <br>- Ajoute à l’intérieur le bloc conditionnel "si &lt;…> alors".
                    <br>- Depuis la palette "Capteurs", glisse à l’intérieur de l’hexagone conditionnel le bloc "touche &lt;espace> pressée ?".
                        <li><b>4.</b> <span>Faisons maintenant sauter notre skieur :
                    <br>- Clique sur la palette "Mouvement" et glisse le bloc "ajouter (10) à y", à l’intérieur du bloc "si &lt; touche espace pressée ?> alors".
                    <br>- Remplace 10 par 40.
                    <br>- Clique sur le drapeau vert et appuie sur la touche espace pour tester.
                        <li><b>5.</b> <span>Cool ! Notre skieur saute, mais il faudrait peut-être qu’il redescende !
                        <li><b>6.</b> <span>Faisons maintenant redescendre notre skieur :
                    <br>- Depuis la palette "Contrôle", ajoute le bloc "attendre (1) secondes" en-dessous du bloc "ajouter (40) à y" et remplace 1 par 0.7 (pas de virgule).
                    <br>- Ensuite glisse et dépose en-dessous le bloc "répéter (10 fois)".
                    <br>- Enfin clique sur la palette "Mouvement", glisse à l’intérieur de la boucle de répétition le bloc "ajouter (10) à y" et remplace 10 par -4, pour faire redescendre ton skieur.
                        <li><b>7.</b> <span>Teste et essaie de sauter par dessus les rochers.

                    </ol>

                    <p>Bravo, t’es vraiment un champion (championne) du code !
                    <p>On se retrouve demain pour continuer notre jeu !


                </div>

                <br> <br> <br> <br>

                Réalisé en partenariat avec
                <a href="http://www.techkidsacademy.com/" target=_blank><img src="img/techkids.png" height=12></a>

                <img class="popin-tomorrow" src="img/rdv-demain.png">

                <br>

                <div class="return-popin" onclick="popincloseclick()">Retour au calendrier</div>

            </div>


            <div class="popin" id="popin14">

                <iframe src="https://player.vimeo.com/video/195436098" width="900" height="506" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

                <div class="popin-left">
                    <img src="img/dino1.jpg">
                </div>

                <div class="popin-right">
                    <h3>Bonjour ! Comme tu as pu le constater, il ne se passe rien lorsque notre skieur touche un rocher ou un cookie. Aujourd’hui, nous allons écrire un nouveau script pour gérer les collisions entre le skieur et les rochers et cookies.</h3>
                    <p>Nous voulons que notre skieur puisse manger les cookies et éviter les rochers.

                    <ol>
                        <li><b>1.</b> <span>Dans la zone des lutins, clique sur le lutin "Cookie".
                        <li><b>2.</b> <span>Démarre un nouveau script avec le bloc "quand le drapeau vert est cliqué".
                        <li><b>3.</b> <span>Commençons par cacher le cookie ou rocher lorsque le skieur les touche :
                    <br>- Depuis la palette "Contrôle", crée une boucle conditionnelle avec les blocs "répéter indéfiniment" et "si &lt;…> alors".
                    <br>- Depuis la palette "Capteurs", ajoute le 1er bloc "&lt;Pointeur de souris> touché ?" dans l’hexagone conditionnel et choisis "Skieur" dans le menu déroulant.
                    <br>- Clique ensuite sur la palette "Apparence" et glisse le bloc "cacher", à l’intérieur du bloc "si &lt;Skieur touché ?> alors".
                    <br>- Clique sur le drapeau vert et regarde ce qu’il se passe maintenant lorsque le skieur touche un rocher ou un cookie.
                        <li><b>4.</b> <span>Améliorons notre script : si le skieur touche un cookie, on va jouer le son « chomp », sinon s’il touche un rocher, on va jouer le son « buzz whir ».
                    <br>- Retourne dans la palette "Contrôle" et glisse en dessous du bloc "cacher", le bloc "si &lt;…> alors … sinon …" (attention c’est le grand bloc !)
                    <br>- Clique sur l’onglet "Costumes", comme tu le vois les 3 premiers costumes sont des rochers et les autres des cookies. On va ajouter la condition "si costume > à 3".
                    <br>- Retourne dans l’onglet "Scripts". Clique sur la palette "Opérateurs" et glisse le bloc "[&nbsp;]&nbsp;>&nbsp;[&nbsp;]", à l’intérieur de l’hexagone conditionnel du bloc "si &lt;…> alors … sinon …".
                    <br>- Retourne maintenant sur la palette "Apparence" et glisse le bloc "costume #" à l’intérieur de la première case. Saisis 3 dans la seconde case.
                    <br>- Clique sur la palette "Sons" (rose) et glisse et dépose le 2ème bloc "jouer le son &lt;…> jusqu’au bout", à l’intérieur du bloc "si &lt;…> alors … sinon …". Choisis le son "chomp" dans le menu déroulant. 
                    <br>- Dépose un deuxième bloc dans la seconde partie du bloc conditionnel et choisis "buzz whir" dans le menu déroulant.
                    </ol>

                    <p>Clique sur le drapeau vert : mange les cookies et évite les rochers !

                </div>

                <br> <br> <br> <br>

                Réalisé en partenariat avec
                <a href="http://www.techkidsacademy.com/" target=_blank><img src="img/techkids.png" height=12></a>

                <img class="popin-tomorrow" src="img/rdv-demain.png">

                <br>

                <div class="return-popin" onclick="popincloseclick()">Retour au calendrier</div>

            </div>


            <div class="popin" id="popin15">

                <iframe src="https://player.vimeo.com/video/195627329" width="900" height="506" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

                <div class="popin-left">
                    <img src="img/dino1.jpg">
                </div>

                <div class="popin-right">
                    <h3>Bonjour ! Ça te dirait de changer les sons ? Et pourquoi pas enregistrer tes propres sons ?</h3>

                    <ol>
                        <li><b>1.</b> <span>Bien, je vais commencer par te montrer comment changer les sons. Clique sur ton lutin "Cookie" dans la zone des lutins.
                        <li><b>2.</b> <span>Clique sur l’onglet "Sons", à côté de l’onglet "Costumes". Tu peux voir les deux sons "chomp" et "buzz whir".
                        <li><b>3.</b> <span>Clique sur la première icône avec le haut-parleur pour choisir un son dans la bibliothèque.
                        <li><b>4.</b> <span>Les sons sont classés par catégorie, clique sur la catégorie à gauche pour voir les sons de cette catégorie. Utilise la barre de défilement à droite pour parcourir la bibliothèque.
                        <li><b>5.</b> <span>Pour écouter un son, clique sur l’icône avec le petit triangle noir. Pour sélectionner un son, clique sur le son de ton choix et ensuite clique sur le bouton OK, en bas à droite de la fenêtre.
                        <li><b>6.</b> <span>Ensuite retourne dans l’onglet "Scripts" et change le son dans le bloc "jouer le son &lt;….> jusqu’au bout". Clique sur le petit triangle noir et choisis le son que tu as choisi dans la bibliothèque.
                        <li><b>7.</b> <span>Clique sur le drapeau vert pour tester ton jeu avec ton nouveau son.
                        <li><b>8.</b> <span>Et si tu enregistrais ton propre son ? Retourne sur l’onglet "Sons" et clique sur la seconde icône avec le micro. Tu vois, un nouveau son a été créé.
                        <li><b>9.</b> <span>Avant d’enregistrer ton son, je vais t’expliquer à quoi servent les 3 boutons :
                    <br>- le premier avec la flèche permet d’écouter le son.
                    <br>- le second avec le carré permet d’arrêter la lecture ou l’enregistrement.
                    <br>- le troisième avec le rond permet d’enregistrer le son.
                        <li><b>10.</b> <span>Clique sur le 3ème bouton pour commencer à enregistrer ton son. Autorise l’ordinateur à accéder au microphone en cliquant sur le bouton "Autoriser". Clique sur le bouton "Stop" pour arrêter ton enregistrement. Tu peux écouter ton son en cliquant sur la 1ère icône avec la flèche.
                        <li><b>11.</b> <span>Pour modifier ton son, tu peux sélectionner une partie du son avec ta souris et sélectionner "supprimer" dans le menu "Edition".
                        <li><b>12.</b> <span>Quand tu es content de ton son, renomme-le : clique dans le champ au dessus et donne-lui un nom explicite pour te souvenir ce que c’est.
                        <li><b>13.</b> <span>N’oublie pas de retourner dans ton script pour changer le son dans ton bloc "jouer le son &lt;…> jusqu’au bout. Clique sur le drapeau vert pour tester.
                        <li><b>14.</b> <span>Amuse-toi à enregistrer et changer tes sons !

                    </ol>

                    <p>On se retrouve demain pour continuer notre jeu !

                </div>

                <br> <br> <br> <br>

                Réalisé en partenariat avec
                <a href="http://www.techkidsacademy.com/" target=_blank><img src="img/techkids.png" height=12></a>

                <img class="popin-tomorrow" src="img/rdv-demain.png">

                <br>

                <div class="return-popin" onclick="popincloseclick()">Retour au calendrier</div>

            </div>


            <div class="popin" id="popin16">

                <iframe src="https://player.vimeo.com/video/195780591" width="900" height="506" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

                <div class="popin-left">
                    <img src="img/dino1.jpg">
                </div>

                <div class="popin-right">
                    <h3>Bonjour ! Aujourd’hui je te propose de compter le nombre de cookies qu’on réussit à manger. On va marquer un point à chaque fois qu’on mange un cookie et perdre un point quand on touche un rocher.</h3>

                    <ol>
                        <li><b>1.</b> <span>Pour compter le nombre de cookies, nous allons créer un compteur, c’est ce qu’on appelle en informatique, une variable. Pour créer une variable, clique sur la palette "Données" (couleur orange) et clique sur le bouton "Créer une variable".
                        <li><b>2.</b> <span>Tape le nom de ta variable dans la case : "cookies", puis clique sur le bouton OK.
                        <li><b>3.</b> <span>Voilà, le nombre de cookies s’est affiché en haut à gauche de la scène.
                        <li><b>4.</b> <span>Bien, au début du jeu, combien de cookies avons-nous ? Zéro exactement. Nous allons donc mettre le nombre de cookies à zéro au début du jeu. Clique sur le lutin "Cookies" dans la zone des lutins, puis depuis la palette "Données", glisse et dépose le bloc mettre &lt;cookies> à (0) sous le bloc quand drapeau vert est cliqué.
                        <li><b>5.</b> <span>Maintenant, on va faire en sorte qu’à chaque fois qu’on mange un cookie, on gagne 1 point. Glisse et dépose le bloc "ajouter à &lt;cookies> (1)" dans la première partie du bloc "si &lt;…> alors", juste en dessous de "si (costume > 3) alors".
                        <li><b>6.</b> <span>Clique sur le drapeau vert pour vérifier qu’à chaque fois que ton skieur touche un cookie, alors tu gagnes 1 point.
                        <li><b>7.</b> <span>Bien, est-ce que tu pourrais faire perdre un point lorsqu’on touche un rocher ? Allez, je t’aide un peu. Glisse et dépose le bloc "ajouter à &lt;cookies> (1)" dans la seconde partie du bloc "si &lt;…> alors … sinon", juste au dessus du bloc "jouer le son &lt;…> jusqu’au bout" et remplace 1 par -1 pour faire perdre des points.
                        <li><b>8.</b> <span>Attention, maintenant quand tu touches un rocher tu perds un point ! Bien sûr tu peux modifier les valeurs pour faire gagner ou perdre plus ou moins de points.
                        <li><b>9.</b> <span>Ummm, regarde ce qui se passe si tu touches beaucoup de rochers… le nombre de cookies devient négatif. Pour corriger cela, nous allons ajouter une condition. Depuis la palette "Contrôle", glisse et dépose le bloc "si &lt;…> alors" et entoure le bloc "ajouter à &lt;cookies> (-1)".
                        <li><b>10.</b> <span>On a besoin que le nombre de cookies soit toujours supérieur à zéro, on va donc ajouter cette condition. Depuis la palette "Opérateurs", glisse et dépose à l’intérieur de la case conditionnelle le bloc "( ) > ( )". Ensuite clique sur la palette "Données" et glisse à l’intérieur de la première case le petit bloc "cookies". Saisis dans la seconde case "0".
                        <li><b>11.</b> <span>Clique sur le drapeau vert pour tester, voilà !

                    </ol>

                    <p>On se retrouve très prochainement pour améliorer notre jeu !

                </div>

                <br> <br> <br> <br>

                Réalisé en partenariat avec
                <a href="http://www.techkidsacademy.com/" target=_blank><img src="img/techkids.png" height=12></a>

                <img class="popin-tomorrow" src="img/rdv-demain.png">

                <br>

                <div class="return-popin" onclick="popincloseclick()">Retour au calendrier</div>

            </div>


            <div class="popin" id="popin17">

                <div class="popin-info full">
                    <h3>C'est le Quiz du week-end !</h3>
                    Trouve la bonne réponse au quiz du weekend pour augmenter tes chances de gagner des cadeaux !
                </div>

                <div class="popin-left">
                    <img src="img/quiz/dino-qwant.jpg">
                </div>

                <br> <br>

                <div class="popin-right">
                    <div class="quiz">
                        <h3>Dans quel pays y a-t-il le plus gros pourcentage d'internautes ?</h3>
                        <ol>
                            <li class=correct onclick="quizclick(this, correct17, wrong17, tick17_1)">
                                <span class="tick" id=tick17_1></span>En Norvège
                            <li class=wrong onclick="quizclick(this, correct17, wrong17, tick17_2)">
                                <span class="tick" id=tick17_2></span>En France
                            <li class=wrong onclick="quizclick(this, correct17, wrong17, tick17_3)">
                                <span class="tick" id=tick17_3></span>Aux USA
                        </ol>
                    </div>
                </div>

                <div class="popin_answer_correct" id=correct17>
                    <img src="img/quiz/icone-true.jpg">
                    <h2>Félicitations !</h2>
                    Tu as trouvé la bonne réponse ! <br> Trouve plus d'informations sur la réponse
                    <a href="https://www.qwantjunior.com/?q=pourcentage%20internautes%20par%20pays&t=web" target=_blank>en cliquant ici</a>.
                </div>

                <div class="popin_answer_wrong" id=wrong17>
                    <img src="img/quiz/icone-wrong.jpg">
                    <h2>Dommage !</h2>
                    Ce n'est pas la bonne réponse, retente ta chance ! <br> Trouve plus d'informations sur la réponse
                    <a href="https://www.qwantjunior.com/?q=pourcentage%20internautes%20par%20pays&t=web" target=_blank>en cliquant ici</a>.
                </div>

                <br> <img src="img/junior-account-spacer.png"> <br>

                <img class="popin-tomorrow" src="img/rdv-demain.png"> <br> <br>
            </div>


            <div class="popin" id="popin18">
                <div class="popin-info full">
                    <h3>C'est le Quiz du week-end !</h3>
                    Trouve la bonne réponse au quiz du weekend pour augmenter tes chances de gagner des cadeaux !
                </div>

                <div class="popin-left">
                    <img src="img/quiz/dino-qwant.jpg">
                </div>

                <br> <br>

                <div class="popin-right">
                    <div class="quiz">
                        <h3>Lequel des trois est un moteur de recherche ?</h3>
                        <ol>
                            <li class=wrong onclick="quizclick(this, correct18, wrong18, tick18_1)">
                                <span class="tick" id=tick18_1></span>Firefox
                            <li class=correct onclick="quizclick(this, correct18, wrong18, tick18_2)">
                                <span class="tick" id=tick18_2></span>Qwant
                            <li class=wrong onclick="quizclick(this, correct18, wrong18, tick18_3)">
                                <span class="tick" id=tick18_3></span>Chrome
                        </ol>
                    </div>
                </div>

                <div class="popin_answer_correct" id=correct18>
                    <img src="img/quiz/icone-true.jpg">
                    <h2>Félicitations !</h2>
                    Tu as trouvé la bonne réponse ! <br> Trouve plus d'informations sur la réponse
                    <a href="https://www.qwantjunior.com/?q=qwant&t=web" target=_blank>en cliquant ici</a>.
                </div>

                <div class="popin_answer_wrong" id=wrong18>
                    <img src="img/quiz/icone-wrong.jpg">
                    <h2>Dommage !</h2>
                    Ce n'est pas la bonne réponse, retente ta chance ! <br> Trouve plus d'informations sur la réponse
                    <a href="https://www.qwantjunior.com/?q=qwant&t=web" target=_blank>en cliquant ici</a>.
                </div>

                <br> <img src="img/junior-account-spacer.png"> <br>

                <img class="popin-tomorrow" src="img/rdv-demain.png"> <br> <br>
            </div>


            <div class="popin" id="popin19">

                <div class="popin-info">
                    <h3>Avant de commencer cette étape :</h3>
                    Télécharge le paysage nocturne de ton jeu
                    <br><b><a href="img/day19/Nuit.svg" download>en cliquant ici</a></b> et enregistre-le sur ton ordinateur.
                </div>

                <iframe src="https://player.vimeo.com/video/195930814" width="900" height="506" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

                <div class="popin-left">
                    <img src="img/dino1.jpg">
                </div>

                <div class="popin-right">
                    <h3>Bonjour ! On a bien avancé dans notre jeu, aujourd’hui on va faire en sorte que lorsqu’on a ramassé 10 cookies alors on passe au monde de la nuit.</h3>

                    <ol>
                        <li><b>1.</b> <span>Commence par télécharger sur ton ordinateur le fichier du paysage de la nuit <b><a href="img/day19/Nuit.svg" download>en cliquant ici</a></b>.
                        <li><b>2.</b> <span>Clique sur la 3ème icône sous la vignette des arrière-plans et sélectionne le fichier nuit.svg pour l’importer dans ton jeu Scratch. Tu as maintenant 2 arrière-plans : jour et nuit.
                        <li><b>3.</b> <span>Nous allons créer un nouveau script sur les arrière-plans pour basculer entre le jour et la nuit. Démarre un nouveau script avec le bloc "quand le drapeau vert est cliqué". Puis depuis la palette "Apparence", glisse et dépose l’un en dessous de l’autre, deux blocs "basculer sur l’arrière-plan &lt;…>". Sélectionne "jour" dans le premier bloc et "nuit" dans le second.
                        <li><b>4.</b> <span>Parfait ! Je te rappelle que si notre skieur ramasse 10 cookies alors on bascule sur la nuit. Aurais-tu une idée de comment nous pourrions faire cela ? … Commençons par créer le test conditionnel : clique sur la palette "Contrôle" et glisse le bloc "répéter indéfiniment" en dessous du bloc "basculer sur l’arrière-plan &lt;jour>" en entourant le bloc "basculer sur l’arrière-plan &lt;nuit>". Ajoute ensuite le bloc "si &lt;…> alors" à l’intérieur de cette boucle, en entourant le bloc "basculer sur l’arrière-plan &lt;nuit>".
                        <li><b>5.</b> <span>La condition est "cookies > 10", nous avons vu la dernière fois comment créer ce type de condition, est-ce que tu te souviens ? Depuis la palette "Opérateurs", glisse et dépose le bloc "( ) > ( )". Dans la première case, mets le bloc cookies (palette "Données") et dans la seconde case, saisis 10.
                        <li><b>6.</b> <span>Avant de tester, nous allons arrêter ce script. Depuis la palette "Contrôle", glisse et dépose le bloc "stop &lt;tout>" sous le bloc "basculer sur l’arrière-plan &lt;nuit>" et sélectionne ce script dans le menu déroulant.
                        <li><b>7.</b> <span>Voilà, tu peux cliquer sur le drapeau vert pour tester !
                        <li><b>8.</b> <span>Ramasse 10 cookies pour passer au monde de la nuit.
                        <li><b>9.</b> <span>Bien sûr, tu peux t’amuser à changer le nombre de cookies à ramasser.

                    </ol>

                    <p>Bonne chance et à demain !

                </div>

                <br> <br> <br> <br>

                Réalisé en partenariat avec
                <a href="http://www.techkidsacademy.com/" target=_blank><img src="img/techkids.png" height=12></a>

                <img class="popin-tomorrow" src="img/rdv-demain.png">

                <br>

                <div class="return-popin" onclick="popincloseclick()">Retour au calendrier</div>

            </div>


            <div class="popin" id="popin20">

                <iframe src="https://player.vimeo.com/video/196260996" width="900" height="506" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

                <div class="popin-left">
                    <img src="img/dino1.jpg">
                </div>

                <div class="popin-right">
                    <h3>Bonjour ! Tu as vu comme c’est joli dans la nuit ? Nous allons sublimer notre décor en allumant le chalet et notre sapin de Noël.</h3>

                    <ol>
                        <li><b>1.</b> <span>Au début du jeu, le chalet est éteint, il s’allume lorsqu’il fait nuit. Clique sur la vignette du chalet dans la zone des lutins et clique ensuite sur l’onglet "Costumes". Tu vois, notre chalet a deux costumes : un costume pour le jour avec les lumières éteintes et un costume pour la nuit, où ses lumières sont allumées.
                        <li><b>2.</b> <span>Bien, retourne dans l’onglet "Scripts". Continue ton premier script : clique sur la palette "Apparence" et glisse et dépose le bloc "basculer sur le costume &lt;…>", sous le bloc "aller à x : 200 y : 95". Clique sur le petit triangle noir et sélectionne "Chalet Jour" dans le menu déroulant.
                        <li><b>3.</b> <span>Démarre un nouveau script en dessous du premier. Clique sur la palette "Evénements" et démarre ton script avec le bloc "quand l’arrière-plan bascule sur &lt;Nuit>". Vérifie que l’arrière-plan "nuit" est bien sélectionné dans le menu déroulant.
                        <li><b>4.</b> <span>Retourne dans la palette Apparence, glisse et dépose en dessous le bloc "basculer sur le costume &lt;…>" et choisis "Chalet Nuit" dans le menu déroulant, pour que les lumières du chalet s’allument à la nuit tombée !
                        <li><b>5.</b> <span>Clique sur le drapeau vert pour vérifier que les lumières du chalet s’allument lorsqu’il fait nuit. Bravo !
                        <li><b>6.</b> <span>Que dirais-tu d’illuminer notre sapin de Noël maintenant ? Dans la zone des lutins, clique la vignette des Décorations du sapin. Nous allons créer une animation pour changer les couleurs des boules du sapin… on aura l’impression que notre sapin clignote de mille feux !
                        <li><b>7.</b> <span>On va donc faire clignoter notre sapin toute la nuit. Démarre un nouveau script (sur le lutin Décorations) avec le bloc "quand l’arrière-plan bascule sur &lt;Nuit>". Depuis la palette "Contrôle", glisse et dépose en dessous le bloc "répéter indéfiniment", et ajoute à l’intérieur le bloc "attendre (1) secondes".
                        <li><b>8.</b> <span>Clique maintenant sur la palette "Apparence" et glisse et dépose le bloc "ajouter à l’effet couleur (25)", sous le bloc "attendre (1) secondes".
                        <li><b>9.</b> <span>Clique sur le drapeau vert pour voir l’effet lumineux sur ton sapin. Amuse-toi à changer le chiffre dans le bloc "ajouter à l’effet couleur (25)", essaie avec 50 par exemple.
                        <li><b>10.</b> <span>Tu veux qu’il clignote plus vite ? Pas de souci, il te suffit de diminuer le délai d’attente dans le bloc attendre (1) secondes. Essaie avec 0.5 (pas de virgule).
                        <li><b>11.</b> <span>Lance ton jeu pour profiter de tous tes effets lumineux, sympa, non ?
                    </ol>

                    <p>Voilà, c’est tout pour aujourd’hui, rendez-vous demain pour la suite de ton jeu !

                </div>

                <br> <br> <br> <br>

                Réalisé en partenariat avec
                <a href="http://www.techkidsacademy.com/" target=_blank><img src="img/techkids.png" height=12></a>

                <img class="popin-tomorrow" src="img/rdv-demain.png">

                <br>

                <div class="return-popin" onclick="popincloseclick()">Retour au calendrier</div>

            </div>


            <div class="popin" id="popin21">

                <iframe src="https://player.vimeo.com/video/196441251" width="900" height="506" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

                <div class="popin-left">
                    <img src="img/dino1.jpg">
                </div>

                <div class="popin-right">
                    <h3>Bonjour ! Aujourd’hui, nous allons améliorer l’animation de notre bonhomme de neige et faire en sorte qu’il nous salue avec son chapeau lorsqu’il fait nuit.</h3>

                    <ol>
                        <li><b>1.</b> <span>Commence par cliquer sur le lutin bonhomme de neige dans la zone des lutins et clique sur l’onglet "Scripts".
                        <li><b>2.</b> <span>Démarre un nouveau script avec le bloc "quand l’arrière-plan bascule sur &lt;Nuit>".
                        <li><b>3.</b> <span>On va arrêter l’autre script du lutin avant de démarrer notre nouvelle animation. Clique sur la palette "Contrôle" et glisse et dépose le bloc stop &lt;tout>. Clique sur le petit triangle noir et sélectionne "autres scripts du lutin" dans le menu déroulant.
                        <li><b>4.</b> <span>Ensuite glisse en dessous le bloc "répéter indéfiniment" et place deux blocs "attendre (1) secondes" à l’intérieur de ta boucle.
                        <li><b>5.</b> <span>Clique maintenant sur la palette "Apparence", et place un bloc "basculer sur costume &lt;…>" au-dessus de chaque bloc "attendre (1) secondes".
                        <li><b>6.</b> <span>Choisis le costume "bonhomme-de-neige-9" dans le premier bloc et "bonhomme-de-neige10" dans le second bloc.
                        <li><b>7.</b> <span>Clique sur le drapeau vert pour voir ton bonhomme de neige te saluer de son chapeau !
                    </ol>

                    <p>Voilà, c’est tout pour aujourd’hui ! Rendez-vous demain… on approche de la fin !

                </div>

                <br> <br> <br> <br>

                Réalisé en partenariat avec
                <a href="http://www.techkidsacademy.com/" target=_blank><img src="img/techkids.png" height=12></a>

                <img class="popin-tomorrow" src="img/rdv-demain.png">

                <br>

                <div class="return-popin" onclick="popincloseclick()">Retour au calendrier</div>

            </div>


            <div class="popin" id="popin22">

                <div class="popin-info">
                    <h3>Avant de commencer cette étape :</h3>
                    Télécharge le traineau
                    <b><a href="img/day22/Traineau.sprite2" download>en cliquant ici</a></b> et enregistre-le sur ton ordinateur.
                </div>

                <iframe src="https://player.vimeo.com/video/196545084" width="900" height="506" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

                <div class="popin-left">
                    <img src="img/dino1.jpg">
                </div>

                <div class="popin-right">
                    <h3>Bonjour ! Super, notre jeu est bientôt terminé, mais nous avons besoin d’une fin. Je te propose d’ajouter le traineau du père Noël qui apparaitra dans le ciel lorsqu’on aura ramassé 20 cookies.</h3>

                    <ol>
                        <li><b>1.</b>
                            <span>Commence par télécharger le fichier Traineau.sprite2 sur ton ordinateur <b><a href="img/day22/Traineau.sprite2" download>en cliquant ici</a></b>.
                        <li><b>2.</b> <span>Ensuite importe dans Scratch le traineau du père Noël comme lutin.
                        <li><b>3.</b> <span>On va cacher le traineau au début du jeu et l’afficher uniquement lorsqu’on a ramassé 20 cookies. Démarre ton script avec le bloc "quand drapeau vert est cliqué" et glisse en dessous un bloc "cacher" et un bloc "montrer" (palette "Apparence").
                        <li><b>4.</b> <span>Est-ce que tu te souviens comment créer la condition « si cookies = 20 alors » ? Depuis la palette "Contrôle", prends le bloc "si &lt;…> alors" et entoure le bloc "montrer". Ensuite entoure le bloc "si &lt;…> alors" avec le bloc "répéter indéfiniment" pour vérifier ta condition tout le long du jeu. Il ne reste plus qu’à ajouter la condition "( ) = ( )" (palette "Opérateurs") dans la case conditionnelle et enfin d’ajouter la variable cookies ("Données") dans la première case et de saisir 20 dans la seconde case.
                        <li><b>5.</b> <span>Clique sur le drapeau vert pour vérifier que le traineau s’affiche bien lorsque tu as réussi à attraper 20 cookies.
                        <li><b>6.</b> <span>Pas mal, mais ça manque un peu d’animation ! Et si nous faisions traverser notre traineau à travers le ciel ? Commençons par le placer en haut à droite de la scène. Clique sur la palette "Mouvement" et glisse et dépose le bloc "aller à x : ( ) y : ( )" sous le bloc "montrer". Saisis les valeurs suivantes : x = 290 et y = 145.
                        <li><b>7.</b> <span>Faisons-le maintenant doucement glisser vers la gauche de la scène. Toujours depuis la palette "Mouvement", glisse et dépose le bloc "glisser en (1) secondes à x : ( ) y : ( )", sous le bloc aller "à x : 290 y : 145".
                        <li><b>8.</b> <span>Remplace 1 par 5 secondes. Puis remplace les valeurs de x et y : x = -50 et y : 145.
                        <li><b>9.</b> <span>Ajoutons maintenant un petit effet sonore : clique sur la palette "Sons" et glisse et dépose le bloc "jouer le son &lt;grelots>" juste au dessus du bloc "montrer".
                        <li><b>10.</b> <span>Clique sur le drapeau vert pour vérifier que le traineau du père du Noël glisse bien de la droite vers la gauche…. Entends-tu les petits grelots du traineau ?
                    </ol>

                    <p>Bravo pour cette superbe animation, à demain !

                </div>

                <br> <br> <br> <br>

                Réalisé en partenariat avec
                <a href="http://www.techkidsacademy.com/" target=_blank><img src="img/techkids.png" height=12></a>

                <img class="popin-tomorrow" src="img/rdv-demain.png">

                <br>

                <div class="return-popin" onclick="popincloseclick()">Retour au calendrier</div>

            </div>


            <div class="popin" id="popin23">

                <div class="popin-info">
                    <h3>Avant de commencer cette étape :</h3>
                    Télécharge le dessin des cadeaux <b><a href="img/day23/Cadeaux.sprite2" download>en cliquant ici</a></b> et enregistre-le sur ton ordinateur.
                </div>

                <iframe src="https://player.vimeo.com/video/196696273" width="900" height="506" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

                <div class="popin-left">
                    <img src="img/dino1.jpg">
                </div>

                <div class="popin-right">
                    <h3>Bonjour ! Et bien, le temps est passé bien vite, c’est déjà la fin de notre jeu. Mais ne t’inquiète pas, je te réserve une belle surprise pour cette veille de Noël !</h3>

                    <p>

                    <ol>
                        <li><b>1.</b>
                            <span>N’oublie pas de télécharger sur ton ordinateur le fichier Cadeaux.sprite2 <b><a href="img/day23/Cadeaux.sprite2" download>en cliquant ici</a></b>.
                        <li><b>2.</b> <span>Nous allons faire parler notre père Noël et lui dire d’envoyer à tous les lutins le message "noel". Clique sur le lutin Traineau.
                        <li><b>3.</b> <span>Clique ensuite sur la palette "Evénements" et glisse et dépose le bloc "envoyer à tous &lt;message1>" sous le bloc "glisser en (5) secondes à x : -50 y : 145". Clique sur le petit triangle noir et sélectionne "nouveau message" dans le menu. Saisis "noel" dans la case et clique sur le bouton OK.
                        <li><b>4.</b> <span>Clique maintenant sur la palette "Apparence" et glisse et dépose en dessous le bloc "dire (Hello !) pendant (2) secondes". Remplace "Hello !" par le message de ton choix, par exemple : "Joyeux Noël à tous !", qui s’affichera dans la petite bulle de dialogue.
                        <li><b>5.</b> <span>Clique sur le drapeau vert pour vérifier que ton message s’affiche correctement.
                        <li><b>6.</b> <span>Et maintenant la surprise, une pluie de cadeaux ! Importe dans Scratch le lutin Cadeaux.
                        <li><b>7.</b> <span>Au début du jeu, on va cacher les cadeaux et les mettre en tout petit… ils ne devront s’afficher que lorsqu’ils auront reçu le message du noel du père Noël. Vérifie que tu sois bien sur le lutin Cadeaux et démarre ton script avec le bloc "quand drapeau vert est cliqué".
                        <li><b>8.</b> <span>Depuis la palette "Apparence", glisse et dépose le bloc cacher, puis le bloc "mettre à (100%) de la taille initiale" et remplace 100 par 10 pour réduire la taille de ton lutin.
                        <li><b>9.</b> <span>Nous allons avoir besoin d’un second script pour la pluie de cadeaux. Clique sur la palette "Evénements" et glisse et dépose le bloc "quand je reçois &lt;noel> sous le premier script des cadeaux.
                        <li><b>10.</b> <span>Glisse en dessous le bloc "montrer pour afficher les cadeaux" et place-les à x : 0 et y : 145.
                        <li><b>11.</b> <span>Occupons-nous maintenant de l’animation finale. Nous allons faire progressivement grossir les cadeaux pour afficher le message "Joyeux Noël" au milieu de l’écran.
					<br>- Depuis la palette "Contrôle", glisse et dépose le bloc "répéter (10 fois)", sous le bloc "aller à x : 0 y : 145" et remplace 10 par 15.
					<br>- Depuis la palette "Apparence", ajoute à l’intérieur le bloc "ajouter (10) à taille", pour réduire la taille des cadeaux.
					<br>- Depuis la palette "Mouvement", glisse et dépose en dessous le bloc "ajouter (10) à y" (attention ne confonds pas avec "ajouter 10 à x") et remplace 10 par -20 pour faire descendre les cadeaux vers le bas de la scène. 
					<br>- Termine avec une petite pause de 0.1 secondes.
                        <li><b>12.</b> <span>Une fois que l’animation terminée, nous devons arrêter le jeu. Depuis la palette "Contrôle", glisse et dépose le bloc "stop &lt;tout>" sous le bloc "répéter (15) fois".
                    </ol>

                    <p>Clique sur le drapeau vert pour admirer le grand final !

                </div>

                <br> <br> <br> <br>

                Réalisé en partenariat avec
                <a href="http://www.techkidsacademy.com/" target=_blank><img src="img/techkids.png" height=12></a>

                <img class="popin-tomorrow" src="img/rdv-demain.png">

                <br>

                <div class="return-popin" onclick="popincloseclick()">Retour au calendrier</div>

            </div>


            <div class="popin" id="popin24">

                <br> <br> <br> <br>
                Les gagnants ont été tirés au sort et seront rapidement contactés par e-mail.
                <br>
                <br>
                <b><a href=" https://blog.qwant.com/surveillez-vos-boites-mails-les-gagnants-du-calendrier-de-lavent-sont-tombes/">Retrouvez toutes les infos sur le blog</a></b>.
                <br>
                <br>
                Merci à tous pour votre participation !
              
                <br> <br> <br> <br>
                <br> <br> <br> <br>
                <br> <br> <br> <br>
                <br> <br> <br> <br>
                <br> <br> <br> <br>
                <br> <br> <br> <br>

                <div class="return-popin" onclick="popincloseclick()">Retour au calendrier</div>

            </div>


        </div>
    <?php } ?>

</div>

<footer>
    <img src="img/dino.png">
    <p>
        Besoin d'aide? N'hésite pas à nous contacter en <b><a href="mailto:calendrier@qwantjunior.com">cliquant ici</a></b> !
    <p><b><a href="legal" target=_blank>Mentions légales</a></b>
</footer>

<script src=script.js></script>