const videoPlayer = document.querySelector('#New');
const canvasElement = document.querySelector('#canvas');
const captureButton = document.querySelector('#capture-btn');
const imagePicker = document.querySelector('#img-picker');
const chosen= document.querySelector('#chosen-img');
const imagePickerArea = document.querySelector('#Pick');
const newImages = document.querySelector('#newImages');
const sticker1 = document.querySelector('#sticker1');
const sticker2 = document.querySelector('#sticker2');
const sticker3 = document.querySelector('#sticker3');
const stickerName = document.querySelector('#sticker-name');

const width = 350;
const height = 250;
let zIndex= 1;
imagePicker.addEventListener('change', (event)=>{
  var reader = new FileReader;
  reader.addEventListener('load', (event)=>{
    chosen.src = reader.result;
  });
  reader.readAsDataURL(imagePicker.files[0]);
});

sticker1.addEventListener('click', (event)=>{
  stickerName.src  = sticker1.src;
});
sticker2.addEventListener('click', (event)=>{
  stickerName.src   = sticker2.src;
});
sticker3.addEventListener('click', (event)=>{
  stickerName.src = sticker3.src;
});

const startMedia = () =>
{
    if (!('mediaDevices' in navigator)) {
        navigator.mediaDevices = {};
      }
    
      if (!('getUserMedia' in navigator.mediaDevices)) {
        navigator.mediaDevices.getUserMedia = (constraints) => {
          const getUserMedia = navigator.webkitGetUserMedia || navigator.mozGetUserMedia;
    
           if (!getUserMedia) {
              return Promise.reject(new Error('getUserMedia is not supported'));
            } else {
              return new Promise((resolve, reject) => getUserMedia.call(navigator, constraints, resolve, reject));
            }
        };
      }
    
      navigator.mediaDevices.getUserMedia({video: true})
        .then((stream) => {
          videoPlayer.srcObject = stream;
          videoPlayer.style.display = 'block';
        })
      .catch((err) => {
        imagePickerArea.style.display = 'block';
      });
}

captureButton.addEventListener('click', (event) => {
  canvasElement.style.display = 'block';
  const context = canvasElement.getContext('2d');
  var filename = stickerName.src;
  filename = filename.replace(/^.*[\\\/]/, '');
  context.drawImage(videoPlayer, 0, 0, canvas.width, canvas.height);
  context.drawImage(chosen, 0, 0, canvas.width, canvas.height);
  var http = new XMLHttpRequest();
  var parameters = "nameimg="+canvasElement.toDataURL('image/png')+"&images="+filename;
  http.onreadystatechange = function()
  {
    if (http.readyState == 4 && http.status == 200) 
    {
        if (http.responseText == "success")
        {
            alert("Image Saved");
        } 
        else 
        {
            alert("failed to save the image");
        }
    }
  };
  http.open("POST", "../servers/combine.php", true);
  http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  http.send(parameters);

  videoPlayer.srcObject.getVideoTracks().forEach((track) => {
  });

});
window.addEventListener("load", (event) => startMedia());
