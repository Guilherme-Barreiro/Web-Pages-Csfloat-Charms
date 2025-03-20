<?php
$maxPrice = 2502;
$minPrice = 0;

$linkSta = "https://csfloat.com/search?sort_by=lowest_price"; // lowest price
$linkSta = "https://csfloat.com/search?sort_by=most_recent";  // recent
$linkSta2 = "https://csfloat.com/search?sort_by=";            // best deals

$linkMid = "&type=buy_now&keychains=%5B%7B%22i%22:";
$linkEnd = "%7D%5D";

echo "<script>const links = [];</script>";
echo "<script>const trashLinks = [];</script>";
echo "<script>const commentedLinks = [];</script>";

$excluded = [];
$trash = [];

for ($i = 1; $i < 34; $i++) {
    if ($i == 3 || $i == 7 || $i == 9 || $i == 11 || $i == 13 || $i == 16 || $i == 20 || $i == 21 || $i == 29 || $i == 30) {
        $excluded[] = $i;
        continue;
    }
    if ($i == 1 || $i == 6 || $i == 8 || $i == 10 || $i == 12 || $i == 15 || $i == 17 || $i == 19 || $i == 22 || $i == 26 || $i == 27 || $i == 32) {
        $trash[] = $i;
        continue;
    }

    $link = $linkSta . "&min_price=" . $minPrice . "&max_price=" . $maxPrice . $linkMid . $i . $linkEnd;
    echo "<a href='" . $link . "'>" . $link . "</a><br>";
    echo "<script>links.push('$link');</script>";
}

foreach ($excluded as $i) {
    $link = $linkSta . "&min_price=" . $minPrice . "&max_price=" . $maxPrice . $linkMid . $i . $linkEnd;
    echo "<a href='" . $link . "'>" . $link . "</a><br>";
    echo "<script>links.push('$link');</script>";
}

echo "<br><button onclick=\"openAllLinks()\">Open All Links</button><br><br>";

foreach ($trash as $i) {
    $link = $linkSta2 . "&min_price=" . $minPrice . "&max_price=" . $maxPrice . $linkMid . $i . $linkEnd;
    echo "<a href='" . $link . "'>" . $link . "</a><br>";
    echo "<script>trashLinks.push('$link');</script>";
}

echo "<br><button onclick=\"openTrashLinks()\">Open Trash Links</button><br><br>";

$commentedLinks = [
    "https://csfloat.com/profile",
    //"https://csfloat.com/search?category=1&sort_by=lowest_price&min_float=0.15&max_float=0.38&type=buy_now&def_index=7&paint_index=506",
    //"https://csfloat.com/search?category=1&sort_by=lowest_price&min_float=0.07&max_float=0.15&type=buy_now&def_index=7&paint_index=506",
    //"https://csfloat.com/search?category=1&sort_by=lowest_price&min_float=0.15&max_float=0.38&type=buy_now&def_index=7&paint_index=959",
    //"https://csfloat.com/search?category=1&sort_by=lowest_price&min_float=0.07&max_float=0.15&type=buy_now&def_index=7&paint_index=959",
    //"https://csfloat.com/search?category=1&sort_by=lowest_price&max_float=0.07&type=buy_now&def_index=7&paint_index=959",
    //"https://csfloat.com/search?category=1&sort_by=lowest_price&min_float=0.15&max_float=0.38&type=buy_now&def_index=7&paint_index=226",
    //"https://csfloat.com/search?category=1&sort_by=lowest_price&min_float=0.07&max_float=0.15&type=buy_now&def_index=7&paint_index=226",
    //"https://csfloat.com/search?category=1&sort_by=lowest_price&max_float=0.07&type=buy_now&def_index=7&paint_index=226",
    //"https://csfloat.com/search?category=1&sort_by=lowest_price&min_float=0.15&max_float=0.38&type=buy_now&def_index=7&paint_index=1141",
    //"https://csfloat.com/search?category=1&sort_by=lowest_price&min_float=0.07&max_float=0.15&type=buy_now&def_index=7&paint_index=1141",
    //"https://csfloat.com/search?category=1&sort_by=lowest_price&min_float=0.15&max_float=0.38&type=buy_now&def_index=9&paint_index=1144",
    //"https://csfloat.com/search?category=1&sort_by=lowest_price&min_float=0.07&max_float=0.15&type=buy_now&def_index=9&paint_index=1144",
    //"https://csfloat.com/search?category=1&sort_by=lowest_price&max_float=0.07&type=buy_now&def_index=9&paint_index=1144",
    //"https://csfloat.com/search?category=1&sort_by=lowest_price&min_float=0.15&max_float=0.38&type=buy_now&def_index=9&paint_index=640",
    //"https://csfloat.com/search?category=1&sort_by=lowest_price&min_float=0.07&max_float=0.15&type=buy_now&def_index=9&paint_index=640",
    //"https://csfloat.com/search?category=1&sort_by=lowest_price&min_float=0.15&max_float=0.38&type=buy_now&def_index=9&paint_index=838",
    //"https://csfloat.com/search?category=1&sort_by=lowest_price&min_float=0.07&max_float=0.15&type=buy_now&def_index=9&paint_index=838",
    //"https://csfloat.com/search?category=1&sort_by=lowest_price&max_float=0.07&type=buy_now&def_index=9&paint_index=838",
    //"https://csfloat.com/search?category=1&sort_by=lowest_price&min_float=0.07&max_float=0.15&type=buy_now&def_index=60&paint_index=714",
    //"https://csfloat.com/search?category=1&sort_by=lowest_price&min_float=0.45&type=buy_now&def_index=1&paint_index=1054",
    "https://csfloat.com/search?category=1&sort_by=lowest_price&min_float=0.15&max_float=0.38&type=buy_now&def_index=9&paint_index=803",
    "https://csfloat.com/search?category=1&sort_by=lowest_price&min_float=0.15&max_float=0.38&type=buy_now&def_index=7&paint_index=490",
    "https://csfloat.com/search?category=1&sort_by=lowest_price&min_float=0.15&max_float=0.38&type=buy_now&def_index=7&paint_index=600",
    "https://csfloat.com/search?category=1&sort_by=lowest_price&min_float=0.07&max_float=0.15&type=buy_now&def_index=7&paint_index=1221",
    "https://csfloat.com/search?category=1&sort_by=lowest_price&min_float=0.15&max_float=0.38&type=buy_now&def_index=16&paint_index=588",
    //"https://csfloat.com/search?category=1&sort_by=lowest_price&min_float=0.15&max_float=0.38&type=buy_now&def_index=518&paint_index=5",
    //"https://csfloat.com/search?category=1&sort_by=lowest_price&min_float=0.15&max_float=0.38&type=buy_now&def_index=519&paint_index=5",
    //"https://csfloat.com/search?category=1&sort_by=lowest_price&min_float=0.15&max_float=0.38&type=buy_now&def_index=503&paint_index=5",
    //"https://csfloat.com/search?category=1&sort_by=lowest_price&min_float=0.15&max_float=0.38&type=buy_now&def_index=517&paint_index=77",
    //"https://csfloat.com/search?category=1&sort_by=lowest_price&min_float=0.15&max_float=0.38&type=buy_now&def_index=521&paint_index=5",
    //"https://csfloat.com/search?category=1&sort_by=lowest_price&min_float=0.15&max_float=0.38&type=buy_now&def_index=526&paint_index=5",
    //"https://csfloat.com/item/794856075005395401",
    "https://csfloat.com/search?category=1&sort_by=lowest_price&min_float=0.15&max_float=0.38&type=buy_now&def_index=7&paint_index=675",
    "https://csfloat.com/search?category=1&sort_by=lowest_price&min_float=0.15&max_float=0.38&type=buy_now&def_index=9&paint_index=475",
    "https://csfloat.com/search?category=1&sort_by=lowest_price&min_float=0.15&max_float=0.38&type=buy_now&def_index=9&paint_index=917",
    "https://csfloat.com/search?category=1&sort_by=lowest_price&min_float=0.15&max_float=0.38&type=buy_now&def_index=1&paint_index=1054",
    "https://csfloat.com/search?sort_by=lowest_price&min_float=0.15&max_float=0.38&type=buy_now&paint_index=282,259",
    "https://csfloat.com/search?category=1&sort_by=lowest_price&min_float=0.07&max_float=0.15&type=buy_now&def_index=60&paint_index=714",
];

$skinsName = [
    "Profile",
    //"Desert Eagle | Heat Treated | Battle-Scarred",
    "AWP | Neo-Noir | Field-Tested",
    "AK-47 | Frontside Misty | Field-Tested",
    "AK-47 | Neon Revolution | Field-Tested",
    "AK-47 | Head Shot | Minimal Wear",
    "M4A4 | Desolate Space | Minimal Wear",
    //"★ Survival Knife | Forest DDPAT | FT",
    //"★ Ursus Knife | Forest DDPAT | FT",
    //"★ Classic Knife | Forest DDPAT | FT",
    //"★ Paracord Knife | Boreal Forest | FT",
    //"★ Nomad Knife | Forest DDPAT | FT",
    //"★ Kukri Knife | Forest DDPAT | FT",
    //"★ Paracord Knife | Minimal Wear",
    "AK-47 | The Empress | Field-Tested",
    "AWP | Hyper Beast (Field-Tested)",
    "AWP | Wildfire (Field-Tested)",
    "Desert Eagle | Heat Treated (Field-Tested)",
    "AK-47 | Redline | Field-Tested",
    "M4A1-S | Nightmare (Minimal Wear)",

];


echo "<table><tr><th>Skin</th><th>Link</th></tr>";
for ($i = 0; $i < count($commentedLinks); $i++) {
    echo "<tr>";
    echo "<td>" . $skinsName[$i] . "</td>";
    echo "<td><a href=" . $commentedLinks[$i] . ">" . $commentedLinks[$i] . "</a></td>";
    echo "</tr>";
}
echo "</table>";


echo "<script>const commentedLinks = " . json_encode($commentedLinks) . ";</script>";

?>

<script>
    async function openAllLinks() {
        for (const link of commentedLinks) {
            window.open(link, '_blank');
            await new Promise(resolve => setTimeout(resolve, 1500));
        }
    }

    async function openTrashLinks() {
        for (const link of commentedLinks) {
            window.open(link, '_blank');
            await new Promise(resolve => setTimeout(resolve, 1500));
        }
    }


    async function openBuyOrderLinks() {
        for (const link of commentedLinks) {
            window.open(link, '_blank');
            await new Promise(resolve => setTimeout(resolve, 1500));
        }
    }

    if (0 = 0) {
        /*
        Baby Karat CT    https://csfloat.com/search?sort_by=lowest_price&type=buy_now&keychains=%5B%7B%22i%22:21%7D%5D
        Baby Karat T     https://csfloat.com/search?sort_by=lowest_price&type=buy_now&keychains=%5B%7B%22i%22:30%7D%5D
        Diamond Dog      https://csfloat.com/search?sort_by=lowest_price&type=buy_now&keychains=%5B%7B%22i%22:11%7D%5D
        Die-cast AK      https://csfloat.com/search?sort_by=lowest_price&type=buy_now&keychains=%5B%7B%22i%22:18%7D%5D
        Diner Dog        https://csfloat.com/search?sort_by=lowest_price&type=buy_now&keychains=%5B%7B%22i%22:13%7D%5D
        Hot Howl         https://csfloat.com/search?sort_by=lowest_price&type=buy_now&keychains=%5B%7B%22i%22:7%7D%5D
        Hot Wurst        https://csfloat.com/search?sort_by=lowest_price&type=buy_now&keychains=%5B%7B%22i%22:16%7D%5D
        Lil' Monster     https://csfloat.com/search?sort_by=lowest_price&type=buy_now&keychains=%5B%7B%22i%22:9%7D%5D
        Lil' Squirt      https://csfloat.com/search?sort_by=lowest_price&type=buy_now&keychains=%5B%7B%22i%22:24%7D%5D
        Lil' Teacup      https://csfloat.com/search?sort_by=lowest_price&type=buy_now&keychains=%5B%7B%22i%22:14%7D%5D
        Lil' Whiskers    https://csfloat.com/search?sort_by=lowest_price&type=buy_now&keychains=%5B%7B%22i%22:3%7D%5D
        Semi-Precious    https://csfloat.com/search?sort_by=lowest_price&type=buy_now&keychains=%5B%7B%22i%22:29%7D%5D
        Titeenium AWP    https://csfloat.com/search?sort_by=lowest_price&type=buy_now&keychains=%5B%7B%22i%22:20%7D%5D
        
        https://csfloat.com/search?category=1&min_float=0.45&type=buy_now&def_index=1&paint_index=1054
        */
    }
</script>

<button onclick="openBuyOrderLinks()">Open Buy Order Links</button>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <br><br>
    <a href="https://csfloat.com/search?sort_by=lowest_price&min_float=0.15&max_float=0.38&def_index=4725&paint_index=10087">https://csfloat.com/search?sort_by=lowest_price&min_float=0.15&max_float=0.38&def_index=4725&paint_index=10087</a><br>
    <a href="https://csfloat.com/search?sort_by=lowest_price&min_float=0.06&max_float=0.8&def_index=5035&paint_index=10057">https://csfloat.com/search?sort_by=lowest_price&min_float=0.06&max_float=0.8&def_index=5035&paint_index=10057</a><br>
    <a href="https://csfloat.com/search?sort_by=lowest_price&min_float=0.15&max_float=0.38&def_index=5031&paint_index=10044">https://csfloat.com/search?sort_by=lowest_price&min_float=0.15&max_float=0.38&def_index=5031&paint_index=10044</a><br>
    <a href="https://csfloat.com/search?sort_by=lowest_price&min_float=0.15&max_float=0.38&def_index=5035&paint_index=10059">https://csfloat.com/search?sort_by=lowest_price&min_float=0.15&max_float=0.38&def_index=5035&paint_index=10059</a><br>
    <a href="https://csfloat.com/search?sort_by=lowest_price&min_float=0.15&max_float=0.38&def_index=5035&paint_index=10058">https://csfloat.com/search?sort_by=lowest_price&min_float=0.15&max_float=0.38&def_index=5035&paint_index=10058</a><br>

</body>

</html>
html