<?php
namespace Tests\Traits;
use App\Models\User;
use Spatie\Permission\Models\Role;

/**
 * 
 */
trait Admin
{
    public function admin(){
        $role = Role::where('name', 'admin')->first();
        if (is_null($role)) {
            $role = Role::create(['name'=>'admin']);
        }
        $admin = User::factory()->create();
        $admin->assignRole('admin');
        return $admin;
    }
}
