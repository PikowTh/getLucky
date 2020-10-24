<!-- formulaire changement de mot de passe -->

<div class="row">
    <div class="col-sm col-lg-6">
        <form action="" class="text-center" method="POST">
            <input type="hidden" name="modify" value="password">
            <span><?= $message ?></span></br>
            <label for="passwordUser">Ancien Mot de Passe :</label>
            <input type="password" id="passwordUser" class="form-control mb-4" name="passwordUser">
            <span><?= isset($errorPassword['passwordUser']) ? $errorPassword['passwordUser'] : '' ?></span>
            <label for="newPasswordUser">Nouveau Mot de Passe :</label>
            <input type="password" id="newPasswordUser" class="form-control mb-4" name="newPasswordUser">
            <span><?= isset($errorPassword['newPasswordUser']) ? $errorPassword['newPasswordUser'] : '' ?></span>
            <label for="verifyNewPasswordUser">Confirmation nouveau Mot de Passe :</label>
            <input type="password" id="verifyNewPasswordUser" class="form-control mb-4" name="verifyNewPasswordUser">
            <span><?= isset($errorPassword['verifyNewPasswordUser']) ? $errorPassword['verifyNewPasswordUser'] : '' ?></span>
            <button class="btn btn-info btn-sm" name="submitResetPassword" type="submit">Changer le Mot de Passe</button>
        </form>
    </div>
    <a href="" class="btn btn-dark btn-sm mx-auto">Annuler</a>
</div>