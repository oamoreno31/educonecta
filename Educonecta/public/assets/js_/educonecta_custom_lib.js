var filenameArray = []
function onChangeFile(element){
    try {
        console.log("File name: "+element.value)
        if(filenameArray.indexOf(element.value) == -1){
            filenameArray.push(element.value)
        }else{
            alert("Ya agregaste un documento con el mismo nombre, selecciona uno diferente.")
            element.value = ""
        }
    } catch (error) {
        console.error(error)
    }    
}
function btnAddOnCLick() {
    let cantidadFiles = document.getElementsByName("filesGroup").length;
    let randomId = 0;
    if (cantidadFiles < 5) {
        let validRandom = 1;
        console.log("cantidadFiles: "+cantidadFiles)
        if (document.getElementById("container_" + (cantidadFiles + 1))) {
            while (!validRandom) {
                let rand = Math.round(Math.random() * 5)
                if (rand > 0) {
                    if (!document.getElementById("container_" + rand)) {
                        validRandom = true
                        randomId = rand
                    } else {
                        validRandom = false
                    }
                }else{
                    validRandom = false
                }
            }
        }else{
            randomId = cantidadFiles+1
        }
        console.log("randomId: "+randomId)
        let fileInput = '<input type="file"  name="file_' + (randomId) + '" id="file_' + (randomId) + '" class="form-control" accept=".pdf" required onChange="onChangeFile(this)"><br/>'
        let htmlFile = '<div class="row" name="filesGroup" id="container_' + (randomId) + '"><label>Archivo #' + (randomId) + '</label><div class="col-lg-10">' + fileInput + '</div><div class="col-lg-2"><button type="button" class="btn btn-danger" id="btnDelete_'+(randomId)+'" onclick="btnDeleteElement(\'container_' + (randomId) + '\')">Elimnar</button></div></div>'
        document.getElementById("filesContainer").insertAdjacentHTML("beforeend", htmlFile);
        document.getElementById("files_count").value = (cantidadFiles + 1);
        console.log("count: " + document.getElementById("files_count").value)
        if(cantidadFiles > 0){
            document.getElementById("btnDelete_"+(randomId-1)).setAttribute("disabled", true)
        }
    } else {
        document.getElementById("btnNewFile").removeAttribute("onclick")
        document.getElementById("btnNewFile").setAttribute("disabled", true)
        document.getElementById("btnNewFile").textContent = "No puedes agregar mas archivos"
    }
}

function btnDeleteElement(id) {
    try {
        let files_count = (document.getElementById("files_count").value - 1 < 0 ? 0 : document.getElementById("files_count").value - 1);
        if(files_count > 0){
            document.getElementById("btnDelete_"+(parseInt(String(id).split("_")[1])-1)).removeAttribute("disabled")
        }
        document.getElementById("files_count").value = parseInt(files_count);
        console.log("count: " + document.getElementById("files_count").value)
        document.getElementById(id).remove()
        if (files_count < 5) {
            document.getElementById("btnNewFile").removeAttribute("disabled")
            document.getElementById("btnNewFile").setAttribute("onclick", "btnAddOnCLick()")
            document.getElementById("btnNewFile").textContent = "Nuevo Archivo"
        }
    } catch (error) {
        console.error(error)
    }
}
