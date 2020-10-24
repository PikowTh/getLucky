<!-- formulaire changement de mail -->

<div class="row">
    <div class="col-sm col-lg-6">
        <form class="text-center" method="post">
            <label for="newEmailUser">Nouvel e-mail :</label>
            <input type="email" id="newEmailUser" class="form-control mb-4" name="newEmailUser">
            <span><?= isset($errorEmail['newEmailUser']) ? $errorEmail['newEmailUser'] : '' ?></span>
            <label for="verifyNewEmailUser">Confirmation du nouvel e-mail :</label>
            <input type="email" id="verifyNewEmailUser" class="form-control mb-4" name="verifyNewEmailUser">
            <span><?= isset($errorEmail['verifyNewEmailUser']) ? $errorEmail['verifyNewEmailUser'] : '' ?></span>
            <button class="btn btn-info btn-sm" name="submitResetEmail" type="submit">Changer l'e-mail</button>
        </form>        
    </div>
    <a href="" class="btn btn-dark btn-sm mx-auto">Annuler</a>
</div>