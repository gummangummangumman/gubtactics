# Gub tactics!

Discord bot that tells you random tactics for counter strike, ensuring your victory!

## Use the bot

Talk to the bot on [discord](https://discordapp.com/users/1067589975283085312).

To talk to the bot either in a server or in DM, use command `!gub` followed by the name of a map.

```
!gub ancient
!gub mirage
!gub nuke
!gub dust2
!gub inferno
!gub vertigo
!gub anubis
```

## I am a developer and want to make my own version

Given that you can host a php website, there are some relatively easy steps to take if you want to make a version of this game yourself.

-   You have to make a discord bot by going to [Discord's websites](https://discord.com/developers)
-   Clone this project
-   Run `composer update` in the root of the project. (Get [composer](https://getcomposer.org/) if you don't have it installed)
-   Make a file called `.env` containg the bot token you have gotten

The .env file should have the following syntax with no spaces before the values:

```
BOT_TOKEN=
```

Save this file in the root folder of the project.

-   Run `php index.php`
