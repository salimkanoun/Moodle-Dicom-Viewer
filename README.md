# Viewer DICOM image #


## Features ##


- Viewing images in DICOM format

## Plugin documentation ##

See url: https://salimkanoun.github.io/moodle_dicomviewer_website/

## Download the plugin ##


- Directly via the moodle repository

- Directly with the workflows Node.js CI on github (https://github.com/salimkanoun/moodle-mod_dicomviewer/actions)


## Install the plugin on moodle ##


- If you downloaded the plugin via the two cases above, it is possible to install it directly on moodle like any other plugin

- Otherwise you will need to refer to the README in the viwer-ohif/ and viewer-stone/ directory to install the static viewer distributions in the plugin.


## Description of folders to ignore ##


- .github/workflows : the files of the CI.

- Documentation/docker : a folder containing an example of installation with docker

- viewer-ohif/ and viewer-stone/ :  The folders containing the static distribution of the viewers after downloading and compilation (this refer to their respective README)

- config-ohif/ and config-stone/ : The files containing the general and recommended configuration of the two viewers.


## License ##


GPL License

2021 | Stage DUT AS Informatique

## License Notice ##

This plugin distribution emmbed 2 other software projets : OHIF (MIT Licence) and Stone Of Orthanc (AGPL v3 licence). Their related source is not in this repository.
The external code is downloaded from OHIF and Stone repositories during the Continuous Integration process.
See the Github action CI script and the README file in the config-ohif and config-stone folder for more details.



