<?php

namespace App\Mail;

use App\Reservasi;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RoomReservedMail extends Mailable
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

    /**
     * @param mixed $unik
     */
    public function setUnik($unik)
    {
        $this->unik = $unik;
    }

    /**
     * @return mixed
     */
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
        $subject = '[Riverstone Hotel] Congratulations! Your Reservation Has Made';
        return $this->view('mail.confirmation')
            ->from($address, $name)
            ->subject($subject)
            ->with([
                'reservasi' => $this->reservasi,
                'unik' => $this->getUnik()
            ]);
    }
}
