<?php

namespace Tests\Feature\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered(): void
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
    }

/*    public function test_new_users_can_register(): void
    {
        Artisan::call('create:roles');

        $response = $this->post('/register', [
            'company_name' => 'Lery',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'phone' => '0781726433',

        ]);
        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::DASHBOARD);
    }
*/
/*    public function test_new_users_with_from_enterprise_can_regsiter(): void
    {


    }*/
}
