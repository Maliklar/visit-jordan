import axios from "axios";

const ROOT_API = process.env.MIX_PUSHER_APP_API;
const API_POINT = "admin/hotels/rooms/reservations";



async function get(id) {
    return await axios
        .get(`${ROOT_API}/${API_POINT}/${id}`)
        .then(response => response)
        .catch(e => e.response);
}

async function getAll() {
    return await axios
        .get(`${ROOT_API}/admin/hotels/reservations/get`)
        .then(response => response)
        .catch(e => e.response);
}



export {get, getAll };