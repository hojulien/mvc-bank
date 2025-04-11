<?php require_once __DIR__ . '/../templates/header.php'; ?>

            <section>
                <div class="title">
                    <h1>Liste des contrats</h1>
                </div>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>ID Client</th>
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
                                <td>
                                    <?php
                                        $uId = $contract->getUserId();
                                        $user = $userById[$uId];
                                        echo "{$user->getId()} - {$user->getLastName()} {$user->getFirstName()}";
                                    ?>
                                </td>
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
                </div>
            </section>

<?php require_once __DIR__ . '/../templates/footer.php';
