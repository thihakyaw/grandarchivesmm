require('./bootstrap');

let refreshImageButton = document.getElementById('refresh-image-button');
let loadingImageSpinner = document.getElementById('loading-image-spinner');
let imageContainer = document.getElementById('image-container');
let image = document.getElementById("image");

refreshImageButton.addEventListener('click', async (e) => {
    loadingImageSpinner.style.display = "block";
    let image = await axios.get('api/v1/random-meme');
    console.log(image.data.data.image);
    loadingImageSpinner.style.display = "none";

    if(document.getElementById('image')) {
        document.getElementById('image').remove();
    }
    
    imageContainer.innerHTML += `<img src="storage/${image.data.data.image}" id="image" width="600">`;
});
