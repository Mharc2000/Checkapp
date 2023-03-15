$(document).ready(function(){
    $('.delete_product_btn').click(function(e){
        e.preventDefault();
        var Cart_ID =$(this).val();

        swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this data!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                method:"POST",
                url: "Patient-Cart-Delete.php",
                data: {
                    'Cart_ID': Cart_ID, 
                    'delete_product_btn': true
                },
                success: function(response){
                      if(response == 200)
                      {
                        swal(
                            "Deleted Successfully!",
                            "Product deleted ",
                            "success"
                        ).then((success)=>{
                            if(success){
                                window.location.href='Patient-Cart.php';
                            }
                        });
                          
                      }else if(response ==500)
                      {
                        swal("Error!","Something Went Wrong!","error");
                      }
                }
            });
        } 
        });
    })
});