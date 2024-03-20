<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=NoirPro-Medium&display=swap" rel="stylesheet" />
    <link href="css/snk.css" rel="stylesheet" />
    <title>Transport</title>
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
            <span class="v12_57">Transport</span>
        </div>
        <div class="v13_66">
            <div class="v12_60">
                <div class="v12_31">
                    <span class="v12_61">Quelle est l'application la plus utilisée pour le transport au Sénégal?</span>
                </div>
                <div class="v12_59">
                    <div class="v13_63"></div>
                </div>
            </div>
            <div class="v13_65">
                <div class="v12_27">
                    <button class="v12_28" onclick="verifierReponse(this)">Heetch</button>
                </div>
                <div class="v12_36">
                    <button class="v12_37" onclick="verifierReponse(this)">Yango</button>
                </div>
                <div class="v12_38">
                    <button class="v12_39" onclick="verifierReponse(this)">Yassir</button>
                </div>
                <div class="v12_40">
                    <button class="v12_41" onclick="verifierReponse(this)">Jumia</button>
                </div>
            </div>
        </div>
    </div>
<script>
        function verifierReponse(button) {
            var reponseCorrecte = "Yango";
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
