<script setup lang="ts">

// フォームの状態管理や送信を行うため、useFormをインポートする
import { useForm } from '@inertiajs/vue3';

//監視したいフォーム値を定義する
//const form = useForm({
//フォームキーを指定することで、確認画面から戻った際に入力内容を保持する
const form = useForm('ContactForm', {
    company_nm: '',
    nm_myouzi: '',
    nm_mei: '',
    zip: '',
    address1: '',
    address2: '',
    mail_address: '',
    message: '',
    kiyaku: false,
});

// 入力フォームのデータを確認画面へ送信する
const submit = () => {
    form.post('/confirm');
};

</script>

<template>
    <h1 class="contact-form-title">お問い合わせフォーム</h1>

    <!--Inertiaを使用してPOST送信するのでブラウザ標準の送信を止める-->
    <form class="contact-form" @submit.prevent="submit">
        <div class="form-group">
            <label>企業名</label>
            <input type="text" name="company_nm" v-model="form.company_nm">
        </div>

        <div class="form-group">
            <label>担当者名<span class="required">必須</span></label>
            <div class="name-group">
                <div>
                    <input type="text" placeholder="姓" name="nm_myouzi" v-model="form.nm_myouzi">
                    <p class="error-message" v-if="form.errors.nm_myouzi">{{ form.errors.nm_myouzi }}</p>
                </div>
                <div>
                    <input type="text" placeholder="名" name="nm_mei" v-model="form.nm_mei">
                    <p class="error-message" v-if="form.errors.nm_mei">{{ form.errors.nm_mei }}</p>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>住所</label>
            <input type="text" class="zip-input" name="zip" placeholder="郵便番号" v-model="form.zip">
            <input type="text" name="address1" placeholder="住所1" v-model="form.address1">
            <input type="text" name="address2" placeholder="住所2" v-model="form.address2">
        </div>

        <div class="form-group">
            <label>メールアドレス<span class="required">必須</span></label>
            <input type="email" name="mail_address" v-model="form.mail_address">
            <p class="error-message" v-if="form.errors.mail_address">{{ form.errors.mail_address }}</p>
        </div>

        <div class="form-group">
            <label>お問い合わせ内容<span class="required">必須</span></label>
            <textarea name="message" v-model="form.message"></textarea>
            <p class="error-message" v-if="form.errors.message">{{ form.errors.message }}</p>
        </div>

        <div class="form-group">
            <input type="checkbox" name="kiyaku" value="chk" v-model="form.kiyaku"><a href="#">利用規約</a>に同意<span class="required">必須</span>
            <p class="error-message" v-if="form.errors.kiyaku">{{ form.errors.kiyaku }}</p>
        </div>

        <button class="action-button" type="submit">確認画面</button>
    </form>

</template>

<style scoped>

/* 入力欄とテキストエリアの共通デザインを設定する */
input[type="text"],
input[type="email"],
textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

/* お問い合わせ内容の入力欄の高さを設定する */
textarea {
    min-height: 180px;
}

/* 必須項目ラベルのデザインを設定する */
.required {
    display: inline-block;
    margin-left: 8px;
    padding: 2px 6px;
    background: #dc3545;
    color: #fff;
    font-size: 12px;
    border-radius: 3px;
}

/* 姓・名の入力欄を横並びに表示する */
.name-group {
    display: flex;
    gap: 16px;
}

/* 郵便番号入力欄の幅を設定する */
input.zip-input {
    width: 30%;
}

/* 利用規約のリンクデザインを設定する */
a {
    color: #5d9df6;
    text-decoration: underline;
}

/* バリデーションエラーメッセージのデザインを設定する */
.error-message {
    color: #dc3545;
    font-size: 14px;
    margin-top: 4px;
}

/* ボタンを中央に配置する */
.action-button {
    margin: 40px auto 0;
}

</style>