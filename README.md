## This is ModBreakX, an eXtended variant of ModBreak by Ger. Don't use this repo in live boards! This repo serves only as a developer source for the original ModBreak.

MBX have the following advantages:
* Displays the date and time of ModBreak messages in postings. The date format is displayed with the user's date settings.
* The username is clickable and linked to the user profile.
* Adds its own BBCode button, which can also send the user name, timestamp, and user ID to the editor. Manually adding the username is no longer needed. The standard mod-button is disabled.
* Has additional language variables to allow 3 different BBcode representations: 1) Without parameters. 2) Only with user name. 3) With clickable username, date and time. Type 1 & 2 are primarily designed for compatibilty with old BBcodes already stored in posts with ModBreak 1.1.0.
* Small fixes: 1) Button wasn't hide for user's without permissions. 2) BBcode wasn't removed on uninstall.

# Modbreak BBcode

## Installation

* If you have a BBcode that uses '[mod]' -tags, remove it

* Copy the extension to phpBB/ext/ger/modbreak

* Go to "ACP" > "Customise" > "Extensions" and enable the "Modbreak" extension.

Note that there won't be a button created for this BBcode since it's moderator-only.

## Styling
Some default styling is added in the extension. Change or override the definitions for 
'p.bbc_mod_head' and '.bbc_mod_text' if desired.

# Support my development
I'm doing this in my spare time and I'm fueled by coffee. Buy me one through [paypal](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=2YBSSF68LXBAN) :)

[GPLv2](license.txt)
