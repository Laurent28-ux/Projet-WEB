<?php
session_start();

// Si l'utilisateur est déjà connecté, on le redirige vers l'espace voyage
if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$erreur = '';
$succes = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prenom = trim($_POST['prenom'] ?? '');
    $nom = trim($_POST['nom'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $mot_de_passe = $_POST['mot_de_passe'] ?? '';
    $confirmer_mdp = $_POST['confirmer_mdp'] ?? '';

    // Vérifications de base
    if (empty($prenom) || empty($nom) || empty($email) || empty($mot_de_passe) || empty($confirmer_mdp)) {
        $erreur = "Veuillez remplir tous les champs obligatoires.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreur = "Veuillez saisir une adresse e-mail valide.";
    } elseif (strlen($mot_de_passe) < 6) {
        $erreur = "Le mot de passe doit contenir au moins 6 caractères.";
    } elseif ($mot_de_passe !== $confirmer_mdp) {
        $erreur = "Les deux mots de passe ne correspondent pas.";
    } else {
        try {
            // Paramètres de connexion (adaptez port/mot de passe selon votre serveur local)
            $host = 'localhost';
            $port = '8889'; // '8889' sur MAMP Mac, '3306' par défaut sur Windows / MySQL standard
            $dbname = 'click_and_go';
            $username = 'root';
            $password = 'root'; // 'root' sur MAMP Mac, '' (vide) sur Windows / XAMPP

            $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Vérifier si l'e-mail existe déjà
            $checkStmt = $pdo->prepare("SELECT id FROM utilisateurs WHERE email = :email");
            $checkStmt->execute(['email' => $email]);

            if ($checkStmt->fetch()) {
                $erreur = "Cette adresse e-mail est déjà associée à un compte.";
            } else {
                // Hachage sécurisé du mot de passe
                $mdp_hache = password_hash($mot_de_passe, PASSWORD_DEFAULT);
                $role = 'client';

                // Insertion du nouvel utilisateur
                $insertStmt = $pdo->prepare("
                    INSERT INTO utilisateurs (prenom, nom, email, mot_de_passe, role)
                    VALUES (:prenom, :nom, :email, :mot_de_passe, :role)
                ");
                $insertStmt->execute([
                    'prenom' => $prenom,
                    'nom' => $nom,
                    'email' => $email,
                    'mot_de_passe' => $mdp_hache,
                    'role' => $role
                ]);

                // Connexion automatique après inscription
                $_SESSION['user_id'] = $pdo->lastInsertId();
                $_SESSION['user_prenom'] = $prenom;
                $_SESSION['user_nom'] = $nom;
                $_SESSION['user_email'] = $email;
                $_SESSION['user_role'] = $role;

                header('Location: index.php');
                exit();
            }
        } catch (PDOException $e) {
            $erreur = "Erreur lors de la création du compte : " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Click & Go - Créer un compte</title>
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
            padding: 25px 20px;
            background-image: radial-gradient(circle at 10% 20%, rgba(128, 177, 242, 0.25) 0%, transparent 40%),
                              radial-gradient(circle at 90% 80%, rgba(24, 0, 173, 0.1) 0%, transparent 40%);
        }

        .register-card {
            background: var(--blanc);
            width: 100%;
            max-width: 480px;
            border-radius: 24px;
            padding: 38px 40px;
            box-shadow: 0 15px 35px rgba(24, 0, 173, 0.08);
            animation: fadeInUp 0.6s ease-out;
        }

        /* --- LOGO ANIMÉ --- */
        .logo-container {
            display: flex;
            justify-content: center;
            margin-bottom: 24px;
        }

        .logo-box {
            display: flex;
            flex-direction: column;
            line-height: 1.1;
            font-weight: 800;
            font-size: 26px;
            letter-spacing: 1px;
        }

        .logo-click { color: var(--bleu-clair); text-align: left; }
        .logo-amp { color: var(--bleu-fonce); font-size: 30px; margin: -6px 0; text-align: center; }
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
            font-size: 20px;
            transform: rotate(45deg);
            animation: flyPlane 4s infinite ease-in-out;
        }

        .register-header {
            text-align: center;
            margin-bottom: 24px;
        }

        .register-header h1 {
            font-size: 24px;
            font-weight: 700;
            color: var(--bleu-fonce);
            margin-bottom: 6px;
        }

        .register-header p {
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
        .name-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: var(--bleu-fonce);
            margin-bottom: 7px;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-wrapper i.input-icon {
            position: absolute;
            left: 15px;
            color: var(--texte-secondaire);
            font-size: 14px;
            transition: color 0.3s;
        }

        .form-control {
            width: 100%;
            padding: 13px 42px 13px 42px;
            border: 1.5px solid #e2e8f0;
            border-radius: 14px;
            font-size: 14px;
            color: var(--texte-principal);
            background-color: #f8fafc;
            transition: all 0.3s ease;
        }

        .form-control.no-right-icon {
            padding-right: 15px;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--bleu-fonce);
            background-color: var(--blanc);
            box-shadow: 0 0 0 4px rgba(128, 177, 242, 0.25);
        }

        .input-wrapper:focus-within i.input-icon {
            color: var(--bleu-fonce);
        }

        .toggle-password {
            position: absolute;
            right: 15px;
            color: var(--texte-secondaire);
            cursor: pointer;
            font-size: 14px;
            transition: color 0.2s;
        }

        .toggle-password:hover {
            color: var(--bleu-fonce);
        }

        .terms-check {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 22px;
            font-size: 12px;
            color: var(--texte-secondaire);
            line-height: 1.4;
        }

        .terms-check input {
            accent-color: var(--bleu-fonce);
            width: 16px;
            height: 16px;
            margin-top: 1px;
            cursor: pointer;
            flex-shrink: 0;
        }

        .terms-check a {
            color: var(--bleu-fonce);
            font-weight: 600;
            text-decoration: none;
        }

        .terms-check a:hover {
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

        .login-footer {
            text-align: center;
            margin-top: 24px;
            padding-top: 20px;
            border-top: 1px solid #f0f2f5;
            font-size: 13px;
            color: var(--texte-secondaire);
        }

        .login-footer a {
            color: var(--bleu-fonce);
            font-weight: 700;
            text-decoration: none;
            transition: color 0.2s;
        }

        .login-footer a:hover {
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

        @media (max-width: 520px) {
            .register-card { padding: 28px 22px; }
            .name-row { grid-template-columns: 1fr; gap: 0; }
        }
    </style>
</head>
<body>

    <div class="register-card">
        <!-- Logo Click & Go -->
        <div class="logo-container">
            <div class="logo-box">
                <span class="logo-click">CLICK</span>
                <span class="logo-amp">&amp;</span>
                <span class="logo-go">GO <i class="fa-solid fa-plane"></i></span>
            </div>
        </div>

        <div class="register-header">
            <h1>Créer un compte</h1>
            <p>Rejoignez Click &amp; Go et préparez vos prochains voyages.</p>
        </div>

        <?php if (!empty($erreur)): ?>
            <div class="alert-error">
                <i class="fa-solid fa-circle-exclamation"></i>
                <span><?php echo htmlspecialchars($erreur); ?></span>
            </div>
        <?php endif; ?>

        <form action="inscription.php" method="POST">
            <div class="name-row">
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <div class="input-wrapper">
                        <i class="fa-regular fa-user input-icon"></i>
                        <input type="text" id="prenom" name="prenom" class="form-control no-right-icon"
                               placeholder="Marie"
                               value="<?php echo htmlspecialchars($_POST['prenom'] ?? ''); ?>" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="nom">Nom</label>
                    <div class="input-wrapper">
                        <i class="fa-regular fa-user input-icon"></i>
                        <input type="text" id="nom" name="nom" class="form-control no-right-icon"
                               placeholder="Dupont"
                               value="<?php echo htmlspecialchars($_POST['nom'] ?? ''); ?>" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="email">Adresse e-mail</label>
                <div class="input-wrapper">
                    <i class="fa-regular fa-envelope input-icon"></i>
                    <input type="email" id="email" name="email" class="form-control no-right-icon"
                           placeholder="marie@exemple.com"
                           value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required>
                </div>
            </div>

            <div class="form-group">
                <label for="mot_de_passe">Mot de passe</label>
                <div class="input-wrapper">
                    <i class="fa-solid fa-lock input-icon"></i>
                    <input type="password" id="mot_de_passe" name="mot_de_passe" class="form-control"
                           placeholder="Minimum 6 caractères" required>
                    <i class="fa-regular fa-eye toggle-password" id="togglePwd1" onclick="basculerMotDePasse('mot_de_passe', 'togglePwd1')"></i>
                </div>
            </div>

            <div class="form-group">
                <label for="confirmer_mdp">Confirmer le mot de passe</label>
                <div class="input-wrapper">
                    <i class="fa-solid fa-lock input-icon"></i>
                    <input type="password" id="confirmer_mdp" name="confirmer_mdp" class="form-control"
                           placeholder="Répétez votre mot de passe" required>
                    <i class="fa-regular fa-eye toggle-password" id="togglePwd2" onclick="basculerMotDePasse('confirmer_mdp', 'togglePwd2')"></i>
                </div>
            </div>

            <label class="terms-check">
                <input type="checkbox" name="conditions" required>
                <span>J'accepte les <a href="#">conditions générales d'utilisation</a> et la <a href="#">politique de confidentialité</a>.</span>
            </label>

            <button type="submit" class="btn-submit">
                Créer mon compte <i class="fa-solid fa-arrow-right"></i>
            </button>
        </form>

        <div class="login-footer">
            Vous avez déjà un compte ? <a href="connexion.php">Se connecter</a>
        </div>
    </div>

    <script>
        function basculerMotDePasse(idChamp, idIcone) {
            const champ = document.getElementById(idChamp);
            const icone = document.getElementById(idIcone);

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