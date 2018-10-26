## ModBreak BBcode 

Modbreak Extended version, created in cooperation with [LukeWCS](https://github.com/LukeWCS) 

Features:
* Add a BBcode for moderators to make an obvious remark in a post
* Only available for moderators
* Non-moderators get the default error message for not being allowed to use this BBcode
* Styling provided in extension, can be overwritten in your own CSS definitions ([Look here](https://www.phpbb.com/customise/db/extension/modbreak_bbcode/support/topic/194041))
* Displays the date and time of ModBreak messages in postings. The date format is displayed with the user's date settings.
* The username is clickable and linked to the user profile.
* Supports two message types: 1) message box (as before). 2) full post (new).
* Adds its own BBcode button (option list for both message types), which sends all BBcode parameters inclusive user name to the editor. So manually adding the user name is no longer needed. The standard mod-button is disabled now.
* Adds a tooltip for the button, which can be translated in the appropriate language file.
* Has additional language variables to allow 3 different BBcode representations: 1) Without parameters. 2) Only with user name. 3) With clickable username, date and time. Type 1 & 2 are primarily designed for compatibilty with old BBcodes already stored in posts with ModBreak 1.1.0.
* Languages en, de, es, pt_br, and nl included

## Installation

* If you have a BBcode that uses '[mod]' -tags, remove it

* Copy the extension to phpBB/ext/ger/modbreak

* Go to "ACP" > "Customise" > "Extensions" and enable the "Modbreak" extension.

Note that ACP setting for this BBcode is set not to display the button on the posting page, yet it will be visible for moderators since it's moderator-only.

## Styling
Some default styling is added in the extension. Change or override the definitions for 
'p.bbc_mod_head', '.bbc_mod_text' and '.bbc_mod_head a' if desired.

# Support my development
I'm doing this in my spare time and I'm fueled by coffee. Buy me one through [paypal](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=2YBSSF68LXBAN) :)

[GPLv2](license.txt)
