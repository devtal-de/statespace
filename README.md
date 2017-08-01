# statespace
Space Status Mopped

## Componentes
This repository contains an ansible playbook and code. The playbook sets up
the room status API of /dev/tal. Code running on the hosts is located at
`/files`.

A script (`/files/statespace_update`) being called repeatedly using cron
on `serviceding.in.devtal.de` checks if the ethernet switch on the main
table in /dev/tal replies to ICMP echo requests and calls a change script
(`/files/change.php`) on `moon.devtal.de` at availability change. The
status change script on the website is protected from unauthorized calls
using HTTP basic authentication.

A wordpress plugin uses the library located at `/files/spaceopen2.inc.php`
(also made available on `moon.devtal.de` at
`/home/thoto/public_html/statespace/spaceopen2.inc.php`) and displays an icon
representing the current state of the room at the right sidebar.

## external API usage
see http://wiki.devtal.de/Im_Space_Bot

TL;DR: https://devtal.de/~thoto/statespace/state.php .
