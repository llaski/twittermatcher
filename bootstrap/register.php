<?php

/*
|--------------------------------------------------------------------------
| IoC Bindings - Move out eventually
|--------------------------------------------------------------------------
*/

App::bind('TwitterMatcher\GameData\GameDataRepositoryInterface', 'TwitterMatcher\GameData\EloquentGameDataRepository');
App::bind('TwitterMatcher\GameData\RetrieveGameDataRepositoryInterface', 'TwitterMatcher\GameData\ScraperRetrieveGameDataRepository');