<script setup lang="ts">
// Inertiaの画面遷移機能を使用するためにrouterを読み込む
import { router } from '@inertiajs/vue3';

/**
 * 「閉じる」ボタン押下時の処理
 * お問い合わせ入力画面へ画面遷移する
 */
const backToForm = () => {
    // 入力画面（/）へ画面遷移する
    router.get('/');
};
</script>

<template>
    <h1 class="contact-form-title">お問い合わせフォーム</h1>

    <div class="contact-form">

        <div  class="complete-message">
            <p>お問い合わせを受け付けました。</p>
            <p>
                お問い合わせ内容はご登録いただいたメールアドレス宛に
                お送りしております。
            </p>
            <p>
                折り返し弊社担当者よりご連絡させていただきます。
            </p>
        </div>

        <div class="button-area">
            <button class="cancel-button" type="button" @click="backToForm">閉じる</button>
        </div>

    </div>
</template>

<style scoped>
/* 送信完了メッセージの下に余白を設定する */
.complete-message {
    margin-bottom: 40px;
}

/* 閉じるボタンを中央に配置する */
.button-area {
    display: flex;
    justify-content: center;
}
</style>