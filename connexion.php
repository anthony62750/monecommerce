<?php require('./inc/init.inc.php'); ?>
<!-- traitement -->
<?php 
if(isset($_GET['action']) && $_GET['action'] == 'deconnexion'){
    session_destroy();
}
if(internauteEstConnecte()){
    header('location: profil.php');
}
if($_POST){
    $resultat = executeRequete("SELECT * FROM utilisateur Where pseudo='$_POST[pseudo]'");
    if($resultat->num_rows != 0){
        // traitement connexion
        $membre = $resultat->fetch_assoc();
        if(password_verify($_POST['mdp'],$membre['mot_de_passe'])) {
            // traitement 
            foreach($membre as $indice => $element){
                if($indice != 'mot_de_passe') {
                    $_SESSION['membre'][$indice] = $element;
                }
            }
            header("location: profil.php");
            // $contenu .='<div class="validation">les mots de passes correspondent</div>';
        }else {
            $contenu .='<div class="erreur"> Erreur de mdp</div>';
        }
        // si tout est bon on redirige 
        // header("location: profil.php");
    } else {
        $contenu .='<div class="erreur"> Erreur de pseudo</div>';
    }
}

?>
<?php require('./inc/haut.inc.php'); ?>
<?php echo $contenu ?>
<form method="post" action="">
    <label for="pseudo">Pseudo</label>
    <input type="text" id="pseudo" name="pseudo" placeholder="Votre pseudo">
     <label for="mdp">Mot de passe</label> 
    <input type="password" id="mdp" name="mdp" required>

    <button>Se connecter</button>
</form>
 <?php require('./inc/bas.inc.php'); ?> 