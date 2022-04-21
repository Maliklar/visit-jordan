import axios from "axios";

const ROOT_API = process.env.MIX_PUSHER_APP_API;
const API_POINT = "admin/hotels/branches"
async function add(data) {
    return await axios
        .post(`${ROOT_API}/${API_POINT}/add`, data)
        .then(response => response)
        .catch(e => e.response);
}

async function update(data) {
    return await axios
        .patch(`${ROOT_API}/${API_POINT}/update`, data)
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

async function addBuildingImages(data) {
    return await axios
        .post(`${ROOT_API}/${API_POINT}/images/building/add`, data)
        .then(response => response)
        .catch(e => e.response);
}

async function getBuildingImages(branch_id) {
    return await axios
        .get(`${ROOT_API}/${API_POINT}/images/building/get/${branch_id}`)
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

async function get(id) {
    return await axios
        .get(`${ROOT_API}/${API_POINT}/get/${id}`)
        .then(response => response)
        .catch(e => e.response);
}





export {
    add,
    getAll,
    get,
    update,
    addInteriorImages,
    addBuildingImages,
    getViewImages,
    addViewImages,
    getBuildingImages,
    deleteImage,
    getInteriorImages
};