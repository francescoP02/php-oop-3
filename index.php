<!-- Oggi pomeriggio provate ad immaginare quali sono le classi necessarie per creare uno shop online con le seguenti caratteristiche.
L'e-commerce vende prodotti per gli animali. :catrainbow: :cool-doge:
I prodotti saranno oltre al cibo, anche giochi, cucce, etc.
L'utente potrà sia comprare i prodotti senza registrarsi, oppure iscriversi e ricevere il 20% di sconto su tutti i prodotti. :carello_della_spesa:
Il pagamento avviene con la carta di credito, che non deve essere scaduta.
BONUS:
Alcuni prodotti (es. antipulci) avranno la caratteristica che saranno disponibili solo in un periodo particolare (es. da maggio ad agosto). -->

<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL & ~ E_NOTICE);

require_once __DIR__ . "/AnimalToy.php";
require_once __DIR__ . "/AnimalFood.php";
require_once __DIR__ . "/AnimalProduct.php";
require_once __DIR__ . "/User.php";

//Animal Food

$catfood = new AnimalFood("Conad", "Miaomiao", 4, "Crocchette per gatti", 100, "1 anno");

$dogfood = new AnimalFood("Royal Canin", "Gastrointestinal", 40, "Crocchette per cani", 1000, "4 anni");

//Animal Toy

$plastic_bone = new AnimalToy("Joe's Zampetti", "Osso di plastica", "10", "Osso di plastica per cani", "2 anni");

//Animal Product

$dogkennel = new AnimalProduct("William Walker", "Dog Kennel", "30", "Cuccia per cani", "Ogni tipo di cane");


// creiamo un utente

$francesco = new User("Francesco", "francesco@email.com", 1234567843218765, '04/24', 123);

// registriamo l'utente
echo $francesco->register();

$francesco->addProductToCart($dogfood);
$francesco->addProductToCart($plastic_bone);
$francesco->addProductToCart($dogkennel);

var_dump($francesco);

// rendiamo un prodotto non disponibile
$plastic_bone->in_stock = false;

// $result = $francesco->addProductToCart($plastic_bone);
// if ($result) {
//     echo "<p>Osso Plastica aggiunto</p>";
// } else {
//     echo "<p>Osso Plastica non è più disponibile</p>";
// }
try {
    $francesco->addProductToCart($plastic_bone);
} catch (\Exception $e) {
    echo "<p>" . $e->getMessage() ."</p>";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP OOP 3</title>
</head>
<body>

<ul>
    <h2>Ecco la lista dei prodotti:</h2>
    <li><?php echo $catfood->printInfo() ?></li>
    <li><?php echo $dogfood->printInfo() ?></li>
    <li><?php echo $plastic_bone->printInfo() ?></li>
    <li><?php echo $dogkennel->printInfo() ?></li>

    <h2>Ciao <?php echo $francesco->name; ?>. Ecco il tuo carrello:</h2>
    <ul>
        <?php foreach($francesco->cart as $cartItem) { ?>
        <li><?php echo $cartItem->printInfo(); ?></li>
        <?php } ?>
    </ul>
    
    <h3>Totale: € <?php echo $francesco->getTotalPrice(); ?></h3>
    
    <p>
        <?php
        if ($francesco->isValid()) {
            echo "La tua carta è valida. Puoi procedere all'acquisto";
        }
        else {
            echo "La tua carta è scaduta. Non puoi procedere all'acquisto!";
        }
        
        ?>
    </p>
</ul>
    
</body>
</html>