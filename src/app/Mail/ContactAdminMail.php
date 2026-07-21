<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * コンストラクタ
     *
    * 確認画面で「送信」ボタンが押されたときに、
    * Controllerからお問い合わせ内容を受け取る。
    * 受け取ったデータはメール本文（admin.blade.php）で
    * $formData として使用する。
     */
    public function __construct(
        public array $formData,
    ) {
    }

    /**
     * メールの件名を設定する
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '【お問い合わせ】新しいお問い合わせが届きました',
        );
    }

    /**
     * メール本文で使用するBladeファイルを指定する
     */
    public function content(): Content
    {
        return new Content(
            // メール本文のテンプレート
            text: 'mail.admin',

            // Bladeで使用するデータを渡す
            with: [
                'formData' => $this->formData,
            ],
        );
    }

    /**
     * 添付ファイルを設定する
     *
     * 今回は添付ファイルは使わないので空のまま。
     */
    public function attachments(): array
    {
        return [];
    }
}
