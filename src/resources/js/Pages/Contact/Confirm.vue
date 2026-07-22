<script setup lang="ts">

// フォームの状態管理や送信を行うため、useFormをインポートする
import { useForm } from '@inertiajs/vue3';

// FormControllerから渡されたデータを受け取る
// ※<template>内で値を表示させる為に必要
// ※JavaScript内でも値を使用するため、propsに代入する
const props = defineProps<{
    form: {
        company_nm: string;
        nm_myouzi: string;
        nm_mei: string;
        zip: string;
        address1: string;
        address2: string;
        mail_address: string;
        message: string;
        kiyaku: boolean;
    };
}>();

// 確認画面で表示しているデータを、送信用フォームとして保持する
const form = useForm({
    company_nm: props.form.company_nm,
    nm_myouzi: props.form.nm_myouzi,
    nm_mei: props.form.nm_mei,
    zip: props.form.zip,
    address1: props.form.address1,
    address2: props.form.address2,
    mail_address: props.form.mail_address,
    message: props.form.message,
    kiyaku: props.form.kiyaku,
});

// 送信ボタンが押されたら送信完了画面へPOSTする
const submit = () => {
    form.post('/complete');
};

// キャンセルボタンが押されたら前の画面へ戻る
const cancel = () => {
    window.history.back();
};

</script>

<template>
    <h1 class="contact-form-title">お問い合わせフォーム</h1>

    <form class="contact-form" @submit.prevent="submit">
        <div class="form-group">
            <label>企業名</label>
            <div>{{ form.company_nm }}</div>
        </div>

        <div class="form-group">
            <label>担当者名</label>
            <div>{{ form.nm_myouzi }} {{ form.nm_mei }}</div>
        </div>

        <div class="form-group">
            <label>住所</label>
            <div>{{ form.zip }}</div>
            <div>{{ form.address1 }}</div>
            <div>{{ form.address2 }}</div>
        </div>

        <div class="form-group">
            <label>メールアドレス</label>
            <div>{{ form.mail_address }}</div>
        </div>

        <div class="form-group">
            <label>お問い合わせ内容</label>
            <div class="confirm-value">{{ form.message }}</div>
        </div>

        <div class="button-group">
            <button class="cancel-button" type="button" @click="cancel">キャンセル</button>
            <button class="action-button" type="submit">送信</button>
        </div>
    </form>

</template>

<style scoped>

/* お問い合わせ内容の本文内に改行が入っている場合は改行して表示する */
.confirm-value {
    white-space: pre-wrap;
}

/* キャンセルと送信ボタンを横並びにする */
.button-group {
    display: flex;
    justify-content: center;
    gap: 16px;
    margin-top: 40px;
}
</style>