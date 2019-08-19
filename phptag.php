<!--最常见-->
<?php echo '学院君1' . PHP_EOL; ?>

<!--script标签（在 PHP7 中被移除）-->
<script language="php">
    echo '学院君2'.PHP_EOL;
</script>

<!--短标签，需要在 php.ini 中开启 short_open_tag-->
<? echo '学院君3' . PHP_EOL; ?>

<!--类 ASP 风格，需要在 php.ini 中开启 asp_tags（在 PHP7 中被移除）-->
<% echo '学院君4' . PHP_EOL; %>