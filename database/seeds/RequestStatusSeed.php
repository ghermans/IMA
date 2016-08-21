<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class RequestStatusSeed
 */
class RequestStatusSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'New request',
                'css_class' => 'label label-primary',
                'description' => 'Used for new requests.',

            ],
            [
                'name' => 'In Progress',
                'css_class' => 'label label-warning',
                'description' => 'Used for permission requests that are in progress',
            ],
            [
                'name' => 'Open',
                'css_class' => 'label label-success',
                'description' => 'Used for open requests'
            ],
            [
                'name' => 'Closed',
                'css_class' => 'label label-danger',
                'description' => 'Used for closed requests',
            ],
            [
                'name' => 'Provisioning',
                'css_class' => 'label label-warning',
                'description' => 'For requests where the settings are provisioned'
            ]
        ];

        $table = DB::table('request_statuses');
        $table->delete();
        $table->insert($data);
    }
}
