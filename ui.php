<?php
include_once 'config.php';

function html_header() {
    global $site_title;
    global $site_favicon;
    global $site_toolbartitle;
?>
<!DOCTYPE html>
<html lang="zh" class="mdui-theme-dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $site_title;?></title>
    <link rel="icon" href="<?php echo $site_favicon;?>" />
    <link rel="stylesheet" href="https://unpkg.com/mdui@2/mdui.css" />
    <script src="https://unpkg.com/mdui@2/mdui.global.js"></script>
    <style>
        .container {
            margin-top: 8px; 
        }
        .linkcardinfo {
            margin: 16px;
            color: white;
        }
        .linkcard {
            transition: transform 0.3s ease; 
        }
        .linkcard:hover {
            transform: translateY(-10px); 
        }
    </style>
</head>
<body>
    <mdui-top-app-bar style="position: relative; ">
        <?php if ($site_favicon != "") { ?><img src="<?php echo $site_favicon;?>" width="40px" /><?php } ?>
        <mdui-top-app-bar-title><?php echo $site_toolbartitle;?></mdui-top-app-bar-title>
        <div style="flex-grow: 1"></div>
    </mdui-top-app-bar>

<?php
}

function html_footer() {
?>
    <footer style="margin-top: 30px; color: gray;">
        <center>
            &copy; Rocosteve.CN
        </center>
        <br>
    </footer>
</body>
</html>
<?php
}

function verifiedicon($size) { // from tabler.io/icons
    $icon = ' <svg xmlns="http://www.w3.org/2000/svg" width="'.$size.'" height="'.$size.'" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-rosette-discount-check"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M12.01 2.011a3.2 3.2 0 0 1 2.113 .797l.154 .145l.698 .698a1.2 1.2 0 0 0 .71 .341l.135 .008h1a3.2 3.2 0 0 1 3.195 3.018l.005 .182v1c0 .27 .092 .533 .258 .743l.09 .1l.697 .698a3.2 3.2 0 0 1 .147 4.382l-.145 .154l-.698 .698a1.2 1.2 0 0 0 -.341 .71l-.008 .135v1a3.2 3.2 0 0 1 -3.018 3.195l-.182 .005h-1a1.2 1.2 0 0 0 -.743 .258l-.1 .09l-.698 .697a3.2 3.2 0 0 1 -4.382 .147l-.154 -.145l-.698 -.698a1.2 1.2 0 0 0 -.71 -.341l-.135 -.008h-1a3.2 3.2 0 0 1 -3.195 -3.018l-.005 -.182v-1a1.2 1.2 0 0 0 -.258 -.743l-.09 -.1l-.697 -.698a3.2 3.2 0 0 1 -.147 -4.382l.145 -.154l.698 -.698a1.2 1.2 0 0 0 .341 -.71l.008 -.135v-1l.005 -.182a3.2 3.2 0 0 1 3.013 -3.013l.182 -.005h1a1.2 1.2 0 0 0 .743 -.258l.1 -.09l.698 -.697a3.2 3.2 0 0 1 2.269 -.944zm3.697 7.282a1 1 0 0 0 -1.414 0l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.32 1.497l2 2l.094 .083a1 1 0 0 0 1.32 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" /></svg>';
    return $icon;
}

function html_showlinks($links) {
?>
<center><h1>我的朋友们</h1></center><br>
<center>
    <div class="container">
        <?php 
        foreach ($links as $link) {
        ?>
        <a href="<?php echo $link['link'];?>" target="_blank" rel="noopener noreferrer nofollow" style="text-decoration: none;">
            <mdui-card variant="filled" style="width: 332px;height: 123px; margin: 12px;" class="linkcard">
                <div class="linkcardinfo">
                    <div style="display: flex; gap: 10px;">
                        <mdui-avatar src="./frdbase/favicon/<?php echo $link['icon'];?>"></mdui-avatar>
                        <table style="margin-top: -7px;text-align: left;">
                            <tr>
                                <th><?php echo $link['name']; if ($link['verified'] == 1) echo " ".verifiedicon(14);?></th>
                            </tr>
                            <tr>
                                <td style="color: gray;"><?php echo $link['link'];?></td>
                            </tr>
                        </table>
                    </div>
                    <p><?php echo $link['desc']?></p>
                </div>
            </mdui-card>
        </a>
        <?php } ?>
    </div>
</center>
<?php
}

function html_applysection() {
    global $site_applylink;
    global $site_webmastermail;
    $applylink = $site_applylink;
    if ($applylink == "") {
        $applylink = "mailto:" . $site_webmastermail . "?body=%E5%90%8D%E7%A7%B0%20-%3E%20%0A%E5%9B%BE%E6%A0%87%20-%3E%20%0A%E5%9C%B0%E5%9D%80%20-%3E%20%0A%E6%A0%87%E8%AF%AD%20-%3E%20%0A%0A%E9%99%84%E5%8A%A0%E5%86%85%E5%AE%B9%20(%E5%8F%AF%E7%95%99%E7%A9%BA)%20%EF%BC%9A";
    }
?>
<center><h1>申请加入友链</h1></center>
    <center>
    <div class="container" style="margin-top: 50px;">
        <h3>申请要求</h3>
        <p><?php echo file_get_contents("rules.txt");?></p>
    </div>
    <div class="container" style="margin-top: 30px;">
        <h3>申请方式</h3>
        <?php if ($site_webmastermail != "") { ?>
        <p>按照以下格式发送邮件到 <?php echo $site_webmastermail;?> </p>
        <mdui-card variant="elevated" style="width: 500px;height: 200px; text-align: left;"><br>
            名称   -> Example <br>
            图标   -> https://img.example.com/fav.jpg <br>
            地址   -> https://www.example.com <br>
            标语   -> Just So So… <br> <br>

            [如果有附加内容，请直接插入于邮件末尾]
        </mdui-card>
        <p>或点击下方按钮</p>
        <?php } ?>
        <?php if ($site_applylink != "" || $site_webmastermail != ""):?>
        <a href="<?php echo $applylink;?>" style="text-decoration: none;"><mdui-button variant="tonal">开始申请</mdui-button></a>
        <?php else: echo "申请通道暂时关闭";endif; ?>
    </div>
    </center>
<?php
}

function html_applyforlinks() {
?>
    <div class="container" style="margin-top: 56px;">
        <center><a href="?apply" style="text-decoration: none;"><mdui-button variant="tonal">申请加入友链</mdui-button></a></center>
    </div>
<?php
}

function html_backtohome() {
?>
    <div class="container" style="margin-top: 56px;">
        <center><a href="?" style="text-decoration: none;"><mdui-button variant="tonal">回到主页</mdui-button></a></center>
    </div>
<?php
}
