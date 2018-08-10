<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    public $id, $orderList, $quantity, $priceList, $amount, $name, $number, $adress;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($array)
    {
        $this->id = $array['id'];
        $this->orderList = $array['orderList'];
        $this->quantity = $array['quantity'];
        $this->priceList = $array['priceList'];
        $this->amount = $array['amount'];
        $this->name = $array['name'];
        $this->number = $array['number'];
        $this->adress = $array['adress'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('kabantsovlad@gmail.com')
                    ->view('mails.text');
    }
}
