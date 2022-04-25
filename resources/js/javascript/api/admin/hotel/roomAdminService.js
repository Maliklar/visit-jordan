import axios from "axios";

const ROOT_API = process.env.MIX_PUSHER_APP_API;
const API_POINT = "admin/hotels/rooms"

async function add(data) {
    return await axios
        .post(`${ROOT_API}/${API_POINT}/add`, data)
        .then(response => response)
        .catch(e => e.response);
}

async function get() {
    return await axios
        .get(`${ROOT_API}/${API_POINT}/get`)
        .then(response => response)
        .catch(e => e.response);
}

async function getBranchRoomsTable(id) {
    return await axios
        .get(`${ROOT_API}/${API_POINT}/get/branch_rooms_table/${id}`)
        .then(response => response)
        .catch(e => e.response);
}

async function getByCategoryId(id) {
    console.log(id);
    return await axios
        .get(`${ROOT_API}/${API_POINT}/get/branch_rooms_table/${id}`)
        .then(response => response)
        .catch(e => e.response);
}






export {
    add,
    getBranchRoomsTable,
    get,
    getByCategoryId,
};