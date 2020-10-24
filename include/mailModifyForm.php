<!-- formulaire changement de mail -->

<div class="row">
    <div class="col-sm col-lg-6">
        <form action="" class="text-center" method="POST">
            <input type="hidden" name="modify" value="mail">
            <label for="newEmailUser">Nouvel e-mail :</label>
            <span class="d-block error-parameter"><?= isset($errorEmail['newEmailUser']) ? $errorEmail['newEmailUser'] : '' ?></span>
            <input type="email" id="newEmailUser" class="form-control" name="newEmailUser">
            <label for="verifyNewEmailUser">Confirmation du nouvel e-mail :</label>
            <span class="d-block error-parameter"><?= isset($errorEmail['verifyNewEmailUser']) ? $errorEmail['verifyNewEmailUser'] : '' ?></span>
            <input type="email" id="verifyNewEmailUser" class="form-control" name="verifyNewEmailUser">
            <button class="btn btn-info btn-sm mx-auto" name="submitResetEmail" type="submit">Changer l'e-mail</button>
        </form>
    </div>
    <a href="" class="btn btn-dark btn-sm mx-auto">Annuler</a>
</div>