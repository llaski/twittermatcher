<?php

class TwitterAccountTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('twitter_account')->truncate();

        DB::('twitter_account')->insert(array(
            array('screen_name' => 'katyperry'),
            array('screen_name' => 'BarackObama'),
            array('screen_name' => 'ladygaga')
        ));
    }

}