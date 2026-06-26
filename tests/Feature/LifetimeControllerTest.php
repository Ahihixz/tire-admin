<?php

namespace Tests\Feature;

use App\Models\Lifetime;
use App\Models\Tire;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LifetimeControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_lifetime_record(): void
    {
        $user = User::factory()->create([
            'email_verified_at' => now(),
        ]);

        $tire = Tire::factory()->create();

        $response = $this->actingAs($user)
            ->post(route('lifetimes.store'), [
                'tire_id' => $tire->id,
                'hm_install' => 100,
                'hm_current' => 150,
                'km_install' => 2000,
                'km_current' => 2500,
                'max_lifetime_hm' => 10000,
                'max_lifetime_km' => 300000,
                'average_hm_per_day' => 5,
                'notes' => 'Test lifetime entry',
            ]);

        $response->assertRedirect(route('lifetimes.index'));
        $this->assertDatabaseHas('lifetimes', [
            'tire_id' => $tire->id,
            'hm_install' => 100,
            'hm_current' => 150,
            'notes' => 'Test lifetime entry',
        ]);
    }

    public function test_can_delete_lifetime_record(): void
    {
        $user = User::factory()->create([
            'email_verified_at' => now(),
        ]);

        $tire = Tire::factory()->create();
        $lifetime = Lifetime::factory()->create([
            'tire_id' => $tire->id,
            'hm_install' => 100,
            'hm_current' => 150,
        ]);

        $response = $this->actingAs($user)
            ->delete(route('lifetimes.destroy', $lifetime));

        $response->assertRedirect(route('lifetimes.index'));
        $this->assertDatabaseMissing('lifetimes', ['id' => $lifetime->id]);
    }
}
