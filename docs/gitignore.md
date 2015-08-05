 
# Ignore everything in the root except the "wp-content" directory.
/*
!.gitignore
!wp-content/
 
# Ignore everything in the "wp-content" directory, except the "plugins"
# "mu-plugins" and "themes" directories.
wp-content/*
!wp-content/plugins/
!wp-content/themes/
!wp-content/mu-plugins/
 
# Ignore everything in the "plugins" directory, except the plugins you
# specify (see the commented-out examples for hints on how to do this.)
wp-content/plugins/*
# !wp-content/plugins/my-single-file-plugin.php
# !wp-content/plugins/my-directory-plugin/
 
# Ignore everything in the "themes" directory, except the themes you
# specify (see the commented-out example for a hint on how to do this.)
wp-content/themes/*
!wp-content/themes/behindthelight

# Ignore Node files 
node_modules

# Ignore extra files
sitemap.xml
sitemap.xml.gz
.sass-cache
.DS_Store