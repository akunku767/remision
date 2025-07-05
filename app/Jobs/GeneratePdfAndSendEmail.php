<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;

class GeneratePdfAndSendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;
    protected $user;

    /**
     * Create a new job instance.
     */
    public function __construct($data, $user)
    {
        $this->data = $data;
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        // Generate PDF
        $pdf = Pdf::loadView('admin.layout.pdf.TestResult', $this->data)
            ->setPaper('A4', 'portrait')
            ->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);

        // Simpan PDF di folder `public/`
        $pdfFileName = 'TestResult_' . Str::random(10) . '.pdf';
        $filePath = public_path($pdfFileName); // Simpan langsung di public/

        file_put_contents($filePath, $pdf->output());

        // Kirim email dengan lampiran PDF
        Mail::send([], [], function ($message) use ($filePath, $pdfFileName) {
            $message->to($this->user->email)
                ->subject('Hasil Uji Emisi')
                ->html(view('admin.layout.mail.TestResult', $this->data)->render())
                ->attach($filePath, [ // PAKAI $filePath, BUKAN storage_path()
                    'as' => $pdfFileName,
                    'mime' => 'application/pdf'
                ]);
        });

        // Mail::send([], [], function ($message) {
        //     $message->to('segalalomba123@gmail.com')
        //         ->subject('Hasil Uji Emisi')
        //         ->setBody('Ini adalah hasil uji emisi kendaraan Anda. Terima kasih.', 'text/plain');
        // });

        // Hapus file PDF setelah email terkirim
        unlink($filePath);
    }
}
