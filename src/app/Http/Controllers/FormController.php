<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class FormController extends Controller
{
    /**
     * 入力画面から送信されたデータを受け取り、確認画面へ渡す
     */
    public function confirm(Request $request)
    {
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
        // 今はまだデータベースへの保存は行わず、
        // 送信完了画面を表示する
        return Inertia::render('Contact/Complete');
    }

}
