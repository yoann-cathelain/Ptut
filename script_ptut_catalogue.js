function setSelected(){
    var selectCat = document.getElementById('selectCat').setAttribute("selected","true");
}
function changeSelected() {
    var select = document.getElementById('selectCat')
    var value = select.options[select.selectedIndex].value
    console.log(value)

}
function listener(){
    document.getElementById('idCat').addEventListener("click",function(){setSelected()})

}
window.addEventListener("load",function(){listener()})