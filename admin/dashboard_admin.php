<div class="container-fluid">
    <h1> Hellooooooo</h1>

    <!-- Formulaire de configuration des services -->
    <div class="card mb-3">
        <div class="row">
            <div class="col-md-4">
                <img src="/images/services/img_cardService_1.png" class="img-fluid rounded-start" alt="image pour la configuration des prestations">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Configuration des prestation</h5>
                    <form id="serviceConfigForm">

                        <!-- Choix du Services -->
                        <div class="mb-3">
                            <label for="name_service" class="form-label">Service</label>
                            <select class="form-select" id="name_service">
                                <option value="Mécanique">Mécanique</option>
                                <option value="Carrosserie">Carrosserie</option>
                                <option value="Maintenance">Maintenance</option>
                                <option value="Autres">Autres</option>
                            </select>
                        </div>

                        <!-- Choix de la prestation -->
                        <div class="mb-3">
                            <label for="prestation" class="form-label">Prestation</label>
                            <input class="form-control" list="datalistOptions" id="prestation">

                        </div>

                        <!-- Description de la prestation -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" rows="3"></textarea>
                        </div>

                        <!-- Prix de la prestation -->
                        <div class="mb-3">
                            <label for="prix" class="form-label">Prix</label>
                            <input type="number" class="form-control" id="prix">
                        </div>

                        <!-- Temps de la prestation -->
                        <div class="mb-3">
                            <label for="temps" class="form-label">Temps</label>
                            <input type="number" class="form-control" id="temps">
                        </div>

                        <!-- Boutons de validation -->
                        <div class="row">
                            <div class="col-md-4">
                                <button type="button" class="btn btn-primary">Creer</button>
                            </div>
                            <div class="col-md-4">
                                <button type="button" class="btn btn-danger">Supprimer</button>
                            </div>
                            <div class="col-md-4">
                                <button type="button" class="btn btn-warning">Modifier</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Formulaire de configuration des horaires -->
    <div class="card mb-3">
        <div class="row">
            <div class="col-md-4">
                <img src="/images/services/img_cardService_2.png" class="img-fluid rounded-start" alt="image pour la configuration des horaires">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Configuration des horaires</h5>
                    <form id="dailyOpeningHoursForm">

                        <!-- Choix du jour -->
                        <div class="mb-3">
                            <label for="selectedDay" class="form-label">Jours</label>
                            <select class="form-select" id="selectedDay">
                                <option value="Lundi">Lundi</option>
                                <option value="Mardi">Mardi</option>
                                <option value="Mercredi">Mercredi</option>
                                <option value="Jeudi">Jeudi</option>
                                <option value="Vendredi">Vendredi</option>
                                <option value="Samedi">Samedi</option>
                                <option value="Dimanche">Dimanche</option>
                            </select>
                        </div>

                        <!-- Heure d'ouverture le matin -->
                        <div class="mb-3">
                            <label for="openningTimeAm" class="form-label">Heure d'ouverture AM</label>
                            <input type="time" class="form-control" id="openningTimeAm">
                        </div>

                        <!-- Heure de fermeture le matin -->
                        <div class="mb-3">
                            <label for="closingTimeAM" class="form-label">Heure de fermeture AM</label>
                            <input type="time" class="form-control" id="closingTimeAM">
                        </div>

                        <!-- Heure d'ouverture l'aprem -->
                        <div class="mb-3">
                            <label for="openingTimePM" class="form-label">Heure d'ouverture PM</label>
                            <input type="time" class="form-control" id="openingTimePM">
                        </div>

                        <!-- Heure de fermeture l'aprem -->
                        <div class="mb-3">
                            <label for="closingTimePM" class="form-label">Heure de fermeture pm</label>
                            <input type="time" class="form-control" id="closingTimePM">
                        </div>

                        <!-- Fermé toute la journée -->
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="closedDay">
                            <label class="form-check-label" for="closedDay">Fermé toute la journée</label>
                        </div>

                        <!-- Boutons de validation -->
                        <div class="row">
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Formulaire de création des utilisateurs -->
    <div class="card mb-3">
        <div class="row">
            <div class="col-md-4">
                <img src="/images/services/img_cardService_3.png" class="img-fluid rounded-start" alt="image pour la configuration des utilisateurs">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Création des utilisateurs</h5>
                    <form id="createUserForm">

                        <!-- Nom de l'utilisateur -->
                        <div class="mb-3">
                            <label for="user_name" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="user_name">
                        </div>

                        <!-- Prénom de l'utilisateur -->
                        <div class="mb-3">
                            <label for="user_firstname" class="form-label">Prénom</label>
                            <input type="text" class="form-control" id="user_firstname">
                        </div>

                        <!-- Email de l'utilisateur -->
                        <div class="mb-3">
                            <label for="user_email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="user_email">
                        </div>

                        <!-- Telephone -->
                        <div class="mb-3">
                            <label for="user_phone" class="form-label">Téléphone</label>
                            <input type="tel" class="form-control" id="user_phone">
                        </div>

                        <!-- date de naissance -->
                        <div class="mb-3">
                            <label for="user_birthdate" class="form-label">Date de naissance</label>
                            <input type="date" class="form-control" id="user_birthdate">
                        </div>

                        <!-- Identifiant de l'utilisateur -->
                        <div class="mb-3">
                            <label for="user_identifiant" class="form-label">Identifiant</label>
                            <input type="text" class="form-control" id="user_identifiant">
                        </div>

                        <!-- Mot de passe de l'utilisateur -->
                        <div class="mb-3">
                            <label for="user_password" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control" id="user_password">
                        </div>

                        <!-- Boutons d'action -->
                        <div class="d-flex justify-content-around">
                            <button type="button" class="btn btn-primary" id="createUser">Créer</button>
                            <button type="button" class="btn btn-warning" id="modifyUser">Modifier</button>
                            <button type="button" class="btn btn-danger" id="deleteUser">Supprimer</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>