<?php

use Pingpong\Trusty\Entities\Role;
use Pingpong\Trusty\Entities\Permission;

class PermissionsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$permissions = array(
            'Manage Tours',
            'Manage Tour Categories',
            'Manage Setting Files'
        );

        foreach ($permissions as $permission)
        {
            Permission::create([
                'name' => $permission,
                'slug' => $permission,
                'description' => $permission,
            ]);
        }
	}

}
