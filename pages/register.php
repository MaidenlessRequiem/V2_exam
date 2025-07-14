<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.css">
    <script src="../assets/bootstrap/bootstrap.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
        }

        .login-container {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 380px;
        }

        .login-title {
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #212529;
        }

        .form-label {
            font-weight: 500;
        }

        .form-control {
            border-radius: 0.5rem;
            height: 42px;
        }

        .btn {
            height: 44px;
            border-radius: 0.5rem;
            font-weight: 500;
        }

        .btn-dark {
            background-color: #212529;
            border: none;
        }

        .btn-dark:hover {
            background-color: #000;
        }

        .link {
            font-size: 0.9rem;
            color: #6c757d;
            text-align: center;
            margin-top: 1rem;
        }

        .link a {
            color: #212529;
            font-weight: 500;
            text-decoration: none;
        }

        .link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <div class="text-center mb-4">
            <h2 class="login-title">inscription</h2>
            <p class="text-muted" style="margin:0;">Créez votre compte</p>
        </div>

        <form method="POST" action="traitement_register.php" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Nom</label>
                <input type="text" class="form-control" id="mail" name="nom" required>
            </div>
            <div class="mb-3">
                <label for="categorie" class="form-label">Sexe</label>
                <select class="form-select custom-select" id="categorie" name="genre" required>
                    <option selected disabled>Votre genre ici</option>
                    <option value="H">Homme</option>
                    <option value="F">Femme</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">ville</label>
                <input type="text" class="form-control" id="mail" name="ville" required>
            </div>

            <div class="mb-3">
                <label for="naissance" class="form-label">Date de naissance</label>
                <input type="date" class="form-control" id="mail" name="naissance" required>
            </div>
            <div class="mb-3">
                <label for="mail" class="form-label">Adresse mail</label>
                <input type="email" class="form-control" id="mail" name="mail" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image de profil</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
            </div>
            <div class="mb-4">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-dark w-100">Connexion</button>
            </div>
        </form>

        <div class="link">
            <span>Vous avez deja un compte ? <a href="login.php">Se connecter</a></span>
        </div>
    </div>

</body>

</html>