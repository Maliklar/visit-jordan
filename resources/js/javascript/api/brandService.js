import axios from "axios";

const ROOT_API = process.env.MIX_PUSHER_APP_API;
const API_POINT = "brands";
async function get() {
    return await axios
        .get(`${ROOT_API}/${API_POINT}/get`)
        .then(response => response)
        .catch(e => e.response);
}

async function add(data) {
    return await axios
        .post(`${ROOT_API}/${API_POINT}/add`, data)
        .then(response => response)
        .catch(e => e.response);
}

async function addSub(data) {
    return await axios
        .post(`${ROOT_API}/${API_POINT}/addsub`, data)
        .then(response => response)
        .catch(e => e.response);
}

async function search(query) {
    return await axios
        .get(`${ROOT_API}/${API_POINT}/search/${query}`)
        .then(response => response)
        .catch(e => e.response);
}


async function edit(data) {
    // let config = {
    //     headers: {
    //         "Content-Type": 'application/json',
    //         "Accept": 'application/json',
    //     }
    // }
    return await axios
        .post(`${ROOT_API}/${API_POINT}/edit`, data)
        .then(response => response)
        .catch(e => e.response);
}

async function getSub() {
    return await axios
        .get(`${ROOT_API}/${API_POINT}/get`)
        .then(response => response)
        .catch(e => e.response);
}


export {get, getSub, add, addSub, edit, search };