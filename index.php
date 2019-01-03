<?
require('config.php');

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
</body></html>
