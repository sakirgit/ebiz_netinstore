jQuery(document).ready(function($) {
   $("#prod_img_upload_submission").on('click', function(){
     $("#product-images-uploaded").html('<br><div class="spinner2"></div>');
     $( 'form[name="custom_product_img_upload"]' ).trigger( "submit" );
   });
   $('form[name="custom_product_img_upload"]').on('submit', function(e) {
       e.preventDefault();

       var directoryName = $('input[name="directory_name"]').val();
         var successHtml = "";
       $.ajax({
           type: 'POST',
           url: ajax_url,
           data: {
               action: 'custom_product_image_upload',
               directory_name: directoryName,
           },
           success: function(response) {
            //   alert('Product images uploaded successfully!');
               console.log(response.data);
               successHtml = successHtml + " <h3 class=''>" + response.data.message + " </h3>";
               $.each(response.data.data, function( index, value ) {
                  successHtml = successHtml + "<span class='product-image-uploaded'>" + value + ", </span>";
                });
                $("#product-images-uploaded").html(successHtml);
           },
           error: function(error) {
               alert('Error uploading product images!');
               console.log(error);
           }
       });
   });
});
