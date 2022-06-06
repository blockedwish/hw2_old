let authcode = document.querySelector("#auth_code")
authcode = authcode.textContent;

function onresponse(resp){
return resp.json();
  
}
function onjson(json){
    console.log(json);
    let arr =["plant_name","current_price", "C" ];
    let hiddablearray = ["current_price"];
    let table =   document.querySelector("table");
    for(element of json){
        let tr = document.createElement("tr");

        for(element2 of arr){
            let td = document.createElement("td");
            if(hiddablearray.indexOf(element2) !=-1){
                td.classList.add("hiddable");
            }
            td.textContent = element[element2];
            tr.appendChild(td);
            table.appendChild(tr);
        }
    }
}
let form = new FormData();
form.append("auth_code", authcode);
fetch("api/getfolloweronauctions", {method:"post",body:form}).then(onresponse).then(onjson);
