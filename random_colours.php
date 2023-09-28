<?php


$player_colours = [
    "orange",
    "blue",
    "yellow",
    "green",
    "purple",
];

function replace_colours($message)
{
    if (!str_contains($message, "{colour}")) {
        return $message;
    }

    global $player_colours;
    $colour = $player_colours[array_rand($player_colours)];

    echo $colour, PHP_EOL;

    return str_replace("{colour}", $colour, $message);
}


?>