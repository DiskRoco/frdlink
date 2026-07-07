### Frdlink友链展示
---
![主界面展示 https://frd.srowo.cn](https://files.srowo.cn/img/frdlinkdemo/main.png)

一个简易的友链中心，数据全部存储于 `./frdbase`。

通过新增/修改/删除 `./frdbase` 中的json文件，阁下可以自由修改所展示的友链信息

阁下也可以通过修改 `config.php` / `ui.php` 自定义界面

访问 `https://[YOURDOMAIN]/?json` 将会以json格式输出所有友链信息，可利用这个将友链嵌入到自己的其他站点。比如：

![外挂示例 https://blog.srowo.cn](https://files.srowo.cn/img/frdlinkdemo/expansion.png)

---

#### config说明

| | |
| --- | --- |
| $site_title | 显示于标签页的标题 |
| $site_toolbartitle | 显示于网站顶部的标题 |
| $site_favicon | 网站徽标 |
| $site_webmastermail | 接受友链申请的邮箱 |
| $site_applylink | 接受友链申请的链接，为空时将自动生成 mailto 指向 $site_webmastermail |

当 $site_webmastermail 与 $site_applylink 同时为空时，将会提示 `申请通道暂时关闭`


#### frdbase中的json文件说明 

| | |
| --- | --- |
| name | 友链名称 |
| icon | 友链图标。默认固定从favicon文件夹中提取，可以通过修改 `ui.php` 自定义获取方式 |
| link | 友链链接 |
| desc | 友链介绍 |
| verified | 设定为1时友链名称右侧将会出现认证符号 |
| ref | 未定义 |
