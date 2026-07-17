import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({

    // Viteで使用するプラグイン
    plugins: [
        laravel({
            // Viteのエントリーポイント
            input: 'resources/js/app.ts',

            // BladeやVueファイルの変更時に自動でブラウザを更新
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],

    // Docker環境でVite開発サーバーへアクセスするための設定
    server: {
        // コンテナ外からアクセスできるようにする
        host: '0.0.0.0',

        // Vite開発サーバーのポート番号
        port: 5173,

        // ポート番号を固定する
        strictPort: true,

        // ブラウザとViteを接続するための設定
        hmr: {
            // ブラウザから接続するホスト名
            host: 'localhost',

            // HMRで使用するポート番号
            port: 5173,
        },
        
        // Docker環境でファイル変更を検知できるようにする
        watch: {
            // 定期的にファイルを監視し、変更を検知する
            usePolling: true,
            //interval: 100,
        },

    },
});