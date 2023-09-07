//buscar libro por codigo

function searchbookbycode(url,code){
    let route = url + "dashboard/books/getbook/" + code;
    //console.log(route);
    return fetch(route)
    .then(response => {
      if (!response.ok) {
        throw new Error('Error en la solicitud: ' + response.status);
      }
      return response.json();
    })
    .then(data => data)
    .catch(error => {
      console.error('Error:', error);
    });
}
function get(route){
  return fetch(route).then(response => {
    if (!response.ok) {
      throw new Error('Error en la solicitud: ' + response.status);
    }
    return response.json();
  }).then(data => data).catch(error => {
    console.error('Error: ', error);
  });
}
//GUARDAR 
function save(route,token,name){
  //cuerpo  
  fetch(route, {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json'
    },
    body: JSON.stringify({ name: name, _token: token })
    })
    .then(response => response.json())
    .then(data => {
        // Aquí puedes manejar la respuesta recibida desde Laravel
        console.log(data);
    })
    .catch(error => {
        // Aquí puedes manejar cualquier error que ocurra durante la petición
        console.log(error);
        //console.error(error);
    });
}

function searchinselect(name,select){
    let sel = document.getElementById(select);
    let options = sel.options;
    for(let i = 0; i < options.length; i++){
      if (options[i].innerHTML == name){
        return true;
      }
    }
    return false;
}
function addtoselect(name,select){
  //verificamos si es un arrary
    let sel = document.getElementById(select);
    let option = document.createElement('option');
    option.value = name;
    option.innerHTML= name;
    sel.appendChild(option);
}
function clearselect(select){
  //vamos a borrar el select
  const selectElement = document.getElementById(select); 
  while (selectElement.firstChild) {
      selectElement.removeChild(selectElement.firstChild);
  }
}
function hacerPeticionGET(url) {
  return new Promise((resolve, reject) => {
    fetch(url, {
      method: 'GET'
    })
    .then(response => {
      if (!response.ok) {
        // Si la respuesta no es satisfactoria, rechazar la promesa con un mensaje de error
        reject(`Error en la respuesta. Estado: ${response.status}`);
      }
      // Convertir la respuesta en formato JSON y resolver la promesa con los datos
      return response.json();
    })
    .then(data => {
      // Resuelve la promesa con los datos obtenidos
      resolve(data);
    })
    .catch(error => {
      // Rechazar la promesa en caso de que ocurra algún error en el proceso
      reject(`Error al obtener los datos: ${error}`);
    });
  });
}
//mostar los datos
function fill(name,route){
    console.log(route);
    return fetch(route)
    .then(response => {
      if (!response.ok) {
        throw new Error('Error en la solicitud: ' + response.status);
      }
      return response.json();
    })
    .then(data => data)
    .catch(error => {
      console.error('Error:', error);
    });
}
//funcion para guardar


