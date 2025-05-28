<!-- markdownlint-disable -->

```
// ============================== PHP 環境設定相關 ===================== //
  "php.validate.enable": true,              // 啟用 PHP 驗證
  "php.validate.run": "onSave",             // 控制在何時機 (onSave、onType) 作驗證
  "php.validate.executablePath": "C:/xampp/php/php.exe",  // ✅ 正確指定 PHP 執行檔路徑

  // ============================== PHP IntelliSense ===================== //
  "php.suggest.basic": false,               // 禁用 VScode 內建的 PHP 智能感知
  "phpfmt.php_bin": "C:/xampp/php/php.exe",
  "editor.accessibilitySupport": "on" // phpfmt 的 PHP 執行檔路徑（這是格式化工具用）
```