<!DOCTYPE html>
<html lang="fr">
    <?php include_once 'head.php'; ?>
    <body>
        <div id="page">
            <?php include_once 'header_admin.php'; ?>
            <div id="main">
                <?php echo $menuv_admin; ?>
                <?php echo $content; ?>
            </div>
            <div id="notif" style="display:none">
                <div id="withIcon">
                    <a class="ui-notify-close ui-notify-cross" href="#">x</a>
                    <div style="float:left;margin:0 10px 0 0"><img src="#{icon}" alt="warning" /></div>
                    <h1>#{title}</h1>
                    <p>#{text}</p>
                </div>
            </div>
            <?php include_once 'footer.php'; ?>
        </div>
    </body>
</html>