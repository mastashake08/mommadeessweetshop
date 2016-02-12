<?php

namespace App\Listeners;

use App\Events\PurchaseMade;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Mail\Mailer;

class PurchaseMadeListener
{
  public $mailer;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Mailer $mailer)
    {
        //
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  PurchaseMade  $event
     * @return void
     */
    public function handle(PurchaseMade $event)
    {
        //
        $text = "THIS IS A TEST!!!!!! New order placed by {$event->order->name}, they ordered {$event->order->quantity} tins, to be shipped to {$event->order->address}";
        $this->mailer->raw($text, function ($message) {
    //
    $message->from('orders@mommadeessweetshop.com', 'Momma Dees Sweet Shop');

    $message->to(env('PHONE'))->cc(env('PHONE_SECONDARY'));
});
    }
}
