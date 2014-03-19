RedirectMatch 301 ^/([0-9]{4})/([0-9]{2})/(.*)$ http://spigotdesign.dev/$3

# you probably want www.example.com to forward to example.com -- shorter URLs are sexier.
#   no-www.org/faq.php?q=class_b
<IfModule mod_rewrite.c>
  RewriteEngine On
  RewriteCond %{HTTPS} !=on
  RewriteCond %{HTTP_HOST} ^www\.(.+)$ [NC]
  RewriteRule ^(.*)$ http://%1/$1 [R=301,L]
</IfModule>

# gzip compression.
<IfModule mod_deflate.c>
# html, txt, css, js, json, xml, htc:
  AddOutputFilterByType DEFLATE text/html text/plain text/css application/json
  AddOutputFilterByType DEFLATE text/javascript application/javascript application/x-javascript 
  AddOutputFilterByType DEFLATE text/xml application/xml text/x-component
# webfonts and svg:
  <FilesMatch "\.(ttf|otf|eot|svg)$" >
    SetOutputFilter DEFLATE
  </FilesMatch>
</IfModule>

# gzip code from Media Temple

AddOutputFilterByType DEFLATE text/html text/plain text/xml
AddOutputFilterByType DEFLATE text/css application/x-javascript
AddOutputFilterByType DEFLATE text/css text/html text/plain text/xml text/javascript


# BEGIN Expire headers
# these are pretty far-future expires headers
# they assume you control versioning with cachebusting query params like
#   <script src="application.js?20100608">
# additionally, consider that outdated proxies may miscache 
#   www.stevesouders.com/blog/2008/08/23/revving-filenames-dont-use-querystring/

# if you don't use filenames to version, lower the css and js to something like
#   "access plus 1 week" or so

<IfModule mod_expires.c>
  Header set Cache-Control "public"
  ExpiresActive on
# Perhaps better to whitelist expires rules? Perhaps.
  ExpiresDefault                          "access plus 1 month"
# cache.manifest needs re-requests in FF 3.6 (thx Remy ~Introducing HTML5)
  ExpiresByType text/cache-manifest       "access plus 0 seconds"
# your document html 
  ExpiresByType text/html                 "access plus 0 seconds" 
# data
  ExpiresByType text/xml                  "access plus 0 seconds"
  ExpiresByType application/xml           "access plus 0 seconds"
  ExpiresByType application/json          "access plus 0 seconds"
# rss feed
  ExpiresByType application/rss+xml       "access plus 1 hour"
# favicon (cannot be renamed)
  ExpiresByType image/vnd.microsoft.icon  "access plus 1 week" 
# media: images, video, audio
  ExpiresByType image/gif                 "access plus 1 month"
  ExpiresByType image/png                 "access plus 1 month"
  ExpiresByType image/jpg                 "access plus 1 month"
  ExpiresByType image/jpeg                "access plus 1 month"
  ExpiresByType video/ogg                 "access plus 1 month"
  ExpiresByType audio/ogg                 "access plus 1 month"
  ExpiresByType video/mp4                 "access plus 1 month"
  ExpiresByType video/webm                "access plus 1 month" 
# webfonts
  ExpiresByType font/truetype             "access plus 1 month"
  ExpiresByType font/opentype             "access plus 1 month"
  ExpiresByType font/woff                 "access plus 1 month"
  ExpiresByType image/svg+xml             "access plus 1 month"
  ExpiresByType application/vnd.ms-fontobject "access plus 1 month"   
# css and javascript
  ExpiresByType text/css                  "access plus 1 week"
  ExpiresByType application/javascript    "access plus 1 week"
  ExpiresByType text/javascript           "access plus 1 week"
</IfModule>
# END Expire headers

# Since we're sending far-future expires, we don't need ETags for
# static content.
#   developer.yahoo.com/performance/rules.html#etags
FileETag None

# BEGIN Cache-Control Headers
<ifModule mod_headers.c>
  <filesMatch "\.(ico|jpe?g|png|gif|swf)$">
    Header set Cache-Control "public"
  </filesMatch>
  <filesMatch "\.(css)$">
    Header set Cache-Control "public"
  </filesMatch>
  <filesMatch "\.(js)$">
    Header set Cache-Control "private"
  </filesMatch>
  <filesMatch "\.(x?html?|php)$">
    Header set Cache-Control "private, must-revalidate"
  </filesMatch>
</ifModule>
# END Cache-Control Headers

# allow access from all domains for webfonts
# alternatively you could only whitelist
#   your subdomains like "sub.domain.com"

<FilesMatch "\.(ttf|otf|eot|woff|font.css)$">
  <IfModule mod_headers.c>
    Header set Access-Control-Allow-Origin "*"
  </IfModule>
</FilesMatch>


# video
AddType video/ogg                      ogg ogv
AddType video/mp4                      mp4
AddType video/webm                     webm

# Proper svg serving. Required for svg webfonts on iPad
#   twitter.com/FontSquirrel/status/14855840545
AddType     image/svg+xml              svg svgz 
AddEncoding gzip                       svgz
                                       
# webfonts                             
AddType application/vnd.ms-fontobject  eot
AddType font/truetype                  ttf
AddType font/opentype                  otf
AddType font/woff                      woff

# assorted types                                      
AddType image/vnd.microsoft.icon       ico
AddType image/webp                     webp
AddType text/cache-manifest            manifest
AddType text/x-component               htc
AddType application/x-chrome-extension crx



# use utf-8 encoding for anything served text/plain or text/html
AddDefaultCharset utf-8
# force utf-8 for a number of file formats
AddCharset utf-8 .html .css .js .xml .json .rss

# Force .png files to download rather than open in the browser
#<FilesMatch "\.(?i:png)$">
#  Header set Content-Disposition attachment
#</FilesMatch>


# Enable if you serve a lot of static content but, be aware of the
# possible disadvantages!

<IfModule mod_headers.c>
   Header set Connection Keep-Alive
</IfModule>



# We don't need to tell everyone we're apache.
ServerSignature Off


# BEGIN WordPress
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /index.php [L]
</IfModule>

# END WordPress
