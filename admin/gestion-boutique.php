<?php require('../inc/init.inc.php'); ?>
<?php if (!internauteEstAdmin()){
    header("location: ../connexion.php");
    exit();
}
?>
<?php require('../inc/haut.inc.php'); ?>
<h1>Formulaire Porduits</h1>
<form  method="post" action="" enctype="multipart/form-data">
    <label for="reference">Référence</label>
    <input type="text" id="reference" name="reference" placeholder="la reference du produit" >
    <button>Enregistrer le produit</button>
</form>
<?php require('../inc/bas.inc.php'); ?> 