<?php
namespace App\Mail;

use App\Models\CutiApproval;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CutiNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $cuti;
    public $pengaju;
    public $approvals;

    public function __construct($cuti)
    {
        $this->cuti = $cuti;
        
        // Ambil data user yang mengajukan cuti
        $this->pengaju = User::with('profil')->where('id', $cuti->user_id)->first();

        // Ambil data approval cuti
        $this->approvals = CutiApproval::where('cuti_id', $cuti->id)->get();
    }

    public function build()
    {
        return $this->from(config('mail.from.address'))
                    ->subject('Notifikasi Pengajuan Cuti')
                    ->view('emails.cuti')
                    ->with([
                        'cuti' => $this->cuti,
                        'pengaju' => $this->pengaju,
                        'approvals' => $this->approvals,
                    ]);
    }
}
