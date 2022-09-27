
var add=document.getElementById("add");
var ul =document.getElementById('ul')
add.addEventListener("click",function(){
    var input=document.getElementById('input').value;
     var li=document.createElement('li');
    li.innerHTML=input + '<button  name="bttn"  onclick="removerow(this)" id="bttn"><i class="fa-solid fa-trash-can"></i></button>';
   ul.appendChild(li);
  
   
   
});


function removerow(r){
    var p= r.parentNode;
    document.getElementById("ul").removeChild(p);
    

     
   
 

   
 }

 var add1=document.getElementById("add1");
var ul1 =document.getElementById('ul1')
add1.addEventListener("click",function(){
    var input1=document.getElementById('input1').value;
     var li1=document.createElement('li');
    li1.innerHTML=input1 + '<button  name="bttn" onclick="removerow1(this)" id="bttn"><i class="fa-solid fa-trash-can"></i></button>';
   ul1.appendChild(li1);

   
   
   
});


function removerow1(r){
    var p= r.parentNode;
    document.getElementById("ul1").removeChild(p);
    

     
   
 

   
 }

 var add2=document.getElementById("add2");
var ul2 =document.getElementById('ul2')
add2.addEventListener("click",function(){
    var input2=document.getElementById('input2').value;
     var li2=document.createElement('li');
    li2.innerHTML=input2 + '<button  name="bttn" onclick="removerow2(this)" id="bttn"><i class="fa-solid fa-trash-can"></i></button>';
   ul2.appendChild(li2);
   
   
});

function removerow2(r){
   var p= r.parentNode;
   document.getElementById("ul2").removeChild(p);


}

var add3=document.getElementById("add3");
var ul3 =document.getElementById('ul3');
add3.addEventListener("click",function(){
    var input3=document.getElementById('input3').value;
     var li3=document.createElement('li');
    li3.innerHTML=input3 + '<button  name="bttn" onclick="removerow2(this)" id="bttn"><i class="fa-solid fa-trash-can"></i></button>';
   ul3.appendChild(li3);
   
   
});


function removerow2(r){
    var p= r.parentNode;
    document.getElementById("ul3").removeChild(p);
      
 }


 //medicine

 var medi=document.getElementById('medi');
 var medi2=document.getElementById('medi2');
 var medi3=document.getElementById('medi3');
 var medi4=document.getElementById('medi4');
 var medicinebtn=document.getElementById('medicinebtn');
 medicinebtn.addEventListener("click",function(){
    var tr=document.createElement("tr");
    var td=document.createElement('td');
    td.innerHTML=medi.value;
    tr.appendChild(td);

    var td2=document.createElement('td');
    td2.innerHTML=medi2.value;
    tr.appendChild(td2);

    var td3=document.createElement('td');
    td3.innerHTML=medi3.value;
    tr.appendChild(td3);

    var td4=document.createElement('td');
    td4.innerHTML=medi4.value;
    tr.appendChild(td4);

    var td4=document.createElement('td');
    td4.innerHTML= '<button name="bttn" onclick="removerowtable(this)" id="bttn"><i class="fa-solid fa-trash-can"></i></button>';
    tr.appendChild(td4);
 
    document.getElementById("tbody").appendChild(tr);
 })


 function removerowtable(r){
   var p= r.parentNode.parentNode;
   document.getElementById("tbody").removeChild(p);
   

    
  


  
}



 //print
 

//  function prin(){

//    //  var prinn =document.getElementById("prinn");
//    //   var rmv=document.querySelectorAll('button[name="bttn"]');
//    //  const inputbtn = document.querySelectorAll('input[name="inputbtn"]');

//    //  for (const inputbtns of inputbtn) {
//    //      inputbtns.style.display='none';
//    //      }

//    //      for (const rmvs of rmv) {
//    //       rmvs.style.display='none';
//    //       }
         
          
//    //        prinn.style.display='none';
         
// window.print();
//  }
