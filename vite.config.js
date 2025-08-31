import { defineConfig } from "vite";
import path from "path";

export default defineConfig({
    root: "assets",                 // точка входа для dev
    base: "/",                      // важен для корретных ссылок
    server: {
        host: "localhost",
        port: 5173,
        strictPort: true,
        // Разрешаем запросы с WP-домена (поменяй на свой)
        cors: {
            origin: ["http://be-cute.local"], // ← твой домен WP
            credentials: false
        },
        hmr: {
            host: "localhost",
            protocol: "ws",
            port: 5173
        }
    },
    build: {
        manifest: true,
        outDir: path.resolve(__dirname, "dist"),
        emptyOutDir: true,
        rollupOptions: {
            input: path.resolve(__dirname, "assets/src/js/main.js"),
        },
    },
});
