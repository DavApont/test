<?php

class SentrySeeder extends Seeder {

    public function run()
    {
        DB::table('seguridad.users')->delete();
        DB::table('seguridad.groups')->delete();
        DB::table('seguridad.users_groups')->delete();

        Sentry::getUserProvider()->create(array(
            'email' => 'admin@localhost.com',
            'username'       => 'administrador',
            'first_name'  => 'Administrador',
            'last_name'   => 'Administrador',
            'password'    => "123456",
            'activated'   => 1,
        ));

        Sentry::getGroupProvider()->create(array(
            'name'        => 'Admin',
            'permissions' => array(
                'superuser' => 1,
            ),
        ));

        $user  = Sentry::getUserProvider()->findByLogin('administrador');
        $adminGroup = Sentry::getGroupProvider()->findByName('Admin');
        $user->addGroup($adminGroup);
    }
}