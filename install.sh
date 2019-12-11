#!/bin/sh

DOCROOT="www"

echo "Downloading cockpit-base archive..."
curl -L -sS https://github.com/willybrauner/cockpit-base/archive/master.zip > cockpit-base-master.zip
echo "Done !"
echo ""

echo "Installing archive..."
unzip -q cockpit-base-master.zip
rm cockpit-base-master.zip
mv cockpit-base-master/* ./
mv cockpit-base-master/.gitignore ./
rm -r cockpit-base-master/
echo "Done !"
echo ""

echo "> Downloading Cockpit CMS from https://github.com/agentejo/cockpit/archive/next.zip"
curl -L -sS https://github.com/agentejo/cockpit/archive/next.zip > cockpit-next.zip
unzip -q cockpit-next.zip
rm cockpit-next.zip
mv cockpit-next $DOCROOT
echo "Done."
echo ""

echo "> Installing starter storage folder..."
cd starter/ || exit
unzip -q storage.zip
rm -rf __MACOSX
cd ../
rm -rf ${DOCROOT}/storage/
mv starter/storage ${DOCROOT}/
chmod -R 0777 ${DOCROOT}/storage
echo "Done."
echo ""

echo "> Installing starter config folder..."
cp -r starter/config ${DOCROOT}
chmod -R 0777 ${DOCROOT}/config
echo "Done."
echo ""

echo "> Downloading i18n from https://github.com/agentejo/cockpit-i18n/archive/master.zip"
curl -L -sS https://github.com/agentejo/cockpit-i18n/archive/master.zip > cockpit-i18n-master.zip
unzip -q cockpit-i18n-master.zip
rm cockpit-i18n-master.zip
mkdir -p ${DOCROOT}/config/cockpit/i18n
mv cockpit-i18n-master i18n
mv i18n ${DOCROOT}/config/cockpit
echo "Done."
echo ""

echo "> Downloading Group addons from https://github.com/serjoscha87/cockpit_GROUPS/archive/master.zip"
curl -L -sS https://github.com/serjoscha87/cockpit_GROUPS/archive/master.zip > cockpit_GROUPS-master.zip
unzip -q cockpit_GROUPS-master.zip
rm cockpit_GROUPS-master.zip
mv cockpit_GROUPS-master/Groups ${DOCROOT}/addons
rm -r cockpit_GROUPS-master
echo "Done."
echo ""


echo "> Move all ${DOCROOT} content on root folder..."
mv www/* ./

echo "> Remove starter folder..."
rm -rf starter/

echo "> Cockpit is ready!"
echo ""

