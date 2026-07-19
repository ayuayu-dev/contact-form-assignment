<script setup lang="ts">

// FormControllerから渡されたデータを受け取る
defineProps<{
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

</script>

<template>
    <h1>お問い合わせフォーム（確認画面）</h1>

        <div>
            <label>企業名</label>
            <div>{{ form.company_nm }}</div>
        </div>

        <div>
            <label>担当者名</label>
            <div>{{ form.nm_myouzi }} {{ form.nm_mei }}</div>
        </div>

        <div>
            <label>住所</label>
            <div>{{ form.zip }}</div>
            <div>{{ form.address1 }}</div>
            <div>{{ form.address2 }}</div>
        </div>

        <div>
            <label>メールアドレス</label>
            <div>{{ form.mail_address }}</div>
        </div>

        <div>
            <label>お問い合わせ内容</label>
            <div>{{ form.message }}</div>
        </div>

        <button type="button">キャンセル</button>
        <button type="submit">送信</button>

</template>

<style scoped>
</style>