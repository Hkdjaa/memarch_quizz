<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=NoirPro-Medium&display=swap" rel="stylesheet" />
    <link href="css/snk.css" rel="stylesheet" />
    <title>PSG</title>
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
            <span class="v12_57">PSG</span>
        </div>
        <div class="v13_66">
            <div class="v12_60">
                <div class="v12_31">
                    <span class="v12_61">Quand ont-ils gagné la coupe de France récemment?</span>
                </div>
                <div class="v12_59">
                    <div class="v13_63"></div>
                </div>
            </div>
            <div class="v13_65">
                <div class="v12_27">
                    <button class="v12_28" onclick="verifierReponse(this)">2020</button>
                </div>
                <div class="v12_36">
                    <button class="v12_37" onclick="verifierReponse(this)">2024</button>
                </div>
                <div class="v12_38">
                    <button class="v12_39" onclick="verifierReponse(this)">2015</button>
                </div>
                <div class="v12_40">
                    <button class="v12_41" onclick="verifierReponse(this)">2023</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function verifierReponse(button) {
            var reponseCorrecte = "2023";
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
