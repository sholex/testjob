# Structure
dev folder contains files, i use to make html page from PSD

wp-content : it's a dump of necessary files to make a copy of site

testjob.sql.gz : dump of sql


# How to install
1. Install fresh wp on youe server 
2. Upload wp-content folder from this repository on your fresh wp wp-content
3. In your wp-config.php file use  *$table_prefix  = 'fdgr_';*
4. Admin access:
yoursite.com/wp-admin
login: director
pass: qweqwe
5. After that your should install 2 plugins:
a) *Advanced Custom Fields Pro* https://github.com/sholex/advanced-custom-fields-pro
b) *Woocommerce* from official repo

# Functionality
1. Provided theme allows to manage all frontpage content.
You can check this on page _Theme settings_ in bottom of admin sidebar
2. Theme uses custom post type *news* and custom taxonomy *region*

