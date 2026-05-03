<header>
    <a href="index.php" class="logo">G<span>E</span>M</a>
    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>

            <?php if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true): ?>
                <li><a href="admin.php">Admin</a></li>
                <li><a href="logout.php">Déconnexion</a></li>
            <?php else: ?>
                <li><a href="login.php">Connexion</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <div class="header-actions">
        <button id="theme-toggle" aria-label="Changer le thème">Dark Mode</button>
    </div>
</header>