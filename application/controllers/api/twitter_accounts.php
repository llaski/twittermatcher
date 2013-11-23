<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Twitter_Accounts extends CI_Controller {

	public function index()
	{
		$data = [
			[
				'name' => 'Katy Perry',
				'username' => 'KatyPerry', 
				'img' => 'https://pbs.twimg.com/profile_images/378800000631458506/6dcc65c273fabbd7de6074e21df060fa_bigger.jpeg',
				'tweet' => 'You know you\'ve been working hard when your teddy bear even smells like tiger balm.'
			],
			[
				'name' => 'Barack Obama',
				'username' => 'BarackObama',
				'img' => 'https://pbs.twimg.com/profile_images/378800000607588261/dad9f009a228a78a14f1f4bed0c54f76_bigger.png',
				'tweet' => 'Home for the holidays? It\'s a great time to talk to friends and family about getting covered. http://OFA.BO/zj6V3N  #GetTalking'
			],
			[
				'name' => 'Britney Spears',
				'username' => 'britneyspears',
				'img' => 'https://pbs.twimg.com/profile_images/378800000645997261/390ab361214480b2d9ab280155e13bb8.jpeg',
				'tweet' => 'Thank you @RyanSeacrest for inviting me to the @RyanFoundation and thanks to all of the kids for hanging out with me!'
			],
			[
				'name' => 'Cristiano Ronaldo',
				'username' => 'Cristano',
				'img' => 'https://pbs.twimg.com/profile_images/378800000766289614/c6644f181db4695ed0f90b8c499538e3_bigger.jpeg',
				'tweet' => 'I’m very happy with my own #cr7underwear line, love it! Visit http://www.cr7underwear.com  to know more http://youtu.be/vBtJ53vuRB8 '
			],
			[
				'name' => 'Bill Gates',
				'username' => 'BillGates',
				'img' => 'https://pbs.twimg.com/profile_images/1884069342/BGtwitter_bigger.JPG',
				'tweet' => 'Next month teams will compete to program Atlas, a humanitarian robot designed to save lives in disasters: http://b-gat.es/1eataCq'
			],
			[
				'name' => 'David Guetta',
				'username' => 'DavidGuetta',
				'img' => 'https://pbs.twimg.com/profile_images/378800000570636190/f90e13f2bb85b90dcc205b9f78997325_bigger.jpeg',
				'tweet' => 'wow.. last night for @UN-WHD was so magical - pls RT this video to raise funds & awareness http://youtu.be/PwIVlVUvQEI  '
			],
			[
				'name' => 'Kelley Clarkson',
				'username' => 'kelley_clarkson',
				'img' => 'https://pbs.twimg.com/profile_images/378800000600832173/fa5449c5fc18ad17e1ee27f388e020cf_bigger.jpeg',
				'tweet' => 'Watch my girl Trisha Yearwood try to teach me how to cook http://peoplem.ag/r3I97  @TYcom” ....Love her :)'
			],
			[
				'name' => 'Simon Cowell',
				'username' => 'SimonCowell',
				'img' => 'https://pbs.twimg.com/profile_images/1642774110/simoncowelltwitter2_bigger.jpg',
				'tweet' => 'Did interviews with Conan today. Insane. And then Ellen. Funny. I really like both of them.'
			],
			[
				'name' => 'Tiger Woods',
				'username' => 'TigerWoods',
				'img' => 'https://pbs.twimg.com/profile_images/378800000242478470/5069adae5efe077c6c692453622e451b_bigger.jpeg',
				'tweet' => 'Sharing this win with my son Charlie will be something I\'ll never forget. Thanks for all the support… http://instagram.com/p/comb0Py8cA/ '
			],
			[
				'name' => 'Hugh Jackman',
				'username' => 'RealHughJackman',
				'img' => 'https://pbs.twimg.com/profile_images/124111564/08_Jackman_085_bigger.jpg',
				'tweet' => 'Aussies on the verge!! Sensational centuries Dave W and Clarkey. C\'mon Aussies. C\'mon.'
			]
		];

		$this->output->set_content_type('application/json')
				->set_output(json_encode($data));
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */