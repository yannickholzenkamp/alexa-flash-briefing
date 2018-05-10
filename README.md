# alexa-flash-briefing

## Status

[![Build Status](https://travis-ci.org/yannickholzenkamp/alexa-flash-briefing.svg?branch=master)](https://travis-ci.org/yannickholzenkamp/alexa-flash-briefing)

## Description

This project can be used as a backend providing various data for Alexa Flash Briefing Skills. 
It is written in PHP and tested for version 7.1.x.

## Configuration

This projects consists of different modules, of which each one usually has a **loader** and a **getter**. A **loader** will gain the necessary data (e.g. through external API calls) and cache the data in a JSON file. This loading process is run when the Alexa Andpoint is called, but can also be optimized using a cron job to decrease the loading time of the Alexa Endpoint.
A **getter** will be called on an Alexa API request and read the cached data from the JSON file.

The loaders and getters are defined in the **config.php** file.

## Usage
todo

## Project files

- **app/** PHP project code
- **.htaccess** URL rewriting used for Slim Framework
- **.travis.yml** Travis CI configuration file
- **.after_success.sh** Continuous deployment script for Travis CI
- **composer.json** Composer configuration
- **config.php** App configuration, see [Configuration](https://github.com/yannickholzenkamp/alexa-flash-briefing#configuration)
- **cron.php** Cron endpoint, may be used from webserver to decrease API loading time
- **index.php** Alexa Flash Briefing skill endpoint
