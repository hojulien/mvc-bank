<?php require_once __DIR__ . '/../templates/header.php'; ?>

            <section>
                <div class="title">
                    <h1>Liste des comptes bancaires</h1>
                </div>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>ID Client</th>
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
                                <td>
                                    <?php
                                        $uId = $bank->getUserId();
                                        $user = $userById[$uId];
                                        echo "{$user->getId()} - {$user->getLastName()} {$user->getFirstName()}";
                                    ?>
                                </td>
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
                </div>
            </section>

<?php require_once __DIR__ . '/../templates/footer.php';
