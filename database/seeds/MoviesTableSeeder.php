<?php

use Illuminate\Database\Seeder;
use App\Models\Movie;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movies = [
            [
                'name' => 'Star Wars',
                'description' => 'Star Wars is an American epic space-opera media franchise created by George Lucas. The franchise began with the eponymous 1977 film and quickly became a worldwide pop-culture phenomenon.',
            ], [
                'name' => 'The Martian',
                'description' => 'When astronauts blast off from the planet Mars, they leave behind Mark Watney (Matt Damon), presumed dead after a fierce storm. With only a meager amount of supplies, utilize his wits and spirit to find a way to survive on the hostile planet.',
            ], [
                'name' => 'Minions',
                'description' => 'Minions live to serve. Without a master to grovel for, the Minions fall into a deep depression. But one minion, Kevin, has a plan; accompanied by his pals Stuart and Bob, Kevin sets forth to find a new evil boss for his brethren to follow.',
            ], [
                'name' => 'Pulp Fiction',
                'description' => 'The lives of two mob hitmen, a boxer, a gangster and his wife, and a pair of diner bandits intertwine in four tales of violence and redemption.',
            ], [
                'name' => 'The Matrix',
                'description' => 'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.',
            ]
        ];

        foreach ($movies as $movie) {
            // check if movie exist
            $foundMovie = Movie::where('name', '=', $movie['name'])->first();

        	if (! $foundMovie instanceof Movie) {
                //  if not exist create
               Movie::create([
		            'name' => $movie['name'],
		            'description' => $movie['description']
		        ]);
            } else {
                $foundMovie->fill([
                    'description' => $movie['description']
                ])->save();
            }
        }
    }
}
