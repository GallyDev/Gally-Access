# Gally-Access
2024 Workaround: double security for WP Login

# How to use 
1. Move files into folder _gally_access_ in the root directory of wordpress next to wp-admin
2. Rename the folder _64randomize_ to some new random string
3. Open or create a _.htaccess_-file in the root and paste the code of _root.htaccess_
4. Create or open a _.htaccess_-file in the folder _wp-admin_ and paste the code of _wp-admin.htaccess_
5. Enjoy being locked out of your WP Admin 

# How to communicate


# Troubleshoot
- E-Mail does not arrive

  If the Website is not trusted (http, invalid https or testdomain), the email might not arrive because it looks too suspicious to E-Mail-Servers. This means it does not even appear in a spam folder.

- Front-End-Login no longer works

  Some Front-End-Login-Methods use wp-login.php and therefore you have to add a # in the root-file to the RewriteRule so the line looks like this:
  ```
  #RewriteRule ^(.*)$ /gally_access/ [L,R=302]
  ```
