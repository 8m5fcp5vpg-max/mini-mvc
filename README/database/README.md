# Installation de la Base de Données

## 📋 Prérequis

Avant de commencer, assurez-vous d'avoir :
- **XAMPP** installé avec MySQL/MariaDB actif
- **phpMyAdmin** accessible sur `http://localhost/phpmyadmin`

## 🚀 Étapes d'installation

### 1️⃣ Créer la base de données

1. Ouvrez **phpMyAdmin** dans votre navigateur
2. Cliquez sur **"Nouvelle"** (ou "New")
3. Entrez le nom de la base de données : `ecommerce_projet`
4. Cliquez sur **"Créer"**

### 2️⃣ Importer la structure (schema.sql)

1. Sélectionnez la base de données **`ecommerce_projet`**
2. Allez dans l'onglet **"Importer"**
3. Cliquez sur **"Choisir un fichier"** et sélectionnez `schema.sql`
4. Cliquez sur **"Exécuter"**

La structure de vos tables est maintenant créée ! ✅

### 3️⃣ Ajouter les données de test (fixtures.sql)

1. Toujours dans **`ecommerce_projet`**, allez dans l'onglet **"Importer"**
2. Sélectionnez le fichier `fixtures.sql`
3. Cliquez sur **"Exécuter"**

Vos données de test (produits, catégories, etc.) sont maintenant présentes ! ✅

## 🏠 Lancer le projet

### 1. Placer le projet dans XAMPP

Le projet doit être dans le dossier :
```
C:\xampp\htdocs\mini-mvc
```

### 2. Démarrer XAMPP

- Ouvrez **XAMPP Control Panel**
- Démarrez **Apache** et **MySQL**

### 3. Accéder au site

Ouvrez votre navigateur et allez à :
```
http://localhost/mini-mvc
```

## 👤 Se connecter ou créer un compte

Une fois le projet lancé :

1. **Première visite** : Cliquez sur **"Inscription"**
2. **Créez votre compte** avec :
   - Un nom
   - Un email
   - Un mot de passe
3. **Validez l'inscription**
4. **Connectez-vous** et profitez des fonctionnalités ! 🎉

### Identifiants de test pré-existants :
```
Email : dylan.hamad@icloud.com
Mot de passe : motdepasse
```
*(Disponible si vous utilisez les fixtures.sql)*

---

**C'est tout ! Votre e-commerce est prêt à fonctionner.** 🚀
