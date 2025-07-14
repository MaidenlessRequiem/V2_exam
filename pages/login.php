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
            <h2 class="login-title">Se connecter</h2>
            <p class="text-muted" style="margin:0;">Accédez à votre compte</p>
        </div>

        <form method="POST" action="traitement_login.php">
            <div class="mb-3">
                <label for="mail" class="form-label">Adresse mail</label>
                <input type="email" class="form-control" id="mail" name="mail" required>
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
            <span>Pas de compte ? <a href="register.php">Créer un compte</a></span>
        </div>
    </div>

</body>

</html>