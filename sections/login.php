<form id="loginForm" method="post">
    <div class="form-group">
        <label for="user_identifiant">Identifiant :</label>
        <input type="text" class="form-control" id="user_identifiant" name="user_identifiant" minLength="5" maxLength="5" pattern="\d{5}" title="Cinq chiffres requis" required>
    </div>
    <div class="form-group">
        <label for="password">Mot de passe :</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary">Se connecter</button>
</form>