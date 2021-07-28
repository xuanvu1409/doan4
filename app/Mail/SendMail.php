<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Bill;
use App\Contact;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $id;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        //
        $this->id = $id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $contact = Contact::all()->first();
        $bill = Bill::find($this->id);
        $total = 0;
        foreach ($bill->bill_billdetail as $item) {
            $total += $item->quantity * $item->price;
        }
        return $this->view('send_bill')->with(['bill'=> $bill, 'total'=> $total])->from("vu140999@gmail.com", $contact->name)->subject("ĐẶT HÀNG THÀNH CÔNG");
    }
}
