import { App, type URLOpenListenerEvent } from '@capacitor/app'
import { AppUpdate, AppUpdateAvailability } from '@capawesome/capacitor-app-update'
import { Capacitor } from '@capacitor/core'

import { useNavigate } from 'react-router-dom';

//https://capacitorjs.com/docs/apis/app
//https://capawesome.io/plugins/app-update/
export const useApp = () => {
    let navigate = useNavigate();
    const appAddListeners = () => {
        App.addListener('appStateChange', ({ isActive }) => {
            console.log('App state changed. Is active?', isActive)
        })

        App.addListener('appUrlOpen', function (event: URLOpenListenerEvent) {
            // Example url: https://beerswift.app/tabs/tabs2
            // slug = /tabs/tabs2
            const parsedUrl = new URL(event.url);
            const slug = event.url.replace(parsedUrl.origin, '')
            // We only push to the route if there is a slug present
            if (slug) {
                navigate({ pathname: slug, search: getQueryParams(parsedUrl) })
            }
        })

        App.addListener('appRestoredResult', data => {
            console.log('Restored state:', data)
        })
    }

    const checkAppLaunchUrl = async () => {
        const { url }: any = await App.getLaunchUrl()

        console.log('App opened with URL: ' + url)
    }

    const getCurrentAppVersion = async () => {
        const result = await AppUpdate.getAppUpdateInfo()
        if (Capacitor.getPlatform() === 'android') {
            return result.currentVersionCode
        } else {
            return result.currentVersionName
        }
    }

    const getAvailableAppVersion = async () => {
        const result = await AppUpdate.getAppUpdateInfo()
        if (Capacitor.getPlatform() === 'android') {
            return result.availableVersionCode
        } else {
            return result.availableVersionName
        }
    }

    const openAppStore = async () => {
        await AppUpdate.openAppStore()
    }

    const performImmediateUpdate = async () => {
        const result = await AppUpdate.getAppUpdateInfo();
        if (result.updateAvailability !== AppUpdateAvailability.UPDATE_AVAILABLE) {
            return
        }
        if (result.immediateUpdateAllowed) {
            await AppUpdate.performImmediateUpdate()
        }
    }

    const startFlexibleUpdate = async () => {
        const result = await AppUpdate.getAppUpdateInfo();
        if (result.updateAvailability !== AppUpdateAvailability.UPDATE_AVAILABLE) {
            return;
        }
        if (result.flexibleUpdateAllowed) {
            await AppUpdate.startFlexibleUpdate()
        }
    }

    const completeFlexibleUpdate = async () => {
        await AppUpdate.completeFlexibleUpdate()
    }

    const getQueryParams = (url: URL) => {
        let queryParams:any = {}
        for (const [key, value] of url.searchParams.entries()) {
            queryParams[key] = value
        }
        return queryParams
    }

    return {
        appAddListeners,
        checkAppLaunchUrl,
        getCurrentAppVersion,
        getAvailableAppVersion,
        openAppStore,
        performImmediateUpdate,
        startFlexibleUpdate,
        completeFlexibleUpdate
    }
}
