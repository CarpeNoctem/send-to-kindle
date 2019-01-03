<?

function valid_url($text) {
    $valid_url = FALSE;

    $prefix = substr($text, 0, 7);
    if ($prefix === 'http://' || $prefix === 'https:/')
        $valid_url = substr($text, 0, 500);

    return $valid_url;
}
