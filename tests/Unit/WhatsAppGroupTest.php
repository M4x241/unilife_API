<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\WhatsAppGroup;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WhatsAppGroupTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test fetching all WhatsApp group links.
     */
    public function test_fetch_all_whatsapp_group_links(): void
    {
        // Arrange: Create some WhatsApp groups
        WhatsAppGroup::factory()->create(['group_name' => 'Group 1', 'link' => 'https://chat.whatsapp.com/Group1']);
        WhatsAppGroup::factory()->create(['group_name' => 'Group 2', 'link' => 'https://chat.whatsapp.com/Group2']);

        // Act: Call the endpoint
        $response = $this->getJson('/api/whatsapp-groups');

        // Assert: Check the response
        $response->assertStatus(200);
        $response->assertJsonCount(2);
        $response->assertJsonFragment(['group_name' => 'Group 1', 'link' => 'https://chat.whatsapp.com/Group1']);
        $response->assertJsonFragment(['group_name' => 'Group 2', 'link' => 'https://chat.whatsapp.com/Group2']);
    }
}
