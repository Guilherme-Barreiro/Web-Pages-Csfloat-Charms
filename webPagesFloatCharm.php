<?php
$maxPrice = 2000;
$minPrice = 0;
// CHECKEI OS LINKS 11/06
$linkBase = "https://csfloat.com/search?sort_by=&min_float=0.001&max_float=0.38";      
$linkBase = "https://csfloat.com/search?sort_by=lowest_price&min_float=0.001&max_float=0.38";
$linkBase = "https://csfloat.com/search?sort_by=most_recent&min_float=0.001&max_float=0.38";   

$linkMid = "&type=buy_now&keychains=%5B%7B%22i%22:";
$linkEnd = "%7D%5D";

$expensive = [9, 13, 18, 20, 24, 11, 29, 30, 7, 16, 21];                    //   3 < 
$bons = [2, 3, 5, 14, 31];                                                  // 1.5 <  < 3
$trash = [1, 4, 6, 8, 10, 12, 15, 17, 19, 22, 23, 25, 26, 27, 28, 32, 33];  //     < 1.5

function gerarLinks($ids, $linkBase, $minPrice, $maxPrice, $linkMid, $linkEnd) {
    $links = [];
    foreach ($ids as $i) {
        $links[] = $linkBase . "&min_price={$minPrice}&max_price={$maxPrice}" . $linkMid . $i . $linkEnd;
    }
    return $links;
}

$bonsLinks = gerarLinks($bons, $linkBase, $minPrice, $maxPrice, $linkMid, $linkEnd);
$trashLinks = gerarLinks($trash, $linkBase, $minPrice, $maxPrice, $linkMid, $linkEnd);
$expensiveLinks = gerarLinks($expensive, $linkBase, $minPrice, $maxPrice, $linkMid, $linkEnd);
?>

<!DOCTYPE html>
<html lang="pt">

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
    <h1>Links CSFloat</h1>

    
    

    <h2>Links Caros <button onclick='openLinks(<?php echo json_encode($expensiveLinks); ?>)'>Abrir Links Caros</button></h2>    
    <ul>
        <?php foreach ($expensiveLinks as $link): ?>
            <li><a href="<?= $link ?>" target="_blank"><?= $link ?></a></li>
        <?php endforeach; ?>
    </ul>

    <h2>Links Bons <button onclick='openLinks(<?php echo json_encode($bonsLinks); ?>)'>Abrir Links Bons</button></h2>
    <ul>
        <?php foreach ($bonsLinks as $link): ?>
            <li><a href="<?= $link ?>" target="_blank"><?= $link ?></a></li>
        <?php endforeach; ?>
    </ul>

    <h2>Links Trash <button onclick='openLinks(<?php echo json_encode($trashLinks); ?>)'>Abrir Links Trash</button></h2>
    <ul>
        <?php foreach ($trashLinks as $link): ?>
            <li><a href="<?= $link ?>" target="_blank"><?= $link ?></a></li>
        <?php endforeach; ?>
    </ul>

</body>

</html>
