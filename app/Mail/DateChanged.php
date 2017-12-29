<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DateChanged extends Mailable
{
    use Queueable, SerializesModels;

    protected $reservasi;
    protected $unik;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Reservasi $reservasi)
    {
        $this->reservasi = $reservasi;
    }
    public function setUnik($unik)
    {
        $this->unik = $unik;
    }
    public function getUnik()
    {
        return $this->unik;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'booking@riverstone.com';
        $name = 'Riverstone';
        $subject = '[Riverstone Hotel] Sorry! Your Reservation Failed';
        return $this->view('mail.failed-confirmation')
            ->from($address, $name)
            ->subject($subject)
            ->with([
                'reservasi' => $this->reservasi,
                'unik' => $this->getUnik()
            ]);
    }
}
