// create svg drawing

/*
(function(){
var draw = SVG('drawing');




// create image
var image = draw.image('img/temp-image-home.jpg')
image.size(600, 600).y(-150)

// create text
var text = draw.text('SVG.JS').move(300, 0)
text.font({
  family: 'Source Sans Pro'
, size: 180
, anchor: 'middle'
, leading: 1
})

// clip image with text
image.clipWith(text)
}())


//var draw = SVG('image2');
//var image = draw.image('images/temp-image-home.jpg')




function a() {
    var s=document.getElementById("Layer_1");
    //s.setAttribute("stroke","0000FF");
console.log(s);
    
}