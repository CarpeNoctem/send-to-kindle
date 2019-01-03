<?

function get_user() { /* fun fact, php already has a get_current_user() */
    $current_user = FALSE;

    $user_input = $_POST['input'];
    $auth_cookie = $_COOKIE[COOKIE_NAME];

    if ($user_input === 'logout')
        setcookie(COOKIE_NAME);
    elseif ($auth_cookie === KINDLE_PASS)
        $current_user = 'kindle';
    elseif ($auth_cookie === KINDLE_ADMIN_PASS)
        $current_user = 'kindle_admin';
    elseif ($current_user === FALSE && $user_input && strlen($user_input) < 30) { /* you're not really going to type more than 30 characters on your eReader or phone, are you? */
        $hash = hash('sha256', $user_input);
        if ($hash === KINDLE_PASS)
            $current_user = 'kindle';
        elseif ($hash === KINDLE_ADMIN_PASS)
            $current_user = 'kindle_admin';

        if ($current_user)
            setcookie(COOKIE_NAME, $hash, time() + (365*24*60*60), '', '', TRUE, TRUE);
    }

    return $current_user;
}
