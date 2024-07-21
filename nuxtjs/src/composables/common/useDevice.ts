import { Device } from '@capacitor/device'

//https://capacitorjs.com/docs/apis/device
export const useDeviceInformation = () => {
    const logDeviceInfo = async () => {
        const info = await Device.getInfo()
        console.log(info);
    }

    const logBatteryInfo = async () => {
        const info = await Device.getBatteryInfo()
        console.log(info);
    }

    return {
        logDeviceInfo,
        logBatteryInfo
    }
}