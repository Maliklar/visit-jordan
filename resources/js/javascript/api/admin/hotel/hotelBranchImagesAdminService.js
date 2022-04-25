import axios from "axios";

const ROOT_API = process.env.MIX_PUSHER_APP_API;
const API_POINT = "admin/hotels/branches/images"


async function addInterior(data) {
    return await axios
        .post(`${ROOT_API}/${API_POINT}/images/interior/add`, data)
        .then(response => response)
        .catch(e => e.response);
}

async function getInterior(branch_id) {
    return await axios
        .get(`${ROOT_API}/${API_POINT}/images/interior/get/${branch_id}`)
        .then(response => response)
        .catch(e => e.response);
}

async function addBuilding(data) {
    return await axios
        .post(`${ROOT_API}/${API_POINT}/images/building/add`, data)
        .then(response => response)
        .catch(e => e.response);
}

async function getBuilding(branch_id) {
    return await axios
        .get(`${ROOT_API}/${API_POINT}/images/building/get/${branch_id}`)
        .then(response => response)
        .catch(e => e.response);
}

async function addView(data) {
    return await axios
        .post(`${ROOT_API}/${API_POINT}/images/view/add`, data)
        .then(response => response)
        .catch(e => e.response);
}

async function getView(branch_id) {
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







export {
    addInterior,
    addBuilding,
    getView,
    addView,
    getBuilding,
    deleteImage,
    getInterior,
};