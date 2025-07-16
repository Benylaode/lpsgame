<?php
session_start();

$property_prices = [
    'Mediterranean Avenue' => 60,
    'Baltic Avenue' => 60,
    'Oriental Avenue' => 100,
    'Vermont Avenue' => 100,
    'Connecticut Avenue' => 120,
    'St. Charles Place' => 140,
    'States Avenue' => 140,
    'Virginia Avenue' => 160,
    'St. James Place' => 180,
    'Tennessee Avenue' => 180,
    'New York Avenue' => 200,
    'Kentucky Avenue' => 220,
    'Indiana Avenue' => 220,
    'Illinois Avenue' => 240,
    'Atlantic Avenue' => 260,
    'Ventnor Avenue' => 260,
    'Marvin Gardens' => 280,
    'Pacific Avenue' => 300,
    'North Carolina Avenue' => 300,
    'Pennsylvania Avenue' => 320,
    'Park Place' => 350,
    'Boardwalk' => 400,
];

if (!isset($_SESSION['game']) || (isset($_POST['action']) && $_POST['action'] === 'reset')) {
    $_SESSION['game'] = [
        'tiles' => [
            ['name' => 'GO', 'owner' => null], ['name' => 'Mediterranean Avenue', 'owner' => null], ['name' => 'Community Chest', 'owner' => null], ['name' => 'Baltic Avenue', 'owner' => null], ['name' => 'Income Tax', 'owner' => null],
            ['name' => 'Reading Railroad', 'owner' => null], ['name' => 'Oriental Avenue', 'owner' => null], ['name' => 'Chance', 'owner' => null], ['name' => 'Vermont Avenue', 'owner' => null], ['name' => 'Connecticut Avenue', 'owner' => null],
            ['name' => 'Jail / Just Visiting', 'owner' => null], ['name' => 'St. Charles Place', 'owner' => null], ['name' => 'Electric Company', 'owner' => null], ['name' => 'States Avenue', 'owner' => null], ['name' => 'Virginia Avenue', 'owner' => null],
            ['name' => 'Pennsylvania Railroad', 'owner' => null], ['name' => 'St. James Place', 'owner' => null], ['name' => 'Community Chest', 'owner' => null], ['name' => 'Tennessee Avenue', 'owner' => null], ['name' => 'New York Avenue', 'owner' => null],
            ['name' => 'Free Parking', 'owner' => null], ['name' => 'Kentucky Avenue', 'owner' => null], ['name' => 'Chance', 'owner' => null], ['name' => 'Indiana Avenue', 'owner' => null], ['name' => 'Illinois Avenue', 'owner' => null],
            ['name' => 'B. & O. Railroad', 'owner' => null], ['name' => 'Atlantic Avenue', 'owner' => null], ['name' => 'Ventnor Avenue', 'owner' => null], ['name' => 'Water Works', 'owner' => null], ['name' => 'Marvin Gardens', 'owner' => null],
            ['name' => 'Go to Jail', 'owner' => null], ['name' => 'Pacific Avenue', 'owner' => null], ['name' => 'North Carolina Avenue', 'owner' => null], ['name' => 'Community Chest', 'owner' => null], ['name' => 'Pennsylvania Avenue', 'owner' => null],
            ['name' => 'Short Line', 'owner' => null], ['name' => 'Chance', 'owner' => null], ['name' => 'Park Place', 'owner' => null], ['name' => 'Luxury Tax', 'owner' => null], ['name' => 'Boardwalk', 'owner' => null],
        ],
        'players' => [
            ['name' => 'Player 1', 'position' => 0, 'money' => 1500],
            ['name' => 'Player 2', 'position' => 0, 'money' => 1500],
        ],
        'current_player' => 0,
        'message' => 'Game dimulai! Giliran Player 1.',
        'can_buy' => false,
        'buy_position' => null,
    ];
}

$game = &$_SESSION['game'];

function canBuyProperty($game, $pos, $property_prices) {
    if (!isset($game['tiles'][$pos])) return false;
    $tile = $game['tiles'][$pos];
    if (!isset($property_prices[$tile['name']])) return false;
    if ($tile['owner'] !== null) return false;
    $current_player = $game['players'][$game['current_player']];
    if ($current_player['money'] < $property_prices[$tile['name']]) return false;
    return true;
}

if (isset($_POST['action']) && $_POST['action'] === 'roll') {
    $dice1 = rand(1,6);
    $dice2 = rand(1,6);
    $total = $dice1 + $dice2;
    $current = &$game['players'][$game['current_player']];

    $old_position = $current['position'];
    $new_position = ($old_position + $total) % 40;
    $current['position'] = $new_position;

    $game['message'] = "{$current['name']} melempar dadu: {$dice1} + {$dice2} = {$total}. Bergerak dari {$game['tiles'][$old_position]['name']} ke {$game['tiles'][$new_position]['name']}.";

    if (canBuyProperty($game, $new_position, $property_prices)) {
        $game['message'] .= " Properti ini tersedia untuk dibeli dengan harga $" . $property_prices[$game['tiles'][$new_position]['name']] . ". Klik beli jika ingin membeli.";
        $game['can_buy'] = true;
        $game['buy_position'] = $new_position;
    } else {
        $game['can_buy'] = false;
        $game['buy_position'] = null;
        $game['current_player'] = ($game['current_player'] + 1) % count($game['players']);
        $next_player = $game['players'][$game['current_player']]['name'];
        $game['message'] .= " Giliran {$next_player}.";
    }
}

if (isset($_POST['action']) && $_POST['action'] === 'buy') {
    $pos = $game['buy_position'];
    if ($pos !== null && canBuyProperty($game, $pos, $property_prices)) {
        $price = $property_prices[$game['tiles'][$pos]['name']];
        $player_index = $game['current_player'];
        $game['tiles'][$pos]['owner'] = $player_index;
        $game['players'][$player_index]['money'] -= $price;
        $game['message'] = "{$game['players'][$player_index]['name']} membeli properti {$game['tiles'][$pos]['name']} seharga \${$price}.";
        $game['can_buy'] = false;
        $game['buy_position'] = null;

        $game['current_player'] = ($player_index + 1) % count($game['players']);
        $next_player = $game['players'][$game['current_player']]['name'];
        $game['message'] .= " Giliran {$next_player}.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Finplayz Ai Edugame</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 20px;
            background: linear-gradient(135deg, #e0f7fa, #fffde7);
            color: #333;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
        }

        .board {
            display: grid;
            grid-template-columns: repeat(11, 80px);
            grid-gap: 2px;
            margin: 0 auto 30px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            background-color: #fefefe;
            padding: 10px;
            border-radius: 10px;
        }

        .cell {
            border: 1px solid #999;
            min-height: 80px;
            padding: 5px;
            font-size: 10px;
            position: relative;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        .property { background-color: #ecf0f1; }
        .tax { background-color: #ffe0e0; }
        .card { background-color: #fff8e1; }
        .station { background-color: #d0f0fd; }
        .utility { background-color: #d0ffd6; }
        .corner { background-color: #f0f0f0; }
        .corner.special {
            font-weight: bold;
            text-align: center;
            font-size: 12px;
            background-color: #eee;
        }

        .owned-p0 { background-color: #f1948a !important; }
        .owned-p1 { background-color: #85c1e9 !important; }

        .player {
            width: 15px;
            height: 15px;
            border-radius: 50%;
            position: absolute;
            bottom: 3px;
            right: 3px;
            border: 1px solid #444;
        }

        .player.p0 { background-color: red; }
        .player.p1 { background-color: blue; }

        .status {
            background-color: #ffffffaa;
            padding: 15px;
            border-radius: 10px;
            margin: 20px auto;
            max-width: 700px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }

        form button {
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-weight: bold;
            font-size: 14px;
            transition: background-color 0.3s ease;
            margin: 10px 5px;
        }

        form button[type="submit"]:hover {
            opacity: 0.9;
        }

        form button[type="submit"] {
            background-color: #3498db;
            color: #fff;
        }

        form[action="reset"] button {
            background-color: #e74c3c;
        }

        form[action="reset"] button:hover {
            background-color: #c0392b;
        }

        .btn-back {
            display: inline-block;
            padding: 12px 24px;
            background-color: #00cec9;
            color: #000;
            text-decoration: none;
            border-radius: 25px;
            font-weight: bold;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }

        .btn-back:hover {
            background-color: #00b2af;
        }

        ul {
            list-style-type: none;
            padding-left: 0;
            margin: 0 auto;
            max-width: 500px;
        }

        li {
            background: #ffffffcc;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 10px;
            box-shadow: 0 0 5px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>
    <h1>Finplayz Ai Edugame</h1>
    <div class="board">
        <?php
        $positions = [
            0,1,2,3,4,5,6,7,8,9,10,
            39,null,null,null,null,null,null,null,null,null,11,
            38,null,null,null,null,null,null,null,null,null,12,
            37,null,null,null,null,null,null,null,null,null,13,
            36,null,null,null,null,null,null,null,null,null,14,
            35,null,null,null,null,null,null,null,null,null,15,
            34,null,null,null,null,null,null,null,null,null,16,
            33,null,null,null,null,null,null,null,null,null,17,
            32,null,null,null,null,null,null,null,null,null,18,
            31,null,null,null,null,null,null,null,null,null,19,
            30,29,28,27,26,25,24,23,22,21,20
        ];

        function getTileClass($name) {
            if (in_array($name, ['Income Tax', 'Luxury Tax'])) return 'tax';
            if (in_array($name, ['Chance', 'Community Chest'])) return 'card';
            if (strpos($name, 'Railroad') !== false || $name === 'Short Line') return 'station';
            if (in_array($name, ['Water Works', 'Electric Company'])) return 'utility';
            if (in_array($name, ['GO', 'Jail / Just Visiting', 'Free Parking', 'Go to Jail'])) return 'corner special';
            return 'property';
        }

        foreach ($positions as $pos) {
            if ($pos === null) {
                echo "<div class='cell'></div>";
            } else {
                $tile = $game['tiles'][$pos];
                $tile_class = getTileClass($tile['name']);
                if (isset($tile['owner']) && $tile['owner'] !== null) {
                    $tile_class .= " owned-p" . $tile['owner'];
                }

                echo "<div class='cell {$tile_class}'>";
                echo "<strong>" . htmlspecialchars($tile['name']) . "</strong><br>";
                if (isset($property_prices[$tile['name']]) && $tile['owner'] === null) {
                    echo "<small style='color: #555;'>\$" . $property_prices[$tile['name']] . "</small>";
                }

                foreach ($game['players'] as $pi => $pl) {
                    if ($pl['position'] === $pos) {
                        echo "<div class='player p{$pi}' title='" . htmlspecialchars($pl['name']) . "'></div>";
                    }
                }
                echo "</div>";
            }
        }
        ?>
    </div>

    <div class="status">
        <p><strong>Status:</strong><br><?= htmlspecialchars($game['message']) ?></p>
    </div>

    <?php if ($game['can_buy'] && $game['buy_position'] !== null): ?>
        <form method="post" style="margin-bottom:20px;">
            <input type="hidden" name="action" value="buy">
            <button type="submit">Beli Properti Ini</button>
        </form>
    <?php else: ?>
        <form method="post" style="display:inline;">
            <input type="hidden" name="action" value="roll">
            <button type="submit">Giliran <?= htmlspecialchars($game['players'][$game['current_player']]['name']) ?>: Lempar Dadu</button>
        </form>
    <?php endif; ?>

    <form method="post" action="game.php" style="display:inline;">
        <input type="hidden" name="action" value="reset">
        <button type="submit">Reset Game</button>
    </form>

    <h2>Info Pemain</h2>
    <ul>
        <?php foreach ($game['players'] as $p): ?>
            <li><strong><?= htmlspecialchars($p['name']) ?></strong> - Uang: $<?= (int)$p['money'] ?></li>
        <?php endforeach; ?>
    </ul>

    <div class="back-button">
        <a href="index.php" class="btn-back">🏠 Kembali ke Beranda</a>
    </div>
</body>
</html>
