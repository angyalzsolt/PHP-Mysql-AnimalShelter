//  the picture container
var picBlock = document.getElementById("mypicture");
//the picture itself
var bigPic = document.getElementsByClassName('picture-content');

// empty array for the smallimages src
var srcList = [];
function getImgSrc(x){
  //get rid of the #
  let z = x.replace('#', '');
  //find all img element from the modal
  let y = document.getElementById(z).getElementsByTagName("IMG");
  //push all img src in an array
  for(let h=0; h < y.length; h++){
    srcList.push(y[h].src);
  }
}

function nextImg(){
for(let d = 0; d <srcList.length; d++){
  if(!srcList[d].includes('DOG')){
    console.log("THERE IS NO VALID IMAGE");
    return;
    }
  }
  let currentImg = bigPic[0].src;
  let currentIndex = srcList.indexOf(currentImg);
  if(currentIndex + 1 == srcList.length){
    bigPic[0].src = srcList[0];
  } else {
    bigPic[0].src = srcList[currentIndex+1];
  }
}

function prevImg(){

  let currentImg = bigPic[0].src;
  let currentIndex = srcList.indexOf(currentImg);
  if(currentIndex  == 0){
    bigPic[0].src = srcList[srcList.length-1];
  } else {
    bigPic[0].src = srcList[currentIndex-1];

  }
}

function delSrcList(){
  srcList = []
}

function reply_click(x){
  //gets the small image src
  var pictureSrc = $('#'+x).attr('src');
  // //give it to the big image container
  bigPic[0].src = pictureSrc;
  //show the image
  picBlock.style.display='block';
}

$("#close").click(function(){
    picBlock.style.display = "none";
    bigPic[0].src = ""; 
});
