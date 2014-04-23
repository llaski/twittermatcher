<?php

class GameDataControllerTest extends \TestCase {

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBindsGameDataToGetShuffledData()
    {
        $result = $this->call('GET', '/api/game-data');

        //is json
        //returns correct values for keys
        //- status
        //- msg
        //- data
        // $this->assertTrue($this->client->getResponse()->isOk());
    }

}