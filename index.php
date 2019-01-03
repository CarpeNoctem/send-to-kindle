<?
require('config.php');

require('user_auth.php');
$current_user = get_user();

require('html_writer.php');
write_html('heading');

if ($current_user === 'kindle')
    include(LINK_FILE);
else
    include('form.html');

if ($current_user === 'kindle_admin') {
    require('valid_url.php');
    $valid_url = valid_url($_POST['input']);
    if ($valid_url) {
        write_html('link_to_file', $valid_url);
        write_html('success');
    }
    include(LINK_FILE);
}

write_html('footer');
?>

