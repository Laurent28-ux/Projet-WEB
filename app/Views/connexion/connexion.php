<?php
session_start();

// Si l'utilisateur est déjà connecté, on le redirige vers son espace
if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$erreur = '';

// Traitement du formulaire lors de la soumission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $mot_de_passe = $_POST['mot_de_passe'] ?? '';

    if (!empty($email) && !empty($mot_de_passe)) {
        try {
            // Paramètres de connexion MAMP (port 8889 par défaut sur Mac, ou 3306 sous Windows)
            $host = 'localhost';
            $port = '8889'; // Remplacez par '3306' si vous êtes sur Windows
            $dbname = 'click_and_go'; // Nom de votre base de données
            $username = 'root';
            $password = 'root'; // 'root' sur MAMP Mac, '' (vide) sur MAMP Windows

            $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Recherche de l'utilisateur par email (adaptez les noms de colonnes selon votre MLD)
            $stmt = $pdo->prepare("SELECT id, nom, prenom, email, mot_de_passe, role FROM utilisateurs WHERE email = :email");
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Vérification du mot de passe haché (password_hash)
            if ($user && password_verify($mot_de_passe, $user['mot_de_passe'])) {
                // Enregistrement des informations en session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_nom'] = $user['nom'];
                $_SESSION['user_prenom'] = $user['prenom'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['user_role'] = $user['role'];

                // Redirection selon le rôle
                if ($user['role'] === 'admin') {
                    header('Location: accueil_admin.php');
                } else {
                    header('Location: index.php');
                }
                exit();
            } else {
                $erreur = "Adresse e-mail ou mot de passe incorrect.";
            }
        } catch (PDOException $e) {
            $erreur = "Erreur de connexion à la base de données : " . $e->getMessage();
        }
    } else {
        $erreur = "Veuillez remplir tous les champs.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Click & Go - Connexion</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --bleu-fonce: #1800ad;
            --bleu-clair: #80b1f2;
            --blanc: #ffffff;
            --bg-page: #f4f6fc;
            --texte-principal: #1e1b4b;
            --texte-secondaire: #64748b;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            background-color: var(--bg-page);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background-image: radial-gradient(circle at 10% 20%, rgba(128, 177, 242, 0.25) 0%, transparent 40%),
                              radial-gradient(circle at 90% 80%, rgba(24, 0, 173, 0.1) 0%, transparent 40%);
        }

        .login-card {
            background: var(--blanc);
            width: 100%;
            max-width: 440px;
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 15px 35px rgba(24, 0, 173, 0.08);
            animation: fadeInUp 0.6s ease-out;
        }

        /* --- LOGO ANIMÉ --- */
        .logo-container {
            display: flex;
            justify-content: center;
            margin-bottom: 28px;
        }

        .logo-box {
            display: flex;
            flex-direction: column;
            line-height: 1.1;
            font-weight: 800;
            font-size: 28px;
            letter-spacing: 1px;
        }

        .logo-click { color: var(--bleu-clair); text-align: left; }
        .logo-amp { color: var(--bleu-fonce); font-size: 32px; margin: -6px 0; text-align: center; }
        .logo-go {
            color: var(--bleu-clair);
            text-align: right;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 6px;
        }

        .logo-go i {
            color: var(--bleu-fonce);
            font-size: 22px;
            transform: rotate(45deg);
            animation: flyPlane 4s infinite ease-in-out;
        }

        .login-header {
            text-align: center;
            margin-bottom: 28px;
        }

        .login-header h1 {
            font-size: 24px;
            font-weight: 700;
            color: var(--bleu-fonce);
            margin-bottom: 6px;
        }

        .login-header p {
            font-size: 13px;
            color: var(--texte-secondaire);
        }

        /* --- MESSAGE D'ERREUR --- */
        .alert-error {
            background-color: #fee2e2;
            color: #dc2626;
            border-left: 4px solid #dc2626;
            padding: 12px 16px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 500;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            animation: shake 0.4s ease-in-out;
        }

        /* --- FORMULAIRE --- */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: var(--bleu-fonce);
            margin-bottom: 8px;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-wrapper i.input-icon {
            position: absolute;
            left: 16px;
            color: var(--texte-secondaire);
            font-size: 15px;
            transition: color 0.3s;
        }

        .form-control {
            width: 100%;
            padding: 14px 44px 14px 44px;
            border: 1.5px solid #e2e8f0;
            border-radius: 14px;
            font-size: 14px;
            color: var(--texte-principal);
            background-color: #f8fafc;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--bleu-fonce);
            background-color: var(--blanc);
            box-shadow: 0 0 0 4px rgba(128, 177, 242, 0.25);
        }

        .form-control:focus + i.input-icon,
        .input-wrapper:focus-within i.input-icon {
            color: var(--bleu-fonce);
        }

        .toggle-password {
            position: absolute;
            right: 16px;
            color: var(--texte-secondaire);
            cursor: pointer;
            font-size: 15px;
            transition: color 0.2s;
        }

        .toggle-password:hover {
            color: var(--bleu-fonce);
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 26px;
            font-size: 12px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--texte-secondaire);
            cursor: pointer;
        }

        .remember-me input {
            accent-color: var(--bleu-fonce);
            width: 15px;
            height: 15px;
            cursor: pointer;
        }

        .forgot-link {
            color: var(--bleu-fonce);
            font-weight: 600;
            text-decoration: none;
            transition: color 0.2s;
        }

        .forgot-link:hover {
            color: var(--bleu-clair);
        }

        .btn-submit {
            width: 100%;
            background-color: var(--bleu-fonce);
            color: var(--blanc);
            border: none;
            padding: 15px;
            border-radius: 30px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 6px 20px rgba(24, 0, 173, 0.25);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-submit:hover {
            background-color: var(--bleu-clair);
            color: var(--bleu-fonce);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(128, 177, 242, 0.45);
        }

        .register-footer {
            text-align: center;
            margin-top: 26px;
            padding-top: 20px;
            border-top: 1px solid #f0f2f5;
            font-size: 13px;
            color: var(--texte-secondaire);
        }

        .register-footer a {
            color: var(--bleu-fonce);
            font-weight: 700;
            text-decoration: none;
            transition: color 0.2s;
        }

        .register-footer a:hover {
            color: var(--bleu-clair);
        }

        /* --- ANIMATIONS --- */
        @keyframes fadeInUp {
            from { transform: translateY(25px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        @keyframes flyPlane {
            0%, 100% { transform: translateY(0px) rotate(45deg); }
            50% { transform: translateY(-4px) rotate(45deg); }
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-6px); }
            75% { transform: translateX(6px); }
        }
    </style>
</head>
<body>

    <div class="login-card">
        <!-- Logo Click & Go -->
        <div class="logo-container">
            <div class="logo-box">
                <span class="logo-click">CLICK</span>
                <span class="logo-amp">&amp;</span>
                <span class="logo-go">GO <i class="fa-solid fa-plane"></i></span>
            </div>
        </div>

        <div class="login-header">
            <h1>Bon retour parmi nous</h1>
            <p>Connectez-vous pour accéder à votre espace voyage.</p>
        </div>

        <!-- Affichage dynamique des erreurs PHP -->
        <?php if (!empty($erreur)): ?>
            <div class="alert-error">
                <i class="fa-solid fa-circle-exclamation"></i>
                <span><?php echo htmlspecialchars($erreur); ?></span>
            </div>
        <?php endif; ?>

        <form action="connexion.php" method="POST">
            <div class="form-group">
                <label for="email">Adresse e-mail</label>
                <div class="input-wrapper">
                    <i class="fa-regular fa-envelope input-icon"></i>
                    <input type="email" id="email" name="email" class="form-control" 
                           placeholder="marie@exemple.com" 
                           value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required>
                </div>
            </div>

            <div class="form-group">
                <label for="mot_de_passe">Mot de passe</label>
                <div class="input-wrapper">
                    <i class="fa-solid fa-lock input-icon"></i>
                    <input type="password" id="mot_de_passe" name="mot_de_passe" class="form-control" 
                           placeholder="••••••••" required>
                    <i class="fa-regular fa-eye toggle-password" id="togglePwd" onclick="afficherMotDePasse()"></i>
                </div>
            </div>

            <div class="form-options">
                <label class="remember-me">
                    <input type="checkbox" name="souvenir"> Se souvenir de moi
                </label>
                <a href="#" class="forgot-link">Mot de passe oublié ?</a>
            </div>

            <button type="submit" class="btn-submit">
                Se connecter <i class="fa-solid fa-arrow-right"></i>
            </button>
        </form>

        <div class="register-footer">
            Pas encore de compte ? <a href="inscription.php">Créer un compte</a>
        </div>
    </div>

    <script>
        function afficherMotDePasse() {
            const champ = document.getElementById('mot_de_passe');
            const icone = document.getElementById('togglePwd');
            
            if (champ.type === 'password') {
                champ.type = 'text';
                icone.classList.remove('fa-eye');
                icone.classList.add('fa-eye-slash');
            } else {
                champ.type = 'password';
                icone.classList.remove('fa-eye-slash');
                icone.classList.add('fa-eye');
            }
        }
    </script>

</body>
</html>