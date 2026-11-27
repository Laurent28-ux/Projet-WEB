<?php
session_start();
$_SESSION = [];
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}
session_destroy();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="3;url=connexion.php">
    <title>Click & Go - Déconnexion</title>
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

        .logout-card {
            background: var(--blanc);
            width: 100%;
            max-width: 420px;
            border-radius: 24px;
            padding: 40px 35px;
            text-align: center;
            box-shadow: 0 15px 35px rgba(24, 0, 173, 0.08);
            animation: fadeInUp 0.5s ease-out;
        }

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

        .icon-badge {
            width: 56px;
            height: 56px;
            margin: 0 auto 18px;
            border-radius: 50%;
            background-color: rgba(128, 177, 242, 0.2);
            color: var(--bleu-fonce);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }

        h1 {
            font-size: 22px;
            font-weight: 700;
            color: var(--bleu-fonce);
            margin-bottom: 8px;
        }

        p {
            font-size: 13px;
            color: var(--texte-secondaire);
            line-height: 1.5;
            margin-bottom: 26px;
        }

        .btn-login {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background-color: var(--bleu-fonce);
            color: var(--blanc);
            text-decoration: none;
            padding: 13px 26px;
            border-radius: 30px;
            font-size: 14px;
            font-weight: 700;
            box-shadow: 0 6px 18px rgba(24, 0, 173, 0.25);
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            background-color: var(--bleu-clair);
            color: var(--bleu-fonce);
            transform: translateY(-2px);
        }

        @keyframes fadeInUp {
            from { transform: translateY(20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        @keyframes flyPlane {
            0%, 100% { transform: translateY(0px) rotate(45deg); }
            50% { transform: translateY(-4px) rotate(45deg); }
        }
    </style>
</head>
<body>
    <div class="logout-card">
        <div class="logo-container">
            <div class="logo-box">
                <span class="logo-click">CLICK</span>
                <span class="logo-amp">&amp;</span>
                <span class="logo-go">GO <i class="fa-solid fa-plane"></i></span>
            </div>
        </div>

        <div class="icon-badge">
            <i class="fa-solid fa-right-from-bracket"></i>
        </div>

        <h1>Vous êtes déconnecté</h1>
        <p>Votre session a bien été fermée. Vous allez être redirigé vers la page de connexion dans un instant.</p>

        <a href="connexion.php" class="btn-login">
            Se reconnecter <i class="fa-solid fa-arrow-right"></i>
        </a>
    </div>
</body>
</html>