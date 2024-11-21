class TabObj{
    constructor(idBtn, idDiv){
        this.idBtn = document.getElementById(idBtn)
        this.idDiv = document.getElementById(idDiv)
    }
}










/**
 * 
 * @param {array<TabObj>} listObj 
 */
function openTabObj(listObj){


    listObj.forEach(obj => {
        obj.idBtn.addEventListener('click', e =>{
            
            listObj.forEach(e => {
                e.idDiv.style.display = "none"
                e.idBtn.classList.remove('active')
            })
            obj.idDiv.style.display = "table"
            obj.idBtn.classList.add('active')
        })
    });
}





//////
