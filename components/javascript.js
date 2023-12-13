
//post.php
document.getElementById("imageval").addEventListener("change",myFunction);
function myFunction(){
    var x=document.getElementById("image");
    var y=document.getElementById("imageval");
    x.src = y.value;
    
 }
