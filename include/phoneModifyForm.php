<!-- formulaire changement de téléphone -->

<div class="row">
    <div class="col-sm col-lg-6">
        <form class="text-center" method="post">
            <span><?= isset($errorPhone['emailUser']) ? $errorPhone['emailUser'] : '' ?></span>
            <label for="newPhoneUser">Nouveau Numéro de Téléphone :</label>
            <input type="phone" id="newPhoneUser" class="form-control mb-4" name="newPhoneUser">
            <span><?= isset($errorPhone['newPhoneUser']) ? $errorPhone['newPhoneUser'] : '' ?></span>
            <label for="verifyNewPhoneUser">Confirmation Nouveau Numéro de Téléphone :</label>
            <input type="phone" id="verifyNewPhoneUser" class="form-control mb-4" name="verifyNewPhoneUser">
            <span><?= isset($errorPhone['verifyNewPhoneUser']) ? $errorPhone['verifyNewPhoneUser'] : '' ?></span>
            <button class="btn btn-info btn-sm" name="submitResetPhone" type="submit">Changer le Numéro de Téléphone</button>
        </form>
    </div>
    <a href="" class="btn btn-dark btn-sm mx-auto">Annuler</a>
</div>