<?

function write_html($what, $content=FALSE) {
    switch($what) {
        case 'heading':
            echo '<!DOCTYPE html><html><head><meta name="viewport" content="width=device-width, initial-scale=1.0"></head><body>'; break;
        case 'footer':
            echo '</body></html>'; break;
        case 'link_to_file':
            $valid_link = '<a href="' . htmlentities($content) . '">' . htmlentities($content) . '</a>';
            file_put_contents(LINK_FILE, $valid_link);
            chmod(LINK_FILE, 0600);
            break;
        case 'success':
            echo '( ")b &nbsp;'; break;
    }
}

