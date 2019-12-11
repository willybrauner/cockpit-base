#!/bin/bash

SUBFOLDER="www"

echo "> Downloading Cockpit CMS from https://github.com/agentejo/cockpit/archive/next.zip"
curl -L -sS https://github.com/agentejo/cockpit/archive/next.zip > cockpit-next.zip
unzip -q cockpit-next.zip
rm cockpit-next.zip
mv cockpit-next ${SUBFOLDER}
echo "Done."
echo ""

echo "> Installing starter storage folder..."
unzip -q storage.zip
rm -rf __MACOSX
rm -rf ${SUBFOLDER}/storage/
mv storage ${SUBFOLDER}/
chmod -R 0777 ${SUBFOLDER}/storage
echo "Done."
echo ""

echo "> Installing starter config folder..."
cp -r config ${SUBFOLDER}
chmod -R 0777 ${SUBFOLDER}/config
echo "Done."
echo ""

echo "> Downloading i18n from https://github.com/agentejo/cockpit-i18n/archive/master.zip"
curl -L -sS https://github.com/agentejo/cockpit-i18n/archive/master.zip > cockpit-i18n-master.zip
unzip -q cockpit-i18n-master.zip
rm cockpit-i18n-master.zip
mkdir -p ${SUBFOLDER}/config/cockpit/i18n
mv cockpit-i18n-master i18n
mv i18n ${SUBFOLDER}/config/cockpit
echo "Done."
echo ""

echo "> Downloading Group addons from https://github.com/serjoscha87/cockpit_GROUPS/archive/master.zip"
curl -L -sS https://github.com/serjoscha87/cockpit_GROUPS/archive/master.zip > cockpit_GROUPS-master.zip
unzip -q cockpit_GROUPS-master.zip
rm cockpit_GROUPS-master.zip
mv cockpit_GROUPS-master/Groups ${SUBFOLDER}/addons
rm -r cockpit_GROUPS-master
echo "Done."
echo ""

echo "> Remove unused files and folders files folder..."
rm -rf config/
rm -rf storage.zip
rm -rf .gitignore
rm -rf README.md
rm -rf install.sh
rm -rf .git
echo "Done."
echo ""

echo "> Move all ${SUBFOLDER} content on root folder..."
mv ${SUBFOLDER}/* ./
mv ${SUBFOLDER}/.* ./
echo "Done."
echo ""

echo "> Remove ${SUBFOLDER} empty folder..."
rm -rf ${SUBFOLDER}
echo "Done."
echo ""

echo "> Cockpit-base is ready!"
echo ""

