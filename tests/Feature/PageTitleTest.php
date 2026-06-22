<?php

use App\Models\Application;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('renders meaningful titles for guest pages', function () {
    $this->get(route('register_account'))
        ->assertOk()
        ->assertSee('<title>Create Account | Joli aayo?</title>', false)
        ->assertDontSee('Default Title');

    $this->get(route('login.page'))
        ->assertOk()
        ->assertSee('<title>Log In | Joli aayo?</title>', false)
        ->assertDontSee('Default Title');
});

it('renders meaningful titles for application pages', function () {
    $user = User::factory()->create();

    $application = Application::create([
        'user_id' => $user->id,
        'company_name' => 'Acme Corp',
        'role_title' => 'Backend Engineer',
        'status' => 'applied',
        'date_applied' => '2026-06-21',
        'job_url' => 'https://example.com/jobs/backend-engineer',
        'email' => 'jobs@example.com',
        'source' => 'Referral',
    ]);

    $this->actingAs($user);

    $this->get(route('applications.index'))
        ->assertOk()
        ->assertSee('<title>Applications | Joli aayo?</title>', false)
        ->assertDontSee('Default Title');

    $this->get(route('applications.create'))
        ->assertOk()
        ->assertSee('<title>Add Application | Joli aayo?</title>', false)
        ->assertDontSee('Default Title');

    $this->get(route('applications.show', $application))
        ->assertOk()
        ->assertSee('<title>Acme Corp | Joli aayo?</title>', false)
        ->assertDontSee('Default Title');

    $this->get(route('applications.edit', $application))
        ->assertOk()
        ->assertSee('<title>Edit Acme Corp | Joli aayo?</title>', false)
        ->assertDontSee('Default Title');
});
