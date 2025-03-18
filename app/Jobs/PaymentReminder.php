<?php

namespace App\Jobs;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PaymentReminder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $contact, $payment, $date;
    /**
     * Create a new job instance.
     */
    public function __construct($contact, $payment, $date)
    {
        $this->contact = $contact;
        $this->payment = $payment;
        $this->date = $date;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            $ch         = curl_init();
            $parameters = [
                'apikey'     => '1aaad08e0678a1c60ce55ad2000be5bd', //Your API KEY
                'number'     => $this->contact,
                'message'    => "eGROWLOANS SMS \n\n" .  
"Dear Member," . "\n\n" .  
"This is a reminder that your monthly payment is due on " . Carbon::parse($this->date)->format('F d, Y') . ".\n\n" .  
"Due Date: " . Carbon::parse($this->date)->format('F d, Y') . "\n" .  
"Total Amount Due: ₱" . number_format($this->payment,2). "\n\n" .  
"Please ensure timely payment to avoid penalties. Thank you!",

                'sendername' => 'SEGU',
            ];
            curl_setopt($ch, CURLOPT_URL, 'https://semaphore.co/api/v4/messages');
            curl_setopt($ch, CURLOPT_POST, 1);

            //Send the parameters set above with the request
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));

            // Receive response from server
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $output = curl_exec($ch);

            if (curl_errno($ch)) {
                throw new \Exception(curl_error($ch)); // Catch any curl errors
            }

            curl_close($ch);

            \Log::info('Semaphore SMS Response: ' . $output);

        } catch (\Exception $e) {
            \Log::error('SMS Sending Failed: ' . $e->getMessage());
        }
    

    }
}
