<?php include 'db.php'; ?>
<?php

if (isset ($_POST['submit'])){
    $productNaam = $_POST['product_naam'];
    $prijsPerStuk = $_POST['prijs_per_stuk'];
    $omschrijvijng = $_POST['omschrijving'];

    // query
    $sql = "INSERT INTO Producten (product_naam, prijs_per_stuk, omschrijving) VALUES (?,?,?)";

    // preparen
    $stmt = $pdo->prepare($sql);
    // placeholders
    $placeholders = [$productNaam, $prijsPerStuk, $omschrijvijng];
    // execute
    $stmt->execute($placeholders);

    if ($stmt->execute()) {
        echo " Nieuw product succesvol toegevoegd!";
    } else {
        echo "Fout bij toevoegen product: " . $stmt->error;
    }
};



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get</title>
</head>
<body>
    <form action method="POST">
        <input type="text" name="product_naam" placeholder="Product naam" >
        <input type="text" name="prijs_per_stuk" placeholder="Prijs per stuk">
        <input type="text" name="omschrijving" placeholder="Omschrijving">
        <input type="submit" name="submit">
    </form>

</body>
</html>