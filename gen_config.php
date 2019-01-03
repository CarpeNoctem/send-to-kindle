<?
die('Config generator disabled by default. Remove this line (2) to use.');

if (file_exists('config_bkp.php'))
    die('Only to be used for initial setup. You should remove this file after use.');

if ($_POST['kindle'] && $_POST['admin']) {
    copy('config.php', 'config_bkp.php');
    chmod('config_bkp.php', 0600);

    $kindle_pass = hash('sha256', $_POST['kindle']);
    $admin_pass = hash('sha256', $_POST['admin']);
    $link_file = 'link_' . str_shuffle(uniqid()) . '.html';
    $cookie_name = str_shuffle(str_shuffle(uniqid()) . str_shuffle(uniqid()));

    $config = '<?'."\n";
    $config .= <<<EOC
define('LINK_FILE', '$link_file');
define('KINDLE_PASS', '$kindle_pass');
define('KINDLE_ADMIN_PASS', '$admin_pass');
define('COOKIE_NAME', '$cookie_name');

EOC;
    file_put_contents('config.php', $config);
    chmod('config.php', 0600);

    @rename('link_eiyu87gjpSi.html', $link_file);
    @chmod($link_file, 0600);

    echo 'Config written. Old config backed up to config_bkp.php.';
} else { ?>
<form action='' method='POST'>
<label for='kindle_pass'>Password for eReader: </label><input id='kindle_pass' name='kindle' type='text' /><br/>
<label for='admin_pass'>Password for sending links: </label><input id='admin_pass' name='admin' type='text' /><br/>
<input type='submit' value='Generate'/>
</form>
<? } /* end-else */ ?>
