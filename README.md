# NCompPOS v2

Rewrite of the project started with invoiceplane project code as base.

Documentation will follow.

# Contact
For support you can create an issue on GitHub or fill in the form on our Website.
https://www.ncomp.co.za/index.php/about-us/contact-us.

# Installation
1. Download the latest version from http://www.ncomp.co.za/index.php/ncomppos/download.
2. Extract the package and copy all files to your webserver / webspace.
3. Make a copy of the ipconfig.php.example file and rename this copy to ipconfig.php.
4. Open the ipconfig.php file and set your URL like specified in the file.
5. Open http://your-ncomppos-domain.com/index.php/setup and follow the instructions.

# Update
1. Make sure you have backups of the webserver / webspace and DB
2. Download the latest version from http://www.ncomp.co.za/index.php/ncomppos/download.
3. Extract the package and copy all files to your webserver / webspace.
4. Open http://your-ncomppos-domain.com/index.php/setup and follow the instructions to update the db.
NOTE: Setup may be disabled in ipconfig.php you may have to enable it temporarily.

# Setup of recurring invoices
You must create a CRON job or a scheduled task that opens the following URL once per day.

http://your-domain.com/invoices/cron/recur/your-cron-key-here

or

http://your-domain.com/index.php/invoices/cron/recur/your-cron-key-here

The "your-cron-key-here" must be replaced with the CRON Key in System Settings.
