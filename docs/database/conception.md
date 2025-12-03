1. Pourquoi garder le prix dans la commande ?

Le prix d'un produit change souvent (promo, hausse).
Il faut stocker le prix au moment de l'achat dans la ligne de commande.
C'est obligatoire pour que la facture reste juste, même si le prix change plus tard.

2. Suppression des données

J'ai mis des sécurités pour ne pas perdre d'informations importantes :

Interdiction (RESTRICT) : On ne peut pas supprimer un client ou un produit s'il y a déjà une commande. On garde l'historique.

Automatique (CASCADE) : Si on supprime une commande, ses lignes de détails s'effacent toutes seules.

3. Le Stock

Le stock est écrit dans la table produit.

Si le stock est à 0, le site doit bloquer l'achat.

Le stock diminue seulement quand le paiement est validé.

4. Les Index

C'est pour que le site soit rapide.
J'ai mis des index sur les recherches fréquentes (email client, numéro commande, nom produit).

5. Numéro de commande unique

J'ai forcé le numéro de commande à être UNIQUE.
C'est impossible d'avoir deux commandes avec le même numéro.

6. Pour la suite

Plus tard, on pourrait ajouter :

Plusieurs adresses par client.

L'historique des changements de prix.

Les avis et notes des clients.