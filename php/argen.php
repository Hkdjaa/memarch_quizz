<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=NoirPro-Medium&display=swap" rel="stylesheet" />
    <link href="css/snk.css" rel="stylesheet" />
    <title>Argentine</title>
</head>
<body>
    <div class="v12_20">
        <div class="v12_21"></div>
        <div class="v12_55">
            <div class="v12_50"></div>
            <a href="jeux.php">
            <div class="v12_54">Retour</div></a>
        </div>
        <div class="v12_56">
            <span class="v12_57">Foot</span>
        </div>
        <div class="v13_66">
            <div class="v12_60">
                <div class="v12_31">
                    <span class="v12_61">Qui est le meilleur joueur de ce pays?</span>
                </div>
                <div class="v12_59">
                    <div class="v13_63"></div>
                </div>
            </div>
            <div class="v13_65">
                <div class="v12_27">
                    <form method="post" action="traitement.php">
                        <input type="hidden" name="id" value="<?php echo $id_joueur; ?>">
                        <input type="hidden" name="id_question" value="1">
                        <button type="submit" name="reponse_utilisateur" value="Martinez" class="v12_28">Martinez</button>
                    </form>
                </div>
                <div class="v12_36">
                    <form method="post" action="traitement.php">
                        <input type="hidden" name="id" value="<?php echo $id_joueur; ?>">
                        <input type="hidden" name="id_question" value="1">
                        <button type="submit" name="reponse_utilisateur" value="Molina" class="v12_37">Molina</button>
                    </form>
                </div>
                <div class="v12_38">
                    <form method="post" action="traitement.php">
                        <input type="hidden" name="id" value="<?php echo $id_joueur; ?>">
                        <input type="hidden" name="id_question" value="1">
                        <button type="submit" name="reponse_utilisateur" value="Otamendi" class="v12_39">Otamendi</button>
                    </form>
                </div>
                <div class="v12_40">
                    <form method="post" action="traitement.php">
                        <input type="hidden" name="id" value="<?php echo $id_joueur; ?>">
                        <input type="hidden" name="id_question" value="1">
                        <button type="submit" name="reponse_utilisateur" value="Messi" class="v12_41">Messi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function verifierReponse(button) {
            var reponseCorrecte = "Messi";
            var reponseUtilisateur = button.textContent;
            
            if (reponseUtilisateur === reponseCorrecte) {
                alert("Bonne réponse :) ");
                window.location.href = "jeux.php";
            } else {
                alert("Mauvaise réponse :( ");
                window.location.href = "jeux.php";
            }
            
            event.preventDefault();
        }
    </script>
</body>
</html>
