# send-to-kindle
Very simple page to send links to your eReader

My eReader has an ePaper display and a web browser. As such, it can be much nicer to open up long reads (blog posts, articles, tutorials) on my eReader than continue reading the whole thing on my phone. But I lacked a convenient way to quickly, and with little typing, open up a URL on my eReader that I started reading on my phone.

This repo contains the quick and dirty php page that I wrote to solve this problem. I host it at a short domain name of mine for convenience, although my eReader does also support bookmarks, should I have needed to host it at a longer URL.

**Note:** If you're worried about link.html being accessed directly, you can change the permissions on the file to something like 600 so it can be included by index.php, or alternatively rename it to something obscure/non-guessable and update LINK_FILE in the config section of index.php

**Note:** You'll need to set KINDLE_PASS and KINDLE_ADMIN_PASS in config before using this.
