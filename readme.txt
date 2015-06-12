6/12/15 - KNOWN BUGS, FIXES COMING!
******************************************************************
1. HTML characters not escaped properly, apostrophes create chaos and break
on edit.
2. Using deprecated mysql functions as opposed to mysqli
3. (ENHANCEMENT) Headings to clarify edit screen section
4. FIXED: passwords case insensitive - See description for DB Tables setup.
5. In edit can't see all characters in description
6. Have to reenter everything on editing existing
7.(ENHANCEMENT) Give easy way to reload or "cancel" if edit is aborted
8. (ENHANCEMENT) Possible character counter to show how many characters are
left for description field
*******************************************************************

This can almost be used as is. Following is what should be done
assuming you have a server stack with php and a MySQL server within
your grasp. By using this product you accept full responsibility 
for violation of laws, failures, or other issues that may arise from 
use of this system - I will even alert you to possible HIPPA violations 
depending on how detailed of info you store, so be warned! I'm letting
our church members know that they should only store first names and a 
reference to requestor (like "cindy, friend of bill") - but i'm not a
lawyer and don't know if a industrious and litigous person (AKA jerk)
would have a case against you with this.
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
		*EDIT (FIX ISSUE#4) - password field should have collation type of binary. The mysql default is latin-swedish and if
			not changed to something like latin-bin the password will be found regardless of case (ex. if password is "PASSWORD",
			an entry of "password" would still work). This is because prayerlist does not hash the passwords before storing them
			in the database. This allows account creation and password handling directly at the database. If you want userid to also be
			case sensitive then you could also change the collation type of that field.
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