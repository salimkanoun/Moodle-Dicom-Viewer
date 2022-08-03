let localDataSources = await fetch('/mod/dicomviewer/viewer-ohif/configuration.json').then((data) => {
    return data.json()
}).then((json) => json.dataSources).catch((error) => { console.error(error) })


window.config = {
    routerBasename: '/mod/dicomviewer/viewer-ohif',
    // whiteLabelling: {},
    extensions: [],
    modes: [],
    showStudyList: true,
    maxNumberOfWebWorkers: 3,
    maxNumRequests: {
        interaction: 100,
        thumbnail: 75,
        prefetch: 10,
    },
    // filterQueryParam: false,
    dataSources: localDataSources,
    httpErrorHandler: error => {
        // This is 429 when rejected from the public idc sandbox too often.
        console.warn(error.status);

        // Could use services manager here to bring up a dialog/modal if needed.
        console.warn('test, navigate to https://ohif.org/');
    },
    // whiteLabeling: {
    //   /* Optional: Should return a React component to be rendered in the "Logo" section of the application's Top Navigation bar */
    //   createLogoComponentFn: function (React) {
    //     return React.createElement(
    //       'a',
    //       {
    //         target: '_self',
    //         rel: 'noopener noreferrer',
    //         className: 'text-purple-600 line-through',
    //         href: '/',
    //       },
    //       React.createElement('img',
    //         {
    //           src: './customLogo.svg',
    //           className: 'w-8 h-8',
    //         }
    //       ))
    //   },
    // },
    defaultDataSourceName: 'dicomweb',
    hotkeys: [
        {
            commandName: 'incrementActiveViewport',
            label: 'Next Viewport',
            keys: ['right'],
        },
        {
            commandName: 'decrementActiveViewport',
            label: 'Previous Viewport',
            keys: ['left'],
        },
        { commandName: 'rotateViewportCW', label: 'Rotate Right', keys: ['r'] },
        { commandName: 'rotateViewportCCW', label: 'Rotate Left', keys: ['l'] },
        { commandName: 'invertViewport', label: 'Invert', keys: ['i'] },
        {
            commandName: 'flipViewportHorizontal',
            label: 'Flip Horizontally',
            keys: ['h'],
        },
        {
            commandName: 'flipViewportVertical',
            label: 'Flip Vertically',
            keys: ['v'],
        },
        { commandName: 'scaleUpViewport', label: 'Zoom In', keys: ['+'] },
        { commandName: 'scaleDownViewport', label: 'Zoom Out', keys: ['-'] },
        { commandName: 'fitViewportToWindow', label: 'Zoom to Fit', keys: ['='] },
        { commandName: 'resetViewport', label: 'Reset', keys: ['space'] },
        { commandName: 'nextImage', label: 'Next Image', keys: ['down'] },
        { commandName: 'previousImage', label: 'Previous Image', keys: ['up'] },
        {
            commandName: 'previousViewportDisplaySet',
            label: 'Previous Series',
            keys: ['pagedown'],
        },
        {
            commandName: 'nextViewportDisplaySet',
            label: 'Next Series',
            keys: ['pageup'],
        },
        { commandName: 'setZoomTool', label: 'Zoom', keys: ['z'] },
        // ~ Window level presets
        {
            commandName: 'windowLevelPreset1',
            label: 'W/L Preset 1',
            keys: ['1'],
        },
        {
            commandName: 'windowLevelPreset2',
            label: 'W/L Preset 2',
            keys: ['2'],
        },
        {
            commandName: 'windowLevelPreset3',
            label: 'W/L Preset 3',
            keys: ['3'],
        },
        {
            commandName: 'windowLevelPreset4',
            label: 'W/L Preset 4',
            keys: ['4'],
        },
        {
            commandName: 'windowLevelPreset5',
            label: 'W/L Preset 5',
            keys: ['5'],
        },
        {
            commandName: 'windowLevelPreset6',
            label: 'W/L Preset 6',
            keys: ['6'],
        },
        {
            commandName: 'windowLevelPreset7',
            label: 'W/L Preset 7',
            keys: ['7'],
        },
        {
            commandName: 'windowLevelPreset8',
            label: 'W/L Preset 8',
            keys: ['8'],
        },
        {
            commandName: 'windowLevelPreset9',
            label: 'W/L Preset 9',
            keys: ['9'],
        },
    ],
};

console.log(window.config)

// https://developers.google.com/web/tools/workbox/modules/workbox-window
// All major browsers that support service worker also support native JavaScript
// modules, so it's perfectly fine to serve this code to any browsers
// (older browsers will just ignore it)
//
import { Workbox } from 'https://storage.googleapis.com/workbox-cdn/releases/5.0.0-beta.1/workbox-window.prod.mjs';

var supportsServiceWorker = 'serviceWorker' in navigator;
var isNotLocalDevelopment =
    ['localhost', '127'].indexOf(location.hostname) === -1;

if (supportsServiceWorker && isNotLocalDevelopment) {
    const swFileLocation = (window.PUBLIC_URL || '/') + 'sw.js';
    const wb = new Workbox(swFileLocation);

    // Add an event listener to detect when the registered
    // service worker has installed but is waiting to activate.
    wb.addEventListener('waiting', event => {
        // customize the UI prompt accordingly.
        const isFirstTimeUpdatedServiceWorkerIsWaiting =
            event.wasWaitingBeforeRegister === false;
        console.log(
            'isFirstTimeUpdatedServiceWorkerIsWaiting',
            isFirstTimeUpdatedServiceWorkerIsWaiting
        );

        // Assumes your app has some sort of prompt UI element
        // that a user can either accept or reject.
        // const prompt = createUIPrompt({
        //  onAccept: async () => {
        // Assuming the user accepted the update, set up a listener
        // that will reload the page as soon as the previously waiting
        // service worker has taken control.
        wb.addEventListener('controlling', event => {
            window.location.reload();
        });

        // Send a message telling the service worker to skip waiting.
        // This will trigger the `controlling` event handler above.
        // Note: for this to work, you have to add a message
        // listener in your service worker. See below.
        wb.messageSW({ type: 'SKIP_WAITING' });
        // },

        // onReject: () => {
        //   prompt.dismiss();
        // },
        // });
    });

    wb.register();
}