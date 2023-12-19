const carForm = document.getElementById('carForm');
const btnRefresh = document.getElementById('btnRefresh');
const carlist = document.getElementById('carList');
const buttons = document.querySelectorAll('button');

// Listners ---------------------------------------------------------
carForm.addEventListener('submit',(e)=>{
    e.preventDefault();
    callApiWithForm()
})
Array.from(buttons).forEach(function(element) {
    element.addEventListener('click', e=>btnClick(e));
});
// Functions --------------------------------------
/**
 * Get list of Car and show in TBody
 */
function getList(){
    let formData = new FormData();
    formData.append('context', 'list');
    postData('/api',formData)
        .then((res)=>{
            updateCarList(res.data)
        })
        .catch((err)=>{
            console.log(err)
        })
}

/**
 * Get car info and fill form
 * @param idNum
 */
function getCar(idNum) {

    let formData = new FormData();
    formData.append('idNum', idNum);
    formData.append('context', 'get');
    postData('/api',formData)
        .then((res)=>{
            const response = JSON.parse(res);
            if (response.success){
                setForm(response.data)
            }

        })
        .catch((err)=>{
            const response = JSON.parse(err);
        })
}

/**
 * Call api for new and update context then refreshform and refresh list
 */
function callApiWithForm(){

    let formData = new FormData();
    formData.append('brand', carForm.elements['brand'].value);
    formData.append('model', carForm.elements['model'].value);
    formData.append('idNum', carForm.elements['idNum'].value);
    formData.append('gas', carForm.elements['gas'].value);
    formData.append('price', carForm.elements['price'].value);
    formData.append('isNew', carForm.elements['isNew'].value);
    formData.append('isReserved', carForm.elements['isReserved'].value);
    formData.append('context',carForm.elements['update'].value === 'true' ? 'update' : 'new');
    console.log(carForm.elements['update'].value)
    postData('/api',formData)
        .then((res)=>{
            const response = JSON.parse(res);
            resetForm();
            getList();
        })
        .catch((err)=>{
            console.log(err)
        })
}

/**
 * Delete car then refresh list
 * @param idNum
 */
function deleteCar(idNum) {

    let formData = new FormData();
    formData.append('idNum', idNum);
    formData.append('context', 'delete');
    postData('/api',formData)
        .then((res)=>{
            const response = JSON.parse(res);
            getList();
        })
        .catch((err)=>{
            console.log(err)
        })
}

/**
 * Set form with car infos and set update input true
 * @param data
 */
function setForm(data){
    carForm.elements['brand'].value = data.brand ;
    carForm.elements['model'].value = data.model ;
    carForm.elements['idNum'].value = data.id_num ;
    carForm.elements['gas'].value = data.gas ;
    carForm.elements['price'].value = data.price ;
    carForm.elements['isNew'].value = data.is_new ;
    carForm.elements['isReserved'].value = data.is_reserved ;
    carForm.elements['update'].value = 'true';
}

/**
 * Reset form and set update mode to false
 */
function resetForm(){
    carForm.reset();
    carForm.elements['update'].value = 'false';
}

/**
 * Update TBody with car list
 * @param data
 */
function updateCarList(data) {
    carlist.innerHTML="";
    data.forEach((element)=>{
        let row = document.createElement('tr');
        let btnCell = document.createElement('td');

        row.append(getCell(element.brand));
        row.append(getCell(element.model));
        row.append(getCell(element.id_num));
        row.append(getCell(element.gas));
        row.append(getCell(element.price));
        row.append(getCell(element.is_new == 1 ? 'Neuf' : 'Occasion' ));
        row.append(getCell(element.is_reserved == 1 ? 'Oui' : 'Non' ));

        btnCell.append(getButton('edit',element.id_num ));
        btnCell.append(getButton('delete',element.id_num ));
        row.append(btnCell);
        carlist.append(row);

    })
}

/**
 * Generic post fetch for JSON Data
 * @param url
 * @param data
 * @returns {Promise<any>}
 */
async function postData(url, data) {
    const headers = {
        "Content-Type": "application/json",
    }
    const response = await fetch(
        url,
        {
            method: "POST",
            body: data
        });
    return response.json();
}

/**
 * Create cel for row in table
 * @param data
 * @returns {HTMLTableCellElement}
 */
function getCell(data) {
    let cel = document.createElement('td');
    cel.append(data);
    return cel;
}

/**
 * Create button for actions in row
 * @param classId
 * @param dataset
 * @returns {HTMLButtonElement}
 */
function getButton(classId, dataset) {
    let btn = document.createElement('button');
    btn.classList.add(classId);
    btn.dataset.id = dataset;
    btn.innerText = classId === 'edit' ? 'Edit' : 'Remove'
    btn.addEventListener('click', e=>btnClick(e));
    return btn;
}

/**
 * Listner for action buttons
 * @param e
 */
function btnClick(e){
    if (e.target.classList.value.includes('delete')){
        deleteCar(e.target.dataset.id)
    }
    if (e.target.classList.value.includes('edit')){
        getCar(e.target.dataset.id)
    }
}
