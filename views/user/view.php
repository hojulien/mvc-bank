<?php require_once __DIR__ . '/../templates/header.php'; ?>

            <section>
                <div class="title">
                    <h1>Détails du client</h1>
                </div>
                <div class="view-container">
                    <div class="view-options">
                        <div class="view-option key">Nom</div>
                        <div class="view-option value"><?= $user->getFirstName() ?></div>
                    </div>
                    <div class="view-options">
                        <div class="view-option key">Prénom</div>
                        <div class="view-option value"><?= $user->getLastName() ?></div>
                    </div>
                    <div class="view-options">
                        <div class="view-option key">Adresse e-mail</div>
                        <div class="view-option value"><?= $user->getEmail() ?></div>
                    </div>
                    <div class="view-options">
                        <div class="view-option key">Numéro de téléphone</div>
                        <div class="view-option value"><?= $user->getPhoneNumber() ?></div>
                    </div>
                    <div class="view-options">
                        <div class="view-option key">Adresse</div>
                        <div class="view-option value"><?= $user->getAddress() ?? "-" ?></div>
                    </div>
                    <div class="view-buttons">
                        <button id="edit"><a href="?action=user-edit&id=<?= $user->getId() ?>">Modifier les informations du client ✏️</a></button>
                        <button id="delete"><a onclick="return confirm('Voulez-vous supprimer ce client?');" href="?action=user-delete&id=<?= $user->getId() ?>">Supprimer le profil client ❌</a></button>
                    </div>
                </div>
                <button class="return"><a href="?action=user-list" >Retour à la liste</a></button>
                <div class="view-container">
                    <!-- AFFICHE LES COMPTES BANCAIRES ET CONTRATS S'IL EN POSSEDE -->
                    <div class="title">
                        <h1>Comptes bancaires</h1>
                    </div>
                    <?php if (!empty($banks)): ?>
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>IBAN</th>
                                    <th>Type de compte</th>
                                    <th>Solde initial</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach($banks as $bank): ?>
                                <tr>
                                    <td><?= $bank->getId(); ?></td>
                                    <td><?= $bank->getIban(); ?></td>
                                    <td><?= $bank->getTypeAccount(); ?></td>
                                    <td><?= $bank->getBalance(); ?></td>
                                    <td class="list-options">
                                        <button id="view"><a href="?action=bank-view&id=<?= $bank->getId() ?>">Voir 🔎</a></button>
                                        <button id="edit"><a href="?action=bank-edit&id=<?= $bank->getId() ?>">Modifier ✏️</a></button>
                                        <button id="delete"><a onclick="return confirm('Voulez-vous supprimer ce compte?');" href="?action=bank-delete&id=<?= $bank->getId() ?>">Supprimer ❌</a></button>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <p>Ce client ne possède pas de compte bancaire.</p>
                    <?php endif; ?>

                    <div class="title">
                        <h1>Contrats</h1>
                    </div>
                    <?php if (!empty($contracts)): ?>
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Type de contrat</th>
                                    <th>Prix mensuel</th>
                                    <th>Durée (mois)</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach($contracts as $contract): ?>
                                <tr>
                                    <td><?= $contract->getId(); ?></td>
                                    <td><?= $contract->getTypeContract(); ?></td>
                                    <td><?= $contract->getPrice(); ?></td>
                                    <td><?= $contract->getDuration(); ?></td>
                                    <td class="list-options">
                                        <button id="view"><a href="?action=contract-view&id=<?= $contract->getId() ?>">Voir 🔎</a></button>
                                        <button id="edit"><a href="?action=contract-edit&id=<?= $contract->getId() ?>">Modifier ✏️</a></button>
                                        <button id="delete"><a onclick="return confirm('Voulez-vous supprimer ce contrat?');" href="?action=contract-delete&id=<?= $contract->getId() ?>">Supprimer ❌</a></button>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <p>Ce client ne possède pas de contrats.</p>
                    <?php endif; ?>
                </div>
            </section>

<?php require_once __DIR__ . '/../templates/footer.php';