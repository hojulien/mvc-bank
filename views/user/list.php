<?php require_once __DIR__ . '/../templates/header.php'; ?>

            <section>
                <div class="title">
                    <h1>Liste des clients</h1>
                </div>

                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Adresse e-mail</th>
                                <th>Numéro de téléphone</th>
                                <th>Adresse postale</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach($users as $user): ?>
                            <tr>
                                <td><?= $user->getId(); ?></td>
                                <td><?= $user->getFirstName(); ?></td>
                                <td><?= $user->getLastName(); ?></td>
                                <td><?= $user->getEmail(); ?></td>
                                <td><?= $user->getPhoneNumber(); ?></td>
                                <td><?= $user->getAddress(); ?></td>
                                <td class="list-options">
                                    <button id="view"><a href="?action=user-view&id=<?= $user->getId() ?>">Voir 🔎</a></button>
                                    <button id="edit"><a href="?action=user-edit&id=<?= $user->getId() ?>">Modifier ✏️</a></button>
                                    <button id="delete"><a onclick="return confirm('Voulez-vous supprimer ce client? Attention, tous les comptes bancaires et contrats associés à ce client seront également supprimés!');" href="?action=user-delete&id=<?= $user->getId() ?>">Supprimer ❌</a></button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </section>

<?php require_once __DIR__ . '/../templates/footer.php';
