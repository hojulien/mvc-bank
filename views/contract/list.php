<?php require_once __DIR__ . '/../templates/header.php'; ?>

            <section>
                <h1><a href="?action=contract-create">Ajouter un nouveau contrat</a></h1> <br>
                <h1>Liste des contrats</h1>

                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ID Client</th>
                            <th>Type de contrat</th>
                            <th>Prix mensuel</th>
                            <th>Durée (mois)</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($contracts as $contract): ?>
                        <tr>
                            <td><?= $contract->getId(); ?></td>
                            <td><?= $contract->getUserId(); ?></td>
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
            </section>

<?php require_once __DIR__ . '/../templates/footer.php';
