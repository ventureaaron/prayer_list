This can almost be used as is. Following is what should be done
assuming you have a server stack with php and a MySQL server within
your grasp. By using this product you accept full responsibility 
for violation of laws, failures, or other issues that may arise from 
use of this system - I will even alert you to possible HIPPA violations 
depending on how detailed of info you store, so be warned! 
I am interested in helping you with functionality
issues or hearing recommendations, this is a learning experience from
me and had to pull knowledge from several different sources. Reach me at
ventureaaron@gmail.com. 

So...
on to it!

Page Header Logo -> A logo centered and placed on each page can be
used by inserting an image as "logo.jpeg" in the root directory. If
you will use a different filename/directory or no logo, make the changes
in pl_head.php.

Jquery/bootstrap(optional) -> These pages use both Jquery and bootstrap. 
Currently the reference to the libraries is pointing to CDNs that i've 
not tested. I personally use my own resource library for this. If you 
also are hosting these libraries and would like to use these instead of 
pulling from the CDN, edit the links in the <head> section of 
pl_head.php.

DB Tables -> This requires 2 tables in the same database.
	Table 1 -> Should be named "pl_user" and contain 3 columns:
		"userid" varchar -> users use this as ID to login with
		"password" varchar -> plaintext password users use to login with
		"role" varchar -> value of role for user needs to be "edit" or "read"

		There is no account creation in the webpage so user accounts
		will need to be manually entered into the tables
		For my purposes, these passwords are distributed to several
		people so there was not much concern on my end for encryption.
		You should at least have 1 account for each role (1 edit and 1 read) -
		but can have as many as you want.

	Table 2 -> Should be named "prayerlist" and contain 6 columns:
		"pid", int, aut inc -> uniquely identifies prayer. Auto Incrementing int
		"name", varchar -> describes name of person requesting prayer
		"description", varchar -> where a description of prayer request is stored.
		"contact", varchar -> name field of person who can be contacted for updates
		"date", date -> date prayer was added/updated
		"status", varchar -> will either be "OPEN" or "CLOSE" (honestly it doesn't have to be "CLOSE" so
 			long as those that are viewable/editable are marked as "OPEN".

DB info -> You will also need a MySQL server user with read/write access to these
	tables. The info will need to be stored in the "pl_login.php" file:

	$db_hostname - hostname(FQDN) or IP address of where your MySQL server is located. This
		can stay "localhost" if apache is running on the same machine as your MySQL
		server.
	$db_database - name of your database that these tables are stored in.
	$db_username - username of account that has read/write access to this database
	$db_password - password of account that has read/write access to this database


Once all of this is done you should be able to drop this folder into your server and navigate to it:

http://www.yourdomainname.com/prayer_list/