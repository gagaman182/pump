const API_URL = 'http://192.168.5.187/0161/pump/pump/api/';
//const API_URL = "http://localhost/pump/pump/api/";

export class APIPath {
    constructor() {}

    getBaseUrl() {
        return API_URL;
    }
}