<?php
$maxPrice = 2000; // last checked prices on 26/10 16:00
$minPrice = 0;
$linkBase = "https://csfloat.com/search?sort_by=most_recent&min_float=0.001&max_float=0.38";

$linkMid = "&type=buy_now&keychains=%5B%7B%22i%22:";
$linkEnd = "%7D%5D";

$expensive = [9, 13, 18, 20, 24, 11, 29, 30, 7, 16, 21, 39, 42, 45, 46, 47, 49, 51, 53, 59, 60, 73, 74, 75, 76, 77, 78, 79, 81];
$bons = [2, 3, 5, 14, 31, 43, 52, 55, 58, 70, 71];
$trash = [1, 4, 6, 8, 10, 12, 15, 17, 19, 22, 23, 25, 26, 27, 28, 32, 33, 38, 40, 41, 44, 48, 50, 54, 56, 57, 61, 62, 63, 64, 65, 66, 67, 68, 69, 72, 82, 80];
$major = [36];

function gerarLinks($ids, $linkBase, $minPrice, $maxPrice, $linkMid, $linkEnd)
{
    $links = [];
    foreach ($ids as $i) {
        $links[] = $linkBase . "&min_price={$minPrice}&max_price={$maxPrice}" . $linkMid . $i . $linkEnd;
    }
    return $links;
}

$expensiveLinks = gerarLinks($expensive, $linkBase, $minPrice, $maxPrice + 3000, $linkMid, $linkEnd);
$bonsLinks = gerarLinks($bons, $linkBase, $minPrice, $maxPrice, $linkMid, $linkEnd);
$trashLinks = gerarLinks($trash, $linkBase, $minPrice, $maxPrice, $linkMid, $linkEnd);
$majorLinks = gerarLinks($major, $linkBase, $minPrice, $maxPrice, $linkMid, $linkEnd);

function extractIdFromUrl($url){
    preg_match('/"i":(\d+)/', urldecode($url), $matches);
    return isset($matches[1]) ? $matches[1] : null;
}

function fsttime($tipo){
    static $printed = [
        'expensive' => false,
        'bons' => false,
        'trash' => false
    ];

    if (!$printed[$tipo]) {
        echo "<p class='new-links'>Links Novos ($tipo):</p>";
        $printed[$tipo] = true;
    }
}

function check($url, $tipo = 'expensive'){
    $id = extractIdFromUrl($url);
    if ($id > 37) {
        fsttime($tipo);
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSFloat Links</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f6f6;
            margin: 0;
            padding: 40px;
            color: #222;
        }

        h1 {
            text-align: center;
            color: #111;
            margin-bottom: 40px;
        }

        /* Container flexível para os cards */
        .cards-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 25px;
        }

        .section {
            background-color: #fff;
            border-radius: 14px;
            padding: 25px 30px;
            flex: 1 1 420px; /* base mínima, ajusta conforme o espaço */
            box-shadow: 0 3px 10px rgba(0,0,0,0.08);
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            min-height: 300px;
        }

        h2 {
            margin-top: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #333;
            font-size: 1.3rem;
        }

        button {
            background-color: #4b6cb7;
            background-image: linear-gradient(to right, #182848, #4b6cb7);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 7px 14px;
            cursor: pointer;
            transition: 0.2s;
        }

        button:hover {
            opacity: 0.9;
        }

        ul {
            list-style-type: none;
            padding-left: 10px;
            margin: 10px 0 0 0;
            overflow-y: auto;
            max-height: 900px;
        }

        li {
            margin-bottom: 8px;
            font-size: 0.9rem;
        }

        a {
            text-decoration: none;
            color: #0066cc;
            word-break: break-all;
        }

        a:hover {
            text-decoration: underline;
        }

        .new-links {
            color: #009900;
            font-weight: bold;
            margin: 8px 0 6px;
        }

        /* Ajuste responsivo */
        @media (max-width: 900px) {
            .section {
                flex: 1 1 100%;
            }
        }
    </style>

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

    <div class="cards-container">
        <div class="section">
            <h2>Links Caros <button onclick='openLinks(<?php echo json_encode($expensiveLinks); ?>)'>Abrir Todos</button></h2>
            <ul>
                <?php foreach ($expensiveLinks as $link): check($link); ?>
                    <li><a href="<?= $link ?>" target="_blank"><?= $link ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="section">
            <h2>Links Bons <button onclick='openLinks(<?php echo json_encode($bonsLinks); ?>)'>Abrir Todos</button></h2>
            <ul>
                <?php foreach ($bonsLinks as $link): check($link, 'bons'); ?>
                    <li><a href="<?= $link ?>" target="_blank"><?= $link ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="section">
            <h2>Links Trash <button onclick='openLinks(<?php echo json_encode($trashLinks); ?>)'>Abrir Todos</button></h2>
            <ul>
                <?php foreach ($trashLinks as $link): check($link, 'trash'); ?>
                    <li><a href="<?= $link ?>" target="_blank"><?= $link ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="section">
            <h2>Major Links <button onclick='openLinks(<?php echo json_encode($majorLinks); ?>)'>Abrir Todos</button></h2>
            <ul>
                <?php foreach ($majorLinks as $link): ?>
                    <li><a href="<?= $link ?>" target="_blank"><?= $link ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</body>
</html>
