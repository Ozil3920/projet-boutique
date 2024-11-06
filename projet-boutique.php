<?php

// Initialisation du stock

$articles = [" Chaussettes", " T-shirts", " Chaussures", " short", "sandale "];
$quantites = [24, 15, 7, 4, 2];
$ventes = [0, 0, 0, 0, 0];

// Initialisation de la variable "choix"
$choix = 0;


while ($choix != 7) {

    // Afficher le menu

    echo "\nMenu  :\n";
    echo "1.  Afficher les articles disponibles et leurs quantités\n";
    echo "2.  Réaliser une vente\n";
    echo "3.  Réapprovisionner un article\n";
    echo "4.  Afficher l'état actuel du stock\n";
    echo "5.  Suivre les ventes totales par article\n";
    echo "6.  Supprimer un article\n";
    echo "7.  Quitter\n";

    // Initialisation du choix par l'utilisateur 

    $choix = intval(readline("Choisissez une option : "));

    // Vérification du choix 

    while ($choix < 1 || $choix > 8) {
        echo "Erreur option inconnu veuillez saisir une option comprise entre 1 et 8 ! \n";
        $choix = intval(readline("Choisissez une option : "));
    }


     

    if ($choix == 1) {
        echo "\nArticles disponibles avec leurs quantités :\n";
        for ($i = 0; $i < count($articles); $i++) {
            if ($quantites[$i] > 0) {
                echo "$i: $articles[$i] - Quantité : $quantites[$i]\n";
            }
        }
    }


     

    if ($choix == 2) {

        // Affichage du stock et de la quantité

        echo "\nArticles disponibles avec leurs quantités :\n";
        for ($i = 0; $i < count($articles); $i++) {
            echo "$i: $articles[$i] - Quantité : $quantites[$i]\n";
        }

        $index = intval(readline("Choisissez l'index de l'article à vendre : "));
        $quantiteVendue = intval(readline("Quantité vendue : "));

        if ($index >= 0 && $index < count($articles)) {
            if ($quantites[$index] >= $quantiteVendue) {
                $quantites[$index] -= $quantiteVendue; // Enlève la quantité vendue
                $ventes[$index] += $quantiteVendue; // Ajoute les nouvelles ventes 
                echo "Vente confirmée  : $quantiteVendue $articles[$index]\n";
            } else {
                echo "Stock insuffisant  pour $articles[$index].\n";
            }
        } else {
            echo "Index invalide.\n";
        }
    }

    

    if ($choix == 3) {
        echo "Quel article souhaitez-vous réapprovisionner ? : \n";

        // Affichage des articles disponibles pour réapprovisionnement 

        for ($i = 0; $i < count($articles); $i++) {
            echo "$i: $articles[$i] - Quantité : $quantites[$i]\n";
        }

        // Choix de l'article + quantités à réapprovisionner
        $index = intval(readline("Choisissez l'index de l'article que vous souhaitez réapprovisionner : "));

        $quantiteReapro = intval(readline("Quantité à réapprovisionner : "));
        $quantites[$index] += $quantiteReapro; // Rajoute la quantité réapprovisionnée 
        echo "Réapprovisionnement confirmé  : $quantiteReapro $articles[$index]\n";
    }

    

    if ($choix == 4) {
        echo "\n État actuel du stock :\n";

        for ($i = 0; $i < count($articles); $i++) {
            // Affichage de chaque article avec sa quantité
            echo "$articles[$i] - Quantité restante : $quantites[$i] \n";

            // Vérification de la rupture de stock
            if ($quantites[$i] == 0) {
                echo " $articles[$i] est en rupture de stock !\n";
                $tousEnStock = false; // On trouve un article en rupture de stock
            }
        }
    }


    
    if ($choix == 5) {
        echo "\n Suivi des ventes totales par article :\n";

        for ($i = 0; $i < count($articles); $i++) {
            // Affichage de chaque article avec la quantité vendue
            echo "$articles[$i] - Quantité vendue : $ventes[$i] \n";
        }
    }

    
    if ($choix == 6) {
        echo "Quel article souhaitez-vous supprimer ? : \n";

        // Affichage des articles disponibles pour suppression
        for ($i = 0; $i < count($articles); $i++) {
            echo "$i: $articles[$i] - Quantité : $quantites[$i]\n";
        }

        // Choix de l'article à supprimer
        $index = intval(readline("Choisissez l'index de l'article à supprimer : "));
        echo "Article supprimé avec succès  : $articles[$index]\n";

        if ($index >= 0 && $index < count($articles)) {
            // Suppression de l'article sélectionner 
            array_splice($articles, $index, 1);
            array_splice($quantites, $index, 1);
            array_splice($ventes, $index, 1);
        } else {
            echo "Index invalide. Aucune suppression effectuée ! \n";
        }
    }
}


echo "Merci de votre visite\n";
