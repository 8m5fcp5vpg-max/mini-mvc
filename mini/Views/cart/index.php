<h1>🛒 Mon Panier</h1>

<?php if (empty($items)): ?>
    
    <div style="padding: 20px; background: #f8f9fa; border-radius: 8px; text-align: center;">
        <p>Votre panier est vide.</p>
        <a href="./" style="background: #007bff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
            Retourner à la boutique
        </a>
    </div>

<?php else: ?>

    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <thead>
            <tr style="background: #eee; text-align: left;">
                <th style="padding: 10px; border: 1px solid #ddd;">Produit</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Prix Unitaire</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Quantité</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item): ?>
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;">
                        <strong><?= htmlspecialchars($item['product']['nom']) ?></strong>
                    </td>
                    <td style="padding: 10px; border: 1px solid #ddd;">
                        <?= number_format((float)$item['product']['prix'], 2) ?> €
                    </td>
                    <td style="padding: 10px; border: 1px solid #ddd;">
                        <?= $item['qty'] ?>
                    </td>
                    <td style="padding: 10px; border: 1px solid #ddd; font-weight: bold;">
                        <?= number_format((float)$item['total'], 2) ?> €
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div style="text-align: right; margin-top: 20px; font-size: 1.5em;">
        Total à payer : <strong style="color: green;"><?= number_format((float)$totalGeneral, 2) ?> €</strong>
    </div>

    <div style="text-align: right; margin-top: 20px; gap: 10px; display: flex; justify-content: flex-end;">
        <a href="cart/clear" style="color: red; text-decoration: underline; margin-right: 20px;">Vider le panier</a>
        
        <?php if (isset($_SESSION['user'])): ?>
            <a href="order/add" style="background: #28a745; color: white; padding: 15px 30px; text-decoration: none; border-radius: 5px; font-weight: bold;">
    Passer la commande ✅
</a>
        <?php else: ?>
            <a href="login" style="background: #ffc107; color: #333; padding: 15px 30px; text-decoration: none; border-radius: 5px; font-weight: bold;">
                Connectez-vous pour commander
            </a>
        <?php endif; ?>
    </div>

<?php endif; ?>