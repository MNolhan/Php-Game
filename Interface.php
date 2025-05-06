<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeu PHP</title>
    <link rel="stylesheet" href="style.css"> 
    <style>
    .section-title {
        text-align: center;
        font-size: 2rem;
        font-weight: bold;
        margin: 40px 0 20px;
        padding: 10px 20px;
        border-radius: 12px;
        width: fit-content;
        margin-left: auto;
        margin-right: auto;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .animaux-title {
        background-color: #007bff;
        color: white;
    }

    .provision-title {
        background-color: #ff4081;
        color: white;
    }
</style>
</head>
<body>

    <header>
        <div class="header-left">
            <h1>Jour <?= $partie->getJour() ?></h1>
            <h2>Points restants : <?= $partie->getPoints() ?></h2>
        </div>
        <div class="header-right">
            <form action="Main.php" method="post">
                <input type="hidden" name="step" value="reset">
                <button id="Recommencer" onclick="alert('Le jeu a été remis à 0')" type="submit">Recommencer</button>
            </form>

            <form action="Main.php" method="post">
                <input type="hidden" name="step" value="dormir">
                <button id="Dormir" type="submit">Dormir</button>
            </form>
        </div>
    </header>

    <main>
        <div class="form-container">
            <form action="Main.php" method="post">
                <input type="hidden" name="step" value="createAnimal">
                <input type="text" name="nom" placeholder="Nom de votre Animal...">
                <select name="icone">
                    <option>🪰</option>
                    <option>🐘</option>
                    <option>🦧</option>
                    <option>🐍</option>
                    <option>🦁</option>
                </select>
                <button type="submit">Créer</button>
            </form>
        </div>
        <div class="form-container">
            <form action="Main.php" method="post">
                <input type="hidden" name="step" value="Chercher">
                <button type="submit">🍫 Chercher une Provision 🍬</button>
            </form>
        </div>

        <h2 class="section-title animaux-title">🐾 Vos Animaux</h2>
            <div class="animals-container">
                <?php foreach($partie->getAnimals() as $ida => $animal): ?>
                    <div class="animal">
                        <span class="name"><?= $animal->getName() ?></span>
                        <span class="icon"><?= $animal->getIcone() ?></span>
                        <span class="humeur">🔢 Age : <?= $animal->getAge() ?></span>
                        <span class="vie">💖 Vie : <?= $animal->getVie() ?></span>
                        <span class="faim">🍖 Faim : <?= $animal->getFaim() ?></span>
                        <span class="soif">🚰 Soif : <?= $animal->getSoif() ?></span>
                        <span class="humeur">😡 Mood : <?= $animal->getHumeur() ?></span>
                        <br>
                        <form action="Main.php" method="post">
                            <input type="hidden" name="animal" value="<?= $ida ?>">
                            <input type="hidden" name="step" value="feedAnimal">
                            <select name="provision">
                            <?php foreach($partie->GetProvision() as $idp => $provision): ?>
                                <option value="<?= $idp ?>">
                                    <?= $provision->getIcone() ?>
                                </option>
                            <?php endforeach ?>
                            </select>
                            <button type="submit">Consommer</button>
                        </form>
                        <div class="Carresser">
                            <form action="Main.php" method="post">
                                <input type="hidden" name="animal" value="<?= $ida ?>">
                                <input type="hidden" name="step" value="Carresser">
                                <button type="submit">🤚 Carresser 🤚</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>

        
        <h2 class="section-title provision-title">🎒 Provisions</h2>
        <div class="animals-container">
            <?php foreach($partie->GetProvision() as $index => $provision): ?>
                <div class="animal">
                    <span class="name"><?= $provision->getNom() ?></span>
                    <span class="icon"><?= $provision->getIcone() ?></span>
                    <span class="vie">💖 Vie : <?= $provision->getviepoint() ?></span>
                    <span class="faim">🍖 Faim : <?= $provision->getfaimpoint() ?></span>
                    <span class="soif">🚰 Soif : <?= $provision->getsoifpoint() ?></span>
                    <span class="humeur">😡 Mood : <?= $provision->gethumeurpoint() ?></span>
                </div>
            <?php endforeach ?>
        </div>

        <div class="message-container">
            <div class="message-box">
                <?php foreach($partie->getMessages() as $message): ?>
                    <span class="message"><?= $message ?></span>
                <?php endforeach ?>
            </div>
        </div>



    </main>

</body>
</html>
