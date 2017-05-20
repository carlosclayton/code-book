<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use CodeEduUser\Models\Role;

class CreateRoleAuthorData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Role::create([
           'name' => config('codeedubook.acl.role_author'),
           'description' => config('codeedubook.acl.role_author_description')
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $role = Role::where('name', config('codeedubook.acl.role_author'))->first();
        $role->permissions()->detach();
        $role->users()->detach();
        $role->delete();
    }
}
