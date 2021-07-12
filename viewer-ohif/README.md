# Folder of static distribution of OHIF #

## How to download the latest stable version ##

- No action is necessary to perform on the static distribution of OHIF :

If you downloaded the plugin from the moodle repository 

If you downloaded the plugin from the workflows on github (https://github.com/salimkanoun/moodle-mod_dicomviewer/actions)

- If you are in neither of these cases

1) You will need Yarn (a fast dependency manager).

2) You need to download outside of your plugin the distribution of ohif here : https://github.com/OHIF/Viewers.git 

git clone https://github.com/OHIF/Viewers.git

3) Position yourself at the root of the ohif folder

cd Viewers/

4) Run the commands :

QUICK_BUILD=true PUBLIC_URL=/mod/dicomviewer/viewer-ohif/ yarn run build

It is possible to modify this url according to the directory of your moodle site.

5) Copy the files present in:  Viewers/platform/viewer/dist/*  in the plugin folder named viewer-ohif/

6) Move the configuration files found at the root of the plugin (config-ohif/) in the distribution of ohif (viewer-ohif/)

7) Delete the configuration folder (config-ohif/)





