<form id="formregister" action="" method="post">
    <!-- mail input -------------------------------------- -->
    <div class="row justify-content-center">
        <div class="col-10">
            <label for="Mail"><i class="fas fa-chess-knight"></i> Email</label><input type="mail" placeholder="votre@mail.com" id="Mail" name="Mail" class="form-control rounded-pill" value="<?= isset($_POST['Mail']) ? htmlspecialchars($_POST['Mail']) : '' ?>">
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-10 text-center">
            <div class="msg-error"><span class="font-italic white-text"><?= (isset($error['Mail'])) ? $error['Mail'] : '' ?><span></div>
        </div>
    </div>

    <!-- pseudo input ----------------------------------------------------- -->
    <div class="row justify-content-center">
        <div class="col-10">
            <label for="Pseudo"><i class="fas fa-chess-bishop"></i> Pseudo</label><input type="text" placeholder="pseudo" id="Pseudo" name="Pseudo" class="form-control rounded-pill" value="<?= isset($_POST['Pseudo']) ? htmlspecialchars($_POST['Pseudo']) : '' ?>">
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-10 text-center">
            <div class="msg-error"><span class="font-italic white-text"><?= (isset($error['Pseudo'])) ? $error['Pseudo'] : '' ?><span></div>
        </div>
    </div>

    <!-- phone input --------------------------------------------------------- -->
    <div class="row justify-content-center">
        <div class="col-10">
            <label for="PhoneNumber"><i class="fas fa-chess-king"></i> N° de Tél</label><input type="phone" placeholder="0612457896" id="PhoneNumber" name="PhoneNumber" class="form-control rounded-pill" value="<?= isset($_POST['PhoneNumber']) ? htmlspecialchars($_POST['PhoneNumber']) : '' ?>">
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-10 text-center">
            <div class="msg-error"><span class="font-italic white-text"><?= (isset($error['PhoneNumber'])) ? $error['PhoneNumber'] : '' ?><span></div>
        </div>
    </div>

    <!-- birthday input ------------------------------------------------------------ -->
    <div class="row justify-content-center">
        <div class="col-10">
            <label for="BirthDate"><i class="fas fa-chess-rook"></i> Date de naissance</label><input type="date" placeholder="date de naissance" id="BirthDate" name="BirthDate" class="form-control rounded-pill" value="<?= isset($_POST['BirthDate']) ? htmlspecialchars($_POST['BirthDate']) : '' ?>">
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-10 text-center">
            <div class="msg-error"><span class="font-italic white-text"><?= (isset($error['BirthDate'])) ? $error['BirthDate'] : '' ?><span></div>
        </div>
    </div>

    <!-- Mot de passe input ----------------------------------------------------------------------- -->
    <div class="row justify-content-center">
        <div class="col-10">
            <label for="Password"><i class="fas fa-chess"></i> Mot de passe</label><input type="password" placeholder="mot de passe" id="Password" name="Password" class="form-control rounded-pill" value="<?= isset($_POST['Password']) ? htmlspecialchars($_POST['Password']) : '' ?>">
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-10 text-center">
            <div class="msg-error"><span class="font-italic white-text"><?= (isset($error['Password'])) ? $error['Password'] : '' ?><span></div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-10">
            <input type="password" placeholder="vérification mot de passe" id="VerifPassword" name="VerifPassword" class="form-control rounded-pill" value="<?= isset($_POST['VerifPassword']) ? htmlspecialchars($_POST['VerifPassword']) : '' ?>">
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-10 text-center">
            <div class="msg-error"><span class="font-italic white-text"><?= (isset($error['VerifPassword'])) ? $error['VerifPassword'] : '' ?><span></div>
        </div>
    </div>

    <!-- CAPTCHA GOOGLE -------------------------------- -->
    <div class="row justify-content-center">
        <div class="g-recaptcha testcaptcha ml-1" data-sitekey="6LfCfMAZAAAAAJJ_sr8K8LJJWybh2YJG3feJV9Ip"></div>
    </div>

    <!-- bouton submit ------------------------------------------- -->
    <div class="row justify-content-center">
        <button type="submit" id="Register-submit" name="Register-submit" class="btn btn-indigo col-9 mt-3">Je m'inscris !</button>
    </div>

</form>