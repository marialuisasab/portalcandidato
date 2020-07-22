<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{	


	public $usuarios = array (
	);

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createUsers();
    }

    private function createUsers()
    {	
    	$cont = 0;
        foreach($this->usuarios as $u){
            $this->createUser($u);
            $cont++;
        }
        $this->command->info('ATENCAO: '. $cont . ' demo users created');
    }

    private function createUser($data)
    {      	
        return User::create([
            'name' => $data[0],
            'email' => $data[1],
            'password' => Hash::make('12345678')
        ]);
    }
}
