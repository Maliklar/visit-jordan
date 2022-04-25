import axios from "axios";

const ROOT_API = process.env.MIX_PUSHER_APP_API;
const API_POINT = "admin/hotels/rooms/categories"
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

async function getById(id) {
    return await axios
        .get(`${ROOT_API}/${API_POINT}/get/${id}`)
        .then(response => response)
        .catch(e => e.response);
}

async function getByBranchId(id) {
    return await axios
        .get(`${ROOT_API}/${API_POINT}/get/branch/${id}`)
        .then(response => response)
        .catch(e => e.response);
}

async function getByBranchAndCategoryId(branch_id, category_id) {
    return await axios
        .get(`${ROOT_API}/${API_POINT}/get/${branch_id}/${category_id}`)
        .then(response => response)
        .catch(e => e.response);
}

async function update(data) {
    return await axios
        .patch(`${ROOT_API}/${API_POINT}/update`, data)
        .then(response => response)
        .catch(e => e.response);
}

async function deleteCategory(id) {
    return await axios
        .delete(`${ROOT_API}/${API_POINT}/delete/${id}`)
        .then(response => response)
        .catch(e => e.response);
}








async function deactivate(id) {
    return await axios
        .patch(`${ROOT_API}/${API_POINT}/deactivate/${id}`)
        .then(response => response)
        .catch(e => e.response);
}






export {
    add,
    getById,
    get,
    getByBranchId,
    getByBranchAndCategoryId,
    update,
    deactivate,
    deleteCategory,
};