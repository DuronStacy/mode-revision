<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>

<body>

<section style="border: 1px solid black;">
<h1>Table de 3</h1>

<?php

for ($i = 1; $i <= 10 ; $i++) {
    // echo $i;
    $resultat = $i * 3;    
    echo "3 x ".$i." = ".$resultat."<br>";
}
         
?>
</section>

<section style="border: 1px solid black;">
<form method="POST" action="index.php">
    <select name="table">
        <?php
        for ($i = 1; $i <= 10 ; $i++) {    
            echo '<option value="'.$i.'">Table de '.$i.'</option>';
        }
        ?>
    </select>
    <input type="submit" value="Valider">
</form>

<?php 

// si la variable post existe, alors cela veut dire que le formulaire a été envoyé
if(!empty($_POST) && isset($_POST['table'])) {

    // on stock la valeur du formulaire dans une VARIABLE
    $latableaafficher = $_POST['table'];

    // on boucle de 1 à 10
    for ($i = 1; $i <= 10 ; $i++) {
        // on stock le resultat de la multiplication dans une VARIABLE resultat
        $resultat = $i * $latableaafficher;    

        // on affiche la ligne de la table et son resultat
        echo $latableaafficher." x ".$i." = ".$resultat."<br>";
    }
}
?>

</section>

<section style="border: 1px solid black;">
<form method="POST" action="index.php">
    <?php
        for ($i = 1; $i <= 10 ; $i++) {    
            echo '<input type="checkbox" name="tabledu[]" value="'.$i.'"> Table du '.$i.'<br>';
        }
    ?>
    <input type="submit" value="Valider">
</form>

<?php
    if(!empty($_POST) && isset($_POST['tabledu'])) {
        $lestablesaafficher = $_POST['tabledu'];

        foreach($lestablesaafficher as $latableaafficher)
        {
            for ($i = 1; $i <= 10 ; $i++) {
                // on stock le resultat de la multiplication dans une VARIABLE resultat
                $resultat = $i * $latableaafficher;    

                // on affiche la ligne de la table et son resultat
                echo $latableaafficher." x ".$i." = ".$resultat."<br>";
            }

            echo '<br>';
        }
        
    }
?>

</section>


</body>
</html>