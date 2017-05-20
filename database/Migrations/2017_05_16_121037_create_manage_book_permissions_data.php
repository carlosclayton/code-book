<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use CodeEduUser\Models\Permission;

class CreateManageBookPermissionsData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Permission::create([
            'name' => config('codeedubook.acl.permissions.name'),
            'description' => config('codeedubook.acl.permissions.description'),
            'resource_name' => config('codeedubook.acl.permissions.resource_name'),
            'resource_description' => config('codeedubook.acl.permissions.resource_description'),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $permission = Permission::where('name', config('codeedubook.acl.permissions.name'))
            ->where('resource_name', config('codeedubook.acl.permissions.resource_name'))->first();
        $permission->roles()->detach();
        $permission->delete();
    }
}
