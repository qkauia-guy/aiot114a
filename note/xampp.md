<!-- markdownlint-disable -->

### [xampp](https://www.apachefriends.org/download.html)

 1. 進 xampp資料夾 setup_xampp 啟動
 2. 以權限管理員執行xampp
 3. 進入config
 4. Browser 指定chrome路徑

 ## 虛擬主機Host架設

0. 檢查IP是否更動

- `$ipconfig`

1. 指定新增資料夾(對應檔名和路徑)
 ![20250521082747](https://raw.githubusercontent.com/qkauia-guy/pic/main/20250521082747.png)

2. hosts 檔案設定 IP命名

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

### 建立使用者

1. 啟動 FileZilla

![20250521081026](https://raw.githubusercontent.com/qkauia-guy/pic/main/20250521081026.png)

2. edit / users

![20250521081246](https://raw.githubusercontent.com/qkauia-guy/pic/main/20250521081246.png)

3. 建立使用者 / 設定密碼

![20250521081357](https://raw.githubusercontent.com/qkauia-guy/pic/main/20250521081357.png)

4. 指定上傳資料夾

![20250521081803](https://raw.githubusercontent.com/qkauia-guy/pic/main/20250521081803.png)

5. 設定權限

![20250521081454](https://raw.githubusercontent.com/qkauia-guy/pic/main/20250521081454.png)

### 測試是否連上ftp

注意命名兩端的Hosts

## vscode

1. 下載套件 SFTP( 作者:Natizyskunk )

2. F1 -> sftp config

3. 設定檔設定
```
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

4. 檔案同步

vscode 檔案右鍵 **upload file**

### SSH 登入

## nano軟件存ssh key

0. 建立tools/nano 存放 D:\

1. 虛擬機/系統/系統資訊/環境變數/選取path/新增 D:\tools\

2. 本地 ssh-keygen.exe -t rsa

3. users/user `$nano authorized_keys`

4. 把公鑰貼上儲存

5. C:\ProgramData\ssh\sshd_config 

```
# 最後兩行註解
#Match Group administrators
       #AuthorizedKeysFile __PROGRAMDATA__/ssh/administrators_authorized_keys
```

6. 服務**OpenSSH** 重新啟動

7. `ssh 職前@localhost`






| 選項                 | 功能說明                  |
| ------------------ | --------------------- |
| `Upload (Sync)`    | 把目前檔案或資料夾**上傳**到遠端伺服器 |
| `Download (Sync)`  | 把伺服器上的檔案**下載**覆蓋到本地   |
| `Diff with Remote` | 比較本地與遠端版本差異           |


 虛擬機 安裝xampp、7z壓縮、Chrome、npp、VisualStudio



SFTP
```
{
    "name": "aiot114a-v1",
    "host": "aiot114a.test",
    "protocol": "sftp",
    "port": 22,
    "username": "aiot114a.test",
    "password": "10251025",
    "remotePath": "C:/xampp/htdocs/aiot114a.test",
    "uploadOnSave": false,
    "useTempFile": false,
    "openSsh": false
}
```

```
# FTP 無密碼
#vm-aiot114a
Host aiot114a.test
HostName aiot114a.test
IdentityFile C:/Users/職前/.ssh/id_rsa
IdentitiesOnly yes
Port 22
User qkauia
ForwardX11 yes
```

1. F1 -> sftp config 設定檔：

```
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
