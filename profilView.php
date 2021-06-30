<?php
require 'config/init.php';
include 'back/traitementProfilView.php';
?>
<div class="container">
    <?= $content; ?>
    <h2> Page profil </h2>
    <div class="info-membre">
        Name
        <span class="aff-info">
            <?= htmlspecialchars($profil->name()); ?>
        </span>
    </div>
    <div class="info-membre">
        Company Name
        <span class="aff-info">
            <?= $profil->companyName(); ?>
        </span>
    </div>
    <div class="info-membre">
        Numéro de Téléphone
        <span class="aff-info">
            <?= $profil->phone(); ?>
        </span>
    </div>
    <div class="info-membre">
        Adresse Email
        <span class="aff-info">
            <?= $profil->mail(); ?>
        </span>
    </div>
    <a href="?session=destroy"><input type="button" class="destroy-btn" value="Déconnexion"></a>
    <a href="library.php"><input type="button" value="Mes cartes"></a>
</div>
</body>

</html>