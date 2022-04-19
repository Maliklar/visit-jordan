import axios from "axios";

const ROOT_API = process.env.MIX_PUSHER_APP_API;
const API_POINT = "admin/hotels/room_categories"
async function add(data) {
    return await axios
        .post(`${ROOT_API}/${API_POINT}/add`, data)
        .then(response => response)
        .catch(e => e.response);
}


async function addViewImages(data) {
    return await axios
        .post(`${ROOT_API}/${API_POINT}/images/view/add`, data)
        .then(response => response)
        .catch(e => e.response);
}

async function getViewImages(branch_id) {
    return await axios
        .get(`${ROOT_API}/${API_POINT}/images/view/get/${branch_id}`)
        .then(response => response)
        .catch(e => e.response);
}

async function addRoomImages(data) {
    return await axios
        .post(`${ROOT_API}/${API_POINT}/images/view/add`, data)
        .then(response => response)
        .catch(e => e.response);
}

async function getRoomImages(branch_id) {
    return await axios
        .get(`${ROOT_API}/${API_POINT}/images/view/get/${branch_id}`)
        .then(response => response)
        .catch(e => e.response);
}

async function deleteImage(id) {
    return await axios
        .delete(`${ROOT_API}/${API_POINT}/images/delete/${id}`)
        .then(response => response)
        .catch(e => e.response);
}

async function getAll() {
    return await axios
        .get(`${ROOT_API}/${API_POINT}/get`)
        .then(response => response)
        .catch(e => e.response);
}

async function getSingleBranch(branch_id) {
    return await axios
        .get(`${ROOT_API}/${API_POINT}/get/${branch_id}`)
        .then(response => response)
        .catch(e => e.response);
}





export {
    add,
    getAll,
    getSingleBranch,
    getRoomImages,
    addRoomImages,
    getViewImages,
    addViewImages,
    deleteImage,
};