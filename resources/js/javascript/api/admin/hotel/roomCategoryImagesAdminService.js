import axios from "axios";

const ROOT_API = process.env.MIX_PUSHER_APP_API;
const API_POINT = "admin/hotels/rooms/categories/images"


async function addViewImages(data) {
    return await axios
        .post(`${ROOT_API}/${API_POINT}/view/add`, data)
        .then(response => response)
        .catch(e => e.response);
}

async function getViewImages(category_id) {
    return await axios
        .get(`${ROOT_API}/${API_POINT}/view/get/${category_id}`)
        .then(response => response)
        .catch(e => e.response);
}

async function addRoomImages(data) {
    return await axios
        .post(`${ROOT_API}/${API_POINT}/view/add`, data)
        .then(response => response)
        .catch(e => e.response);
}

async function getRoomImages(category_id) {
    return await axios
        .get(`${ROOT_API}/${API_POINT}/view/get/${category_id}`)
        .then(response => response)
        .catch(e => e.response);
}
async function deleteImage(id) {
    return await axios
        .delete(`${ROOT_API}/${API_POINT}/delete/${id}`)
        .then(response => response)
        .catch(e => e.response);
}

export {

    getRoomImages,
    addRoomImages,
    getViewImages,
    addViewImages,
    deleteImage,
};