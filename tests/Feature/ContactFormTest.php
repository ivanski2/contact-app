<?php
namespace Tests\Feature;

use App\Mail\InquiryReceived;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    use RefreshDatabase;
    public function setUp(): void
    {
        parent::setUp();
        config(['mail.default' => 'log']);
    }
    /** @test */
    public function form_validation_works()
    {
        $response = $this->post('/contact', [
            'name' => '',
            'email' => 'invalid-email',
            'phone' => '',
            'message' => '',
        ]);

        $response->assertSessionHasErrors([
            'name',
            'email',
            'phone',
            'message',
        ]);
    }

    /** @test */
    public function form_data_is_saved_to_database()
    {
        $formData = [
            'name' => 'ivan ivanov',
            'email' => 'ivanski34@gmail.com',
            'phone' => '0895147050',
            'message' => 'Random messages',
        ];
        $this->post('/contact', $formData);

        $this->assertDatabaseHas('inquiries', $formData);
    }

    /** @test */
    public function email_notification_is_sent()
    {
        Mail::fake();

        $formData = [
            'name' => 'ivan ivanov',
            'email' => 'ivanski34@gmail.com',
            'phone' => '0895147050',
            'message' => 'Test message 2 ',
        ];

        $this->post('/contact', $formData);

        Mail::assertSent(InquiryReceived::class);

    }
}
