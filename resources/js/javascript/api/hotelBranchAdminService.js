import axios from "axios";

const ROOT_API = process.env.MIX_PUSHER_APP_API;
const API_POINT = "admin/hotels/branches"
async function add(data) {
    return await axios
        .post(`${ROOT_API}/${API_POINT}/add`, data)
        .then(response => response)
        .catch(e => e.response);
}

async function addInteriorImages(data) {
    return await axios
        .post(`${ROOT_API}/${API_POINT}/images/interior/add`, data)
        .then(response => response)
        .catch(e => e.response);
}

async function getInteriorImages(branch_id) {
    return await axios
        .get(`${ROOT_API}/${API_POINT}/images/interior/get/${branch_id}`)
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





export { add, getAll, addInteriorImages, deleteImage, getInteriorImages };