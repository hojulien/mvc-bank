<?php require_once __DIR__ . '/../templates/header.php'; ?>

            <section>
                <h1>Liste des comptes bancaires</h1>

                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ID Client</th>
                            <th>IBAN</th>
                            <th>Type de compte</th>
                            <th>Solde initial</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($banks as $bank): ?>
                        <tr>
                            <td><?= $bank->getId(); ?></td>
                            <td><?= $bank->getUserId(); ?></td>
                            <td><?= $bank->getIban(); ?></td>
                            <td><?= $bank->getTypeAccount(); ?></td>
                            <td><?= $bank->getBalance(); ?></td>
                            <td class="list-options">
                                <button id="view"><a href="?action=bank-view&id=<?= $bank->getId() ?>">Voir 🔎</a></button>
                                <button id="edit"><a href="?action=bank-edit&id=<?= $bank->getId() ?>">Modifier ✏️</a></button>
                                <button id="delete"><a onclick="return confirm('Voulez-vous supprimer ce client?');" href="?action=bank-delete&id=<?= $bank->getId() ?>">Supprimer ❌</a></button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>

<?php require_once __DIR__ . '/../templates/footer.php';
