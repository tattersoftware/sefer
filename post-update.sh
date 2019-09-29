#!/bin/sh

### post-update.sh for Composer
# Copies composer asset files from ./vendor to ./public

# setup asset directory
mkdir -pv public/assets/vendor

# disable directory access
cp -n app/index.html public/assets/
cp -n app/index.html public/assets/vendor/


### Specific package handling

# JQuery
rm -rf public/assets/vendor/jquery
mkdir public/assets/vendor/jquery
cp vendor/components/jquery/jquery* public/assets/vendor/jquery/
cp -n app/index.html public/assets/vendor/jquery/

# Bootstrap
rm -rf public/assets/vendor/bootstrap
mkdir public/assets/vendor/bootstrap
cp -R vendor/twbs/bootstrap/dist/css/* public/assets/vendor/bootstrap/
cp -R vendor/twbs/bootstrap/dist/js/* public/assets/vendor/bootstrap/
cp -n app/index.html public/assets/vendor/bootstrap/

# FontAwesome
rm -rf public/assets/vendor/font-awesome
mkdir public/assets/vendor/font-awesome/
cp -R vendor/fortawesome/font-awesome/css public/assets/vendor/font-awesome/
cp -R vendor/fortawesome/font-awesome/webfonts public/assets/vendor/font-awesome/
cp -n app/index.html public/assets/vendor/font-awesome/
cp -n app/index.html public/assets/vendor/font-awesome/webfonts/

# Dropzone.js
rm -rf public/assets/vendor/dropzone
cp -R vendor/enyo/dropzone/dist/min public/assets/vendor/dropzone
cp -n app/index.html public/assets/vendor/dropzone/


### All done

exit 0
