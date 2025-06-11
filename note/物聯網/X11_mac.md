<!-- markdownlint-disable -->

# 🍎 在 Mac 上設定 X11 遠端圖形介面顯示 Raspberry Pi 的 GUI 程式

## 🎯 目標

讓你從 macOS 使用 `ssh -X` 登入 Raspberry Pi 後，能夠在 Mac 上顯示 `xterm`, `leafpad`, `thonny` 等 GUI 應用程式的視窗。

---

## 🧰 一、在 Mac 上安裝 X11 Server

### ✅ 步驟 1：下載並安裝 XQuartz

1. 前往官網下載：  
   [https://www.xquartz.org/](https://www.xquartz.org/)

2. 下載 `.dmg` → 安裝完成後請 **重新登入或重開機 macOS**

---

## 🖥️ 二、從 Mac 使用 ssh -X 或 ssh -Y 登入 Raspberry Pi

打開終端機，輸入以下指令（將 IP 換成你的 Raspberry Pi）：

```bash
ssh -X qkauia@qkauia.pi
# 或
ssh -Y qkauia@qkauia.pi
```

登入成功後，Pi 的終端機環境就能把 GUI 視窗轉發到你的 Mac。

---

## 🧪 三、在 Pi 上執行 GUI 應用程式

登入 Pi 後，輸入以下其中一個指令：

```bash
xterm
leafpad
thonny
```

✅ 如果成功，Mac 上會跳出對應的應用程式視窗！

---

## ❗ 如果出現錯誤訊息：

例如：

```bash
xterm: Xt error: Can't open display:
xterm: DISPLAY is not set
```

請確認以下幾點：

### 🔍 1. DISPLAY 變數有設定

登入後執行：

```bash
echo $DISPLAY
```

若沒有值，請手動設定（選擇一個）：

```bash
export DISPLAY=localhost:10.0
# 或
export DISPLAY=:0
```

### 🔍 2. 不要使用 sudo 執行 GUI 程式

```bash
sudo leafpad  # ❌ 錯誤
leafpad        # ✅ 正確
```

---

## 📌 總結

| 項目 | 狀態 |
|------|------|
| 安裝 XQuartz | ✅ mac 顯示 GUI 視窗的關鍵 |
| 使用 ssh -X | ✅ 傳送圖形畫面資料 |
| Pi 上開 GUI 程式 | ✅ 不可 sudo，DISPLAY 要對 |
| 成功顯示視窗 | 🎉 GUI 出現在 macOS 上 |

---

## 💡 小技巧

若你常常登入同一台 Raspberry Pi，可以加到 `~/.ssh/config`：

```bash
Host pi
    HostName 192.168.x.x
    User pi
    ForwardX11 yes
```

這樣以後只要輸入 `ssh pi` 就能啟用 X11 轉發。
