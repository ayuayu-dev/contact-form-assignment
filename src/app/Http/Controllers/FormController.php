<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
// 管理者宛メールを作成するクラス
use App\Mail\ContactAdminMail;
// 問い合わせ者宛メールを作成するクラス
use App\Mail\ContactUserMail;
// メール送信機能を利用するクラス
use Illuminate\Support\Facades\Mail;

class FormController extends Controller
{
    /**
     * 入力画面から送信されたデータを受け取り、確認画面へ渡す
     */
    public function confirm(Request $request)
    {
        //バリデーションの設定
        $request->validate(

            [
                'nm_myouzi' => 'required',
                'nm_mei' => 'required',
                'mail_address' => 'required|email',
                'message' => 'required',
                'kiyaku' => 'accepted',
            ],
            [
                'required' => ':attributeをご入力ください。',
                'accepted' => ':attributeに同意してください。',
                'email' => ':attributeには正しいメールアドレスの形式でご入力ください。',
            ],
            [
                'nm_myouzi' => '担当者名（姓）',
                'nm_mei' => '担当者名（名）',
                'mail_address' => 'メールアドレス',
                'message' => 'お問い合わせ内容',
                'kiyaku' => '利用規約',
            ],
        );
        
        // バリデーションを実行しエラーが発生した場合は、確認画面へは進まずエラーメッセージを表示する。
        // エラーがなければ以降の処理を実行する

        // 入力画面から送信されたデータを取得し、Confirm.vueへ渡す
        return Inertia::render('Contact/Confirm', [

            // リクエストで受け取ったデータをformとして渡す
            'form' => $request->all(),
        ]);
    }

    /**
     * 確認画面から送信されたデータを受け取り、送信完了画面を表示する
     */
    public function complete(Request $request)
    {
        // フォームから送信された入力内容を取得する
        $formData = $request->all();

        // 管理者宛にお問い合わせメールを送信する
        Mail::to('admin@example.com')
            ->send(new ContactAdminMail($formData));

        // 問い合わせ者宛にメールを送信する
        Mail::to($formData['mail_address'])
            ->send(new ContactUserMail($formData));

        // 送信完了画面を表示する
        return Inertia::render('Contact/Complete');
    }

}
