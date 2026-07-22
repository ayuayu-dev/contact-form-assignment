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
    <h1>お問い合わせフォーム</h1>

    <div>
        お問い合わせを受け付けました。<br>
        お問い合わせ内容はご登録いただいたメールアドレス宛にお送りしております。<br>
        折り返し弊社担当者よりご連絡させていただきます。
    </div>

    <button type="button" @click="backToForm">閉じる</button>

</template>

<style scoped>
</style>