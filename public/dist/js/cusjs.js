 $(document).ready(function (){
 $('#file-logo__roi').on('change',function(){
 var file=$(this).prop('files')[0];
 if(file){
  const reader=new FileReader();
  $('.image-preview__text-default').css({'display':'none',});
  $('.image-preview__image').css({'display':'block',});
  $(reader).on('load',function(){
    $('.image-preview__image').attr('src',reader.result);
  })
  reader.readAsDataURL(file);
 }
 })

 $('#file-photo__roi').on('change',function(){
 var file=$(this).prop('files')[0];
 if(file){
  const reader=new FileReader();
  $('.photo-preview__text-default').css({'display':'none',});
  $('.photo-preview__photo').css({'display':'block',});
  $(reader).on('load',function(){
    $('.photo-preview__photo').attr('src',reader.result);
  })
  reader.readAsDataURL(file);
 }
 })

 
 $('#file-masterplan__roi').on('change',function(){
 var file=$(this).prop('files')[0];
 if(file){
  const reader=new FileReader();
  $('.masterplan-preview__text-default').css({'display':'none',});
  $('.masterplan-preview__masterplan').css({'display':'block',});
  $(reader).on('load',function(){
    $('.masterplan-preview__masterplan').attr('src',reader.result);
  })
  reader.readAsDataURL(file);
 }
 })

 
 $('#file-layouts__roi').on('change',function(){
  var file=$(this).prop('files');
  
      if(file.length>0){
        $('.layouts-preview').empty();
       $(file).each(function(index){
        var x=this;
        const reader=new FileReader();
      $('.layouts-preview__text-default').css({'display':'none',});

      $(reader).on('load',function(){
        var img=$('<div class="layouts-preview__colom"> </div>')
        .append($('<img class="layouts-preview__layouts" alt="layouts-preview">').attr('src',reader.result))
        .append($('<span class="xdeletelayouts">x</span>').on('click',function(){
         removefromfilelistlayouts(x);
         $(this).parent().remove();
        }));
       
        $('.layouts-preview').append(img)
      })
        reader.readAsDataURL(this);
    })}


  })
 $('#file-gallary__roi').on('change',function(){
  var file=$(this).prop('files');
 
      if(file.length>0){
        $('.Gallary-preview').empty();
       $(file).each(function(){
        var x=this;
        const reader=new FileReader();
      $('.Gallary-preview__text-default').css({'display':'none',});
      $(reader).on('load',function(){
        var img=$('<div class="Gallary-preview__colom"> </div>')
        .append($('<img class="Gallary-preview__Gallary" alt="Gallary-preview">').attr('src',reader.result))
        .append($('<span class="xdelete">x</span>').on('click',function(){
          removefromfilelistgallary(x);
         $(this).parent().remove();
        }));
       $('.Gallary-preview').append(img)
      })
      reader.readAsDataURL(this);
    })}


  })

  

      function removefromfilelistgallary(x){
        const dt=new DataTransfer();
        const input=document.getElementById('file-gallary__roi')
        const {files}=input;
        if(files.length>0){
          for(let i=0;i<files.length;i++){
          const file=files[i];
          if(file !== x){
            dt.items.add(file);
          }
          }
          input.files=dt.files;
         }
    }
      function removefromfilelistlayouts(x){
        const dt=new DataTransfer();
        const input=document.getElementById('file-layouts__roi')
        const {files}=input;
        if(files.length>0){
          for(let i=0;i<files.length;i++){
            
          const file=files[i];
          if(file !== x){
          dt.items.add(file);}
          }
          input.files=dt.files;
          }
    }
      


let map;
function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: -34.397, lng: 150.644 },
    zoom: 8,
  });
}

window.initMap = initMap;
        
  });