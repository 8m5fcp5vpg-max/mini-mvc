<h1>📦 Mes Commandes</h1>

<?php if (empty($orders)): ?>
    <p>Vous n'avez pas encore passé de commande.</p>
    <a href="../">Retour à la boutique</a>
<?php else: ?>

    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <thead>
            <tr style="background: #f8f9fa; text-align: left;">
                <th style="padding: 10px; border: 1px solid #ddd;">N° Commande</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Date</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Montant</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Statut</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd; font-weight: bold;">
                        #<?= $order['id'] ?>
                    </td>
                    <td style="padding: 10px; border: 1px solid #ddd;">
                        <?= date('d/m/Y H:i', strtotime($order['date'])) ?>
                    </td>
                    <td style="padding: 10px; border: 1px solid #ddd; color: green; font-weight: bold;">
                        <?= number_format((float)$order['total'], 2) ?> €
                    </td>
                    <td style="padding: 10px; border: 1px solid #ddd;">
                        <span style="background: #eee; padding: 3px 8px; border-radius: 4px;">
                            <?= htmlspecialchars($order['statut']) ?>
                        </span>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php endif; ?>