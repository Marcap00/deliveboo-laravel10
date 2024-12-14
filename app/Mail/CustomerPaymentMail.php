<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CustomerPaymentMail extends Mailable
{
    use Queueable, SerializesModels;

    // Variables
    public $customer;
    public $customerAddress;
    public $orderId;
    public $totalPrice;
    public $itemsOrderedList = [];
    public $restaurantName;
    public $pdf;

    /**
     * Create a new message instance.
     */
    public function __construct($customer, $customerAddress, $orderId, $totalPrice, $itemsOrderedList,$restaurantName, $pdf)
    {
        $this->customer = $customer;
        $this->customerAddress = $customerAddress;
        $this->orderId = $orderId;
        $this->totalPrice = $totalPrice;
        $this->itemsOrderedList = $itemsOrderedList;
        $this->restaurantName = $restaurantName;
        $this->pdf = $pdf;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'DeliveBoo',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails/customer-payment-email',
        );
    }

    /**
     * Builds and configures the email to be sent after a successful payment.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@deliveboo.com')  // Sender Address
                    ->with([
                        $this->customer,
                        $this->customerAddress,
                        $this->orderId,
                        $this->totalPrice ,
                        // $this->itemsOrderedList, // Store the items as array
                        $this->restaurantName ,
                    ])
                    ->attachData($this->pdf->output(), 'invoice.pdf', [
                        'mime' => 'application/pdf',
                    ]);
                    ;

    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
        ];
    }
}