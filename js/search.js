

let filters = {
  type: 'all',
  gender: 'all',
  castration: 'all',
  age: 'all',
  name: 'all'
}

let items = {};

const type = document.getElementsByName('type');
type.forEach((button)=>{
  button.addEventListener('click',(e)=>{
    filters.type = e.target.value;
    renderData(items, filters);
  })
});

const gender = document.getElementsByName('gender');
gender.forEach((button)=>{
  button.addEventListener('click', (e)=>{
    filters.gender = e.target.value;
    renderData(items, filters);
  })
});

const castration = document.getElementsByName('castration');
castration.forEach((button)=>{
  button.addEventListener('click', (e)=>{
    filters.castration = e.target.value;
    renderData(items, filters);
  })
});

document.getElementById('age').addEventListener('change', (e)=>{
  filters.age = e.target.value;
  renderData(items, filters);
});

document.getElementById('name').addEventListener('input', (e)=>{
  filters.name = e.target.value;
  renderData(items, filters);
});


const getData = async ()=>{
  const response = await fetch('search3.php');
  if(response.status === 200){
    const data = await response.json();
    return data;
  } else {
    throw new Error('Suprise, something went wrong: ');
  }
}




const renderData = (array, filters)=>{
    let functionsList = [typeSelect, genderSelect, castrationSelect, ageSelect, nameSelect];
    let filteredData = array;
    for(let x=0; x < functionsList.length; x++){
      filteredData = functionsList[x](filteredData);
    }
    if(filteredData.length === 0){
      document.getElementById('target').innerHTML = '<span id="noresult">No result</span>';
      return;
    }
    document.getElementById('target').innerHTML = '';

    filteredData.forEach((data)=>{ 
     document.getElementById('target').innerHTML += `
      <div class="card col-md-5 p-3 mx-4 mb-4">
          <div class="row">
            <div class="col-md-7 mb-3">
              <div class="card-block">
                <h1 class="card-title"><b>${data.name}</b></h1>
                <p class="card-text text-justify text str"><b>Type: </b>${data.name}</p>
                <p class="card-text text-justify text str"><b>Born: </b>${data.born_date}</p>
                <p class="card-text text-justify text str"><b>Gender: </b>${data.gender}</p>
                <p class="card-text text-justify text str"><b>Castration: </b>${data.castration}</p>
                <div class="col-5 my-2">
                  <img class="gallery_image" id="myImg${data.id}" onClick="reply_click(this.id)" width="100%" height="100" style="object-fit: cover;" src="../image_upload/${Object.values(data.images)[0]}" alt="">
                </div>
              </div>
            </div>
             <div class="col-md-5"> <a href="??????">
              <img style="width: 100%" class="imag" src="../image_upload/${data.main_image}" onerror="this.src = '../img/no-image.jpg';"></a>
            </div>
          </div>
        </div>`;
  })
}


getData().then((item)=>{
  items = Object.values(item);
  renderData(items, filters);
  return items;
}).catch((error)=>{
  console.log(`Error: ${error}`);
})



const typeSelect = (array)=>{
  if(filters.type === 'all'){
    return array;
  } else{
    let filteredImg = array.filter((item)=>{
      if(item.main_image !== null){
         return item.main_image.toLowerCase().includes(filters.type);
      }
  })
    return filteredImg;  
  }
}

const genderSelect = (array)=>{
  if(filters.gender === 'all'){
    return array;
  } else {
    let filtered =  array.filter((item)=>{
      return item.gender === filters.gender;
    })
    return filtered;
  }
}

const castrationSelect = (array)=>{
  if(filters.castration === 'all'){
    return array;
  } else {
    let filtered = array.filter((item)=>{
      return item.castration === filters.castration;
    })
    return filtered;
  }
}

const ageSelect = (array)=>{
  if(filters.age === 'all'){
    return array;
  } else {
    let filtered = array.filter((item)=>{
      console.log(item.born_date.split('-')[0]);
      return item.born_date.split('-')[0] === filters.age;
    })
    return filtered;
  }
}

const nameSelect = (array)=>{
  if(filters.name === 'all'){
    return array;
  } else {
    let filtered = array.filter((item)=>{
      return item.name.toLowerCase().includes(filters.name.toLowerCase());
    })
    return filtered;
  }
}




