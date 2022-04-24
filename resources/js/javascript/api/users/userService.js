import axios from "axios";

const ROOT_API = process.env.MIX_PUSHER_APP_API;
const API_POINT = 'users';

async function get() {
    return await axios
        .get(`${ROOT_API}/${API_POINT}/get`)
        .then(response => response)
        .catch(e => e.response);
}
async function register(data) {
    console.log(data);
    return await axios
        .post(`${ROOT_API}/${API_POINT}/register`, data)
        .then(response => response)
        .catch(e => e.response);
}
async function update(data) {

    return await axios
        .post(`${ROOT_API}/${API_POINT}/update`, data)
        .then(response => response)
        .catch(e => e.response);
}





export {get, update, register };