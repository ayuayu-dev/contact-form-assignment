<script setup lang="ts">

// フォームの状態管理や送信を行うため、useFormをインポートする
import { useForm } from '@inertiajs/vue3';

//監視したいフォーム値を定義する
const form = useForm({
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
    <h1>お問い合わせフォーム</h1>

    <!--Inertiaを使用してPOST送信するのでブラウザ標準の送信を止める-->
    <form @submit.prevent="submit">
        <div>
            <label>企業名</label>
            <input type="text" name="company_nm" v-model="form.company_nm">
        </div>

        <div>
            <label>担当者名</label>
            <input type="text" name="nm_myouzi" v-model="form.nm_myouzi">
            <p v-if="form.errors.nm_myouzi">{{ form.errors.nm_myouzi }}</p>
            <input type="text" name="nm_mei" v-model="form.nm_mei">
            <p v-if="form.errors.nm_mei">{{ form.errors.nm_mei }}</p>
        </div>

        <div>
            <label>住所</label>
            <input type="text" name="zip" placeholder="郵便番号" v-model="form.zip">
            <input type="text" name="address1" placeholder="住所1" v-model="form.address1">
            <input type="text" name="address2" placeholder="住所2" v-model="form.address2">
        </div>

        <div>
            <label>メールアドレス</label>
            <input type="email" name="mail_address" v-model="form.mail_address">
            <p v-if="form.errors.mail_address">{{ form.errors.mail_address }}</p>
        </div>

        <div>
            <label>お問い合わせ内容</label>
            <textarea name="message" v-model="form.message"></textarea>
            <p v-if="form.errors.message">{{ form.errors.message }}</p>
        </div>

        <div>
            <input type="checkbox" name="kiyaku" value="chk" v-model="form.kiyaku"><a href="#">利用規約</a>に同意
            <p v-if="form.errors.kiyaku">{{ form.errors.kiyaku }}</p>
        </div>

        <button type="submit">確認画面へ</button>
    </form>

<pre>{{ form }}</pre>

</template>

<style scoped>
</style>