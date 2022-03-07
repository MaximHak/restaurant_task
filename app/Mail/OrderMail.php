<?php

namespace App\Mail;

use App\Models\Customers;
use App\Models\Orders;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public Orders $order;
    public array $order_items;
    public Customers $recent_user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order,array $cartItems = array(),$recent_user)
    {

        $this->order = $order;
        $this->recent_user = $recent_user;
        $this->order_items = $cartItems;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Confirmare mail')->view('mails.order-mail');
    }
}
