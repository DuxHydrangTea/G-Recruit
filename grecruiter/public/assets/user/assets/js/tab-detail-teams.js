const btnTabPersonal = document.getElementById(`btn-tab-info-1`)
const btnTabTeam = document.getElementById(`btn-tab-info-2`)

const tabInfo1= document.getElementById(`tab-info-1`)

const tabInfo2= document.getElementById(`tab-info-2`)


btnTabPersonal.addEventListener('click', e =>{
    tabInfo1.style.display = "block";
    tabInfo2.style.display = "none";
    btnTabPersonal.classList.toggle('active')
    btnTabTeam.classList.toggle('active')
})

btnTabTeam.addEventListener('click', e =>{
    tabInfo1.style.display = "none";
    tabInfo2.style.display = "block"
    btnTabPersonal.classList.toggle('active')
    btnTabTeam.classList.toggle('active')
})