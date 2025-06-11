<!-- markdownlint-disable -->

# 在 Windows 上顯示 Raspberry Pi GUI 程式的完整流程

## 🧾 一、準備工作（只需做一次）

### 1. 安裝 VcXsrv（Windows 的 X Server）
- 前往下載：[https://sourceforge.net/projects/vcxsrv/](https://sourceforge.net/projects/vcxsrv/)
- 安裝完成後，在開始選單找到 `XLaunch`

---

## 🚀 二、啟動 VcXsrv（每次使用前要做）

1. 開啟 **XLaunch**
2. 選擇以下設定：

| 步驟 | 選項 |
|------|------|
| Step 1 | ✅ Multiple Windows<br>✅ Display number: `0` |
| Step 2 | ✅ Start no client |
| Step 3 | ✅ Disable access control（很重要） |
| Step 4 | 點擊 `Finish` 啟動 |

📌 這時你會看到右下角有個「X」圖示（表示 VcXsrv 已啟動）

---

## 🧑‍💻 三、設定 PuTTY 並連線 Raspberry Pi

1. 開啟 **PuTTY**
2. 在左側選單 → `Connection > SSH > X11`
3. 設定如下：
   - ✅ 勾選 `Enable X11 forwarding`
   - `X display location`: 填入 `localhost:0`

---

## ✅ 四、登入後確認 X11 是否成功轉送

1. 輸入：
   ```bash
   echo $DISPLAY
   ```
   預期應該看到：
   ```
   localhost:10.0
   ```

2. 測試 GUI 程式（例如）：
   ```bash
   xclock
   ```
   若畫面跳出時鐘 → 🎉 成功！

**有時候顯示視窗可能跳到後面,可以 alt + tab 查看**

3. 掛上註解

  ![20250611123014](https://raw.githubusercontent.com/qkauia-guy/note_pic/main/20250611123014.png)
---

## 🛠️ 五、常見圖形程式你可以嘗試：

| 程式 | 功能 | 指令 |
|------|------|------|
| `xclock` | 測試用時鐘 | `xclock` |
| `xeyes` | 跟著滑鼠動的眼睛 | `xeyes` |
| `xterm` | 圖形終端機 | `xterm` |
| `leafpad` | 簡單文字編輯器 | `sudo apt install leafpad -y`<br>`leafpad` |

---
