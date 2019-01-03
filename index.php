<?
define('LINK_FILE', 'link_eiyu87gjpSi.html');
define('KINDLE_PASS', 'aca61a14fe58bf457a859a2d2472aa07584deed5b5f537110faa5317057d');
define('KINDLE_ADMIN_PASS', 'fc8252c8dc55839967c58b9ad755a59b61b67c13227ddae4bd3f78a38bf39');
define('COOKIE_NAME', 'iye989n7KpGJLaTGdsrFv');

require('user_auth.php');
$current_user = get_user();

echo '<html><head><meta name="viewport" content="width=device-width, initial-scale=1.0"></head><body>';

if ($current_user === 'kindle')
    include(LINK_FILE);
else
    include('form.html');

if ($current_user === 'kindle_admin') {
    require('valid_url.php');
    $valid_url = valid_url($_POST['input']);
    if ($valid_url) {
        $valid_link = '<a href="' . htmlentities($valid_url) . '">' . htmlentities($valid_url) . '</a>';
        file_put_contents(LINK_FILE, $valid_link);
        echo '( ")b &nbsp;';
    }
    include(LINK_FILE);
}
?>
<script type='text/JavaScript'>document.getElementById('input').focus();</script>
</body></html>
