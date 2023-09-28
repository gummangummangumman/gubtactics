<?php

require "dotenv.php";
require "random_colours.php";
require __DIR__ . '/vendor/autoload.php';



use Discord\Discord;

(new DotEnv(__DIR__ . '/.env'))->load();

$bot_token = getenv("BOT_TOKEN");

$discord = new Discord([
    'token' => $bot_token,
]);

$discord->on('ready', function ($discord) {
    echo "Bot is ready!", PHP_EOL;

    // Listen for messages.
    $discord->on('message', function ($message, $discord) {
        if ($message->author->username == "TacticalGubser") {
            return;
        }
        echo "{$message->author->username}: {$message->content}", PHP_EOL;

        if (!str_starts_with($message->content, "!gub")) {
            return;
        }

        $map = substr($message->content, 4);
        $map = strtolower(trim($map));
        $map = str_replace("de_", "", $map);
        $map = str_replace("cs_", "", $map);

        if ($map == "office" || $map == "italy") {
            $message->reply("Play a real map");
            return;
        }

        $tactics = include "tactics.php";
        if (array_key_exists($map, $tactics)) {
            $possible_tactics = $tactics[$map] + $tactics["default"];
            $tactic = $possible_tactics[array_rand($possible_tactics)];
        } else {
            $tactic = $tactics["default"][array_rand($tactics["default"])]
                . "\n\n_Tip: for better tactics, specify the map as well, like so: `!gub mirage`, `!gub inferno` etc!_";
        }
        $tactic = replace_colours($tactic);
        $message->reply($tactic);
    });
});

$discord->run();

?>