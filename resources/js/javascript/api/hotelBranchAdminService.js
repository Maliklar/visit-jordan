import axios from "axios";

const ROOT_API = process.env.MIX_PUSHER_APP_API;
const API_POINT = "admin/hotels/branches"
async function add(data) {
    return await axios
        .post(`${ROOT_API}/${API_POINT}/add`, data)
        .then(response => response)
        .catch(e => e.response);
}

async function getAll() {
    return await axios
        .get(`${ROOT_API}/${API_POINT}/get`)
        .then(response => response)
        .catch(e => e.response);
}




export { add, getAll };