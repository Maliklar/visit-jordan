import axios from "axios";

const ROOT_API = process.env.MIX_PUSHER_APP_API;
const API_POINT = "admin/hotels/reservations"

async function get() {
    return await axios
        .get(`${ROOT_API}/${API_POINT}/get`)
        .then(response => response)
        .catch(e => e.response);
}

async function getById(id) {
    return await axios
        .get(`${ROOT_API}/${API_POINT}/get/${id}`)
        .then(response => response)
        .catch(e => e.response);
}

async function getByRoomId(id) {
    return await axios
        .get(`${ROOT_API}/${API_POINT}/get/rooms/${id}`)
        .then(response => response)
        .catch(e => e.response);
}

async function getByCategoryId(id) {
    return await axios
        .get(`${ROOT_API}/${API_POINT}/get/categories/${id}`)
        .then(response => response)
        .catch(e => e.response);
}

async function getByBranchId(id) {
    return await axios
        .get(`${ROOT_API}/${API_POINT}/get/branches/${id}`)
        .then(response => response)
        .catch(e => e.response);
}







export {
    getById,
    get,
    getByBranchId,
    getByCategoryId,
    getByRoomId,
};