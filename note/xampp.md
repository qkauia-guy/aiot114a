<!-- markdownlint-disable -->

## [xampp](https://www.apachefriends.org/download.html)

 1. 進 xampp資料夾 setup_xampp 啟動
 2. 以權限管理員執行xampp
 3. 進入config
 4. Browser 指定chrome路徑

 ### Host架設

0. 檢查IP是否更動

- `$ipconfig`

1. 指定新增資料夾(對應檔名和路徑)
 ![20250521082747](https://raw.githubusercontent.com/qkauia-guy/pic/main/20250521082747.png)

2. IP命名

 ![20250521082905](https://raw.githubusercontent.com/qkauia-guy/pic/main/20250521082905.png)

3. 慣例設定路徑
![20250521083241](https://raw.githubusercontent.com/qkauia-guy/pic/main/20250521083241.png)

4. 非慣例設定路徑

```
<Directory "C:/xampp/phpmyadmin.test">
	Options Indexes FollowSymLinks Includes ExecCGI
	AllowOverride All
	Require all granted
</Directory>
```

![20250521092751](https://raw.githubusercontent.com/qkauia-guy/pic/main/20250521092751.png)

5. `ping aiot114a.test` (ping IP也可以)

6. 在指定資料夾下建立index.html測試

7. 打開 Chrome(輸入aiot114a.test)進行測試有沒有連上

**注意命名兩端的Hosts**

### FileZilla 使用者登入

1. 啟動 FileZilla

![20250521081026](https://raw.githubusercontent.com/qkauia-guy/pic/main/20250521081026.png)

![20250522105850](https://raw.githubusercontent.com/qkauia-guy/pic/main/20250522105850.png)

2. edit / users

![20250521081246](https://raw.githubusercontent.com/qkauia-guy/pic/main/20250521081246.png)

3. 建立使用者 / 設定密碼

![20250521081357](https://raw.githubusercontent.com/qkauia-guy/pic/main/20250521081357.png)

4. 指定上傳資料夾

![20250521081803](https://raw.githubusercontent.com/qkauia-guy/pic/main/20250521081803.png)

5. 設定權限

![20250521081454](https://raw.githubusercontent.com/qkauia-guy/pic/main/20250521081454.png)

6. `$ftp 職前@localhost`測試是否連上ftp

7. 成功執行會要求輸入使用者跟密碼

![20250522110415](https://raw.githubusercontent.com/qkauia-guy/pic/main/20250522110415.png)

### SSH 登入

`$ssh 職前@localhost`

### SSH 登入(指令輸入簡化設定)

1. 建立 **cofig** 文件放置在 **users/職前/.ssh**

```
# SSH 無密碼登入設定（對應 SFTP 也會自動套用）
#vm-aiot114a
Host aiot114a.test
HostName aiot114a.test
IdentityFile C:/Users/職前/.ssh/id_rsa
IdentitiesOnly yes
Port 22
User qkauia
ForwardX11 yes
```

2. `$ssh aiot114a.test`

### SSH 登入(無需密碼)

0. 建立tools/nano 存放 D:\

1. 虛擬機/系統/系統資訊/環境變數/選取path/新增 D:\tools\

2. **如果已經建立跳此步驟** ( 沒有狀況 `$ssh-keygen.exe -t rsa` )

3. users/user `$nano authorized_keys` (介面建立也行)

4. 把公鑰(id_rsa.pub)貼上儲存

5. 在 **C:\ProgramData\ssh\sshd_config** 最後兩行註解

![20250522112035](https://raw.githubusercontent.com/qkauia-guy/pic/main/20250522112035.png)

```
# 最後兩行註解
#Match Group administrators
       #AuthorizedKeysFile __PROGRAMDATA__/ssh/administrators_authorized_keys
```

6. **服務/OpenSSH重新啟動**

- `$Restart-Service sshd`

7. `ssh 職前@localhost`

#### Vscode 套件 SFTP 資料上傳

1. 下載套件 SFTP( 作者:Natizyskunk )

![20250522104842](https://raw.githubusercontent.com/qkauia-guy/pic/main/20250522104842.png)

2. F1 -> sftp config

3. 設定檔設定

```
    # 使用 傳統 FTP 
{
    "name": "aiot114a-v1", # 自己取
    "host": "aiot114a.test", # ip命名
    "protocol": "ftp", # 改為ftp
    "port": 21, # 改 21
    "username": "aiot114a.test", # 使用者資料
    "password": "10251025",
    "remotePath": "/",
    "uploadOnSave": false, # 自動upload
    "useTempFile": false,
    "openSsh": false
}
```

```
#  使用 SFTP
// 使用密碼登入：
{
  "name": "aiot114a-vm",
  "host": "aiot114a.test",
  "protocol": "sftp",
  "port": 22,
  "username": "user",
  "password": "qaz@wsx",
  "remotePath": "C:/xampp/htdocs/aiot114a.test",
  "uploadOnSave": false,
  "useTempFile": false,
  "openSsh": false
}

// 免密碼登入：
{
  "name": "aiot114a-vm",
  "host": "aiot114a.test",
  "protocol": "sftp",
  "port": 22,
  "username": "user",
  "privateKeyPath": "C:/Users/allen/.ssh/id_rsa",
  "remotePath": "C:/xampp/htdocs/aiot114a.test",
  "uploadOnSave": false,
  "useTempFile": false,
  "openSsh": false
}

```

4. 檔案同步(vscode 檔案右鍵 **upload file**)

5. 其他

| 選項                 | 功能說明                  |
| ------------------ | --------------------- |
| `Upload (Sync)`    | 把目前檔案或資料夾**上傳**到遠端伺服器 |
| `Download (Sync)`  | 把伺服器上的檔案**下載**覆蓋到本地   |
| `Diff with Remote` | 比較本地與遠端版本差異           |

 ### 總結

 | 類別                | 功能            | 設定位置 | 是否讓你免密碼登入     |
| ----------------- | ------------- | ---- | ------------- |
| `~/.ssh/config`   | 記住登入設定（帳號、鑰匙） | 本機   | ❌ 不會自己讓你免密碼登入 |
| `authorized_keys` | 驗證你持有正確金鑰     | 伺服器  | ✅ 允許免密碼登入     |
| `sshd_config`     | 控制伺服器接受金鑰登入   | 伺服器  | ✅ 搭配使用        |
| `ssh-keygen`      | 產生金鑰對         | 本機   | ✅（產生私鑰和公鑰）    |

![20250522130027](https://raw.githubusercontent.com/qkauia-guy/pic/main/20250522130027.png)