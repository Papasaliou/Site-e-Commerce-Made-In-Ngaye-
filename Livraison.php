<!-- 
 livraison:
 idCommande
 numLiv
 date
 montant
 quantitéTotal
 TelClient
 addresse
 Statut de la livraison

-->

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
    <?php 
         
       / Connexion à la base de données
$conn = new PDO('mysql:host=localhost;dbname=MadeInNgaye', 'utilisateur', 'mot_de_passe');

// Récupérer les livraisons
$query = "SELECT * FROM livraison";
$stmt = $conn->query($query);
$livraisons = $stmt->fetchAll();

echo "<table border='1'>";
echo "<tr>";
echo "<th>idCommande</th>";
echo "<th>numLivraison</th>";
echo "<th>date</th>";
echo "<th>montant</th>";
echo "<th>quantitéTotal</th>";
echo "<th>TelClient</th>";
echo "<th>adresseClient</th>";
echo "<th>StatutLivraison</th>";
echo "</tr>";

// Parcourir les livraisons et afficher les données dans un tableau
foreach($livraisons as $livraison) {
    echo "<tr>";
    echo "<td>" . $livraison['idCommande'] . "</td>";
    echo "<td>" . $livraison['numLivraison'] . "</td>";
    echo "<td>" . $livraison['date'] . "</td>";
    echo "<td>" . $livraison['montant'] . "</td>";
    echo "<td>" . $livraison['quantitéTotal'] . "</td>";
    echo "<td>" . $livraison['TelClient'] . "</td>";
    echo "<td>" . $livraison['adresseClient'] . "</td>";
    echo "<td>" . $livraison['StatutLivraison'] . "</td>";
    echo "</tr>";
}

echo "</table>";

// Fermer la connexion
$conn = null;  








    ?>

    <!--

        // Connexion à la base de données
$conn = new PDO('mysql:host=localhost;dbname=madeInNgaye', 'utilisateur', 'mot_de_passe');

// Définir les autres informations de la livraison sous forme de tableau
$livraison = [
    'numLivraison' => generateRandomNum(),
    'date' => date('Y-m-d'),
    'montant' => $_POST['montant'], // Exemple, récupérer le montant de la commande
    'quantiteTotal' => $_POST['quantiteTotal'], // Exemple, récupérer la quantité totale de la commande
    'TelClient' => $_POST['TelClient'], // Exemple, récupérer le téléphone du client depuis le formulaire POST
    'adresseClient' => $_POST['adresseClient'], // Exemple, récupérer l'adresse du client depuis le formulaire POST
    'statutLivraison' => 'En attente'
];

// Insérer la nouvelle livraison dans la base de données
$query = "INSERT INTO livraison (idCommande, numLivraison, date, montant, quantiteTotal, TelClient, adresseClient, statutLivraison) 
          VALUES (:idCommande, :numLivraison, :date, :montant, :quantiteTotal, :TelClient, :adresseClient, :statutLivraison)";
$stmt = $conn->prepare($query);
$stmt->execute(array(
    ':idCommande' => $_POST['idCommande'], // Exemple, obtenir les informations de la commande depuis le formulaire POST
    ':numLivraison' => $livraison['numLivraison'],
    ':date' => $livraison['date'],
    ':montant' => $livraison['montant'],
    ':quantiteTotal' => $livraison['quantiteTotal'],
    ':TelClient' => $livraison['TelClient'],
    ':adresseClient' => $livraison['adresseClient'],
    ':statutLivraison' => $livraison['statutLivraison']
));

// Fonction pour générer un numéro de livraison aléatoire
function generateRandomNum() {
    $length = 8;
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;
}

// Fermer la connexion
$conn = null
    -->
</body>
</html>