#!/bin/bash

DOCROOT="www"

if [ -d "www" ]; then
  echo "Cockpit already installed! Remove the www folder first if you want to reinstall."
  exit 1
fi

# Install cockpit CMS
echo "> Download Cockpit CMS from https://github.com/agentejo/cockpit/archive/next.zip"
curl -L -sS https://github.com/agentejo/cockpit/archive/next.zip > cockpit-next.zip
echo "> Install archive..."
unzip -q cockpit-next.zip
echo "> Remove zip archive..."
rm cockpit-next.zip
echo "> Move repos to ${DOCROOT}..."
mv cockpit-next $DOCROOT
echo "Done."
echo ""

# Copy starter storage
echo "> Unzip starter storage folder..."
unzip -q starter/storage.zip
echo "> Copy starter storage folder..."
mv starter/storage ${DOCROOT}
echo "> Change access right..."
chmod -R 0777 ${DOCROOT}/storage
echo "Done."
echo ""

# Copy starter storage
echo "> Copy starter config folder..."
cp -r starter/config ${DOCROOT}
echo "> Change access right..."
chmod -R 0777 ${DOCROOT}/config
echo "Done."
echo ""

# Install backoffice Translation i18n
echo "> Download i18n from https://github.com/agentejo/cockpit-i18n/archive/master.zip"
curl -L -sS https://github.com/agentejo/cockpit-i18n/archive/master.zip > cockpit-i18n-master.zip
echo "> Install archive..."
unzip -q cockpit-i18n-master.zip
echo "> Remove zip archive..."
rm cockpit-i18n-master.zip
echo "> Create ${DOCROOT}/config/cockpit/i18n folder..."
mkdir -p ${DOCROOT}/config/cockpit/i18n
echo "> rename..."
mv cockpit-i18n-master i18n
echo "> Move repos to ${DOCROOT}/config/cockpit folder..."
mv i18n ${DOCROOT}/config/cockpit
echo "Done."
echo ""

# Install Group addons
echo "> Download Group addons from https://github.com/serjoscha87/cockpit_GROUPS/archive/master.zip"
curl -L -sS https://github.com/serjoscha87/cockpit_GROUPS/archive/master.zip > cockpit_GROUPS-master.zip
echo "> Install archive..."
unzip -q cockpit_GROUPS-master.zip
echo "> Remove zip archive..."
rm cockpit_GROUPS-master.zip
echo "> Move repos to ${DOCROOT}/addons folder..."
mv cockpit_GROUPS-master/Groups ${DOCROOT}/addons
echo "> Remove old folder..."
rm -r cockpit_GROUPS-master
echo "Done."
echo ""


