<?php
$maxPrice = 3400;
$minPrice = 0;

$linkSta = "https://csfloat.com/search?sort_by=lowest_price&min_float=0.001&max_float=0.38"; // lowest price
$linkSta = "https://csfloat.com/search?sort_by=most_recent&min_float=0.001&max_float=0.38";  // recent
$linkSta2 = "https://csfloat.com/search?sort_by=&min_float=0.001&max_float=0.38";            // best deals

$linkMid = "&type=buy_now&keychains=%5B%7B%22i%22:";
$linkEnd = "%7D%5D";

$brabo = [];
$trash = [];
$braboLinks = [];
$trashLinks = [];

for ($i = 1; $i < 34; $i++) {
    if ($i == 3 || $i == 7 || $i == 9 || $i == 11 || $i == 13 || $i == 16 || $i == 20 || $i == 21 || $i == 29 || $i == 30) {
        $brabo[] = $i;
        continue;
    }
    if ($i == 1 || $i == 4 || $i == 6 || $i == 8 || $i == 10 || $i == 12 || $i == 15 || $i == 17 || $i == 19 || $i == 22 ||  $i == 23 || $i == 25 || $i == 26 || $i == 27  || $i == 28 
    || $i == 32 || $i == 33) {
        $trash[] = $i;
        continue;
    }

    $link = $linkSta . "&min_price=" . $minPrice . "&max_price=" . $maxPrice . $linkMid . $i . $linkEnd;
    $braboLinks[] = $link;
}

foreach ($brabo as $i) {
    $link = $linkSta . "&min_price=" . $minPrice . "&max_price=" . $maxPrice . $linkMid . $i . $linkEnd;
    $braboLinks[] = $link;
}

foreach ($trash as $i) {
    $link = $linkSta2 . "&min_price=" . $minPrice . "&max_price=" . $maxPrice . $linkMid . $i . $linkEnd;
    $trashLinks[] = $link;
}

$commentedLinks = [
    "https://csfloat.com/profile",
    "https://csfloat.com/search?category=1&sort_by=lowest_price&min_float=0.15&max_float=0.38&type=buy_now&def_index=9&paint_index=803",
    "https://csfloat.com/search?category=1&sort_by=lowest_price&min_float=0.15&max_float=0.38&type=buy_now&def_index=7&paint_index=490",
    "https://csfloat.com/search?category=1&sort_by=lowest_price&min_float=0.15&max_float=0.38&type=buy_now&def_index=7&paint_index=600",
    "https://csfloat.com/search?category=1&sort_by=lowest_price&min_float=0.07&max_float=0.15&type=buy_now&def_index=7&paint_index=1221",
    "https://csfloat.com/search?category=1&sort_by=lowest_price&min_float=0.15&max_float=0.38&type=buy_now&def_index=16&paint_index=588",
    "https://csfloat.com/search?category=1&sort_by=lowest_price&min_float=0.15&max_float=0.38&type=buy_now&def_index=7&paint_index=675",
    "https://csfloat.com/search?category=1&sort_by=lowest_price&min_float=0.15&max_float=0.38&type=buy_now&def_index=9&paint_index=475",
    "https://csfloat.com/search?category=1&sort_by=lowest_price&min_float=0.15&max_float=0.38&type=buy_now&def_index=9&paint_index=917",
    "https://csfloat.com/search?category=1&sort_by=lowest_price&min_float=0.15&max_float=0.38&type=buy_now&def_index=1&paint_index=1054",
    "https://csfloat.com/search?sort_by=lowest_price&min_float=0.15&max_float=0.38&type=buy_now&paint_index=282,259",
    "https://csfloat.com/search?category=1&sort_by=lowest_price&min_float=0.07&max_float=0.15&type=buy_now&def_index=60&paint_index=714",
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSFloat Links</title>
    <script>
        function openLinks(links) {
            links.forEach(link => {
                window.open(link, '_blank');
            });
        }
    </script>
</head>

<body>
    <h1>CSFloat Links</h1>

    <button onclick='openLinks(<?php echo json_encode($braboLinks); ?>)'>Abrir Links Brabos</button>
    <button onclick='openLinks(<?php echo json_encode($trashLinks); ?>)'>Abrir Links "Trash"</button>
    <button onclick='openLinks(<?php echo json_encode($commentedLinks); ?>)'>Abrir Links Comentados</button>

    <h2>Links Brabos</h2>
    <ul>
        <?php foreach ($braboLinks as $link): ?>
            <li><a href="<?php echo $link; ?>" target="_blank"><?php echo $link; ?></a></li>
        <?php endforeach; ?>
    </ul>

    <h2>Links "Trash"</h2>
    <ul>
        <?php foreach ($trashLinks as $link): ?>
            <li><a href="<?php echo $link; ?>" target="_blank"><?php echo $link; ?></a></li>
        <?php endforeach; ?>
    </ul>

    <h2>Links Comentados</h2>
    <ul>
        <?php foreach ($commentedLinks as $link): ?>
            <li><a href="<?php echo $link; ?>" target="_blank"><?php echo $link; ?></a></li>
        <?php endforeach; ?>
    </ul>
</body>

</html>
https://csfloat.com/search?category=1&sort_by=lowest_price&def_index=34&paint_index=61
mp9 hiptnotic