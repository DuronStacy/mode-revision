<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Quizz</title>
     <!--Importer Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Importer materialize.css-->
      <!--<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>!-->
      <link rel="stylesheet" type="text/css" href="style.css">

      <!--blabla optimisé pour mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
	<section class="exo">

        <h1>Révision : Multiplications</h1> <br>
        
        <?php 
        // si la variable post existe, alors cela veut dire que le formulaire a été envoyé
        if(!empty($_POST) && isset($_POST['table'])) { 
            // on stock la valeur du formulaire dans une VARIABLE
            $latableaafficher = $_POST['table'];

            // generer un nombre alea. entre 1 et 10
            $var_question = rand(1, 10);

            if (!empty($_POST['random']) && $_POST['reponse'] != "") {
                $var_question = $_POST['random'];
            }

            // afficher la multiplication à deviner
            echo "Quel est le résultat de $latableaafficher X $var_question ? <br>";


            // verifier que la reponse est bien le resultat du nombre aleatoire * la table sélectionée  
            $resultat = $latableaafficher * $var_question;                             
            
            // si reponse est n'est pas vide
            if(!empty($_POST['reponse'])){
                // comparer reponse avec le resultat attendu
                if ($_POST["reponse"] == $resultat) {
                    echo "C'est juste :)";
                } else {
                    echo "C'est faux :(";
                }
            }
            //var_dump($_POST['reponse']); 
        } ?>

        <form method="POST" action="index.php">
            <select name="table">
                <?php
                    for ($i = 1; $i <= 10 ; $i++) {   
                        $isSelected = "";
                        if ($i == $_POST['table']) {
                            $isSelected = "selected";
                        }
                        echo '<option value="'.$i.'" '.$isSelected.'>Table de '.$i.'</option>';
                    }
                ?>
            </select>
            <input name="reponse" type="text" id="input" value= "<?php if (isset($_POST['reponse'])) { 'reponse' == $_POST['reponse']; } //echo $_POST['reponse']; ?>">
            <input type="hidden" name="random" value="<?php echo $var_question ?>">
            <input type="submit" value="Valider">


            
        </form>


    </section>
    
   <!-- <script type="text/javascript" src="js/materialize.min.js"></script> !-->
</body>
</html>